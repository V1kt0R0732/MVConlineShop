<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="/admin/template/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/admin/template/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/admin/template/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="/admin/template/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="/admin/template/assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
<div class="page-wrapper">
    <!-- START HEADER-->
    <header class="header">
        <div class="page-brand">
            <a class="link" href="index.html">
                    <span class="brand">Admin
                        <span class="brand-tip">CAST</span>
                    </span>
                <span class="brand-mini">AC</span>
            </a>
        </div>
        <div class="flexbox flex-1">
            <!-- START TOP-LEFT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                    <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                </li>
                <li>
                    <form class="navbar-search" action="javascript:;">
                        <div class="rel">
                            <span class="search-icon"><i class="ti-search"></i></span>
                            <input class="form-control" placeholder="Search here...">
                        </div>
                    </form>
                </li>
            </ul>
            <!-- END TOP-LEFT TOOLBAR-->
            <!-- START TOP-RIGHT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li class="dropdown dropdown-inbox">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                        <span class="badge badge-primary envelope-badge">9</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                        <li class="dropdown-menu-header">
                            <div>
                                <span><strong>9 New</strong> Messages</span>
                                <a class="pull-right" href="mailbox.html">view all</a>
                            </div>
                        </li>
                        <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                            <div>
                                <a class="list-group-item">
                                    <div class="media">
                                        <div class="media-img">
                                            <img src="/admin/template/assets/img/users/u1.jpg" />
                                        </div>
                                        <div class="media-body">
                                            <div class="font-strong"> </div>Jeanne Gonzalez<small class="text-muted float-right">Just now</small>
                                            <div class="font-13">Your proposal interested me.</div>
                                        </div>
                                    </div>
                                </a>
                                <a class="list-group-item">
                                    <div class="media">
                                        <div class="media-img">
                                            <img src="/admin/template/assets/img/users/u2.jpg" />
                                        </div>
                                        <div class="media-body">
                                            <div class="font-strong"></div>Becky Brooks<small class="text-muted float-right">18 mins</small>
                                            <div class="font-13">Lorem Ipsum is simply.</div>
                                        </div>
                                    </div>
                                </a>
                                <a class="list-group-item">
                                    <div class="media">
                                        <div class="media-img">
                                            <img src="/admin/template/assets/img/users/u3.jpg" />
                                        </div>
                                        <div class="media-body">
                                            <div class="font-strong"></div>Frank Cruz<small class="text-muted float-right">18 mins</small>
                                            <div class="font-13">Lorem Ipsum is simply.</div>
                                        </div>
                                    </div>
                                </a>
                                <a class="list-group-item">
                                    <div class="media">
                                        <div class="media-img">
                                            <img src="/admin/template/assets/img/users/u4.jpg" />
                                        </div>
                                        <div class="media-body">
                                            <div class="font-strong"></div>Rose Pearson<small class="text-muted float-right">3 hrs</small>
                                            <div class="font-13">Lorem Ipsum is simply.</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-notification">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span class="notify-signal"></span></i></a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                        <li class="dropdown-menu-header">
                            <div>
                                <span><strong>5 New</strong> Notifications</span>
                                <a class="pull-right" href="javascript:;">view all</a>
                            </div>
                        </li>
                        <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                            <div>
                                <a class="list-group-item">
                                    <div class="media">
                                        <div class="media-img">
                                            <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-13">4 task compiled</div><small class="text-muted">22 mins</small></div>
                                    </div>
                                </a>
                                <a class="list-group-item">
                                    <div class="media">
                                        <div class="media-img">
                                            <span class="badge badge-default badge-big"><i class="fa fa-shopping-basket"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-13">You have 12 new orders</div><small class="text-muted">40 mins</small></div>
                                    </div>
                                </a>
                                <a class="list-group-item">
                                    <div class="media">
                                        <div class="media-img">
                                            <span class="badge badge-danger badge-big"><i class="fa fa-bolt"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-13">Server #7 rebooted</div><small class="text-muted">2 hrs</small></div>
                                    </div>
                                </a>
                                <a class="list-group-item">
                                    <div class="media">
                                        <div class="media-img">
                                            <span class="badge badge-success badge-big"><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-13">New user registered</div><small class="text-muted">2 hrs</small></div>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                        <img src="/admin/images/user/<?=$_SESSION['user_avatar']?>" />
                        <span></span>Admin<i class="fa fa-angle-down m-l-5"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/admin/user/profile"><i class="fa fa-user"></i>Profile</a>
                        <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>
                        <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a>
                        <li class="dropdown-divider"></li>
                        <a class="dropdown-item" href="/admin/user/exit"><i class="fa fa-power-off"></i>Logout</a>
                    </ul>
                </li>
            </ul>
            <!-- END TOP-RIGHT TOOLBAR-->
        </div>
    </header>
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
    <nav class="page-sidebar" id="sidebar">
        <div id="sidebar-collapse">
            <div class="admin-block d-flex">
                <div>
                    <img src="/admin/images/user/<?=$_SESSION['user_avatar']?>" width="45px" >
                </div>
                <div class="admin-info">
                    <div class="font-strong"><?=$_SESSION['user_name']?></div><small><?=$_SESSION['user_status']?></small></div>
            </div>
            <ul class="side-menu metismenu">
<!--                <li>-->
<!--                    <a class="active" href="index.html"><i class="sidebar-item-icon fa fa-th-large"></i>-->
<!--                        <span class="nav-label">Dashboard</span>-->
<!--                    </a>-->
<!--                </li>-->
                <li class="heading">Currency</li>
                <li>
                    <a href="/admin/valuta/change">
                        <i class="sidebar-item-icon fa fa-euro"></i>
                        <span class="nav-label">Change</span>
                    </a>
                </li>

                <li class="heading">Catalog</li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-shopping-basket"></i>
                        <span class="nav-label">Products</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="/admin/productAll">All</a>
                        </li>
                        <li>
                            <a href="/admin/product/add">Add</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-shopping-bag"></i>
                        <span class="nav-label">Categories</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="/admin/catAll">All</a>
                        </li>
                        <li>
                            <a href="/admin/cat/add">Add</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="/admin/product/popular">
                        <i class="sidebar-item-icon fa fa-search"></i>
                        <span class="nav-label">Top 3</span>
                    </a>
                </li>
                <li class="heading">Orders</li>
                <li>
                    <a href="/admin/order/list">
                        <i class="sidebar-item-icon fa fa-dollar"></i>
                        <span class="nav-label">All Orders</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/order/archiv/list">
                        <i class="sidebar-item-icon fa fa-folder"></i>
                        <span class="nav-label">Архив</span>
                    </a>
                </li>
                <li class="heading">Clients</li>
                <li>
                    <a href="/admin/clients/list">
                        <i class="sidebar-item-icon fa fa-users"></i>
                        <span class="nav-label">All Clients</span>
                    </a>
                </li>

                <?php if($_SESSION['user_status'] == "Owner"){ ?>
                <li class="heading">User</li>
                <li>
                    <a href="/admin/user/all">
                        <i class="sidebar-item-icon fa fa-users"></i>
                        <span class="nav-label">All Users</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/user/reg">
                        <i class="sidebar-item-icon fa fa-user-plus"></i>
                        <span class="nav-label">Add User</span>
                    </a>
                </li>
                <li class="heading">Setting Page</li>
                <li>
                    <a href="/admin/page/list">
                        <i class="sidebar-item-icon fa fa-gear"></i>
                        <span class="nav-label">List</span>
                    </a>
                </li>
                <?php } ?>
<!--
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Basic UI</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="colors.html">Colors</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="panels.html">Panels</a>
                        </li>
                        <li>
                            <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="tabs.html">Tabs</a>
                        </li>
                        <li>
                            <a href="alerts_tooltips.html">Alerts &amp; Tooltips</a>
                        </li>
                        <li>
                            <a href="badges_progress.html">Badges &amp; Progress</a>
                        </li>
                        <li>
                            <a href="lists.html">List</a>
                        </li>
                        <li>
                            <a href="cards.html">Card</a>
                        </li>
                        <li>
                            <a href="admin/categories/add">Cat Add</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                        <span class="nav-label">Forms</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="form_basic.html">Basic Forms</a>
                        </li>
                        <li>
                            <a href="form_advanced.html">Advanced Plugins</a>
                        </li>
                        <li>
                            <a href="form_masks.html">Form input masks</a>
                        </li>
                        <li>
                            <a href="form_validation.html">Form Validation</a>
                        </li>
                        <li>
                            <a href="text_editors.html">Text Editors</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                        <span class="nav-label">Tables</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="table_basic.html">Basic Tables</a>
                        </li>
                        <li>
                            <a href="datatables.html">Datatables</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                        <span class="nav-label">Charts</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="charts_flot.html">Flot Charts</a>
                        </li>
                        <li>
                            <a href="charts_morris.html">Morris Charts</a>
                        </li>
                        <li>
                            <a href="chartjs.html">Chart.js</a>
                        </li>
                        <li>
                            <a href="charts_sparkline.html">Sparkline Charts</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-map"></i>
                        <span class="nav-label">Maps</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="maps_vector.html">Vector maps</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="icons.html"><i class="sidebar-item-icon fa fa-smile-o"></i>
                        <span class="nav-label">Icons</span>
                    </a>
                </li>
                <li class="heading">PAGES</li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                        <span class="nav-label">Mailbox</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="mailbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="mail_view.html">Mail view</a>
                        </li>
                        <li>
                            <a href="mail_compose.html">Compose mail</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                        <span class="nav-label">Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                        <span class="nav-label">Pages</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="invoice.html">Invoice</a>
                        </li>
                        <li>
                            <a href="profile.html">Profile</a>
                        </li>
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="lockscreen.html">Lockscreen</a>
                        </li>
                        <li>
                            <a href="forgot_password.html">Forgot password</a>
                        </li>
                        <li>
                            <a href="error_404.html">404 error</a>
                        </li>
                        <li>
                            <a href="error_500.html">500 error</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                        <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="javascript:;">Level 2</a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="javascript:;">Level 3</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Level 3</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        -->
    </nav>
    <!-- END SIDEBAR-->