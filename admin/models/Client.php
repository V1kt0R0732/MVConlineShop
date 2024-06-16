<?php
require_once(ROOT.'/components/Db.php');
class Client
{

    public static function getList(){

        $db = Db::getConnection();

        $query = "select client.id as id, first_name, last_name, email, phone, last_log, sum(relationOrder.countCat) as countTovar from client inner join relationOrder on client.id = relationOrder.idUser where status = 0 group by id order by countTovar desc;";
        $result = $db->query($query);
        $clients = [];
        $last_id = 0;
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            /*
            $query_money = "select countCat, price from relationOrder inner join products on products.id = relationOrder.idCat where idUser = {$row['id']} and status = 0 and dataCat = '{$row['dataCat']}'";
            $result_money = $db->query($query_money);
            $user = $result_money->fetch(PDO::FETCH_ASSOC);
            */


            $clients[$num]['num'] = $num+1;
            $clients[$num]['id'] = $row['id'];
            $clients[$num]['first_name'] = $row['first_name'];
            $clients[$num]['last_name'] = $row['last_name'];
            $clients[$num]['email'] = $row['email'];
            $clients[$num]['phone'] = $row['phone'];
            $clients[$num]['last_log'] = $row['last_log'];
            $clients[$num]['count_tovar'] = $row['countTovar'];
            //$clients[$num]['price'] = $user['countCat'] * $user['price'];

            $num++;

        }

        //print_r($clients);

        return $clients;

    }

    public static function getNullClients(){

        $db = Db::getConnection();

        $query = "select email, user_name, last_log, sum(relationOrder.countCat) as countTovar from client left join relationOrder on client.id = relationOrder.idUser where relationOrder.countCat is null group by email, user_name, last_log;";
        $result = $db->query($query);

        $clients = [];
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $clients[$num]['num'] = $num + 1;
            $clients[$num]['email'] = $row['email'];
            $clients[$num]['user_name'] = $row['user_name'];
            $clients[$num]['last_log'] = $row['last_log'];

            $num++;

        }

        return $clients;

    }


}