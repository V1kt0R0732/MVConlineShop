<?php
require_once(ROOT.'/components/Db.php');
class Coupon
{

    public static function check(){

        $db = Db::getConnection();

        $query_check = "select id, name, time_created, status, active_day from coupons where status = 1";
        $result_check = $db->query($query_check);
        $row_check = $result_check->fetch(PDO::FETCH_ASSOC);

        $result = (time() - strtotime($row_check['time_created'])) / 60 / 60 / 24;

        if ($result >= $row_check['active_day']) {
            $query_update = "update coupons set status = 0 where id = {$row_check['id']}";
            $db->query($query_update);

            $new_coupon = '';
            for ($i = 0; $i < 3; $i++) {
                $new_coupon .= rand(0, 9);
            }
            $percentage = rand(0, 10);
            $days = rand(1, 7);

            $name = $percentage . '% Sale';
            $query_create = "insert into coupons (name, value, coupon, time_created, status, active_day) values ('{$name}', {$percentage}, '{$new_coupon}', now(), 1, {$days})";
            $db->query($query_create);
        }

    }

    public static function getCoupon(){

        $db = Db::getConnection();

        $query = "select id, name, value, coupon, status, time_created, active_day from coupons where status = 1 limit 1";
        $result_query = $db->query($query);


        return $result_query->fetch(PDO::FETCH_ASSOC);

    }

    public static function activate($coupon){

        $db = Db::getConnectioN();

        $query = "select id, name, value, coupon, status from coupons where coupon = '{$coupon}'";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if(isset($row) && !empty($row)){
            return $row;
        }
        else{
            return false;
        }

    }


}