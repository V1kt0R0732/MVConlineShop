<?php
require_once(ROOT.'/components/Db.php');
class Visiting
{

    public static function check(){
        if(!isset($_SESSION['visiting'])) {
            $db = Db::getConnection();

            $query_check = "select id, unic from visiting where ip = '{$_SERVER['REMOTE_ADDR']}'";
            $result_check = $db->query($query_check);
            $row_check = $result_check->fetch(PDO::FETCH_ASSOC);

            if (isset($row_check['unic']) && !empty($row_check['unic'])) {

                $query_plus = "update visiting set regular = regular+1, data = now() where ip = '{$_SERVER['REMOTE_ADDR']}'";
                $db->query($query_plus);

            } else {

                $query_add = "insert into visiting (ip, unic, regular, data) values ('{$_SERVER['REMOTE_ADDR']}', 1, 1, now())";
                $db->query($query_add);

            }

            $_SESSION['visiting'] = $_SERVER['REMOTE_ADDR'];
        }

    }



}