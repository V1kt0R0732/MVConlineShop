<?php
require_once(ROOT.'/models/Product.php');
require_once(ROOT.'/models/Cat.php');
require_once(ROOT.'/models/Photo.php');
class ProductController
{

    public function actionIndex(){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {
            if(isset($_POST['send'], $_POST['category']) && !empty($_POST['category'])){
                $product = Product::getListByCat($_POST['category']);
            }
            else{
                $product = Product::getList();
            }

            $categories = Cat::getList();

            require_once(ROOT.'/views/product/product_all.php');
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionAdd(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {
            $cat = Cat::getList();

            require_once(ROOT.'/views/product/product_add.php');
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }

        return true;
    }

    public function actionResultAdd(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if (isset($_POST['send'], $_POST['product'], $_POST['category'], $_POST['count'], $_POST['price']) && !empty($_POST['product']) && !empty($_POST['category']) && !empty($_POST['count']) && !empty($_POST['price'])){

                $photo = array();
                if(isset($_FILES['photo']['error'][0], $_FILES['photo']['name'][0]) && $_FILES['photo']['error'][0] == 0){
                    for($i = 0; $i < count($_FILES['photo']['name']); $i++){
                        if(isset($_FILES['photo']['name'][$i]) && $_FILES['photo']['size'][$i] > 0){

                            $tmpFileName = $_FILES['photo']['tmp_name'][$i];
                            $realFileName = time() . $_FILES['photo']['name'][$i];

                            move_uploaded_file($tmpFileName, ROOT.'/images/product/'.$realFileName);

                            $photo[] = $realFileName;
                        }
                    }
                }

                $product = array('name'=>$_POST['product'],'category'=>$_POST['category'],'count'=>$_POST['count'],'price'=>$_POST['price'],'desc'=>$_POST['desc']);

                $result = Product::add($product);
                $photo_result = 0;
                if(!empty($photo) && isset($result) && !empty($result)){
                    $photo_result = Photo::add($photo, $result);
                }

                if($photo_result){
                    $text = "Товар разом з Фото успішно додано";
                    $lvl = 1;
                }
                else{
                    $text = "Товар додано без фото";
                    $lvl = 2;
                }

            }
            else{
                $text = "Помилка з добавленням товару, (Передача даних)";
                $lvl = 3;

            }

            header("refresh:3;url=/admin/product/add");
            require_once(ROOT."/views/resultForm.php");
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }



        return true;
    }

    public function actionDell($id){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($id) && !empty($id)){

                $product = Product::getNameById($id);

                require_once(ROOT.'/views/product/product_dell.php');

            }
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }



        return true;
    }

    public function actionResultDell(){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['id'], $_POST['dell'], $_POST['send']) && !empty($_POST['id']) && !empty($_POST['dell']) && $_POST['dell'] == 'Yes'){

                $result_photo = Photo::dellAll($_POST['id']);
                $result_product = Product::dell($_POST['id']);

                if($result_photo && $result_product){
                    $text = "Товар успішно видалено";
                    $lvl = 1;
                }
                else{
                    $text = "Помилка в видаленні";
                    $lvl = 3;
                }

            }
            elseif(isset($_POST['id'], $_POST['dell'], $_POST['send']) && !empty($_POST['id']) && !empty($_POST['dell']) && $_POST['dell'] == 'No') {

                $text = "Видалення відмінено";
                $lvl = 2;

            }
            else{
                $text = "Помилка в передачі даних.";
                $lvl = 3;
            }

            header("refresh:3;url=/admin/productAll");
            require_once(ROOT."/views/resultForm.php");
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }



        return true;

    }

    public function actionUpdate($id){
        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($id) && !empty($id)){

                $products = Product::getListById($id);
                $cat = Cat::getList();
                $photo = Photo::getListById($id);

                require_once(ROOT."/views/product/product_update.php");

            }
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }



        return true;

    }

    public function actionResultUpdate(){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($_POST['send'], $_POST['id'], $_POST['product'], $_POST['category'], $_POST['count'], $_POST['price']) && !empty($_POST['id']) && !empty($_POST['product']) && !empty($_POST['category']) && !empty($_POST['count'] && !empty($_POST['price']))) {

                $photo = array();
                if(isset($_FILES['photo']['error'][0], $_FILES['photo']['name'][0]) && $_FILES['photo']['error'][0] == 0){
                    for($i = 0; $i < count($_FILES['photo']['name']); $i++){
                        if(isset($_FILES['photo']['name'][$i]) && $_FILES['photo']['size'][$i] > 0) {

                            $tmpFileName = $_FILES['photo']['tmp_name'][$i];
                            $realFileName = time() . $_FILES['photo']['name'][$i];

                            move_uploaded_file($tmpFileName, ROOT.'/images/product/' . $realFileName);

                            $photo[] = $realFileName;

                        }
                    }
                }

                $photo_result = 0;
                if(!empty($photo)){
                    $photo_result = Photo::add($photo, $_POST['id']);
                }


                $product['id'] = $_POST['id'];
                $product['name'] = $_POST['product'];
                $product['category'] = $_POST['category'];
                $product['count'] = $_POST['count'];
                $product['price'] = $_POST['price'];
                $product['desc'] = $_POST['desc'];

                $product_res = Product::update($product);

                if($product_res){
                    $text = "Товар успішно відновлено";
                    $lvl = 1;
                }

                if (isset($_POST['photo_select']) && !empty($_POST['photo_select'])) {

                    Photo::statusChange($_POST['photo_select'], $_POST['id']);

                }

            }
            else{
                $text = "Помилка передачі даних";
                $lvl = 3;
            }

            header("refresh:3;url=/admin/productAll");
            require_once(ROOT."/views/resultForm.php");
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }


        return true;
    }

    public function actionResultPhotoDell($id){

        if(isset($_SESSION['user_status'], $_SESSION['user_avatar'], $_SESSION['user_name'], $_SESSION['user_email']) && !empty($_SESSION['user_name']) && !empty($_SESSION['user_avatar']) && !empty($_SESSION['user_status']) && !empty($_SESSION['user_email'])) {

            if(isset($id) && !empty($id)){

                $id_tovar = Photo::dell($id);
                $text = "Фото успішно видалено";
                $lvl = 1;

                header("refresh:3;url=/admin/product/update/".$id_tovar);
                require_once(ROOT."/views/resultForm.php");

            }
        }
        else{
            require_once(ROOT.'/views/error_404.html');
        }



        return true;
    }

    public function actionShowPopular(){


        $product = Product::getPopular('desc');

        $product_2 = Product::getPopular('asc');

        $product_3 = Product::getNoSold();

        require_once(ROOT.'/views/product/popular.php');

        return true;
    }


}