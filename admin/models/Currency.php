<?php
require_once(ROOT.'/components/Db.php');
class Currency
{


    public static function getUAH(){

        $db = Db::getConnection();

        $query = "select value from valuta where name = 'UAH'";
        $result = $db->query($query);

        return $result->fetch(PDO::FETCH_NUM)[0];

    }

    public static function update($value){

        $db = Db::getConnection();

        $query = "update valuta set value = :value where name = 'UAH'";
        $stmt = $db->prepare($query);

        $stmt->bindValue(':value',$value);

        $num_row = $stmt->execute();

        if($num_row){
            return true;
        }
        else{
            return false;
        }

    }


}