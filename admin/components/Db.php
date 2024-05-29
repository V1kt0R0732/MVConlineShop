<?php

class Db
{

    public static function getConnection(){

        $param = require(ROOT.'/config/params.php'); // require / require_once

        $dsn = "mysql:host={$param['host']};dbname={$param['dbname']}";

        return new PDO($dsn, $param['user'],$param['password']);

    }

}