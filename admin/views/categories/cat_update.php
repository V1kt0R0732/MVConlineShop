<?php
require_once(ROOT.'/views/head.php');
?>
<div class="page-wrapper">
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Update Category</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="col-md-6">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Category</div>
            </div>
            <div class="ibox-body">
                <form class="form-inline" action="/admin/cat/update/resultForm" method="post">
                    <label class="sr-only" for="ex-email">Category</label>
                    <input class="form-control mb-2 mr-sm-2 mb-sm-0" id="ex-email" type="text" name="cat_name" value="<?=$cat?>">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="send" value="Редагувати" class="btn btn-success">
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
