<?php
require_once(ROOT.'/views/head.php');
?>
<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Update Product</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
            </ol>
        </div>
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Horizontal Form</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" action="/admin/product/update/resultForm" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Product</label>
                            <div class="col-sm-10">
                                <input class="form-control input-rounded" name="product" type="text" value="<?=$products['name']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Select</label>
                            <div class="col-sm-10">
                                <select class="form-control input-rounded" name="category">
                                    <?php foreach($cat as $tmp): ?>
                                        <option value="<?=$tmp['id']?>"><?=$tmp['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Count</label>
                            <div class="col-sm-10">
                                <input class="form-control input-rounded" type="number" name="count" value="<?=$products['count']?>" min="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input class="form-control input-rounded" type="number" min="0" name="price" value="<?=$products['price']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="desc" class="form-control rounded-1"><?=$products['description']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input class="form-control input-rounded" type="file" name="photo[]" multiple>
                            </div>
                        </div>
                        <?php foreach($photo as $tmp):?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"><?php if($tmp['status'] == 1) echo "Main Photo"; else echo "Photo ".$tmp['num']; ?></label>
                                <div class="col-sm-10 ml-sm-auto">
                                    <img width="60px" src="/admin/images/product/<?=$tmp['photo_name']?>">
                                    <?php if($tmp['status'] == 1) {?>
                                        <span class="badge badge-success badge-pill m-r-5 m-b-5">Selected</span>
                                    <?php } else{?>
                                        <label class="ui-radio ui-radio-success">
                                            <input type="radio" name="photo_select" value="<?=$tmp['id']?>">
                                            <span class="input-span"></span>Select</label>
                                    <?php } ?>
                                    <a href="/admin/product/dellPhoto/resultForm/<?=$tmp['id']?>" class="btn btn-outline-danger btn-rounded">Delete</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <input type="hidden" name="id" value="<?=$products['id']?>">
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <input class="btn btn-info" type="submit" name="send" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
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