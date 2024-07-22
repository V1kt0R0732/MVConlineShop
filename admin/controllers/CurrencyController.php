<?php
require_once(ROOT.'/models/Currency.php');
class CurrencyController
{

    public function actionValutaUpdate(){

        $value = Currency::getUAH();

        require_once(ROOT.'/views/currency/valuta.php');


        return true;
    }

    public function actionResultValutaUpdate(){

        if(isset($_POST['send'], $_POST['currency']) && !empty($_POST['currency'])){

            $result = Currency::update($_POST['currency']);

            if($result){
                $text = "Ціна успішно Відредагована";
                $lvl = 1;
            }
            else{
                $text = "Error";
                $lvl = 3;
            }

        }
        else{
            $text = "Undefined Error";
            $lvl = 3;
        }

        header("refresh:3;url=/admin/valuta/change");
        require_once(ROOT."/views/resultForm.php");

        return true;
    }




}