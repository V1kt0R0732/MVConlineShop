<?php
require_once(ROOT.'/views/head.php');
?>
<div class="page-wrapper">
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Categories</div>
        </div>
        <div class="ibox-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Num</th>
                        <th>Category Name</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($cat as $tmp): ?>
                        <tr>
                            <td><?=$tmp['num']?></td>
                            <td><?=$tmp['name']?></td>
                            <td>
                                <a href="/admin/cat/update/<?=$tmp['id']?>"><button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button></a>
                                <a href="/admin/cat/dell/<?=$tmp['id']?>"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
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