<?php
require_once(ROOT.'/views/head.php');
?>
    <div class="page-wrapper">
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Dell User</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Ви дійсно хочите видалити користувача: "<?=$user['name']?>" з правами: <b><?=$user['status']?></b></div>
                        <div class="ibox-tools">
                            <!--                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>-->
                            <!--                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>-->
                            <!--                        <div class="dropdown-menu dropdown-menu-right">-->
                            <!--                            <a class="dropdown-item">option 1</a>-->
                            <!--                            <a class="dropdown-item">option 2</a>-->
                            <!--                        </div>-->
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form action="/admin/user/dell/resultForm" method="post">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label class="ui-radio ui-radio-success">
                                        <input type="radio" name="dell" value="Yes">
                                        <span class="input-span"></span>Yes
                                    </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="ui-radio ui-radio-danger">
                                        <input type="radio" name="dell" value="No">
                                        <span class="input-span"></span>No
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?=$user['id']?>">
                            <div class="form-group">
                                <input class="btn btn-outline-danger" type="submit" name="send" value="Видалити">
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