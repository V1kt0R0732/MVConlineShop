<?php

session_start();

if(isset($_COOKIE['client_name'], $_COOKIE['client_email'], $_COOKIE['client_id']) && !empty($_COOKIE['client_id']) && !empty($_COOKIE['client_name']) && !empty($_COOKIE['client_email'])){

    $_SESSION['user']['id'] = $_COOKIE['client_id'];
    $_SESSION['user']['name'] = $_COOKIE['client_name'];
    $_SESSION['user']['email'] = $_COOKIE['client_email'];

}


ini_set('display_errors', 1);
error_reporting(E_ALL);

define("ROOT",dirname(__FILE__));

require_once(ROOT.'/components/Router.php');

$router = new Router();

$router->run();

?>