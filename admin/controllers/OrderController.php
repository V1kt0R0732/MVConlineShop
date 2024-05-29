<?php
require_once(ROOT.'/models/Order.php');
class OrderController
{

    public function actionShowAll(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['sort']) && !empty($_POST['sort'])){
                $sort = $_POST['sort'];
            }
            else{
                $sort = 0;
            }

            $orders = Order::getList(1, $sort);
            require_once(ROOT.'/views/order/showAll.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }
        return true;
    }
    public function actionDell($id){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            $user = Order::getUserById($id);

            require_once(ROOT.'/views/order/dell.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;

    }

    public function actionResultDell(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['send'], $_POST['id'], $_POST['dell']) && !empty($_POST['id']) && $_POST['dell'] == 'Yes') {

                $id = $_POST['id'];

                $result = Order::dell($id);

                header("refresh:2;url=/admin/order/list");

                $text = "Замовлення успішно видалено";
                $text_2 = '';
                $lvl = 1;
                require_once(ROOT . '/views/resultForm.php');

            }
            elseif(isset($_POST['send'], $_POST['id'], $_POST['dell']) && !empty($_POST['id']) && !empty($_POST['dell']) == 'No'){

                header('refresh:2;url=/admin/order/list');
                $text = "Замовлення відмінено";
                $lvl = 3;
                require_once(ROOT.'/views/resultForm.php');

            }
            else{
                echo "Error";
            }

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;

    }

    public function actionArchivList(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            $orders = Order::getList(0, 0);
            require_once(ROOT.'/views/order/showArchiv.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }


        return true;
    }

    public function actionArchivAdd($id){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            Order::archivAdd($id);

            header("refresh:2;url=/admin/order/list");
            $text = "Замовлення успішно архівовано";
            $text_2 = '';
            $lvl = 1;
            require_once(ROOT . '/views/resultForm.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionArchivRemove($id){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            Order::archivRemove($id);

            header("refresh:2;url=/admin/order/list");
            $text = "Замовлення успішно Розархівовано";
            $text_2 = '';
            $lvl = 1;
            require_once(ROOT . '/views/resultForm.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }


        return true;
    }


}