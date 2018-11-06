<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\phpStudy\WWW\zcgj\public/../application/index\view\goods\index.html";i:1541407527;s:59:"D:\phpStudy\WWW\zcgj\application\index\view\common\top.html";i:1541126397;}*/ ?>
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
    <link rel="stylesheet" href="/static/ace/css/clear.css" />
    <link rel="stylesheet" href="/static/ace/css/shopCart.css" />
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

    <div class="headline">
        <div>优惠专区</div>
        <p>FAVORABLE ZONE</p>
    </div>
    <!--优惠专区显示区域-->
    <div class="cabinet1">
        <div class="show1">
            <img src="<?php echo $preferential[0]['detail_pic']; ?>" onclick="item()">
            <div class="buyBox">
                <div>
                    <p>售价：<span><?php echo $preferential[0]['price']; ?></span> <span>积分</span></p>
                    <span>优惠券可以免费兑换</span>
                </div>
                <button type="button" onclick="buy()">立即购买</button>
            </div>
        </div>
        <div class="flex">
            <div class="best">
                <div class="best_title">BEST</div>
                <div class="best_name">法国红酒</div>
                <div class="best_subhead">
                    <p>Most</p>
                    <p>beautiful sunset</p>
                </div>
                <span>优惠劵可以直接免费兑换哦！</span>
            </div>
            <div class="show2">
                <img src="<?php echo $preferential[1]['detail_pic']; ?>" onclick="item()">
                <div class="buyBox">
                    <div>
                        <p>售价：<span><?php echo $preferential[1]['price']; ?></span> <span>积分</span></p>
                        <span>优惠券可以免费兑换</span>
                    </div>
                    <button type="button" onclick="buy()">立即购买</button>
                </div>
            </div>
        </div>
    </div>
    <div class="cabinet2">
        <div class="show3">
            <img src="<?php echo $preferential[2]['detail_pic']; ?>" onclick="item()">
            <div class="buyBox">
                <div>
                    <p>售价：<span><?php echo $preferential[2]['price']; ?></span> <span>积分</span></p>
                    <span>优惠券可以免费兑换</span>
                </div>
                <button type="button" onclick="buy()">立即购买</button>
            </div>
        </div>
        <div class="show3">
            <img src="<?php echo $preferential[3]['detail_pic']; ?>" onclick="item()">
            <div class="buyBox">
                <div>
                    <p>售价：<span><?php echo $preferential[3]['price']; ?></span> <span>积分</span></p>
                    <span>优惠券可以免费兑换</span>
                </div>
                <button type="button" onclick="buy()">立即购买</button>
            </div>
        </div>
        <div class="show3">
            <img src="<?php echo $preferential[4]['detail_pic']; ?>" onclick="item()">
            <div class="buyBox">
                <div>
                    <p>售价：<span><?php echo $preferential[4]['price']; ?></span> <span>积分</span></p>
                    <span>优惠券可以免费兑换</span>
                </div>
                <button type="button" onclick="buy()">立即购买</button>
            </div>
        </div>
    </div>
    <p class="check_more"><a href="discounts.html">查看更多</a></p>
    <div class="headline">
        <div>特色专区</div>
        <p>SPECIAL AREA</p>
    </div>
    <!--特色专区-->
    <div class="cabinet1">
        <div class="show1">
            <img src="<?php echo $feature[0]['detail_pic']; ?>" onclick="item()">
            <div class="buyBox">
                <div>
                    <p>售价：<span><?php echo $feature[0]['price']; ?></span> <span>消费券</span></p>
                </div>
                <button type="button" onclick="buy()">立即购买</button>
            </div>
        </div>
        <div class="flex">
            <div class="show2">
                <img src="<?php echo $feature[1]['detail_pic']; ?>" onclick="item()">
                <div class="buyBox">
                    <div>
                        <p>售价：<span><?php echo $feature[1]['price']; ?></span> <span>消费券</span></p>
                    </div>
                    <button type="button" onclick="buy()">立即购买</button>
                </div>
            </div>
            <div class="more_choices">
                <div>
                    <span><a href="feature.html">查看更多 >></a></span>
                    <p>More choices</p>
                </div>
            </div>
        </div>
    </div>
    <div class="cabinet2">
        <div class="show3">
            <img src="<?php echo $feature[2]['detail_pic']; ?>" onclick="item()">
            <div class="buyBox">
                <div>
                    <p>售价：<span><?php echo $feature[2]['price']; ?></span> <span>消费券</span></p>
                </div>
                <button type="button" onclick="buy()">立即购买</button>
            </div>
        </div>
        <div class="show3">
            <img src="<?php echo $feature[3]['detail_pic']; ?>" onclick="item()">
            <div class="buyBox">
                <div>
                    <p>售价：<span><?php echo $feature[3]['price']; ?></span> <span>消费券</span></p>
                </div>
                <button type="button" onclick="buy()">立即购买</button>
            </div>
        </div>
        <div class="show3">
            <img src="<?php echo $feature[4]['detail_pic']; ?>" onclick="item()">
            <div class="buyBox">
                <div>
                    <p>售价：<span><?php echo $feature[4]['price']; ?></span> <span>消费券</span></p>
                </div>
                <button type="button" onclick="buy()">立即购买</button>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript" src="/static/ace/js/jquery.min.js" ></script>
<script type="text/javascript" src="/static/ace/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/ace/js/common.js" ></script>
<script type="text/javascript" src="/static/ace/js/store.js"></script>
{include file="common/bottom'}
<script>
    setNav(1);
    setStoreNav(0);
</script>
