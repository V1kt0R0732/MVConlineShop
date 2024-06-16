<?php
require_once(ROOT.'/models/Cat.php');
require_once(ROOT.'/models/Product.php');
require_once(ROOT.'/models/Photo.php');
require_once(ROOT.'/models/Page.php');
class CatalogController
{

    public function actionIndex($cat, $page){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);

        //print_r($uri);
        $param = array();


        if(isset($page) && !empty($page)){
            $param['page'] = $page;
            $_SESSION['param']['page'] = $page;
        }
        else{
            $param['page'] = 1;
            $_SESSION['param']['page'] = 1;
        }

        if(isset($_POST['note']) && !empty($_POST['note'])){
            if(!isset($_SESSION['param']['note'])){
                $_SESSION['param']['note'] = 8;
            }
            if($_SESSION['param']['note'] != $_POST['note']){
                $_SESSION['param']['note'] = $_POST['note'];
            }
        }
        else{
            if(!isset($_SESSION['param']['note'])){
                $_SESSION['param']['note'] = 8;
            }
        }

        $_SESSION['param']['cat'] = $cat;

        if(isset($_POST['sort'])){
            //$param['sort'] = $_POST['sort'];
            if(!isset($_SESSION['param']['sort'])){
                $_SESSION['param']['sort'] = 0;
            }
            if($_SESSION['param']['sort'] != $_POST['sort']){
                $_SESSION['param']['sort'] = $_POST['sort'];
            }
        }

        if(isset($_POST['search'])){
            if(!isset($_SESSION['param']['search'])){
                $_SESSION['param']['search'] = 0;
            }
            if($_SESSION['param']['search'] != $_POST['search']){
                $_SESSION['param']['search'] = $_POST['search'];
            }
        }
        if(isset($_POST['min_price']) && !empty($_POST['min_price'])){
            if(!isset($_SESSION['param']['min_price'])){
                $_SESSION['param']['min_price'] = 0;
            }
            if($_SESSION['param']['min_price'] != $_POST['min_price']){
                $_SESSION['param']['min_price'] = $_POST['min_price'];
            }
        }
        if(isset($_POST['max_price']) && !empty($_POST['max_price'])){
            if(!isset($_SESSION['param']['max_price'])){
                $_SESSION['param']['max_price'] = 0;
            }
            if($_SESSION['param']['max_price'] != $_POST['max_price']){
                $_SESSION['param']['max_price'] = $_POST['max_price'];
            }
        }
        if(isset($_POST['clear']) && !empty($_POST['clear'])){
            if(isset($_SESSION['param']['sort'])){
                $_SESSION['param']['sort'] = 0;
            }
            if(isset($_SESSION['param']['search'])){
                $_SESSION['param']['search'] = 0;
            }
            if(isset($_SESSION['param']['min_price'])){
                $_SESSION['param']['min_price'] = 0;
            }
            if(isset($_SESSION['param']['max_price'])){
                $_SESSION['param']['max_price'] = 0;
            }
        }

        $cat = Cat::getAll();
        $product = Product::getList($param);



        if(isset($product) && !empty($product)){
            $count_pages = $product[0]['count_pages'];
        }
        else{
            $count_pages = 1;
        }

        //print_r($_SESSION);

        require_once(ROOT.'/views/catalog/index.php');

        return true;

    }

    public function actionDetail($id, $photo_id){
        $pages = Page::getPage();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);

        $product = Product::getById($id);
        $photo = Photo::getAllById($id);


        //print_r($photo);


        require_once(ROOT.'/views/catalog/detail.php');

        return true;
    }


}