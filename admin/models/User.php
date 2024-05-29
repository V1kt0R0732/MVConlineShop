<?php
require_once(ROOT.'/components/Db.php');

class User
{

    public static function registration($user){

        $db = Db::getConnection();

        $query_check = "select id from user where email = '{$user['email']}'";
        $result_check = $db->query($query_check);
        $row_check = $result_check->fetch(PDO::FETCH_ASSOC);

        if(isset($row_check) && !empty($row_check)){
            return false;
        }
        else {
            $query = "insert into user (name, email, password, status) values (:name, :email, sha1(:pass), :status)";

            $stmt = $db->prepare($query);

            $stmt->bindValue(':name', $user['name']);
            $stmt->bindValue(':email', $user['email']);
            $stmt->bindValue(':pass', $user['pass']);
            $stmt->bindValue(':status', $user['status']);

            $num_row = $stmt->execute();

            if ($num_row > 0) {
                return true;
            }
            else{
                return false;
            }
        }
    }

    public static function login($email, $pass){

        $db = Db::getConnection();

        $query = "select name, email, avatar, status from user where email = '{$email}' and password = sha1('{$pass}')";
        $result = $db->query($query);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if(isset($user) && !empty($user)) {

            if (empty($user['avatar'])) {
                $user['avatar'] = 'noAvatar.jpg';
            }

            setcookie('user_name', $user['name'], time() + 60 * 60 * 24 * 30 * 3);
            setcookie('user_email', $user['email'], time() + 60 * 60 * 24 * 30 * 3);
            setcookie('user_avatar', $user['avatar'], time() + 60 * 60 * 24 * 30 * 3);
            setcookie('user_status', $user['status'], time() + 60 * 60 * 24 * 30 * 3);

            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_avatar'] = $user['avatar'];
            $_SESSION['user_status'] = $user['status'];

            return true;
        }
        else{
            return false;
        }

    }

    public static function exit(){

        if(isset($_COOKIE['user_name'])){
            setcookie('user_name','', time()-7200);
        }
        if(isset($_COOKIE['user_email'])){
            setcookie('user_email','',time()-7200);
        }
        if(isset($_COOKIE['user_avatar'])){
            setcookie('user_avatar','',time()-7200);
        }
        if(isset($_COOKIE['user_status'])){
            setcookie('user_status','',time()-7200);
        }
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-7200);
        }

        $_SESSION = array();

        session_destroy();

        return true;

    }


    public static function getAll(){

        $db = Db::getConnection();

        $query = "select id, name, email, avatar, status from user order by status desc";
        $result = $db->query($query);

        $user = array();
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            if(empty($row['avatar'])){
                $row['avatar'] = 'noAvatar.jpg';
            }

            $user[$num]['num'] = $num + 1;
            $user[$num]['id'] = $row['id'];
            $user[$num]['name'] = $row['name'];
            $user[$num]['email'] = $row['email'];
            $user[$num]['avatar'] = $row['avatar'];
            $user[$num]['status'] = $row['status'];

            $num++;
        }

        return $user;

    }

    public static function getInfo($email){

        $db = Db::getConnection();

        $query = "select id, name, email from user where email = '{$email}'";
        $result = $db->query($query);

        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public static function update($user){

        $db = Db::getConnection();

        $query_photo = "select avatar from user where id = {$user['id']}";
        $result_photo = $db->query($query_photo);
        $row_photo = $result_photo->fetch(PDO::FETCH_ASSOC);

        if(isset($row_photo, $user['avatar']) && !empty($row_photo) && !empty($user['avatar'])){
            @unlink(ROOT.'/images/user/'.$row_photo['avatar']);
        }

        if(isset($user['avatar']) && !empty($user['avatar'])){
            $query = "update user set name = :name, email = :email, avatar = '{$user['avatar']}' where id = {$user['id']}";
        }
        else{
            $query = "update user set name = :name, email = :email where id = {$user['id']}";
        }

        $stmt = $db->prepare($query);

        $stmt->bindValue(':name', $user['name']);
        $stmt->bindValue(':email', $user['email']);

        $num_row = $stmt->execute();

        $query_cookie = "select name, email, avatar, status from user where id = {$user['id']}";
        $result_cookie = $db->query($query_cookie);
        $cookie = $result_cookie->fetch(PDO::FETCH_ASSOC);

        if(empty($cookie['avatar'])){
            $cookie['avatar'] = 'noAvatar.jpg';
        }

        User::exit();

        setcookie('user_name', $cookie['name'], time()+60*60*24*30*3);
        setcookie('user_email', $cookie['email'], time()+60*60*24*30*3);
        setcookie('user_avatar', $cookie['avatar'], time()+60*60*24*30*3);
        setcookie('user_status', $cookie['status'], time()+60*60*24*30*3);

        $_SESSION['user_name'] = $cookie['name'];
        $_SESSION['user_email'] = $cookie['email'];
        $_SESSION['user_avatar'] = $cookie['avatar'];
        $_SESSION['user_status'] = $cookie['status'];

        if($num_row > 0){
            return true;
        }
        else{
            return false;
        }

    }

    public static function getById($id){

        $db = Db::getConnection();

        $query = "select name, status from user where id = {$id}";
        $result = $db->query($query);

        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public static function dell($id){

        $db = Db::getConnection();

        $query_photo = "select avatar, status from user where id = {$id}";
        $result_photo = $db->query($query_photo);
        $row_photo = $result_photo->fetch(PDO::FETCH_ASSOC);

        if(isset($row_photo['avatar']) && !empty($row_photo['avatar']) && $row_photo['status'] != 'Owner'){
            @unlink(ROOT.'/images/user/'.$row_photo['avatar']);
        }

        if($row_photo['status'] != 'Owner'){

            $query_dell = "delete from user where id = {$id}";
            $num_row = $db->exec($query_dell);

            if($num_row > 0){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }



    }

    public static function changePass($pass, $new_pass){

        $db = Db::getConnection();

        $query = "select id from user where password = sha1('{$pass}')";
        $result = $db->query($query);
        $user = $result->fetch(PDO::FETCH_ASSOC);



        if(isset($user) && !empty($user)){


            $query_change = "update user set password = sha1(:pass) where id = {$user['id']}";

            $stmt = $db->prepare($query_change);

            $stmt->bindValue(':pass',$new_pass);

            $num_row = $stmt->execute();

            if($num_row > 0){
                return true;
            }
            else{
                return false;
            }

        }
        else{
            return false;
        }

    }


}