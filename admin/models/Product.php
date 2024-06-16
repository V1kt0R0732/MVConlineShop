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

    public static function getPopular($order){

        $db = Db::getConnection();

        $query = "select name, price, idCat, photo_name, sum(countCat) as countCat from relationOrder inner join products on products.id = relationOrder.idCat left join photo on photo.id_tovar = products.id where (photo.status = 1 or photo.status is null) group by idCat, photo.photo_name order by countCat {$order} limit 3";
        $result = $db->query($query);

        $product = array();
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            if(empty($row['photo_name'])){
                $row['photo_name'] = 'noPhoto.jpg';
            }
            $product[$num]['num'] = $num + 1;
            $product[$num]['name'] = $row['name'];
            $product[$num]['price'] = $row['price'];
            $product[$num]['id'] = $row['idCat'];
            $product[$num]['count'] = $row['countCat'];
            $product[$num]['photo_name'] = $row['photo_name'];

            $num++;

        }

        return $product;

    }

    public static function getNoSold(){

        $db = Db::getConnection();

        $query_all = "select id from products";
        $result_all = $db->query($query_all);
        $all = [];
        while($row_all = $result_all->fetch(PDO::FETCH_NUM)){
            $all[] = $row_all[0];
        }

        $query_bought = "select products.id from products inner join relationOrder on products.id = relationOrder.idCat group by products.id";
        $result_bought = $db->query($query_bought);
        $bought = [];
        while($row_bought = $result_bought->fetch(PDO::FETCH_NUM)){
            $bought[] = $row_bought[0];
        }

        $result_id = [];
        for($i = 0; $i < count($all); $i++){
            $tmp = true;
            for($j = 0; $j < count($bought); $j++){
                if($all[$i] == $bought[$j]){
                    $tmp = false;
                }
            }
            if($tmp){
                $result_id[] = $all[$i];
            }
        }

        $result = [];
        for($i = 0; $i < count($result_id); $i++){
            $query = "select name, photo_name from products left join photo on photo.id_tovar = products.id where status = 1 and products.id = {$result_id[$i]}";
            $result_query = $db->query($query);
            $row = $result_query->fetch(PDO::FETCH_ASSOC);
            $result[$i]['num'] = $i + 1;
            $result[$i]['name'] = $row['name'];
            $result[$i]['photo_name'] = $row['photo_name'];
        }

        return $result;

    }



}