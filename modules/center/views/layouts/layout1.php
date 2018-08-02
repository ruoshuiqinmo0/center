<?php
use yii\helpers\Url;
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>计费系统</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="http://m.legstem.com/Public/Edu/img/user01.png">
    <link rel="apple-touch-icon-precomposed" href="assets/center/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/center/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/center/css/admin.css">
    <link rel="stylesheet" href="assets/center/css/app.css">
</head>

<body data-type="generalComponents">
<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <a href="#" class="tpl-logo">
            计费中心
        </a>
    </div>
    <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
        <span class="am-sr-only">导航切换</span>
        <span class="am-icon-bars"></span>
    </button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="tpl-header-list-user-nick"></span><span class="tpl-header-list-user-ico"> </span>
                </a>
            </li>
            <li>

                <a href="<?php echo yii\helpers\Url::to(['login/layout']);?>">
                    <span class="am-icon-sign-out tpl-header-list-ico-out-size"></span>
                    退出
                </a>
            </li>
        </ul>
    </div>
</header>
<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <li class="tpl-left-nav-item">
                    <a href=""    class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-home"></i>
                    <span>首页</span>
                    </a>
                </li>
                <li class="tpl-left-nav-item">
                    <!-- 打开状态 a 标签添加 active 即可   -->
                    <a href="<?php echo Url::to(['product/index'])?>"  class="nav-link tpl-left-nav-link-list  <?php if(\Yii::$app->controller->id == 'product'){echo 'active';}?>">
                    <i class="am-icon-wrench"></i>
                    <span>产品管理</span>
                    <!-- 列表打开状态的i标签添加 tpl-left-nav-more-ico-rotate 图表即90°旋转  -->
                    </a>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="javascript:void(0)" class="nav-link tpl-left-nav-link-list" >
                        <i class="am-icon-wpforms"></i>
                        <span>收益查询</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu" >
                        <li>
                            <!-- 打开状态 a 标签添加 active 即可   -->
                            <a href="<?php echo Url::to(['developer/income'])?>" >
                                <i class="am-icon-angle-right"></i>
                                <span>开发者收益</span>
                                <i class=" tpl-left-nav-content-ico am-fr am-margin-right"></i>
                            </a>

                            <a href="<?php echo Url::to(['developer/liveTime'])?>">
                                <i class="am-icon-angle-right"></i>
                                <span>开发者收益实时查询</span>
                                <i class=" tpl-left-nav-content-ico am-fr am-margin-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="<?php echo Url::to(['datum/download'])?>" class="nav-link tpl-left-nav-link-list" >
                        <i class="am-icon-wpforms"></i>
                        <span>下载</span>

                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php echo $content;?>
    </div>





