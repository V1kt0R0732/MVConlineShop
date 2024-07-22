<?php
require_once(ROOT.'/models/Basket.php');
require_once(ROOT.'/models/Page.php');
require_once(ROOT.'/models/Cat.php');
require_once(ROOT.'/models/Coupon.php');
require_once(ROOT.'/models/User.php');
require_once(ROOT.'/models/Currency.php');
class BasketController
{

    public function actionIndex(){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();

        if(isset($_SESSION['currency']['name']) && $_SESSION['currency']['name'] == 'UAH'){
            $cef = Currency::getCef();
        }
        else{
            $cef = 1;
        }

        //print_r($_SESSION['basket']);

        $grand_total = 0;
        for($i = 0; $i < count($_SESSION['basket']); $i++){
            $grand_total += $_SESSION['basket'][$i]['price'] * $_SESSION['basket'][$i]['count'] * $cef;
        }

        require_once(ROOT."/views/basket.php");

        return true;
    }
    public function actionAdd($id){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();

        $result = Basket::add($id);
        if($result){
            header("location:/catalog/index/{$_SESSION['param']['cat']}/{$_SESSION['param']['page']}");
        }
        else{
            echo "Error";
        }

        return true;
    }

    public function actionUpdate(){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();

        $grand_total = 0;

        if(isset($_POST['send'])){

            if(isset($_POST['description']) && !empty($_POST['description'])){
                $_SESSION['basket'][0]['description'] = $_POST['description'];
            }

            for($i = 0; $i < count($_SESSION['basket']); $i++){
                $name = 'count'.$_SESSION['basket'][$i]['id'];
                $_SESSION['basket'][$i]['count'] = $_POST[$name];
            }
            header('refresh:2;url=/basket');
            require_once(ROOT."/views/basket.php");
            echo "<script type='text/javascript'>showAlert('Успішно! Товар оновлено.', 'success');</script>";

        }
        else{
            header('refresh:2;url=/basket');
            require_once(ROOT.'/views/basket.php');
            echo "<script type='text/javascript'>showAlert('Помилка! Товар не оновлено', 'error');</script>";

        }

        header("refresh:3;url=/basket");


        return true;
    }

    public function actionDell($id){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();

        if(isset($_SESSION['basket']) && !empty($_SESSION['basket'])){
            for($i = 0; $i < count($_SESSION['basket']); $i++) {
                if ($_SESSION['basket'][$i]['id'] == $id) {
                    unset($_SESSION['basket'][$i]);
                    break;
                }
            }

            $tmp_arr = array();
            foreach($_SESSION['basket'] as $tmp){
                if(!empty($tmp)){
                    $tmp_arr[] = $tmp;
                }
            }

            unset($_SESSION['basket']);
            $_SESSION['basket'] = array();
            $_SESSION['basket'] = $tmp_arr;
            unset($tmp_arr);
            if(isset($_SESSION['basket']) && !empty($_SESSION['basket'])){
                header('location:/basket');
            }
            else{
                header('location:/catalog/index/0/1');
            }
        }

        return true;
    }

    public function actionClear(){

        if(isset($_SESSION['basket']) && !empty($_SESSION['basket'])){
            unset($_SESSION['basket']);
        }
        header('location:/catalog/index/0/1');

        return true;
    }

    public function actionOrder(){

        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            $client = Basket::clientInfo($_SESSION['user']['id']);
        }

        $sub_total = 0;
        $grand_total = 0;
        for($i = 0; $i < count($_SESSION['basket']); $i++){
            $grand_total += $_SESSION['basket'][$i]['price'] * $_SESSION['basket'][$i]['count']* $_SESSION['currency']['cef'];
            if(isset($_SESSION['basket'][$i]['old_price'])){
                $sub_total += $_SESSION['basket'][$i]['old_price'] * $_SESSION['basket'][$i]['count']* $_SESSION['currency']['cef'];
            }
        }


        require_once(ROOT.'/views/order.php');

        return true;
    }

    public function actionOrderResult(){
        $pages = Page::getPage();
        //$page_info = Page::getPageInfo($uri);
        $topCat = Cat::get_top_5();

        if(isset($_POST['send'], $_POST['email'], $_POST['phone'], $_POST['first_name'], $_POST['last_name'], $_POST['address']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])){

            $info = ['email'=>$_POST['email'],'phone'=>$_POST['phone'],'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'address'=>$_POST['address']];

            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                if(isset($_POST['save']) && !empty($_POST['save'])){
                    $info['save'] = $_POST['save'];
                }
                if(isset($_SESSION['basket'][0]['coupon']['name']) && !empty($_SESSION['basket'][0]['coupon']['name'])){
                    $info['coupon'] = $_SESSION['basket'][0]['coupon']['name'];
                }

                $info['id'] = $_SESSION['user']['id'];
                Basket::addClient($info);
                $info['type'] = 'client';
            }
            else{
                $info['id'] = Basket::addVisitor($info);
                $info['type'] = 'visitor';
            }

            $result = Basket::setOrder($info, $_SESSION['basket']);

            if($result){
                $grand_total = 0;
                for($i = 0; $i < count($_SESSION['basket']); $i++){
                    $grand_total += $_SESSION['basket'][$i]['price'] * $_SESSION['basket'][$i]['count'];
                }

                header('refresh:3;url=/catalog/index/0/1');
                require_once(ROOT.'/views/order.php');

                $_SESSION['basket'] = [];
                unset($_SESSION['basket']);

                echo "<script type='text/javascript'>showAlert('Успішно! Товар замовлено.', 'success');</script>";

            }
            else{
                header('refresh:3;url=/catalog/index/0/1');
                require_once(ROOT.'/views/order.php');
                echo "<script type='text/javascript'>showAlert('Помилка в створенні замовлення.', 'danger');</script>";
            }
        }
        else{
            header('refresh:3;url=/order');
            require_once(ROOT.'/views/order.php');
            echo "<script type='text/javascript'>showAlert('Помилка в передачі даних', 'warning');</script>";
        }

        return true;
    }

    public function actionCouponCheck(){

        header("refresh:3;/order");

        if(isset($_POST['send'], $_POST['coupon'])){

            echo $_POST['coupon'];

            $coupon = Coupon::activate($_POST['coupon']);

            if(isset($coupon) && $coupon != false){
                //print_r($_SESSION['basket']);
                $check = true;

                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    $check = User::couponCheck($_SESSION['user']['id'], $coupon['coupon']);
                }

                if($check) {

                    for ($i = 0; $i < count($_SESSION['basket']); $i++) {
                        $_SESSION['basket'][$i]['coupon']['value'] = $coupon['value'];
                        $_SESSION['basket'][$i]['coupon']['name'] = $coupon['coupon'];
                        $_SESSION['basket'][$i]['old_price'] = $_SESSION['basket'][$i]['price'];
                        $_SESSION['basket'][$i]['price'] = $_SESSION['basket'][$i]['price'] - ($_SESSION['basket'][0]['coupon']['value'] / 100 * $_SESSION['basket'][$i]['price']);
                    }

                    require_once(ROOT . '/views/order.php');
                    echo "<script type='text/javascript'>showAlert('Купон успішно застосовано', 'success');</script>";
                }
                else{
                    require_once(ROOT.'/views/order.php');
                    echo "<script type='text/javascript'>showAlert('Ви вже використали цей купон', 'warning');</script>";
                }
            }
            else{
                require_once(ROOT.'/views/order.php');
                echo "<script type='text/javascript'>showAlert('Помилка в застосуванні купона', 'warning');</script>";
            }

        }



        return true;
    }


}