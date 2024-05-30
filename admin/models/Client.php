<?php
require_once(ROOT.'/components/Db.php');
class Client
{

    public static function getList(){

        $db = Db::getConnection();

        $query = "select client.id as id, first_name, last_name, email, phone, last_log, dataCat from relationOrder inner join client on client.id = relationOrder.idUser where status = 0;";
        $result = $db->query($query);
        $clients = [];
        $last_id = 0;
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if($last_id != $row['id']){

                $clients[$num]['id'] = $row['id'];
                $clients[$num]['first_name'] = $row['first_name'];
                $clients[$num]['last_name'] = $row['last_name'];
                $clients[$num]['email'] = $row['email'];
                $clients[$num]['phone'] = $row['phone'];
                $clients[$num]['last_log'] = $row['last_log'];

                $num++;
            }
        }

        return $clients;

    }


}