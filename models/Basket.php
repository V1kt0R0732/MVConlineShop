<?php
require_once(ROOT.'/components/Db.php');
class Basket
{

    public static function add($id){

        $exist = false;

        if(!isset($_SESSION['basket'])){
            $_SESSION['basket'] = [];
        }

        if(count($_SESSION['basket']) > 0){
            for($i = 0; $i < count($_SESSION['basket']); $i++){
                if($_SESSION['basket'][$i]['id'] == $id){
                    $_SESSION['basket'][$i]['count']++;
                    $exist = true;
                    break;
                }
            }
        }



        if(!$exist){

            $db = Db::getConnection();

            $query = "select products.id as id, products.name as name, categories.name as cat, price, count, photo_name from photo right join products on photo.id_tovar = products.id inner join categories on categories.id = products.id_cat where (status = 1 or status is null) and products.id = {$id}";
            $result = $db->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if(empty($row['photo_name'])){
                $row['photo_name'] = 'noPhoto.jpg';
            }

            $_SESSION['basket'][] = ['id'=>$row['id'],'name'=>$row['name'],'cat'=>$row['cat'],'count'=> 1,'price'=>$row['price'],'photo'=>$row['photo_name'], 'max_count'=>$row['count']];

        }

        return true;
    }

    public static function update($id, $count){

        for($i = 0; $i < count($_SESSION['basket']); $i++){
            if($_SESSION['basket'][$i]['id'] == $id){
                $_SESSION['basket'][$i]['count'] = $count;
            }
        }

    }

    public static function clientInfo($id){

        $db = Db::getConnection();

        $query = "select first_name, last_name, phone, adress from client where id = {$id}";
        $result = $db->query($query);
        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public static function addVisitor($info){

        $db = Db::getConnection();

        $query = "insert into visitor (first_name, last_name, email, phone, time) values (:first_name, :last_name, :email, :phone, now())";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':first_name',$info['first_name']);
        $stmt->bindValue(':last_name',$info['last_name']);
        $stmt->bindValue(':email',$info['email']);
        $stmt->bindValue(':phone',$info['phone']);

        $num_row = $stmt->execute();

        $visitor_id = $db->lastInsertId($query);

        if($num_row > 0) {
            return $visitor_id;
        }
        else{
            return 0;
        }

    }
    public static function addClient($info){

        $db = Db::getConnection();

        if(!isset($info['save'])){

            $query_check = "select adress from client where id = {$info['id']}";
            $result = $db->query($query_check);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if(isset($row['adress']) && !empty($row['adress'])){
                $info['address'] = $row['adress'];
            }
            else {
                $info['address'] = null;
            }
        }
        if(isset($info['coupon']) && !empty($info['coupon'])){

            $query_coupon = "select a_coupons from client where id = {$info['id']}";
            $result_coupon = $db->query($query_coupon);

            if(isset($result_coupon->fetch(PDO::FETCH_ASSOC)[0]) && !empty($result_coupon->fetch(PDO::FETCH_ASSOC)[0])){
                $coupon = $result_coupon->fetch(PDO::FETCH_ASSOC)[0].$info['coupon'].',';
            }
            else{
                $coupon = $info['coupon'].',';
            }


        }
        else{
            $coupon = null;
        }

        $query = "update client set first_name = :first_name, last_name = :last_name, phone = :phone, adress = :adress, a_coupons = '{$coupon}' where id = {$info['id']}";
        //$query = "insert into client (first_name, last_name, phone, adress) values (:first_name, :last_name, :phone, :adress)";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':first_name',$info['first_name']);
        $stmt->bindValue(':last_name',$info['last_name']);
        $stmt->bindValue(':phone',$info['phone']);
        $stmt->bindValue(':adress',$info['address']);

        $num_row = $stmt->execute();

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }


    }

    public static function setOrder($user, $catalog){

        $db = Db::getConnection();

        if(!isset($catalog[0]['description'])){
            $catalog[0]['description'] = '';
        }

        for($i = 0; $i < count($catalog); $i++) {

            if(isset($catalog[$i]['coupon']['name'])){
                $coupon = $catalog[$i]['coupon']['name'];
            }
            else{
                $coupon = null;
            }

            $query = "insert into relationOrder (idUser, idCat, countCat, status, dataCat, description, adress, type, coupon) values (:user_id, :idCat, :countCat, 1, now(), :desc, :adress, :type, '{$coupon}')";

            $stmt = $db->prepare($query);

            $stmt->bindValue(':user_id', $user['id']);
            $stmt->bindValue(':idCat', $catalog[$i]['id']);
            $stmt->bindValue(':countCat', $catalog[$i]['count']);
            $stmt->bindValue(':desc', $catalog[0]['description']);
            $stmt->bindValue(':adress', $user['address']);
            $stmt->bindValue(":type", $user['type']);

            $num_row = $stmt->execute();

        }

        if(isset($num_row) && !empty($num_row)){
            return true;
        }
        else{
            return false;
        }

    }

}