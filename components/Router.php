<?php

class Router
{

    private $routes;

    public function __construct(){

        $this->routes = require_once(ROOT.'/config/routes.php');

    }


    public function run(){

        $uri = $this->getUri();


        foreach($this->routes as $uriPattern=>$path){
            if(preg_match("~{$uriPattern}~",$uri)){

                $internalRouter = preg_replace("~{$uriPattern}~", $path,$uri);

                $segment = explode('/',$internalRouter);

                $controllerName = ucfirst(array_shift($segment)).'Controller';
                $actionName = 'action'.ucfirst(array_shift($segment));


                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if(file_exists($controllerFile)){
                    include_once($controllerFile);

                    $controllerObject = new $controllerName;

                    $parametrs = $segment;

                    $result = call_user_func_array(array($controllerObject, $actionName),$parametrs);

                    if($result != null){
                        break;
                    }
                }
            }
        }
    }

    public function getUri(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }


}