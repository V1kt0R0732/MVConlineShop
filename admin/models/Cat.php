<?php

require_once(ROOT.'/components/Db.php');
class Cat
{

    public static function getList(){

        $db = Db::getConnection();

        $query = "select id, name from categories";
        $result = $db->query($query);

        $list = array();
        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $list[$i]['num'] = $i+1;
            $list[$i]['id'] = $row['id'];
            $list[$i]['name'] = $row['name'];
            $i++;

        }

        return $list;

    }

    public static function add_category($name){

        $db = Db::getConnection();

        $query = "insert into categories(name) values(:name)";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':name',$name);

        $num_row = $stmt->execute();

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public static function is_product($id){

        $db = Db::getConnection();

        $query = "select id from products where id_cat = {$id}";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if(empty($row)){
            return true;
        }
        else{
            return false;
        }

    }

    public static function dell($id){
        $db = Db::getConnection();

        $query = "delete from categories where id = {$id}";

        $num_row = $db->exec($query);

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }

    }

    public static function getNameById($id){

        $db = Db::getConnection();
        $query = "select name from categories where id = {$id}";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        return $row['name'];

    }

    public static function update($id, $name){

        $db = Db::getConnection();

        $query = "update categories set name=:cat where id = {$id}";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':cat',$name);

        $num_row = $stmt->execute();

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }

    }


}