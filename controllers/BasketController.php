<?php
require_once(ROOT.'/models/Basket.php');
class BasketController
{

    public function actionIndex(){

        $grand_total = 0;
        for($i = 0; $i < count($_SESSION['basket']); $i++){
            $grand_total += $_SESSION['basket'][$i]['price'] * $_SESSION['basket'][$i]['count'];
        }

        require_once(ROOT."/views/basket.php");

        return true;
    }
    public function actionAdd($id){

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
        $grand_total = 0;

        if(isset($_POST['send'])){

            if(isset($_POST['description']) && !empty($_POST['description'])){
                $_SESSION['basket'][0]['description'] = $_POST['description'];
            }

            for($i = 0; $i < count($_SESSION['basket']); $i++){
                $name = 'count'.$_SESSION['basket'][$i]['id'];
                $_SESSION['basket'][$i]['count'] = $_POST[$name];
            }
            header('refresh:2;url=/catalog/basket');
            require_once(ROOT."/views/basket.php");
            echo "<script type='text/javascript'>showAlert('Успішно! Товар оновлено.', 'success');</script>";

        }
        else{
            header('refresh:2;url=/catalog/basket');
            require_once(ROOT.'/views/basket.php');
            echo "<script type='text/javascript'>showAlert('Помилка! Товар не оновлено', 'error');</script>";

        }

        header("refresh:3;url=/catalog/basket");


        return true;
    }

    public function actionDell($id){

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
                header('location:/catalog/basket');
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

        $grand_total = 0;
        for($i = 0; $i < count($_SESSION['basket']); $i++){
            $grand_total += $_SESSION['basket'][$i]['price'] * $_SESSION['basket'][$i]['count'];
        }

        require_once(ROOT.'/views/order.php');

        return true;
    }

    public function actionOrderResult(){

        if(isset($_POST['send'], $_POST['email'], $_POST['phone'], $_POST['first_name'], $_POST['last_name'], $_POST['address']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])){

            $info = ['email'=>$_POST['email'],'phone'=>$_POST['phone'],'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'address'=>$_POST['address']];

            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                if(isset($_POST['save']) && !empty($_POST['save'])){
                    $info['save'] = $_POST['save'];
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
                require_once(ROOT.'/views/order.php');
                echo "<script type='text/javascript'>showAlert('Помилка в створенні замовлення.', 'danger');</script>";
                header('refresh:3;url=/catalog/index/0/1');
            }
        }
        else{
            require_once(ROOT.'/views/order.php');
            echo "<script type='text/javascript'>showAlert('Помилка в передачі даних', 'warning');</script>";
            header('refresh:3;url=/catalog/order');

        }

        return true;
    }


}