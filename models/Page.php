<?php
require_once(ROOT.'/components/Db.php');
class Page
{

    public static function getPage(){

        $db = Db::getConnection();

        $query = "select title, fullContent, page, name from settingPage order by prior asc";
        $result = $db->query($query);

        $pages = [];
        $num = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){

            $pages[$num]['title'] = $row['title'];
            $pages[$num]['fullContent'] = $row['fullContent'];
            $pages[$num]['page'] = $row['page'];
            $pages[$num]['name'] = $row['name'];

            $num++;
        }

        return $pages;

    }
    public static function getUri(){
        if(!empty($_SERVER['REQUEST_URI'])){
            if(empty(trim($_SERVER['REQUEST_URI'],'/'))){
                return 'index';
            }
            else{
                return explode('/',trim($_SERVER['REQUEST_URI'],'/'))[0];
            }
        }
    }

    public static function getPageInfo($page){

        $db = Db::getConnection();

        $query = "select title, fullContent, page, name from settingPage where page = '{$page}'";
        $result = $db->query($query);

        return $result->fetch(PDO::FETCH_ASSOC);

    }





}