<?php
require_once(ROOT.'/views/head.php');
?>

    <div class="page-wrapper">
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Update Setting Page</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Page: <b><?=$page['name']?></b></div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" action="/admin/page/update/resultForm" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control input-rounded" name="title" type="text" value="<?=$page['title']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prior</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-rounded" name="prior">
                                        <?php foreach($prior as $tmp){ ?>
                                            <option value="<?=$tmp['prior']?>" <?php if($page['prior'] == $tmp['prior']) echo 'selected';?>><?=$tmp['prior']?> (<?=$tmp['name']?>)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control input-rounded" type="text" name="name" value="<?=$page['name']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Page</label>
                                <div class="col-sm-10">
                                    <input class="form-control input-rounded" type="text"  name="page" value="<?=$page['page']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Full Content</label>
                                <div class="col-sm-10">
                                    <textarea name="fullContent" class="form-control rounded-1"><?=$page['fullContent']?></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?=$page['id']?>">
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
    <script type="text/javascript" src="/admin/fckeditor/fckeditor.js"></script>
    <script  type="text/javascript">

        window.onload = function()
        {
            //var sBasePath = document.location.href.substring(0,document.location.href.lastIndexOf('update.php')) ;
            //var sBasePath = '/admin/views/page/update.php';
            //alert(sBasePath);
            var oFCKeditor3 = new FCKeditor( 'fullContent',"550", "350" ) ;
            oFCKeditor3.BasePath	= "/admin/fckeditor/"  ;
            oFCKeditor3.Config['CustomConfigurationsPath']='/admin/js/config.js';
            oFCKeditor3.ToolbarSet="Custom";
            oFCKeditor3.ReplaceTextarea() ;

        }
    </script>
<?php
require_once(ROOT.'/views/end.php');
?>