<?php
require_once(ROOT.'/components/Db.php');
class Photo
{

    public static function getAllById($id){

        $db = Db::getConnection();

        $query = "select id, photo_name, status from photo where id_tovar = {$id}";
        $result = $db->query($query);

        $photo = array();
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $photo[$num]['id'] = $row['id'];
            $photo[$num]['photo'] = $row['photo_name'];
            $photo[$num]['status'] = $row['status'];
            $num++;

        }

        return $photo;

    }


}