<?php

session_start();
if(isset($_COOKIE['user_name'], $_COOKIE['user_email'], $_COOKIE['user_avatar'], $_COOKIE['user_status']) && !empty($_COOKIE['user_name']) && !empty($_COOKIE['user_email']) && !empty($_COOKIE['user_avatar']) && !empty($_COOKIE['user_status'])){

    $_SESSION['user_name'] = $_COOKIE['user_name'];
    $_SESSION['user_email'] = $_COOKIE['user_email'];
    $_SESSION['user_avatar'] = $_COOKIE['user_avatar'];
    $_SESSION['user_status'] = $_COOKIE['user_status'];

}


ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT',dirname(__FILE__));

require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');

$router = new Router();

$router->run();



?>