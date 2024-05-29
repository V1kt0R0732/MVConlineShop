<?php
require_once(ROOT.'/components/Db.php');
class User
{

    public static function reg($user){

        $db = Db::getConnection();

        $query = "insert into client (user_name, email, last_log, password) values(:user_name, :email, now(), sha1(:pass))";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':user_name', $user['user_name']);
        $stmt->bindValue(':email', $user['email']);
        $stmt->bindValue(':pass', $user['pass']);

        $num_row = $stmt->execute();

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }

    }

    public static function emailCheck($email){

        $db = Db::getConnection();

        $query = "select id from client where email = '{$email}'";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if(isset($row) && !empty($row)){
            return true;
        }
        else{
            return false;
        }

    }

    public static function login($email, $pass){

        $db = Db::getConnection();

        $query = "select id, user_name, email from client where email = '{$email}' and password = sha1({$pass})";

        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if(isset($row) && !empty($row)){
            setcookie('client_id', $row['id'], time()+60*60*24*30*3);
            setcookie('client_name', $row['user_name'], time()+60*60*24*30*3);
            setcookie('client_email', $row['email'], time()+60*60*24*30*3);

            $_SESSION['user']['id'] = $row['id'];
            $_SESSION['user']['name'] = $row['user_name'];
            $_SESSION['user']['email'] = $row['email'];

            return true;
        }
        else{
            return false;
        }

    }

    public static function getOrders($id){

        $db = Db::getConnection();

        $query = "select relationOrder.id as id, dataCat, countCat, price, relationOrder.adress as adress, status from products inner join relationOrder on products.id = relationOrder.idCat inner join client on relationOrder.idUser = client.id where idUser = {$id} order by dataCat desc;";
        $result = $db->query($query);
        $orders = [];
        $old_data = 0;
        $num = -1;
        $months = ['01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December'];
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            if($old_data != $row['dataCat']){
                $num++;
                $data = explode('-', explode(' ',$row['dataCat'])[0]);
                if($row['status'] == 1){
                    $orders[$num]['status'] = 'Замовлення Обробляється';
                }
                else{
                    $orders[$num]['status'] = 'Замовлення Вже їде до вас';
                }
                $orders[$num]['id'] = $row['id'];
                $orders[$num]['dataCat'] = $row['dataCat'];
                $orders[$num]['totalPrice'] = 0;
                $orders[$num]['data']['year'] = $data[0];
                $orders[$num]['data']['month'] = $months[$data[1]];
                $orders[$num]['data']['day'] = $data[2];
                $orders[$num]['adress'] = $row['adress'];


            }

            $orders[$num]['totalPrice'] += $row['price'] * $row['countCat'];

            $old_data = $row['dataCat'];

        }
        //print_r($orders);

        return $orders;

    }

    public static function exit(){

        if(isset($_COOKIE['client_id'])){
            setcookie('client_id','',time()-7200);
        }
        if(isset($_COOKIE['client_name'])){
            setcookie('client_name','',time()-7200);
        }
        if(isset($_COOKIE['client_email'])){
            setcookie('client_email','',time()-7200);
        }
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-7200);
        }

        $_SESSION['user'] = [];

        session_destroy();

        return true;

    }




}