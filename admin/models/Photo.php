<?php
require_once(ROOT.'/components/Db.php');
class Photo
{

    public static function add($photo, $id){

        $db = Db::getConnection();

        $query_check = "select id from photo where id_tovar = {$id} and status = 1";
        $result = $db->query($query_check);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if(isset($row) && !empty($row)){
            for($i = 0; $i <  count($photo); $i++){
                $query_photo = "insert into photo (photo_name, id_tovar, status) values ('{$photo[$i]}', $id, 0)";
                $db->query($query_photo);
            }
        }
        else{
            for($i = 0; $i < count($photo); $i++){
                if($i == 0){
                    $query_photo = "insert into photo (photo_name, id_tovar, status) values ('{$photo[$i]}', $id, 1)";
                }
                else{
                    $query_photo = "insert into photo (photo_name, id_tovar, status) values ('{$photo[$i]}', $id, 0)";
                }
                $db->query($query_photo);
            }
        }


        return true;
    }

    public static function dellAll($id){

        $db = Db::getConnection();

        $query = "select photo_name from photo where id_tovar = {$id}";
        $result = $db->query($query);

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            unlink(ROOT.'/images/product/'.$row['photo_name']);
        }

        $query_dell = "delete from photo where id_tovar = {$id}";
        $num_row = $db->exec($query_dell);

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getListById($id){

        $db = Db::getConnection();

        $query = "select id, photo_name, status from photo where id_tovar = {$id}";

        $result = $db->query($query);

        $photo = [];
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $photo[$num]['num'] = $num+1;
            $photo[$num]['id'] = $row['id'];
            $photo[$num]['photo_name'] = $row['photo_name'];
            $photo[$num]['status'] = $row['status'];
            $num++;
        }

        return $photo;

    }

    public static function statusChange($id, $tovar_id){

        $db = Db::getConnection();

        $query_1 = "update photo set status = 0 where status = 1 and id_tovar = {$tovar_id}";
        $query_2 = "update photo set status = 1 where id = {$id}";

        $db->query($query_1);
        $db->query($query_2);

        return true;

    }

    public static function dell($id){

        $db = Db::getConnection();

        $query = "select status, id_tovar, photo_name from photo where id = {$id}";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        $query_dell = "delete from photo where id = {$id}";
        $db->exec($query_dell);
        unlink(ROOT.'/images/product/'.$row['photo_name']);


        if($row['status'] == 1){
            $query_status = "update photo set status = 1 where id_tovar = {$row['id_tovar']} limit 1";
            $db->query($query_status);
        }


        return $row['id_tovar'];

    }

}