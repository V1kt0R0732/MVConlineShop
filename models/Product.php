<?php

class Product
{

    public static function getList($param){

        $db = Db::getConnection();

        $query = "select products.id as id, products.name as name, categories.name as cat, price, photo_name, description from categories inner join products on categories.id = products.id_cat left join photo on photo.id_tovar = products.id where (status = 1 or status is NULL)";

        $query_page = "select id from products";

        $page_param = "";

        if(isset($_SESSION['param']['cat']) && !empty($_SESSION['param']['cat'])){
            $query .= " and categories.id = {$_SESSION['param']['cat']}";
            $page_param .= " and id_cat = {$_SESSION['param']['cat']}";
        }

        if(isset($_SESSION['param']['search']) && !empty($_SESSION['param']['search'])){

            $search = str_replace(',',' ',$_SESSION['param']['search']);

            $word = explode(' ' , $search);

            $arr = array();
            if(isset($word) && !empty($word)) {
                foreach ($word as $tmp) {
                    if (!empty($tmp)) {
                        $arr[] = " products.name like '%{$tmp}%'";
                    }
                }
            }

            if(isset($arr) && !empty($arr)){
                $final_word = implode(' or ', $arr);
            }
            $query .= " and".$final_word; // Error
            $page_param .= " and".$final_word;

        }

        if(isset($_SESSION['param']['min_price']) && !empty($_SESSION['param']['min_price'])){
            $query .= " and price >= ".$_SESSION['param']['min_price'];
            $page_param .= " and price >= ".$_SESSION['param']['min_price'];
        }
        if(isset($_SESSION['param']['max_price']) && !empty($_SESSION['param']['max_price'])){
            $query .= " and price <= ".$_SESSION['param']['max_price'];
            $page_param .= " and price <= ".$_SESSION['param']['max_price'];
        }


        if(isset($_SESSION['param']['sort']) && !empty($_SESSION['param']['sort'])){
            switch($_SESSION['param']['sort']){
                case 'name_asc':
                    $query .= " order by name asc";
                    break;
                case 'name_desc':
                    $query .= " order by name desc";
                    break;
                case 'price_asc':
                    $query .= " order by price asc";
                    break;
                case 'price_desc':
                    $query .= " order by price desc";
                    break;
            }
        }

        // List //

        if(isset($page_param) && !empty($page_param)){
            $query_page .= " where id > 0".$page_param;
        }
        //echo $query_page;
        $result_page = $db->query($query_page);
        $count_pages = ceil($result_page->rowCount()/$_SESSION['param']['note']);


        $skip = ($param['page']-1) * $_SESSION['param']['note'];

        $query .= " limit $skip, {$_SESSION['param']['note']}";


        //echo $query;

        $result = $db->query($query);

        $list = array();
        $num = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $list[$num]['id'] = $row['id'];
            $list[$num]['name'] = $row['name'];
            $list[$num]['cat'] = $row['cat'];
            $list[$num]['price'] = $row['price'];
            if(empty($row['description'])){
                $list[$num]['description'] = "Товар Без Опису";
            }
            else{
                $path = substr($row['description'],0, 255);
                $index = strrpos($path,' ');
                $list[$num]['description'] = substr($row['description'], 0, $index);
            }
            if(empty($row['photo_name'])){
                $row['photo_name'] = 'noPhoto.jpg';
            }
            $list[$num]['photo'] = $row['photo_name'];

            $num++;
        }


        if(!empty($list)){
            $list[0]['count_pages'] = $count_pages;
        }


        return $list;

    }

    public static function getById($id){

        $db = Db::getConnection();

        $query = "select products.id as id, products.name as name, categories.name as cat, count, price, description from products inner join categories on products.id_cat = categories.id where products.id = {$id}";
        $result = $db->query($query);



        return $result->fetch(PDO::FETCH_ASSOC);

    }

}