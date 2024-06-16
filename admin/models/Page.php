<?php
require_once(ROOT.'/components/Db.php');
class Page
{

    public static function getList(){

        $db = Db::getConnection();

        $query = "select id, title, fullContent, name, page, prior from settingPage order by prior asc";
        $result = $db->query($query);

        $list = [];
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $list[$num]['id'] = $row['id'];
            $list[$num]['num'] = $num+1;
            $list[$num]['title'] = $row['title'];
            $list[$num]['fullContent'] = $row['fullContent'];
            $list[$num]['name'] = $row['name'];
            $list[$num]['page'] = $row['page'];
            $list[$num]['prior'] = $row['prior'];

            $num++;
        }

        return $list;

    }

    public static function getById($id){

        $db = Db::getConnection();

        $query = "select id, title, fullContent, name, page, prior from settingPage where id = {$id}";
        $result = $db->query($query);

        return $result->fetch(PDO::FETCH_ASSOC);

    }
    public static function getNameById($id){

        $db = Db::getConnection();
        $query = "select id, name from settingPage where id = {$id}";
        $result = $db->query($query);

        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public static function getName_Prior(){

        $db = Db::getConnection();

        $query = "select id, name, prior from settingPage order by prior asc";
        $result = $db->query($query);
        $list = [];
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $list[$num]['id'] = $row['id'];
            $list[$num]['name'] = $row['name'];
            $list[$num]['prior'] = $row['prior'];

            $num++;

        }


        return $list;

    }

    public static function update($list){

        $db = Db::getConnection();

        $query_prior = "select prior from settingPage where id = {$list['id']}";
        $result_prior = $db->query($query_prior);
        $old_prior = $result_prior->fetch(PDO::FETCH_NUM)[0];

        if($list['prior'] != $old_prior){

            $query_update = "update settingPage set prior = {$old_prior} where prior = {$list['prior']}";
            $db->query($query_update);

            $query_update_2 = "update settingPage set prior = {$list['prior']} where id = {$list['id']}";
            $db->query($query_update_2);

        }

        $query = "update settingPage set title = :title, name = :name, page = :page, fullContent = :fullContent where id = {$list['id']}";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':title',$list['title']);
        $stmt->bindValue(':name',$list['name']);
        $stmt->bindValue(':page',$list['page']);
        $stmt->bindValue(':fullContent',$list['fullContent']);

        $num_row = $stmt->execute();

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }

    }

    public static function dell($id){

        $db = Db::getConnection();

        $query_prior = "select prior from settingPage where id = {$id}";
        $result_prior = $db->query($query_prior);
        $prior = $result_prior->fetch(PDO::FETCH_NUM)[0]; // - 1

        $query_last = "select prior from settingPage order by prior desc limit 1";
        $result_last = $db->query($query_last);
        $last_prior = $result_last->fetch(PDO::FETCH_NUM)[0]; // - 4


        if($prior != $last_prior){

            $query_up = "update settingPage set prior = {$prior} where prior = {$last_prior}";
            $db->query($query_up);

        }

        $query_dell = "delete from settingPage where id = {$id}";
        $db->query($query_dell);

        return true;


    }


}