<?php
require_once(ROOT.'/views/head.php');
?>
    <div class="page-wrapper">
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="ibox">
                <div class="ibox-head">

                </div>
                <div class="ibox-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Num</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($user as $tmp): ?>
                                <tr>
                                    <td><?=$tmp['num']?></td>
                                    <td><img src="/admin/images/user/<?=$tmp['avatar']?>" width="50px"></td>
                                    <td><?=$tmp['name']?></td>
                                    <td><?=$tmp['email']?></td>
                                    <td><?=$tmp['status']?></td>
                                    <td>
                                        <?php if($tmp['email'] != $_SESSION['user_email']){ ?>
                                        <a href="/admin/user/dell/<?=$tmp['id']?>"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button></a>
                                        <?php } ?>
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