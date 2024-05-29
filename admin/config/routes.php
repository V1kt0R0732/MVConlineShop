<?php
return array(


    'admin/order/archiv/remove/([0-9]+)'=>'order/archivRemove/$1',
    'admin/order/archiv/add/([0-9]+)'=>'order/archivAdd/$1',
    'admin/order/archiv/list'=>'order/archivList',

    'admin/order/dell/resultForm'=>'order/resultDell',
    'admin/order/dell/([0-9]+)'=>'order/dell/$1',
    'admin/order/list'=>'order/showAll',

    'admin/user/changePass'=>'user/changePass',

    'admin/user/dell/resultForm'=>'user/resultDell',
    'admin/user/dell/([0-9]+)'=>'user/dell/$1',

    'admin/user/update'=>'user/update',
    'admin/user/exit'=>'user/exit',

    'admin/user/login/res'=>'user/resultLog',
    'admin/user/login'=>'user/login',

    'admin/user/reg/res'=>'user/resultReg',
    'admin/user/reg'=>'user/register',

    'admin/user/all'=>'user/showAll',
    'admin/user/profile'=>'user/index',

    'admin/product/dellPhoto/resultForm/([0-9]+)'=>'product/resultPhotoDell/$1',
    'admin/product/update/resultForm'=>'product/resultUpdate',
    'admin/product/update/([0-9]+)'=>'product/update/$1',

    'admin/product/dell/resultForm'=>'product/resultDell',
    'admin/product/dell/([0-9]+)'=>'product/dell/$1',

    'admin/product/add/resultForm'=>'product/resultAdd',
    'admin/product/add'=>'product/add',
    'admin/productAll'=>'product/index',

    'admin/cat/update/resultForm'=>'categories/resultUpdate',
    'admin/cat/update/([0-9]+)'=>'categories/update/$1',

    'admin/cat/dell/resultForm'=>'categories/resultDell',
    'admin/cat/dell/([0-9]+)'=>'categories/dell/$1',

    'admin/cat/add/resultForm'=>'categories/resultAdd',
    'admin/cat/add'=>'categories/add',
    'admin/catAll'=>'categories/index',

    'admin/index'=>'admin/index',

);