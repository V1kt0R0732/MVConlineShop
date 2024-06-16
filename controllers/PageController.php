<?php
require_once(ROOT.'/models/Page.php');
require_once(ROOT.'/models/Product.php');
require_once(ROOT.'/models/Cat.php');
class PageController
{

    public function actionMain(){

        $pages = Page::getPage();
        $cat = Cat::getAll_Count();
        $product = Product::getPopular('desc');
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);

        //print_r($uri);


        require_once(ROOT.'/views/page.php');

        return true;
    }

    public function actionContact(){

        $pages = Page::getPage();
        $cat = Cat::getAll_Count();
        $uri = Page::getUri();
        $page_info = Page::getPageInfo($uri);

        require_once(ROOT.'/views/contact.php');

        return true;
    }

    public function getUri(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }


}