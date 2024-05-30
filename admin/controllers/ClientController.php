<?php
require_once(ROOT.'/models/Client.php');

class ClientController
{

    public function actionShowAll(){

        $clients = Client::getList();

        require_once(ROOT.'/views/client/showAll.php');

        return true;
    }


}