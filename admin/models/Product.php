<?php
require_once(ROOT.'/components/Db.php');
class Product
{


    public static function getNameById($id){
        $db = Db::getConnection();
        $query = "select name from products where id = {$id}";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        return $row['name'];
    }
    public static function getList(){

        $db = Db::getConnection();

        $query = "select products.id as id, products.name as name, count, price, photo_name, categories.name as cat from categories inner join products on categories.id = products.id_cat left join photo on products.id = photo.id_tovar where status = 1 or status is null;";


        $result = $db->query($query);

        $list = array();

        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $list[$i]['num'] = $i+1;
            $list[$i]['id'] = $row['id'];
            $list[$i]['name'] = $row['name'];
            $list[$i]['count'] = $row['count'];
            $list[$i]['price'] = $row['price'];
            $list[$i]['cat'] = $row['cat'];

            if(!empty($row['photo_name'])){
                $list[$i]['photo_name'] = $row['photo_name'];
            }
            else{
                $list[$i]['photo_name'] = 'noPhoto.jpg';
            }

            $i++;
        }

        return $list;

    }

    public static function getListByCat($cat){
        $db = Db::getConnection();

        $query = "select products.id as id, products.name as name, count, price, photo_name, categories.name as cat from photo right join products on products.id = photo.id_tovar inner join categories on products.id_cat = categories.id where (status = 1 or status is null) and products.id_cat = {$cat};";

        $result = $db->query($query);

        $list = array();

        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $list[$i]['num'] = $i+1;
            $list[$i]['id'] = $row['id'];
            $list[$i]['name'] = $row['name'];
            $list[$i]['count'] = $row['count'];
            $list[$i]['price'] = $row['price'];
            $list[$i]['cat'] = $row['cat'];

            if(!empty($row['photo_name'])){
                $list[$i]['photo_name'] = $row['photo_name'];
            }
            else{
                $list[$i]['photo_name'] = 'noPhoto.jpg';
            }

            $i++;
        }

        return $list;
    }

    public static function add($product){

        $db = Db::getConnection();

        $query = "insert into products (name, id_cat, count, price, description) values(:name,:cat,:count,:price, :desc)";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':name',$product['name']);
        $stmt->bindValue(':cat',$product['category']);
        $stmt->bindValue(':count',$product['count']);
        $stmt->bindValue(':price',$product['price']);
        $stmt->bindValue(':desc',$product['desc']);

        $num_row = $stmt->execute();

        $id_tovar = $db->lastInsertId();


        if($num_row > 0){
            return $id_tovar;
        }
        else{
            return false;
        }

    }

    public static function dell($id){

        $db = Db::getConnection();

        $query = "delete from products where id = {$id}";

        $num_row = $db->exec($query);

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }

    }

    public static function getListById($id){

        $db = Db::getConnection();

        $query = "select id, name, id_cat, count, price, description from products where id = {$id}";

        $result = $db->query($query);

        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public static function update($product){

        $db = Db::getConnection();

        $query = "update products set name = :name, id_cat = :cat, count = :count, price = :price, description = :desc where id = {$product['id']}";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':name',$product['name']);
        $stmt->bindValue(':cat',$product['category']);
        $stmt->bindValue(':count',$product['count']);
        $stmt->bindValue(':price',$product['price']);
        $stmt->bindValue(':desc',$product['desc']);

        $num_row = $stmt->execute();

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }

    }


}