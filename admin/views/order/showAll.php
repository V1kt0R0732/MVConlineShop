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
                        <option value="dataCat-asc" <?php if(isset($_POST['sort']) && $_POST['sort'] == 'dataCat-asc') echo "selected"; ?>>Сортування по Даті - asc</option>
                        <option value="dataCat-desc" <?php if(isset($_POST['sort']) && $_POST['sort'] == 'dataCat-desc') echo "selected"; ?>>Сортування по Даті - desc</option>
                        <option value="adress-asc" <?php if(isset($_POST['sort']) && $_POST['sort'] == 'adress-asc') echo "selected"; ?>>Сортування по Адресі - asc</option>
                        <option value="adress-desc" <?php if(isset($_POST['sort']) && $_POST['sort'] == 'adress-desc') echo "selected"; ?>>Сортування по Адресі - desc</option>
                    </select>
                    <input class="btn-success btn-rounded" type="submit" name="send" value="Сортувати">
                </form>
                <?php if(!empty($orders)){ ?>
                    <div class="table-responsive">
                        <?php foreach($orders as $tmp): ?>
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
                                <td><?=$tmp['num']?></td>
                                <td><?=$tmp['email']?></td>
                                <td><?=$tmp['first_name']?></td>
                                <td><?=$tmp['last_name']?></td>
                                <td><?=$tmp['adress']?></td>
                                <td><?=$tmp['data_cat']?></td>
                                <td><?=$tmp['type']?></td>
                            </tr>
                            </tbody>
                            <thead class="thead-default">
                            <tr>
                                <th>№</th>
                                <th>Photo</th>
                                <th colspan="1">Product Name</th>
                                <th>Price</th>
                                <th>Count</th>
                                <th>Discount</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($tmp['products'] as $tmp_2): ?>
                                        <tr>
                                            <td><?=$tmp_2['num']?></td>
                                            <td><img src="/admin/images/product/<?=$tmp_2['photo']?>" width="70px"></td>
                                            <td colspan="1"><?=$tmp_2['name']?></td>
                                            <td><?=$tmp_2['price']?></td>
                                            <td><?=$tmp_2['count']?></td>
                                            <td><?php if(isset($tmp_2['coupon_value']) && !empty($tmp_2['coupon_value'])) echo $tmp_2['coupon_value']."%"; else echo 'None'?></td>
                                            <td><?=$tmp_2['total_price']?></td>
                                        </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <thead class="thead-default">
                            <tr>
                                <th colspan="2">Grand Price:</th>
                            <?php if($tmp['status'] == 'good'){ ?>
                                <th colspan="3">
                                    <a href="/admin/order/dell/<?=$tmp['id']?>"><button class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
                                </th>
                                <th colspan="1">
                                    <a href="/admin/order/archiv/add/<?=$tmp['id']?>"><button class="btn btn-success btn-circle"><i class="fa fa-check"></i></button></a>
                                </th>
                            <?php } else { ?>
                                <th colspan="2">
                                    <a href="/admin/order/dell/<?=$tmp['id']?>"><button class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
                                </th>
                                <th colspan="2">
                                    Товарів: "<?php echo $tmp['status'];?>" не має в наявності
                                </th>
                            <?php } ?>
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
