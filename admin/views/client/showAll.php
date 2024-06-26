<?php
require_once(ROOT.'/views/head.php');
?>
<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Clients with Orders</div>
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

                <?php if(!empty($clients)){ ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-default">
                            <tr>
                                <th>№</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Phone</th>
                                <th>Last Log</th>
                                <th>Count Bought Tovar</th>
                            </tr>
                            </thead>
                        <?php foreach($clients as $tmp): ?>
                                <tbody>
                                <tr>
                                    <td><?=$tmp['num']?></td>
                                    <td><?=$tmp['email']?></td>
                                    <td><?=$tmp['first_name']?></td>
                                    <td><?=$tmp['last_name']?></td>
                                    <td><?=$tmp['phone']?></td>
                                    <td><?=$tmp['last_log']?></td>
                                    <td><?=$tmp['count_tovar']?></td>
                                </tr>
                                </tbody>
                        <?php endforeach; ?>
                        </table>

                    </div>
                <?php } else {?>
                    <h3>Ніхто нічого не купив((</h3>
                <?php } ?>
            </div>
        </div>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Clients without Orders</div>
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
                <?php if(!empty($no_order)){ ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-default">
                            <tr>
                                <th>№</th>
                                <th>Email</th>
                                <th>Login</th>
                                <th>Last Log</th>
                            </tr>
                            </thead>
                            <?php foreach($no_order as $tmp): ?>
                                <tbody>
                                <tr>
                                    <td><?=$tmp['num']?></td>
                                    <td><?=$tmp['email']?></td>
                                    <td><?=$tmp['user_name']?></td>
                                    <td><?=$tmp['last_log']?></td>
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
