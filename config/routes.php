<?php

return array(

    'user/exit'=>'user/exit',
    'user/setting'=>'user/setting',
    'user/update'=>'user/update',
    'user/registration/result'=>'user/resultReg',
    'user/registration'=>'user/reg',
    'user/login/result'=>'user/resultLog',
    'user/login'=>'user/login',

    'order/result'=>'basket/orderResult',
    'order'=>'basket/order',
    'basket/clear'=>'basket/clear',
    'basket/dell/([0-9]+)'=>'basket/dell/$1',
    'basket/update'=>'basket/update',
    'basket/add/([0-9]+)'=>'basket/add/$1',
    'basket/coupon/activate'=>'basket/couponCheck',
    'basket'=>'basket/index',

    'catalog/detail/([0-9]+)/([0-9]+)'=>'catalog/detail/$1/$2',
    'catalog/index/([0-9]+)/([0-9]+)'=>'catalog/index/$1/$2',
    'catalog/'=>'catalog/index/0/1',
    'catalog'=>'catalog/index/0/1',

    'profile'=>'user/profile',
    'contact'=>'page/contact',
    'index'=>'page/main',

);