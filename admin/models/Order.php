<?php
require_once(ROOT.'/components/Db.php');
class Order
{
    public static function getList($status, $sort){

        $db = Db::getConnection();

        if(isset($sort) && !empty($sort)){
            $sort = explode('-',$sort);
        }

        $query_count = "select id from relationOrder where status = {$status}";
        $result_count = $db->query($query_count);

        $grand_price = 0;
        $i_client = -1;
        $i_visitor = -1;
        $last_first_name = '';
        $last_last_name = '';
        $last_data_cat = '';
        $orders = [];
        $num = -1;
        $num_2 = 0;
        for($i = 0; $i < $result_count->rowCount(); $i++){

            $query_type = "select type from relationOrder where status = {$status}";
            if(isset($sort) && !empty($sort)){
                $query_type .= " order by {$sort[0]} {$sort[1]}";
            }
            $query_type .= " limit {$i}, 1";
            $result_type = $db->query($query_type);
            $type = $result_type->fetch(PDO::FETCH_NUM)[0];

            if($type == 'client'){
                $i_client += 1;
                $i_limit = $i_client;
            }
            else{
                $i_visitor += 1;
                $i_limit = $i_visitor;
            }

            $query = "select relationOrder.id as id, idUser, countCat as count, products.count as total_count, relationOrder.status as order_status, dataCat, relationOrder.description as description, relationOrder.adress as adress, type, first_name, last_name, email, phone, products.name as product, price, photo_name as photo, coupons.value as coupon_value, coupons.coupon as coupon_name from products inner join relationOrder on products.id = relationOrder.idCat inner join {$type} on {$type}.id = relationOrder.idUser left join photo on photo.id_tovar = relationOrder.idCat left join coupons on relationOrder.coupon = coupons.coupon where (photo.status = 1 or photo.status is null) and relationOrder.status = {$status}";

            if(isset($sort) && !empty($sort)){
                $query .= " order by {$sort[0]} $sort[1]";
            }

            // Limit
            $query .= " limit {$i_limit}, 1";

            $result = $db->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if(empty($row['photo'])){
                $row['photo'] = 'noPhoto.jpg';
            }

            if($row['first_name'] != $last_first_name || $row['last_name'] != $last_last_name || $row['dataCat'] != $last_data_cat){
                $grand_price = 0;
                $num++;
                $num_2 = 0;
            }
            else{
                $num_2++;
            }

            if(!isset($orders[$num]['status'])){
                $orders[$num]['status'] = 'good';
            }
            if(($row['total_count'] - $row['count']) < 0){
                if($orders[$num]['status'] == 'good'){
                    $orders[$num]['status'] = $row['product'];
                }
                else{
                    $orders[$num]['status'] .= ', '.$row['product'];
                }

            }
            $orders[$num]['num'] = $num + 1;
            $orders[$num]['id'] = $row['id'];
            $orders[$num]['idUser'] = $row['idUser'];
            $orders[$num]['order_status'] = $row['order_status'];
            $orders[$num]['data_cat'] = $row['dataCat'];
            $orders[$num]['type'] = $row['type'];
            $orders[$num]['first_name'] = $row['first_name'];
            $orders[$num]['last_name'] = $row['last_name'];
            $orders[$num]['email'] = $row['email'];
            $orders[$num]['adress'] = $row['adress'];
            $orders[$num]['desc'] = $row['description'];
            $orders[$num]['products'][$num_2]['coupon_name'] = $row['coupon_name'];
            $orders[$num]['products'][$num_2]['coupon_value'] = $row['coupon_value'];
            $orders[$num]['products'][$num_2]['name'] = $row['product'];
            if(isset($row['coupon_value']) && !empty($row['coupon_value'])){
                $orders[$num]['products'][$num_2]['total_price'] = ($row['price']-($row['coupon_value']/100*$row['price'])) * $row['count'];
            }
            else{
                $orders[$num]['products'][$num_2]['total_price'] = $row['price'] * $row['count'];
            }
            $grand_price += $orders[$num]['products'][$num_2]['total_price'];
            $orders[$num]['grand_price'] = $grand_price;
            $orders[$num]['products'][$num_2]['price'] = $row['price'];
            $orders[$num]['products'][$num_2]['photo'] = $row['photo'];
            $orders[$num]['products'][$num_2]['count'] = $row['count'];
            $orders[$num]['products'][$num_2]['num'] = $num_2 + 1;


            $last_first_name = $row['first_name'];
            $last_last_name = $row['last_name'];
            $last_data_cat = $row['dataCat'];

        }

        //print_r($orders);
        return $orders;
    }

    public static function dell($id){

        $db = Db::getCOnnection();

        $query_check = "select idUser, dataCat, type from relationOrder where id = {$id}";
        $result_check = $db->query($query_check);
        $row_check = $result_check->fetch(PDO::FETCH_ASSOC);

        if($row_check['type'] == 'visitor'){
            $query_vis = "delete from visitor where id = {$row_check['idUser']}";
            $db->query($query_vis);
        }

        $query_dell = "delete from relationOrder where idUser = {$row_check['idUser']} and dataCat = '{$row_check['dataCat']}'";
        $db->query($query_dell);

        return true;

    }

    public static function getUserById($id){

        $db = Db::getCOnnection();

        $query_check = "select type, idUser from relationOrder where id = {$id}";
        $result_check = $db->query($query_check);
        $row_check = $result_check->fetch(PDO::FETCH_ASSOC);
        $type = $row_check['type'];
        $idUser = $row_check['idUser'];

        $query = "select first_name, last_name from {$type} where id = {$idUser}";
        $result = $db->query($query);
        $user = $result->fetch(PDO::FETCH_ASSOC);


        return $user;

    }

    public static function archivAdd($id){

        $db = Db::getConnection();

        $query_user = "select dataCat as data, idUser as id from relationOrder where id = {$id}";
        $result_user = $db->query($query_user);
        $user = $result_user->fetch(PDO::FETCH_ASSOC);

        $query_tovar = "select idCat, countCat from relationOrder where idUser = {$user['id']} and dataCat = '{$user['data']}'";
        $result_tovar = $db->query($query_tovar);
        while($tovar = $result_tovar->fetch(PDO::FETCH_ASSOC)){

            $query_change = "update products set count = count-{$tovar['countCat']} where id = {$tovar['idCat']}";
            $db->query($query_change);

        }

        $query = "update relationOrder set status = 0 where idUser = {$user['id']} and dataCat = '{$user['data']}'";
        $db->query($query);

        return true;

    }
    public static function archivRemove($id){

        $db = Db::getConnection();

        $query_user = "select dataCat as data, idUser as id from relationOrder where id = {$id}";
        $result_user = $db->query($query_user);
        $user = $result_user->fetch(PDO::FETCH_ASSOC);

        $query_tovar = "select idCat, countCat from relationOrder where idUser = {$user['id']} and dataCat = '{$user['data']}'";
        $result_tovar = $db->query($query_tovar);
        while($tovar = $result_tovar->fetch(PDO::FETCH_ASSOC)){

            $query_change = "update products set count = count+{$tovar['countCat']} where id = {$tovar['idCat']}";
            $db->query($query_change);

        }

        $query = "update relationOrder set status = 1 where idUser = {$user['id']} and dataCat = '{$user['data']}'";
        $db->query($query);

        return true;

    }

}