<?php
require_once(ROOT.'/views/head.php');
?>
<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">The Most Popular Products</div>
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

                <?php if(!empty($product)){ ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-default">
                            <tr>
                                <th>№</th>
                                <th>Photo</th>
                                <th>Product Name</th>
                                <th>Count Bought</th>
                            </tr>
                            </thead>
                            <?php foreach($product as $tmp): ?>
                                <tbody>
                                <tr>
                                    <td><?=$tmp['num']?></td>
                                    <td><img width="80px" src="/admin/images/product/<?=$tmp['photo_name']?>"></td>
                                    <td><?=$tmp['name']?></td>
                                    <td><?=$tmp['count']?></td>
                                </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>

                    </div>
                <?php } else {?>
                    <h3>Кожен клієнт замовив товар</h3>
                <?php } ?>
            </div>
        </div>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">The worst Products</div>
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

                <?php if(!empty($product_2)){ ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-default">
                            <tr>
                                <th>№</th>
                                <th>Photo</th>
                                <th>Product Name</th>
                                <th>Count Bought</th>
                            </tr>
                            </thead>
                            <?php foreach($product_2 as $tmp): ?>
                                <tbody>
                                <tr>
                                    <td><?=$tmp['num']?></td>
                                    <td><img width="80px" src="/admin/images/product/<?=$tmp['photo_name']?>"></td>
                                    <td><?=$tmp['name']?></td>
                                    <td><?=$tmp['count']?></td>
                                </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>

                    </div>
                <?php } else {?>
                    <h3></h3>
                <?php } ?>
            </div>
        </div>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">No Sold</div>
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

                <?php if(!empty($product_3)){ ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-default">
                            <tr>
                                <th>№</th>
                                <th>Photo</th>
                                <th>Product Name</th>
                            </tr>
                            </thead>
                            <?php foreach($product_3 as $tmp): ?>
                                <tbody>
                                <tr>
                                    <td><?=$tmp['num']?></td>
                                    <td><img width="80px" src="/admin/images/product/<?=$tmp['photo_name']?>"></td>
                                    <td><?=$tmp['name']?></td>
                                </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>

                    </div>
                <?php } else {?>
                    <h3>Кожен клієнт замовив товар</h3>
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
