<?php
require_once(ROOT.'/views/head.php');
?>
<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="ibox">
            <div class="ibox-head">
                <form class="form-inline" action="/admin/productAll" method="post">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <select class="form-control input-rounded" name="category">
                                <option value="0">Всі категорії</option>
                                <?php foreach($categories as $tmp): ?>
                                <option value="<?=$tmp['id']?>" <?php if(isset($_POST['category']) && $tmp['id'] == $_POST['category']) echo'selected'; ?>><?=$tmp['name']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="send" value="Фільтр" class="btn btn-success rounded">
                </form>

            </div>
            <div class="ibox-body">
                <?php if(!empty($product)){ ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Num</th>
                            <th>Photo</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Count</th>
                            <th>Price</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($product as $tmp): ?>
                            <tr>
                                <td><?=$tmp['num']?></td>
                                <td><img src="/admin/images/product/<?=$tmp['photo_name']?>" width="50px"></td>
                                <td><?=$tmp['name']?></td>
                                <td><?=$tmp['cat']?></td>
                                <td><?=$tmp['count']?></td>
                                <td><?=$tmp['price']?></td>
                                <td>
                                    <a href="/admin/product/update/<?=$tmp['id']?>"><button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button></a>
                                    <a href="/admin/product/dell/<?=$tmp['id']?>"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php } else {?>
                <h3>Ця категоря ще пуста((</h3>
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