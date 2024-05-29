<?php
require_once(ROOT.'/views/head.php');
?>
<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <?php if($lvl == 1) {?>
            <div class="ibox">
                <div class="alert alert-success alert-bordered" style="margin-top:10px"><strong><?=$text?></strong></div>
            </div>
        <?php }elseif($lvl == 2) {?>
            <div class="ibox">
                <div class="alert alert-warning alert-bordered" style="margin-top:10px"><strong><?=$text?></strong></div>
            </div>
        <?php } else {?>
            <div class="ibox">
                <div class="alert alert-danger alert-bordered" style="margin-top:10px"><strong><?=$text?></strong></div>
            </div>
        <?php } ?>
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