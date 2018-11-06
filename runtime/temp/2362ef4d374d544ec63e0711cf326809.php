<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\phpStudy\WWW\zcgj\public/../application/index\view\goods\activate.html";i:1541125891;s:59:"D:\phpStudy\WWW\zcgj\application\index\view\common\top.html";i:1541125160;s:62:"D:\phpStudy\WWW\zcgj\application\index\view\common\bottom.html";i:1541122096;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>全部分类</title>
    <link rel="stylesheet" href="/static/ace/css/common.css" />
    <link rel="stylesheet" href="/static/ace/css/zhongyu.css" />
    <link rel="stylesheet" href="/static/ace/css/bootstrap.css" />
    <link rel="stylesheet" href="/static/ace/css/store.css" />
    <link rel="stylesheet" href="/static/ace/css/item.css" />
</head>
<body>
<!--头部-->
<div class="top_nav">
    <div class="container clearfix">
        <div class="top_nav_l">
            <img src="/static/ace/img/logo_zc.png"/>
        </div>
        <ul class="top_nav_r clearfix">
            <li><a href="#">首页</a></li>
            <li><a href="#">众成商城</a></li>
            <li><a href="#">交易中心</a></li>
            <li><a href="#">中心矿机</a></li>
        </ul>
        <div class="accout">
            <span>ZC</span>
            张三
            <div class="accout_menu">
                <p><a href="#">会员中心</a></p>
                <p><a href="#">退出登录</a></p>
            </div>
        </div>
    </div>
</div>
<!--商城导航栏-->
<div class="store_nav">
    <div class="store_nav_box">
        <ul class="store_nav_r">
            <li><a href="store.html">商城首页</a></li>
            <li><a href="allSale.html">全部分类</a></li>
            <li><a href="activate.html">激活券</a></li>
            <li><a href="discounts.html">优惠专区</a></li>
            <li><a href="feature.html">特色专区</a></li>
        </ul>
        <div>
            <input type="text" id="search">
            <button type="button" class="search_btn" onclick="searchBtn()">搜索</button>
        </div>
    </div>
</div>
<!---->


<main>
    <!--banner图-->
    <div id="myCarousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="/static/ace/img/banner1.png" alt="First slide">
            </div>
            <div class="item">
                <img src="/static/ace/img/banner1.png" alt="Second slide">
            </div>
            <div class="item">
                <img src="/static/ace/img/banner1.png" alt="Third slide">
            </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="cabinet_head">
        <div>
            <label>激活</label>
            <p>激活券</p>
            <span>BEST</span>
        </div>
        <span>激活会员需要购买激活券哦！</span>
    </div>
    <div class="activate_box">
        <div class="ticket">
            <div class="ticket_head">
                <span>激活券</span>
                <img src="/static/ace/img/rmb.png">
            </div>
            <p>第一次激活需要1张激活券，重新激活需要2张</p>
        </div>
        <div class="ticket_price">
            <p>
                售价：
                <span>200 积分</span>
            </p>
            <button type="button" onclick="ticket()">立即购买</button>
        </div>
    </div>
</main>


		<!--底部-->
		<div class="foot">
			<img src="/static/ace/img/logo_zc.png" class="foot_img" />
			<div class="foot_b">@2018.zhongchengguoji</div>
		</div>
		<!--优惠券-->
		<div class="coupon">
			<img src="/static/ace/img/yhq.png" class="yhq"/>
			<img src="/static/ace/img/close.png" class="cls" onclick="cls()"/>
		</div>
		<div class="mask"></div>
	</body>
	<script>
		setNav(0);
		function cls(){
			$('.coupon,.mask').hide();
		}
		var stat = document.cookie.split(";")[0].split("=")[1];
		setTimeout(function(){
			document.cookie="sata=0";
		},1500);
		console.log(document.cookie)
		if(stat == 1){
			$('.coupon,.mask').fadeIn();
		}else{
			$('.coupon,.mask').hide();
		}
	</script>
</html>
<script type="text/javascript" src="/static/ace/js/jquery.min.js" ></script>
<script type="text/javascript" src="/static/ace/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/ace/js/common.js" ></script>
<script type="text/javascript" src="/static/ace/js/store.js"></script>
<script>
    setNav(1);
    setStoreNav(2);
</script>

