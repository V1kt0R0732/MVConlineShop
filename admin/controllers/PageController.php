<?php
require_once(ROOT.'/models/Page.php');
class PageController
{

    public function actionShowAll(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            $list = Page::getList();

            require_once(ROOT.'/views/page/list.php');
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionUpdate($id){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            $page = Page::getById($id);
            $prior = Page::getName_Prior();

            require_once(ROOT.'/views/page/update.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionDell($id){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            $page = Page::getNameById($id);

            require_once(ROOT.'/views/page/dell.php');

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }
        return true;
    }

    public function actionResultDell(){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['id'], $_POST['dell'], $_POST['send']) && !empty($_POST['id']) && !empty($_POST['dell']) && $_POST['dell'] == 'Yes'){

                $result_dell = Page::dell($_POST['id']);

                if($result_dell){
                    $text = "Товар успішно видалено";
                    $lvl = 1;
                }
                else{
                    $text = "Помилка в видаленні";
                    $lvl = 3;
                }
            }
            elseif(isset($_POST['id'], $_POST['dell'], $_POST['send']) && !empty($_POST['id']) && !empty($_POST['dell']) && $_POST['dell'] == 'No') {

                $text = "Видалення відмінено";
                $lvl = 2;

            }
            else{
                $text = "Помилка в передачі даних.";
                $lvl = 3;
            }

            header("refresh:3;url=/admin/page/list");
            require_once(ROOT."/views/resultForm.php");
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;

    }

    public function actionResultUpdate(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['send'], $_POST['name'], $_POST['title'], $_POST['page'], $_POST['prior'], $_POST['fullContent']) && !empty($_POST['name']) && !empty($_POST['title']) && !empty($_POST['page']) && !empty($_POST['prior']) && !empty($_POST['fullContent'])){

                $info = ['id'=>$_POST['id'],'name'=>$_POST['name'],'title'=>$_POST['title'],'page'=>$_POST['page'],'prior'=>$_POST['prior'],'fullContent'=>$_POST['fullContent']];

                $result = Page::update($info);

                if($result){
                    $text = "Товар успішно відновлено";
                    $lvl = 1;
                }

            }
            else{
                $text = "Помилка передачі даних";
                $lvl = 3;
            }

            header("refresh:3;url=/admin/page/list");
            require_once(ROOT."/views/resultForm.php");

        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

}