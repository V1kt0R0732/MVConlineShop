<?php
require_once(ROOT.'/models/User.php');
class UserController
{

    public function actionIndex(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            $user = User::getInfo($_SESSION['user_email']);

            require_once(ROOT.'/views/user/user_profile.php');
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionRegister(){

        if(isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Owner') {
            require_once(ROOT . '/views/user/user_reg.php');
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }
    public function actionResultReg(){

        if(isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Owner') {

            if(isset($_POST['send'], $_POST['first_name'], $_POST['email'], $_POST['pass'], $_POST['re_pass'], $_POST['status']) && !empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['status']) && !empty($_POST['pass']) && $_POST['pass'] == $_POST['re_pass']){

                $user['name'] = $_POST['first_name'];
                $user['email'] = $_POST['email'];
                $user['pass'] = $_POST['pass'];
                $user['status'] = $_POST['status'];

                $result = User::registration($user);

                if($result){
                    $text = "Користувача успішно Зареєстровано";
                    $tmp = 'success';
                    header("refresh:3;url=/admin/productAll");
                }
                else{
                    $text = "Кристувач з такою адресою вже зареєстрований";
                    $tmp = 'warning';
                }

            }
            elseif(isset($_POST['send'], $_POST['first_name'], $_POST['email'], $_POST['pass'], $_POST['re_pass']) && !empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['pass']) && $_POST['pass'] != $_POST['re_pass']) {
                $text = "Паролі не співпадають";
                $tmp = 'warning';
            }
            else{
                $text = "Error";
                $tmp = 'danger';
            }
            require_once(ROOT."/views/user/user_reg.php");
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionLogin(){

        require_once(ROOT.'/views/user/user_login.php');

        return true;
    }

    public function actionResultLog(){

        if(isset($_POST['email'], $_POST['pass']) && !empty($_POST['email']) && !empty($_POST['pass'])){

            $result = User::login($_POST['email'],$_POST['pass']);

            if($result){
                $text = "Welcome";
                $tmp = 'success';
                header("refresh:3;url=/admin/user/profile");
            }
            else{
                $text = 'Invalid Email or Password';
                $tmp = "warning";
            }


        }
        else{
            $text = "Info Error";
            $tmp = 'danger';
        }
        require_once(ROOT.'/views/user/user_login.php');

        return true;
    }

    public function actionExit(){

        User::exit();

        header("location:/admin/user/login");

        return true;
    }

    public function actionShowAll(){
        if(isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Owner') {

            $user = User::getAll();

            require_once(ROOT.'/views/user/user_all.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }


        return true;
    }

    public function actionUpdate(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['name'], $_POST['email'], $_POST['send'])){

                if(isset($_FILES['photo']['error'], $_FILES['photo']['name']) && $_FILES['photo']['error'] == 0 && $_FILES['photo']['size'] > 0){
                    $tmpFileName = $_FILES['photo']['tmp_name'];
                    $realFileName = time().$_FILES['photo']['name'];

                    move_uploaded_file($tmpFileName, ROOT.'/images/user/'.$realFileName);

                }
            }
            $user = array();

            $user['id'] = $_POST['id'];
            $user['name'] = $_POST['name'];
            $user['email'] = $_POST['email'];
            if(isset($realFileName)){
                $user['avatar'] = $realFileName;
            }

            //print_r($user);
            $result = User::update($user);

            if($result){
                $text = "Оновлення пройшло успішно";
                $lvl = 1;
            }
            else{
                $text = "Error";
                $lvl = 3;
            }

            header("refresh:3;url=/admin/user/profile");
            require_once(ROOT."/views/resultForm.php");


        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }


        return true;
    }

    public function actionDell($id){

        if(isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Owner'){

            $user = User::getById($id);
            $user['id'] = $id;

            require_once(ROOT.'/views/user/user_dell.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }


        return true;
    }

    public function actionResultDell(){


        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_email']) && $_SESSION['user_status'] == 'Owner') {

            if (isset($_POST['id'], $_POST['send'], $_POST['dell']) && !empty($_POST['id']) && $_POST['dell'] == 'Yes') {

                $result = User::dell($_POST['id']);

                if($result){
                    $text = "Коритсувача успішно видалено";
                    $lvl = 1;
                }
                else{
                    $text = "Error";
                    $lvl = 3;
                }

            }
            elseif (isset($_POST['id'], $_POST['send'], $_POST['dell']) && !empty($_POST['id']) && $_POST['dell'] == 'No') {
                $text = "Видалення відмінено";
                $lvl = 2;
            }
            else{
                $text = "Помилка отримання даних";
                $lvl = 2;
            }

            header("refresh:3;url=/admin/user/all");
            require_once(ROOT."/views/resultForm.php");

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionChangePass(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['pass'], $_POST['send'], $_POST['new_pass'], $_POST['re_new_pass']) && !empty($_POST['pass']) && !empty($_POST['new_pass']) && $_POST['new_pass'] == $_POST['re_new_pass']){

                $result = User::changePass($_POST['pass'], $_POST['new_pass']);

                if($result){
                    $text = "Пароль успішно змінено";
                    $lvl = 1;
                }
                else{
                    $text = "Неправильно введено пароль";
                    $lvl = 2;
                }

            }
            elseif(isset($_POST['pass'], $_POST['send'], $_POST['new_pass'], $_POST['re_new_pass']) && !empty($_POST['pass']) && !empty($_POST['new_pass']) && $_POST['new_pass'] != $_POST['re_new_pass']) {

                $text = "Нові паролі не співпадають";
                $lvl = 2;

            }
            else{
                $text = "Помилка відправлення даних";
                $lvl = 3;
            }

            header("refresh:3;url=/admin/user/profile");
            require_once(ROOT.'/views/resultForm.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }


}