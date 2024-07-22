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

    public static function get_top_5(){

        $db = Db::getConnection();

        $query = "select categories.id as id, categories.name as category from categories inner join products on categories.id = products.id_cat where id_cat = categories.id order by categories.id asc;";
        $result = $db->query($query);

        $num = -1;
        $last_name = '';
        $list = [];

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            if($last_name != $row['category']){
                $num++;
                $count = 0;
                $list[$num]['name'] = $row['category'];
                $list[$num]['id'] = $row['id'];
            }
            $count++;
            $list[$num]['count'] = $count;
            $last_name = $row['category'];

        }

        for($i = 0; $i < count($list); $i++){
            for($j = 0; $j < count($list)-1; $j++){
                if($list[$j]['count'] < $list[$j+1]['count']){
                    $tmp = $list[$j];
                    $list[$j] = $list[$j+1];
                    $list[$j+1] = $tmp;
                }

            }
        }

        return $list;
    }

}