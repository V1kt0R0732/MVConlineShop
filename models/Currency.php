<?php
require_once(ROOT.'/components/Db.php');
class Currency
{

    public static function getCurrency(){

        $db = Db::getConnection();

        $query = "select id, name, value from valuta";
        $result = $db->query($query);

        return $result->fetch(PDO::FETCH_NUM)[0];

    }
    public static function getCef(){

        $db = Db::getConnection();

        $query = "select value from valuta where name = 'UAH'";
        $result = $db->query($query);

        return $result->fetch(PDO::FETCH_NUM)[0];

    }

}