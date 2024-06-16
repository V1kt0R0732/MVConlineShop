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

    public static function getAll_Count(){

        $db = Db::getConnection();

        $query = "select id, name from categories";
        $result = $db->query($query);

        $cat = array();
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $query_count = "select id from products where id_cat = {$row['id']}";
            $result_count = $db->query($query_count);
            $query_photo = "select photo_name from photo inner join products on products.id = photo.id_tovar where status = 1 and products.id_cat = {$row['id']} limit 1";
            $result_photo = $db->query($query_photo);

            $cat[$num]['num'] = $num + 1;
            $cat[$num]['id'] = $row['id'];
            $cat[$num]['name'] = $row['name'];
            $cat[$num]['count'] = $result_count->rowCount();
            $cat[$num]['photo'] = $result_photo->fetch(PDO::FETCH_NUM)[0];
            $num++;

        }

        return $cat;

    }

}