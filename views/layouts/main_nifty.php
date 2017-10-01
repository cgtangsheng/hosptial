<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use app\assets\CleverTabAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
CleverTabAsset::register($this);
$user = \Yii::$app->user->identity;
$cookies = Yii::$app->request->cookies;
$theme = $cookies->getValue('wms3_theme') ? $cookies->getValue('wms3_theme') : "dark";
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>


        <!--STYLESHEET-->
        <!--=================================================-->

        <!--Open Sans Font [ OPTIONAL ] -->
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet"> -->

        <!-- Theme -->
        <link rel="stylesheet" type="text/css" href="/css/themes/type-c/theme-<?= $theme ?>.min.css">

        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <!-- <link href="/css/bootstrap.min.css" rel="stylesheet"> -->


        <!--Nifty Stylesheet [ REQUIRED ]-->
        <!-- <link href="/css/nifty.min.css" rel="stylesheet"> -->


        <!--Font Awesome [ OPTIONAL ]-->
        <!-- <link href="/css/font-awesome.min.css" rel="stylesheet"> -->




        <!--SCRIPT-->
        <!--=================================================-->

        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <!-- <link href="/css/pace.min.css" rel="stylesheet"> -->
        <!-- <script src="/js/pace.min.js"></script> -->



        <!--
    
        REQUIRED
        You must include this in your project.
    
        RECOMMENDED
        This category must be included but you may modify which plugins or components which should be included in your project.
    
        OPTIONAL
        Optional plugins. You may choose whether to include it in your project or not.
    
    
        Detailed information and more samples can be found in the document.
    
        -->

        <style type="text/css">
            #content-container {padding-bottom: 0;}
            #tab-content {padding: 0 0 0 41px;}

            .menu-popover .sub-menu {margin-left: 5px;}
            .multi-cols .col-menu {
                width: auto;
                float: left;
            }
            .multi-cols .col-menu ul li>a {
                padding: 3px 0;
            }
            .multi-cols .col-menu ul li>a:hover {
                padding-left: 5px;
            }
            #container.mainnav-sm #mainnav .mainnav-widget>.show-small a {
                padding: 0;
            }
            #container.mainnav-sm #mainnav .mainnav-widget>.show-small a .icon {
                padding: 14px 0 10px 30px;
            }
            #container.mainnav-sm #mainnav .mainnav-widget>.show-small a .text {
                font-size: 14px;
            }
            .mainnav-widget-content {padding: 15px 10px 10px 10px;}
            .col-menu li:first-child {
                margin-bottom: 10px;
            }
            .col-menu li {
                font-size: 14px;
            }
            body .brand-icon {
                text-align: center;
                color: #DDD;
                text-shadow: 0 2px 3px #333;
            }
            body #container {height: 1px;}
            .first-class {
                color: black;
                border: WindowFrame;
                text-align: center;
                padding-top: 15px;
            }
            .second-class{
                color: grey;
                border: WindowFrame;
                text-align: center;
                padding-top :3px;
            }
            .clever-tab-content {padding: 17px 0 0 0;}
        </style>

    </head>

    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

    <body>

<?php $this->beginBody() ?>

        <div id="container" class="effect mainnav-sm">

            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">

                    <!--Brand logo & name-->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="<?php echo Yii::$app->homeUrl ?>" class="navbar-brand">
                            <div class="brand-icon"><strong>医疗管家</strong></div>
                            <!-- <img src="/img/logo.png" alt="WMS" class="brand-icon"> -->
                            <!-- <div class="brand-title">
                                <span class="brand-text">WMS 3.0</span>
                            </div> -->
                        </a>
                    </div>
                    <!--================================-->
                    <!--End brand logo & name-->


                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <div class="navbar-content clearfix">
                        <!-- <ul class="nav navbar-top-links pull-left">

                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#">
                                    <i class="fa fa-navicon fa-lg"></i>
                                </a>
                            </li>


                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-envelope fa-lg"></i>
                                    <span class="badge badge-header badge-warning">9</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-md with-arrow">
                                    <div class="pad-all bord-btm">
                                        <p class="text-lg text-muted text-thin mar-no">You have 3 messages.</p>
                                    </div>
                                    <div class="nano scrollable">
                                        <div class="nano-content">
                                            <ul class="head-list">
                                        
                                                <li>
                                                    <a href="#" class="media">
                                                        <div class="media-left">
                                                            <img src="/img/av2.png" alt="Profile Picture" class="img-circle img-sm">
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">Andy sent you a message</div>
                                                            <small class="text-muted">15 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                        
                                                <li>
                                                    <a href="#" class="media">
                                                        <div class="media-left">
                                                            <img src="/img/av4.png" alt="Profile Picture" class="img-circle img-sm">
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">Lucy sent you a message</div>
                                                            <small class="text-muted">30 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="pad-all bord-top">
                                        <a href="#" class="btn-link text-dark box-block">
                                            <i class="fa fa-angle-right fa-lg pull-right"></i>Show All Messages
                                        </a>
                                    </div>
                                </div>
                            </li>




                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-bell fa-lg"></i>
                                    <span class="badge badge-header badge-danger">5</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-md with-arrow">
                                    <div class="pad-all bord-btm">
                                        <p class="text-lg text-muted text-thin mar-no">You have 3 messages.</p>
                                    </div>
                                    <div class="nano scrollable">
                                        <div class="nano-content">
                                            <ul class="head-list">

                                                <li>
                                                    <a href="#">
                                                        <div class="clearfix">
                                                            <p class="pull-left">Progressbar</p>
                                                            <p class="pull-right">70%</p>
                                                        </div>
                                                        <div class="progress progress-sm">
                                                            <div style="width: 70%;" class="progress-bar">
                                                                <span class="sr-only">70% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                        
                                                <li>
                                                    <a href="#" class="media">
                                                        <div class="media-left">
                                                            <span class="icon-wrap icon-circle bg-primary">
                                                                <i class="fa fa-comment fa-lg"></i>
                                                            </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">Circle Icon</div>
                                                            <small class="text-muted">15 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                        
                                                <li>
                                                    <a href="#" class="media">
                                                <span class="badge badge-success pull-right">90%</span>
                                                        <div class="media-left">
                                                            <span class="icon-wrap icon-circle bg-danger">
                                                                <i class="fa fa-hdd-o fa-lg"></i>
                                                            </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">Circle icon with badge</div>
                                                            <small class="text-muted">50 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                        
                                                <li>
                                                    <a href="#" class="media">
                                                        <div class="media-left">
                                                            <span class="icon-wrap bg-info">
                                                                <i class="fa fa-file-word-o fa-lg"></i>
                                                            </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">Square Icon</div>
                                                            <small class="text-muted">Last Update 8 hours ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                        
                                                <li>
                                                    <a href="#" class="media">
                                                <span class="label label-danger pull-right">New</span>
                                                        <div class="media-left">
                                                            <span class="icon-wrap bg-purple">
                                                                <i class="fa fa-comment fa-lg"></i>
                                                            </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">Square icon with label</div>
                                                            <small class="text-muted">Last Update 8 hours ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="pad-all bord-top">
                                        <a href="#" class="btn-link text-dark box-block">
                                            <i class="fa fa-angle-right fa-lg pull-right"></i>Show All Notifications
                                        </a>
                                    </div>
                                </div>
                            </li>



                            <li class="mega-dropdown">
                                <a href="#" class="mega-dropdown-toggle">
                                    <i class="fa fa-th-large fa-lg"></i>
                                </a>
                                <div class="dropdown-menu mega-dropdown-menu">
                                    <div class="clearfix">
                                        <div class="col-sm-12 col-md-3">

                                            <div class="text-center bg-purple pad-all">
                                                <h3 class="text-thin mar-no">Weekend shopping</h3>
                                                <div class="pad-ver box-inline">
                                                    <span class="icon-wrap icon-wrap-lg icon-circle bg-trans-light">
                                                        <i class="fa fa-shopping-cart fa-4x"></i>
                                                    </span>
                                                </div>
                                                <p class="pad-btm">
                                                    Members get <span class="text-lg text-bold">50%</span> more points. Lorem ipsum dolor sit amet!
                                                </p>
                                                <a href="#" class="btn btn-purple">Learn More...</a>
                                            </div>

                                        </div>
                                        <div class="col-sm-4 col-md-3">

                                            <ul class="list-unstyled">
                                                <li class="dropdown-header">Pages</li>
                                                <li><a href="#">Profile</a></li>
                                                <li><a href="#">Search Result</a></li>
                                                <li><a href="#">FAQ</a></li>
                                                <li><a href="#">Sreen Lock</a></li>
                                                <li><a href="#" class="disabled">Disabled</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Icons</li>
                                                <li><a href="#"><span class="pull-right badge badge-purple">479</span> Font Awesome</a></li>
                                                <li><a href="#">Skycons</a></li>
                                            </ul>

                                        </div>
                                        <div class="col-sm-4 col-md-3">

                                            <ul class="list-unstyled">
                                                <li class="dropdown-header">Mailbox</li>
                                                <li><a href="#"><span class="pull-right label label-danger">Hot</span>Indox</a></li>
                                                <li><a href="#">Read Message</a></li>
                                                <li><a href="#">Compose</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Featured</li>
                                                <li><a href="#">Smart navigation</a></li>
                                                <li><a href="#"><span class="pull-right badge badge-success">6</span>Exclusive plugins</a></li>
                                                <li><a href="#">Lot of themes</a></li>
                                                <li><a href="#">Transition effects</a></li>
                                            </ul>

                                        </div>
                                        <div class="col-sm-4 col-md-3">

                                            <ul class="list-unstyled">
                                                <li class="dropdown-header">Components</li>
                                                <li><a href="#">Tables</a></li>
                                                <li><a href="#">Charts</a></li>
                                                <li><a href="#">Forms</a></li>
                                                <li class="divider"></li>
                                                <li>
                                                    <form role="form" class="form">
                                                        <div class="form-group">
                                                            <label class="dropdown-header" for="demo-megamenu-input">Newsletter</label>
                                                            <input id="demo-megamenu-input" type="email" placeholder="Enter email" class="form-control">
                                                        </div>
                                                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul> -->

                        <ul class="nav navbar-top-links pull-right">

                            <!--Language selector-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="dropdown">
                                <a class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="lang-selected">
                                        <img class="lang-flag" src="/img/flags/united-kingdom.png" alt="English">
                                        <span class="lang-id">EN</span>
                                        <span class="lang-name">English</span>
                                    </span>
                                </a>

                                <!--Language selector menu-->
                                <ul class="head-list dropdown-menu with-arrow">
                                    <li>
                                        <!--English-->
                                        <a href="#" class="active">
                                            <img class="lang-flag" src="/img/flags/united-kingdom.png" alt="English">
                                            <span class="lang-id">EN</span>
                                            <span class="lang-name">English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <!--France-->
                                        <a href="#">
                                            <img class="lang-flag" src="/img/flags/france.png" alt="France">
                                            <span class="lang-id">FR</span>
                                            <span class="lang-name">Fran&ccedil;ais</span>
                                        </a>
                                    </li>
                                    <li>
                                        <!--Germany-->
                                        <a href="#">
                                            <img class="lang-flag" src="/img/flags/germany.png" alt="Germany">
                                            <span class="lang-id">DE</span>
                                            <span class="lang-name">Deutsch</span>
                                        </a>
                                    </li>
                                    <li>
                                        <!--Italy-->
                                        <a href="#">
                                            <img class="lang-flag" src="/img/flags/italy.png" alt="Italy">
                                            <span class="lang-id">IT</span>
                                            <span class="lang-name">Italiano</span>
                                        </a>
                                    </li>
                                    <li>
                                        <!--Spain-->
                                        <a href="#">
                                            <img class="lang-flag" src="/img/flags/spain.png" alt="Spain">
                                            <span class="lang-id">ES</span>
                                            <span class="lang-name">Espa&ntilde;ol</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End language selector-->



                            <!--User dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right">
                                        <img class="img-circle img-user media-object" src="/img/av1.png" alt="Profile Picture">
                                    </span>
                                    <div class="username hidden-xs"><?php echo \Yii::$app->user->isGuest ? '未登录' : $user->username ?></div>
                                </a>


                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">

                                    <!-- Dropdown heading  -->
                                    <div class="pad-all bord-btm">
                                        <p class="text-lg text-muted text-thin mar-btm">750Gb of 1,000Gb Used</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar" style="width: 70%;">
                                                <span class="sr-only">70%</span>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- User dropdown menu -->
                                    <ul class="head-list">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user fa-fw fa-lg"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="badge badge-danger pull-right">9</span>
                                                <i class="fa fa-envelope fa-fw fa-lg"></i> Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label label-success pull-right">New</span>
                                                <i class="fa fa-gear fa-fw fa-lg"></i> Settings
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Dropdown footer -->
                                    <div class="pad-all text-right">
                                        <?php
                                        $form = ActiveForm::begin([
                                                    'id' => 'logout-form',
                                                    'action' => yii\helpers\Url::to('/site/logout'),
                                                    'method' => 'post',
                                                    'options' => [],
                                                ])
                                        ?>
                                        <?= Html::submitButton('<i class="fa fa-sign-out fa-fw"></i> Logout', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end() ?>
                                    </div>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End user dropdown-->

                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->

                </div>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->

            <div class="boxed">

                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!-- <div id="page-title">
                        <h1 class="page-header text-overflow">Collapsed Navigation</h1>

                        <div class="searchbox">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search..">
                                <span class="input-group-btn">
                                    <button class="text-muted" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li class="active">Data</li>
                    </ol> -->

                    <div id="tab-content">
                        <div id="tabs" style="padding-bootom:0"><ul></ul></div>
                    </div>

                    <!--Page content-->
                    <!--===================================================-->
                    <!-- <div id="page-content"> -->


                    <!-- QUICK TIPS -->
                    <!-- ==================================================================== -->
<?php // echo $content  ?>
                    <!-- ==================================================================== -->
                    <!-- END QUICK TIPS -->



                    <!-- </div> -->
                    <!--===================================================-->
                    <!--End page content-->


                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->



                <!--MAIN NAVIGATION-->
                <!--===================================================-->
                <nav id="mainnav-container">
                    <div id="mainnav">

                        <!--================================-->
                        <!--End shortcut buttons-->


                        <!--Menu-->
                        <!--================================-->
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content" style="background-color: white">
                                    <div class="sub-menu"></div>

                                    <?php
                                    $instance = new \app\components\FormatMenu();
                                    $menus = $instance->getAssignMenuFromCache();
                                    $idx = 1;
                                    ?>
                                    <dl class="col-menu">
                                    <?php foreach ($menus as $label => $menuLv1): ?>
                                        <dt class="first-class"><?php echo $label?></dt>
                                        <?php foreach ($menuLv1['menus'] as $label2 => $menuLv2): ?>
                                        <!--Submenu-->
                                            <dd class="second-class">
                                                <a href=<?php echo $menuLv2["url"];?>><?php echo $label2?></a>
                                            </dd>

                                        <?php endforeach ?>
                                    </dl>
                                        <?php $idx++; ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <!--================================-->
                        <!--End menu-->

                    </div>
                </nav>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->

                <!--ASIDE-->
                <!--===================================================-->
                <aside id="aside-container">
                    <div id="aside">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Nav tabs-->
                                <!--================================-->
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="active">
                                        <a href="#demo-asd-tab-1" data-toggle="tab">
                                            <i class="fa fa-comments"></i>
                                            <span class="badge badge-purple">7</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#demo-asd-tab-2" data-toggle="tab">
                                            <i class="fa fa-info-circle"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#demo-asd-tab-3" data-toggle="tab">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#demo-asd-tab-4" data-toggle="tab">
                                            <i class="fa fa-shield"></i>
                                            <span class="label label-success">New</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--================================-->
                                <!--End nav tabs-->



                                <!-- Tabs Content -->
                                <!--================================-->
                                <div class="tab-content">

                                    <!--First tab-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <div class="tab-pane fade in active" id="demo-asd-tab-1">
                                        <h4 class="pad-hor text-thin">
                                            First tab
                                        </h4>
                                        <div class="pad-all">

                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                            ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate
                                            velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                            et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

                                        </div>

                                    </div>
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--End first tab-->


                                    <!--Second tab-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <div class="tab-pane fade" id="demo-asd-tab-2">
                                        <h4 class="pad-hor text-thin">
                                            Second tab
                                        </h4>
                                        <div class="pad-all">

                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                            ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate
                                            velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                            et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

                                        </div>
                                    </div>
                                    <!--End second tab-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


                                    <!--Third tab-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <div class="tab-pane fade" id="demo-asd-tab-3">
                                        <h4 class="pad-hor text-thin">
                                            Third tab
                                        </h4>
                                        <div class="pad-all">

                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                            ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate
                                            velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                            et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

                                        </div>

                                    </div>
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--Third tab-->

                                    <!--Fourth tab-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <div class="tab-pane fade" id="demo-asd-tab-4">
                                        <h4 class="pad-hor text-thin">
                                            Fourth tab
                                        </h4>
                                        <div class="pad-all">

                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                            ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate
                                            velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                            et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

                                        </div>

                                    </div>
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--Third tab (Settings)-->

                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--===================================================-->
                <!--END ASIDE-->

            </div>




            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->



        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

<script type="text/javascript">
    function getFrameHeight() {
        return $("#container").height() - $("#tabs ul:first").height() - $('#content-container').css('paddingTop').replace('px', '');
        // $('#content-container').css('paddingBottom').replace('px', '') - 50;
    }

    function setFrameHeight(id) {
        $("#" + id).height(getFrameHeight());
    }

    var tabs, tmpCount = 0;

    $(function() {
        function resetMainContentHeight() {
            $("div.content-container:first").height(
                    $("body:first").height() - $("div.navbar:first").height()
                    );
        }

        tabs = $('#tabs').cleverTabs();
        $(window).bind('resize', function() {
            //当发生window.resize事件时，重新默认的tabs的PanelContainer的大小
            resetMainContentHeight();
            tabs.resizePanelContainer();
            $("#tabs iframe").height(getFrameHeight());
        });

        $(".col-menu ul li a").eq(0).trigger("click");
        $('.')
    });

    function addadd(url, title) {
        if (!title || !url) {
            return;
        }
        tabs.add({
            url: url,
            label: title
        });
    }

    $(".col-menu ul li a").click(function(e) {
        var title = $(this).text();
        var url = $(this).attr("href");
        e.preventDefault();
        addadd(url, title);

    });


</script>
