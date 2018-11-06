<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\phpStudy\WWW\zcgj\public/../application/index\view\goods\detail.html";i:1541412743;s:59:"D:\phpStudy\WWW\zcgj\application\index\view\common\top.html";i:1541157962;s:62:"D:\phpStudy\WWW\zcgj\application\index\view\common\bottom.html";i:1541407061;}*/ ?>
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
    <link rel="stylesheet" href="/static/ace/css/userCenter.css">
</head>
<body>
<!--头部-->
<div class="top_nav">
    <div class="container clearfix">
        <div class="top_nav_l">
            <img src="/static/ace/img/logo_zc.png"/>
        </div>
        <ul class="top_nav_r clearfix">
            <?php if(is_array($sidebar) || $sidebar instanceof \think\Collection || $sidebar instanceof \think\Paginator): $i = 0; $__LIST__ = $sidebar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li>
					<a href="/<?php echo $vo['name']; ?>"><?php echo $vo['title']; ?></a>
				</li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
		<?php if(empty($account) || (($account instanceof \think\Collection || $account instanceof \think\Paginator ) && $account->isEmpty())): ?>
	        <div class="accout">
	            <span>ZC</span>
				<div class="accout_menu">
	                <p><a href="<?php echo url('Publics/login'); ?>">登录</a></p>
	                <p><a href="<?php echo url('Publics/userreg'); ?>">注册</a></p>
	            </div>
	        </div>
	    <?php else: ?>
	    	<div class="accout">
	            <span>ZC</span>
	            <?php echo $account; ?>
	            <div class="accout_menu">
	                <p><a href="<?php echo url('userCenter'); ?>">会员中心</a></p>
	                <p><a href="<?php echo url('Publics/logout'); ?>">退出登录</a></p>
	            </div>
	        </div>
	    <?php endif; ?>
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
    <!--面包屑导航-->
    <div class="crumbs">
        <div>
            <a href="store.html">商城首页</a>
            <img src="/static/ace/img/next.png">
            <a href="feature.html">特色专区</a>
            <img src="/static/ace/img/next.png">
            <a href="#">红酒</a>
            <img src="/static/ace/img/next.png">
            <a href="#">法国梧桐红酒</a>
        </div>
    </div>
    <div class="goods">
        <!--左边大图-->
        <div class="goods_left">
            <div class="gallery">
                <img src="<?php echo $pics[0]; ?>" id="gallery">
            </div>
            <div class="thumb">
                <!--<img src="/static/ace/img/show1.jpg" onclick="addShow(this)">-->
                <?php if(is_array($pics) || $pics instanceof \think\Collection || $pics instanceof \think\Paginator): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>
                	<img src="<?php echo $p; ?>" onclick="addShow(this)">
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <!--右边操作-->
        <div class="goods_right">
            <div class="goods_names">法国梧桐Realmadrid红酒</div>
            <div class="goods_price">
                售价：
                <label class="red"><?php echo $goods_detail['price']; ?></label>
                <small class="red">消费券</small>
                <s>
                    <span><?php echo $goods_detail['original_price']; ?></span>
                    <span>消费券</span>
                </s>
            </div>
            <div class="goods_num">
                数量
                <button type="button" id="minus">-</button>
                <input type="number" oninput="input_number(this.value)" id="goodsNum" min="0">
                <button type="button" id="add">+</button>
                件（库存<span id="inventory"><?php echo $goods_detail['number']; ?></span>件）
            </div>
            <div class="goods_btn">
                <button type="button" class="bg_blue" onclick="post_order()">立即购买</button>
                <button type="button" class="bg_red " onclick="toTrolley()">加入购物车</button>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="item_subhead">
        <ul id="myTab" class="nav nav-tabs">
            <li class="active">
                <a href="#home" data-toggle="tab">宝贝详情</a>
            </li>
            <li>
                <a href="#test" data-toggle="tab">专享服务</a>
            </li>
        </ul>

        <div id="myTabContent" class="tab-content">
            <!--宝贝详情-->
            <div class="tab-pane fade in active" id="home">
                <div class="row explain">
                    <div class="col-md-4">
                        <p>厂名：<span>澳大利亚双掌酒庄</span></p>
                        <p>配料表：<span>葡萄</span></p>
                        <p>食品添加剂：<span>无</span></p>
                        <p>葡萄酒等级：<span>澳大利亚产区</span></p>
                        <p>饮酒场合：<span>自斟自饮</span></p>
                        <p>包装种类：<span>裸瓶</span></p>
                        <p>系列：<span>嬉皮园</span></p>
                    </div>
                    <div class="col-md-4">
                        <p>厂址：<span>澳大利亚厂家</span></p>
                        <p>储藏方法：<span>阴凉避光</span></p>
                        <p>套装规格：<span>单支</span></p>
                        <p>葡萄品种：<span>西拉</span></p>
                        <p>产地：<span>澳大利亚</span></p>
                        <p>单瓶净含量：<span>750mL</span></p>
                        <p>采摘年份：<span>2008-09</span></p>
                    </div>
                    <div class="col-md-4">
                        <p>联系方式：<span>13300000001</span></p>
                        <p>保质期：<span>3600</span></p>
                        <p>葡萄酒种类：<span>红葡萄酒</span></p>
                        <p>糖分：<span>干葡萄酒（含糖量小于4克/升）</span></p>
                        <p>醒酒时间：<span>15分钟（含）-30分钟（含）</span></p>
                        <p>品牌：<span>Two hands</span></p>
                        <p>净含量：<span>750mL</span></p>
                    </div>
                </div>
                <div class="line"></div>
                <div class="produced">
                    <p>生产日期：<span>2008年09月25日 至 2008年09月25日</span></p>
                </div>
                <div class="line"></div>
                <div class="item_details">
                    <img src="<?php echo $goods_detail['detail_pic']; ?>">
                    <div></div>
                </div>
            </div>
            <!--专享服务-->
            <div class="tab-pane fade" id="test">
                <div class="row explain">
                    <div class="col-md-4">
                        <p>厂名：<span>澳大利亚双掌酒庄</span></p>
                        <p>配料表：<span>葡萄</span></p>
                        <p>食品添加剂：<span>无</span></p>
                        <p>葡萄酒等级：<span>澳大利亚产区</span></p>
                        <p>饮酒场合：<span>自斟自饮</span></p>
                        <p>包装种类：<span>裸瓶</span></p>
                        <p>系列：<span>嬉皮园</span></p>
                    </div>
                    <div class="col-md-4">
                        <p>厂址：<span>澳大利亚厂家</span></p>
                        <p>储藏方法：<span>阴凉避光</span></p>
                        <p>套装规格：<span>单支</span></p>
                        <p>葡萄品种：<span>西拉</span></p>
                        <p>产地：<span>澳大利亚</span></p>
                        <p>单瓶净含量：<span>750mL</span></p>
                        <p>采摘年份：<span>2008-09</span></p>
                    </div>
                    <div class="col-md-4">
                        <p>联系方式：<span>13300000001</span></p>
                        <p>保质期：<span>3600</span></p>
                        <p>葡萄酒种类：<span>红葡萄酒</span></p>
                        <p>糖分：<span>干葡萄酒（含糖量小于4克/升）</span></p>
                        <p>醒酒时间：<span>15分钟（含）-30分钟（含）</span></p>
                        <p>品牌：<span>Two hands</span></p>
                        <p>净含量：<span>750mL</span></p>
                    </div>
                </div>
                <div class="line"></div>
                <div class="produced">
                    <p>生产日期：<span>2008年09月25日 至 2008年09月25日</span></p>
                </div>
                <div class="line"></div>
                <div class="item_details">
                    <img src="<?php echo $goods_detail['service_pic']; ?>">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
<script type="text/javascript" src="/static/ace/js/jquery.min.js" ></script>
<script type="text/javascript" src="/static/ace/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/ace/js/common.js" ></script>
<script type="text/javascript" src="/static/ace/js/store.js"></script>
<script type="text/javascript" src="/static/ace/js/item.js"></script>

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
<script>
	//传递订单信息
	function post_order()
	{
		var data = {
			'gid':'<?php echo $goods_detail['id']; ?>',
			'number':Number($("#goodsNum").val())
		};
		$.ajax({
			type:"post",
			data:data,
			url:"product_order",
			success:function(r)
			{
				console.log(r);
			},
			error:function(r)
			{
				console.log(r);
			},
			async:true
		});
	}
	
	function input_number(number)
	{
		console.log(Number($("#inventory").html()));
		if(number>Number($("#inventory").html())){
			layer.msg("购买数量有误！！");
			$("#goodsNum").val(<?php echo $goods_detail['number']; ?>);
			return false;
		}
		if(number<1){
		    layer.msg("购买数量有误！！");
            $("#goodsNum").val(1);
		    return false;
        }
	}
</script>
<script>
    setNav(1);
</script>