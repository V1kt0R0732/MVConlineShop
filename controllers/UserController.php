<?php
require_once(ROOT.'/models/User.php');
require_once(ROOT.'/models/Page.php');
require_once(ROOT.'/models/Cat.php');
require_once(ROOT.'/models/Coupon.php');
class UserController
{

    public function actionLogin(){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();

        require_once(ROOT.'/views/user/login.php');

        return true;
    }

    public function actionResultLog(){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();

        //print_r($_POST);


        if(isset($_POST['email'], $_POST['pass']) && !empty($_POST['email']) && !empty($_POST['pass'])){

            $res = User::login($_POST['email'], $_POST['pass']);

            if($res){
                header("refresh:2;url=/catalog/index/0/1");
                require_once(ROOT.'/views/user/login.php');
                echo "<script type='text/javascript'>showAlert('Успех! Вы успішно Увійшли в аккаунт.', 'success');</script>";
            }
            else{
                require_once(ROOT.'/views/user/login.php');
                echo "<script type='text/javascript'>showAlert('Помилка! Не правильно введено дані', 'warning');</script>";
            }

        }
        else{
            require_once(ROOT.'/views/user/login.php');
            echo "<script type='text/javascript'>showAlert('Помилка! Передача даних', 'error');</script>";
        }

        return true;
    }

    public function actionReg(){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();
        require_once(ROOT.'/views/user/registration.php');

        return true;
    }

    public function actionResultReg(){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();
        if(isset($_POST['user_name'], $_POST['send'], $_POST['email'], $_POST['pass'], $_POST['re_pass']) && !empty($_POST['user_name']) && !empty($_POST['email']) && !empty($_POST['pass']) && $_POST['pass'] == $_POST['re_pass']){

            $check = User::emailCheck($_POST['email']);

            if(!$check) {
                $user = ['user_name' => $_POST['user_name'], 'email' => $_POST['email'], 'pass' => $_POST['pass']];

                $res = User::reg($user);

                if ($res) {
                    require_once(ROOT.'/views/user/login.php');
                    echo "<script type='text/javascript'>showAlert('Успех! Вы успішно створили аккаунт.', 'success');</script>";
                    header("refresh:3;url=/user/login");
                } else {
                    require_once(ROOT.'/views/user/registration.php');
                    echo "<script type='text/javascript'>showAlert('Помилка! Повторіть спробу ще раз.', 'error');</script>";
                }
            }
            else{
                $_POST['email'] = 0;
                require_once(ROOT.'/views/user/registration.php');
                echo "<script type='text/javascript'>showAlert('Помилка! Аккаунта з такою адресою вже зареэстровано', 'warning');</script>";

            }

        }
        elseif(isset($_POST['user_name'], $_POST['send'], $_POST['email'], $_POST['pass'], $_POST['re_pass']) && !empty($_POST['user_name']) && !empty($_POST['email']) && !empty($_POST['pass']) && $_POST['pass'] != $_POST['re_pass']){
            require_once(ROOT.'/views/user/registration.php');
            echo "<script type='text/javascript'>showAlert('Помилка! Паролі не співпадають', 'error');</script>";

        }
        else{
            require_once(ROOT.'/views/user/registration.php');
            echo "<script type='text/javascript'>showAlert('Помлка! Невдала передача даних', 'error');</script>";
        }

        return true;
    }

    public function actionProfile(){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();
        $orders = User::getOrders($_SESSION['user']['id']);
        $coupon = Coupon::getCoupon();

        //print_r($orders);


        require_once(ROOT.'/views/user/profile.php');

        return true;
    }
    public function actionExit(){

        User::exit();

        header('location:/catalog/index/0/1');

        return true;
    }

    public function actionSetting(){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();
        $user = User::getInfo($_SESSION['user']['id']);

        require_once(ROOT.'/views/user/setting.php');


        return true;

    }

    public function actionUpdate(){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();
        $user = User::getInfo($_SESSION['user']['id']);

        if(isset($_POST['send'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['address']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address'])){

            $info = ['id'=>$_SESSION['user']['id'],'email'=>$_POST['email'],'phone'=>$_POST['phone'],'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'address'=>$_POST['address']];

            $result = User::updateUser($info);

            if($result){
                header("refresh:3;url=/user/setting");
                require_once(ROOT.'/views/user/setting.php');
                echo "<script type='text/javascript'>showAlert('Успех! Вы успішно відредагували аккаунт.', 'success');</script>";
            }
            else{
                header("refresh:3;url=/user/setting");
                require_once(ROOT.'/views/user/setting.php');
                echo "<script type='text/javascript'>showAlert('): ): ):', 'warning');</script>";
            }

        }
        else{
            header("refresh:3;url=/user/setting");
            require_once(ROOT.'/views/user/setting.php');
            echo "<script type='text/javascript'>showAlert('Помилка з передачою даних', 'error');</script>";
        }

        return true;

    }


}