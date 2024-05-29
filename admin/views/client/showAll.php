<?php
require_once(ROOT.'/views/head.php');
?>
<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">All Orders</div>
                <!--
                <form class="form-inline" action="/admin/productAll" method="post">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <select class="form-control input-rounded" name="category">
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="send" value="Фільтр" class="btn btn-success rounded">
                </form>
                -->
                </div>
            <div class="ibox-body">
                <form class="form-inline" method="post" action="/admin/order/list">
                    <label class=" mb-2 mr-sm-2 mb-sm-0">Sort By: </label>
                    <select class="form-control mb-2 mr-sm-2 mb-sm-0" name="sort">

                    </select>
                    <input class="btn-success btn-rounded" type="submit" name="send" value="Сортувати">
                </form>
                <?php if(!empty($clients)){ ?>
                    <div class="table-responsive">
                        <?php foreach($clients as $tmp): ?>
                            <table class="table">
                                <thead class="thead-default">
                                <tr>
                                    <th>№</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Address</th>
                                    <th>Data</th>
                                    <th>Client/Visitor</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?=$tmp['id']?></td>
                                    <td><?=$tmp['email']?></td>
                                    <td><?=$tmp['first_name']?></td>
                                    <td><?=$tmp['last_name']?></td>
                                    <td>----</td>
                                    <td><?=$tmp['last_log']?></td>
                                    <td>----</td>
                                </tr>
                                </tbody>
                                <thead class="thead-default">
                                <tr>
                                    <th>№</th>
                                    <th>Photo</th>
                                    <th colspan="2">Product Name</th>
                                    <th>Price</th>
                                    <th>Count</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <thead class="thead-default">
                                <tr>
                                    <th colspan="2">Grand Price:</th>
                                    <th colspan="3">
                                        <a href="/admin/order/dell/<?=$tmp['id']?>"><button class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
                                    </th>
                                    <th colspan="1">
                                        <a href="/admin/order/archiv/add/<?=$tmp['id']?>"><button class="btn btn-success btn-circle"><i class="fa fa-check"></i></button></a>
                                    </th>
                                    <th><?=$tmp['grand_price']?></th>
                                </tr>
                                </thead>
                            </table>
                        <?php endforeach; ?>
                    </div>
                <?php } else {?>
                    <h3>Замовлень не має((</h3>
                <?php } ?>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
        <footer class="page-footer">
            <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
            <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
            <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
        </footer>
    </div>
</div>
<?php
require_once(ROOT.'/views/end.php');
?>
