<?php
require_once(ROOT.'/models/Client.php');

class ClientController
{

    public function actionShowAll(){

        $clients = Client::getList();

        $no_order = Client::getNullClients();

        require_once(ROOT.'/views/client/showAll.php');

        return true;
    }


}