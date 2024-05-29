<?php

require_once(ROOT.'/models/Cat.php');

class CategoriesController
{

    public function actionIndex(){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            $cat = array();
            $cat = Cat::getList();

            require_once(ROOT.'/views/categories/cat_all.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionAdd(){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            require_once(ROOT.'/views/categories/cat_add.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionResultAdd(){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['cat_name']) && !empty($_POST['cat_name'])){

                $result = Cat::add_category($_POST['cat_name']);

                if($result){
                    $text = "Категорія Успішно додана";
                    $lvl = 1;
                }
            }
            else{
                $lvl = 3;
                $text = "Помилка з додаванням категорії";
            }

            header("refresh:3;url=/admin/cat/add");
            require_once(ROOT.'/views/resultForm.php');
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }



        return true;
    }

    public function actionDell($id){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($id) && !empty($id)) {

                $result_check = Cat::is_product($id);

                if ($result_check) {

                    $category = Cat::getNameById($id);

                    require_once(ROOT . "/views/categories/cat_dell.php");

                } else {
                    $text = "Категорію неможливо видалити, так як в ній ще є товари";
                    $lvl = 2;
                    header("refresh:3;url=/admin/catAll");
                    require_once(ROOT . "/views/resultForm.php");
                }

            }
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }


        return true;
    }

    public function actionResultDell(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['send'], $_POST['dell'], $_POST['id']) && !empty($_POST['dell']) && !empty($_POST['id']) && $_POST['dell'] == 'Yes'){

                $result = Cat::dell($_POST['id']);

                if($result){
                    $text = "Категорія успішно видалена";
                    $lvl = 1;

                }
                else{
                    $text = "Помилка видаленні";
                    $lvl = 3;
                }

            }
            elseif(isset($_POST['send'], $_POST['dell'], $_POST['id']) && !empty($_POST['dell']) && !empty($_POST['id']) && $_POST['dell'] == 'No') {
                $text = "Видалення відмінено";
                $lvl = 2;
            }
            else{
                $text = "Помилка в видаленні";
                $lvl = 3;
            }

            header("refresh:3;url=/admin/catAll");
            require_once(ROOT."/views/resultForm.php");
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }



        return true;
    }

    public function actionUpdate($id){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($id) && !empty($id)){

                $cat = Cat::getNameById($id);
                require_once(ROOT.'/views/categories/cat_update.php');

            }
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }



        return true;
    }
    public function actionResultUpdate(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['id'], $_POST['send'], $_POST['cat_name']) && !empty($_POST['id']) && !empty($_POST['cat_name'])){

                $result = Cat::update($_POST['id'], $_POST['cat_name']);

                if($result){
                    $text = "Категорія успішно оговленва";
                    $lvl = 1;
                }
                else{
                    $text = 'Помилка в оновленні';
                    $lvl = 3;
                }

            }
            else{
                $text = "Помилка в оновленні";
                $lvl = 3;
            }

            header("refresh:3;url=/admin/catAll");
            require_once(ROOT."/views/resultForm.php");
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }



        return true;
    }

}