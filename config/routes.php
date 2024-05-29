<?php

return array(

    'user/exit'=>'user/exit',
    'user/profile'=>'user/profile',
    'user/registration/result'=>'user/resultReg',
    'user/registration'=>'user/reg',
    'user/login/result'=>'user/resultLog',
    'user/login'=>'user/login',

    'catalog/order/result'=>'basket/orderResult',
    'catalog/order'=>'basket/order',
    'catalog/basket/clear'=>'basket/clear',
    'catalog/basket/dell/([0-9]+)'=>'basket/dell/$1',
    'catalog/basket/update'=>'basket/update',
    'catalog/basket/add/([0-9]+)'=>'basket/add/$1',
    'catalog/basket'=>'basket/index',

    'catalog/detail/([0-9]+)/([0-9]+)'=>'catalog/detail/$1/$2',
    'catalog/index/([0-9]+)/([0-9]+)'=>'catalog/index/$1/$2',


);