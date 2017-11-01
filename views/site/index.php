<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- 屏幕宽度 && 放大比例 && minimal-ui Safari 网页加载时隐藏地址栏与导航栏-->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-
	scale=1,maximum-scale=1,user-scalable=0,minimal-ui">
    <!-- safari私有meta标签，允许全屏模式浏览 -->
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <!-- ios系统的私有标签，它指定在web app状态下，ios设备中顶端的状态条的颜色 -->
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <!-- 设备浏览网页时对数字不启用电话功能 -->
    <meta content="telephone=no,email=no" name="format-detectPion" />
    <title>Jiuchacha</title>
    <link rel="stylesheet" href="/css/client/css/common.css">
    <!-- 自适应样式单 -->
    <link rel="stylesheet" href="/css/client/css/adaptive.css">
    <!-- 加载前动画样式 -->
    <link rel="stylesheet" href="/css/client/css/loading.css">
    <link rel="stylesheet" href="/css/client/css/index.css">
    <!-- 移动端滑动&轮播框架 -->
    <script src="/js/ready.js"></script>
    <script src="/js/swipe.js"></script>
    <script type="text/javascript">
        /* loading ready */
        document.ready(function(){
            document.getElementById("loading").style.display = "none";
        });
    </script>
    <style type="text/css">
        .nav-header{
            /*background: url("/img/client/banner-3.jpeg") no-repeat;*/
            background-color: #00dd1c;
            width: 100%;
            height: 30%;
            margin-bottom: 10px;
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            justify-content: center;
            text-align: center;

        }
        .nav-avatar{
            width: 80%;
        }
    </style>
</head>
<body>
<!-- loading -->
<div id="loading" style="height:100%;">
    <div class="spinner" >
        <div class="spinner-container container1">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
        <div class="spinner-container container2">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
        <div class="spinner-container container3">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
    </div>
</div>

<!-- all content  -->
<div class="wrapper" id="content">
    <!-- header start -->
    <div class="header">
        <!-- 绝对定位的logo -->
        <div class="logo">
            <a href="/" title="爱多多健康管家" class="home">
                <span>私人医生管家</span>
            </a>
        </div>
        <!-- 占据高度DIV -->
        <div class="tit"></div>
        <!-- 绝对定位的右侧个人中心 && 购物车-->
        <div class="right">
            <ul>
                <li class="user">
                    <a href="/user/center/index" title="个人中心">
                        <span class="icon icon-gerenzhongxin"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- header end -->
    <!-- banner start -->
    <div class="nav-wrap nav-header">
        <div class="nav-avatar">
            <img src="/img/avater.png" width="20%" height="50%" >
        </div>
    </div>
    <!-- banner end -->
    <!-- menu start -->
    <div class="nav-wrap nav-index">
        <div id="slider_nav" class="swipe-new">
            <div class="swipe-wrap">

                <div>
                    <ul>
                        <li>
                            <a href="category.html" data-log="B0-#/product/category" data-stat-id="2c1ee89f7411236e"><span class="icon icon-quanbushangpin"></span><span class="t"><span>资讯</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="/search/index" data-log="B1-#/search" data-stat-id="4be0bd1e89e75509" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-4be0bd1e89e75509', '#/search', 'pcpid']);">
                                <span class="icon icon-sousuo">
                                </span><span class="t">
                                    <span>搜索</span></span>
                            </a>
                        </li>
                        <li><a href="http://127.0.0.1:8001/" data-log="B2-http://m.xiaomi.cn/" data-stat-id="edfd3e1d45a48ac3" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-edfd3e1d45a48ac3', 'http://m.xiaomi.cn/', 'pcpid']);"><span class="icon icon-shequ"></span><span class="t"><span>社区</span></span></a></li>
                    </ul>
                </div>

                <div data-index="1">
                    <ul>
                        <li><a href="/health/index" data-log="B0-#/health" data-stat-id="b2173beffbc2a4b5" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-b2173beffbc2a4b5', '#/health', 'pcpid']);">
                                <span class="icon icon-health"><img src="/img/client/check.png" width="100%"></span>
                                <span class="t"><span>健康自检</span></span>
                            </a>
                        </li>
                        <li><a href="/search/index" data-log="B1-#/fcode" data-stat-id="90f2ce1fecd81997" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-90f2ce1fecd81997', '#/fcode', 'pcpid']);">
                                <span class="icon icon-fcode">
                                </span><span class="t"><span>xxxxx</span></span>
                            </a>
                        </li>
                        <li><a href="http://127.0.0.1:8001" data-log="B2-#/recharge/productlist" data-stat-id="a1bc230f9e518de9" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-a1bc230f9e518de9', '#/recharge/productlist', 'pcpid']);">
                                <span class="icon icon-huafeichongzhi"></span>
                                <span class="t"><span>xxxxxx</span></span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- menu end -->

    <!-- title start -->
    <div class="title"><span>健康小贴士</span></div>
    <!-- title end -->

    <!-- part one start -->
    <div class="card show_big">
        <div class="col2">
            <div class="row2 mg-bor-right">
                <a data-log="C0-http://s1.mi.com/m/product/mi4/index.html" class="img" href="http://s1.mi.com/m/product/mi4/index.html" data-stat-id="41ab0f5315c23fba" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-41ab0f5315c23fba', 'javascript:;', 'pcpid']);"><span class="imgurl"><img src="http://i3.mifile.cn/a4/T1FRZ_BQWT1RXrhCrK.jpg"></span></a>
            </div>
            <div class="rows">
                <div class="row1">
                    <a data-log="C1-http://s1.mi.com/m/product/mitv48/index.html" class="img" href="http://s1.mi.com/m/product/mitv48/index.html" data-stat-id="6ca6a79fc10599dd" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-6ca6a79fc10599dd', 'javascript:;', 'pcpid']);"><span class="imgurl"><img src="http://i3.mifile.cn/a4/T1hoKvB5xv1RXrhCrK.jpg"></span></a>
                </div>
                <div class="row1 mg-bor-no-left mg-bor-top">
                    <a data-log="C2-http://s1.mi.com/m/product/minotetop/index.html?0804" class="img" href="http://s1.mi.com/m/product/minotetop/index.html?0804" data-stat-id="6ca6a79fc10599dd" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-6ca6a79fc10599dd', 'javascript:;', 'pcpid']);"><span class="imgurl"><img data="http://i3.mifile.cn/a4/T17lLvBXDv1RXrhCrK.jpg" src="http://i3.mifile.cn/a4/T17lLvBXDv1RXrhCrK.jpg"></span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- more start -->
    <div class="col1 more">
        <a href="/v2.html#/product/category" data-stat-id="916259ec7bf4348f" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-916259ec7bf4348f', '/v2.html#/product/category', 'pcpid']);">
            <span>查看更多配件&nbsp;&gt;</span>
        </a>
    </div>
    <!-- more end -->

    <!-- footer start -->
    <div class="footer">
        <div class="tip">
            <a href="http://www.mi.com/?mobile" class="goDesktop" data-stat-id="8d858a68b4b01291" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-8d858a68b4b01291', 'http://www.mi.com/', 'pcpid']);"><span>切换到电脑版</span></a>
        </div>
        <div class="links">
            <a href="http://p.www.xiaomi.com/m/huodong/page/2013/0922/index.html" data-stat-id="ab305527e5d218c8" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-ab305527e5d218c8', 'http://p.www.xiaomi.com/m/huodong/page/2013/0922/index.html', 'pcpid']);"><span class="linksBtn">立即下载</span><p><strong>小米商城客户端</strong><span>与米粉交朋友</span></p></a>
        </div>
    </div>
    <!-- footer end -->

    <script type="text/javascript">
        var bottom = document.getElementById("bottomNav").getElementsByTagName("span");
        // 轮播&滑动事件
        var slider = Swipe(document.getElementById('slider_nav'), {
            continuous: true,  //无限循环的图片切换效果
            disableScroll: true,  //阻止由于触摸而滚动屏幕
            stopPropagation: false,  //停止滑动事件
        });

        var sliderBanner = Swipe(document.getElementById('slider'), {
            auto: 2500,
            continuous: true,
            disableScroll: false,
            stopPropagation: false,
            callback: function(index){
                if(index%2){
                    bottom[0].className = "";
                    bottom[1].className = "on";
                }
                else{
                    bottom[0].className = "on";
                    bottom[1].className = "";
                }
            },  //回调函数，切换时触发
        });
    </script>
</div>
</body>
</html>