<?php
require_once(ROOT.'/components/Db.php');
class Cat
{

    public static function getAll(){

        $db = Db::getConnection();

        $query = "select id, name from categories";
        $result = $db->query($query);

        $cat = array();
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $cat[$num]['num'] = $num + 1;
            $cat[$num]['id'] = $row['id'];
            $cat[$num]['name'] = $row['name'];
            $num++;

        }

        return $cat;

    }


}