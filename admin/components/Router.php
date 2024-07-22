<?php

class Router
{

    private $routes;
    private $status;

    public function __construct(){

        $this->routes = require_once(ROOT.'/config/routes.php');
        $this->status = false;

    }

    public function run(){

        $uri = $this->getURI();




        foreach($this->routes as $uriPattern=>$path){
            if(preg_match("~$uriPattern~",$uri)){

                $internalRoute = preg_replace("~$uriPattern~",$path,$uri);



                $segment = explode('/',$internalRoute);



                //print_r($segment);

                $controllerName = array_shift($segment).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = "action".ucfirst(array_shift($segment));

                //echo "<br>Controller Name- $controllerName<br> Action Name- $actionName";

                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                //echo "<br>$controllerFile";


                if(file_exists($controllerFile)){
                    include_once($controllerFile);

                    $controllerObject = new $controllerName;

                    $parametrs = $segment;

                    $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);

                    if($result != null){
                        $this->status = true;
                        break;
                    }

                }

            }
        }

        if(!$this->status){
            header("location:/admin/user/login");
        }
    }

    public function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

}