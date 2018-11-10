<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:71:"D:\phpStudy\WWW\zcgj\public/../application/admin\view\shop\feature.html";i:1541723671;s:59:"D:\phpStudy\WWW\zcgj\application\admin\view\common\top.html";i:1522230592;s:62:"D:\phpStudy\WWW\zcgj\application\admin\view\common\header.html";i:1530500030;s:63:"D:\phpStudy\WWW\zcgj\application\admin\view\common\sidebar.html";i:1532051872;s:62:"D:\phpStudy\WWW\zcgj\application\admin\view\common\bottom.html";i:1490663526;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php if(isset($info['name'])): ?><?php echo $info['name']; ?> - <?php endif; ?> <?php echo $pagename; ?> -  <?php echo config('WEB_SITE_NAME'); ?>管理后台</title>
<meta name="description" content=" <?php echo config('WEB_SITE_DESCRIPTION'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" href="/static/ace/css/bootstrap.css" />
<link rel="stylesheet" href="/static/ace/css/font-awesome.css" />
<link rel="stylesheet" href="/static/ace/css/ace-fonts.css" />
<link rel="stylesheet" href="/static/ace/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
<script src="/static/ace/js/ace-extra.js"></script>
<script type="text/javascript">window.jQuery || document.write("<script src='/static/ace/js/jquery.js'>"+"<"+"/script>");</script>
<script type="text/javascript">if('ontouchstart' in document.documentElement) document.write("<script src='/static/ace/js/jquery.mobile.custom.js'>"+"<"+"/script>");</script>
<style type="text/css">
input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"] {
  line-height: inherit;
}
.help-inline{
  line-height: 32px;
}
select{
	height: 34px;
}
.main-container .table tr td {
	vertical-align: middle;
}
.main-container .table tr td a{
	margin-right:10px;
}
#preview{
  height: 120px;
  width: auto;
}
</style>
<style type="text/css">
.search {text-indent:0.5em;}
.main-container .table tr td {
  vertical-align: middle;
}
.main-container .table tr td a{
  margin-right:10px;
}
.t_img {text-align:center;}
.t_img img {width:200px;height:56px;}
.state_red {float:right;width:50px;height:26px;line-height:26px;text-align:center;color:white;border-radius:10px;background-color:red;cursor:pointer;box-shadow:#006666 1px 1px 2px;}
.state_green {float:left;width:50px;height:26px;line-height:26px;text-align:center;color:white;border-radius:10px;background-color:green;cursor:pointer;box-shadow:#18A665 1px 1px 2px;}
</style>
</head>
<body class="no-skin">
<div id="navbar" class="navbar navbar-default">
  <div class="navbar-container" id="navbar-container">
  <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar"> <span class="sr-only">Toggle sidebar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <div class="navbar-header pull-left"> <a href="<?php echo url('Index/index'); ?>" class="navbar-brand"> <small><?php echo \think\Config::get('WEB_SITE_NAME'); ?>网站管理后台 </small> </a> </div>
    <div class="navbar-buttons navbar-header pull-right" role="navigation">
      <ul class="nav ace-nav">
        <li class="light-blue"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"> <img class="nav-user-photo" src="/static/ace/avatars/user.png" />
        <span class="user-info"><small>欢迎你</small><?php echo $_SESSION['think']['username']; ?></span> <i class="ace-icon fa fa-caret-down"></i> </a>
          <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
            <li> <a href="<?php echo url('Index/repwd'); ?>"> <i class="ace-icon fa fa-cog"></i> 修改密码 </a></li>
            <li> <a href="<?php echo url('Publics/logout'); ?>"> <i class="ace-icon fa fa-power-off"></i> 退出后台 </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="main-container" id="main-container"> <div id="sidebar" class="sidebar ">
  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
      <button class="btn btn-success">
      <i class="ace-icon fa fa-group"></i>
      </button>
      <button class="btn btn-info">
      <i class="ace-icon fa fa-list"></i>
      </button>
      <button class="btn btn-warning">
      <i class="ace-icon fa fa-arrow-circle-up"></i>
      </button>
      <button class="btn btn-danger">
      <i class="ace-icon fa fa-cog"></i>
      </button>
    </div>
    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
      <span class="btn btn-success"></span>
      <span class="btn btn-info"></span>
      <span class="btn btn-warning"></span>
      <span class="btn btn-danger"></span>
    </div>
  </div>
  <ul class="nav nav-list">
    <?php if(is_array($sidebar) || $sidebar instanceof \think\Collection || $sidebar instanceof \think\Paginator): $i = 0; $__LIST__ = $sidebar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <li <?php if($vo['name'] == $rule2): ?>class="open active"<?php endif; ?>><a href="<?php echo url('/'.$vo['name']); ?>" <?php if($vo['count'] != 0): ?>class="dropdown-toggle"<?php endif; ?>><i class="menu-icon fa fa-<?php echo $vo['icon']; ?>"></i><span class="menu-text"> <?php echo $vo['title']; ?> </span><b class="arrow <?php if($vo['count'] != 0): ?>fa fa-angle-down<?php endif; ?>"></b></a>
        <b class="arrow"></b>
        <ul class="submenu">
          <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
          <li <?php if($sub['name'] == $rule): ?>class="active"<?php endif; ?>><a href="<?php echo url('/'.$sub['name']); ?>"><i class="menu-icon fa fa-caret-right"></i> <?php echo $sub['title']; ?> </a><b class="arrow"></b></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>
  <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="<?php echo url('Index/index'); ?>"><?php echo config('WEB_SITE_NAME'); ?></a> </li>
          <li class="active"><?php echo $pagename; ?></li>
        </ul>
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> <?php echo $pagename; ?> <small> <i class="ace-icon fa fa-angle-double-right"></i> 共有<?php echo $goods['count']; ?>件商品 </small></h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
            	
            	<div class="col-xs-12" style="margin-bottom:10px;">
                <form action="<?php echo url('feature'); ?>" method="get" class="form-inline" role="form">
                  <div class="form-group">
                    <label>关键词：</label>
                    <input name="keywords" type="text" class="form-control search" placeholder="商品名">
                  </div>&nbsp;&nbsp;
                  <div class="form-group"><label>商品分类：</label>
                    <select name="state" class="form-control" <!--onchange="look_state(this)"-->>
                    	<option value="">全部</option>
                      <?php if(is_array($class) || $class instanceof \think\Collection || $class instanceof \think\Paginator): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['id']; ?>" <?php if($get_class_id == $vo['id']): ?>selected = 'selected'<?php else: endif; ?>><?php echo $vo['name']; ?></option>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                  </div>&nbsp;&nbsp;
                  <button type="submit" class="btn btn-sm btn-primary">查询</button>
                  <a class="btn btn-sm btn-success" style="float:right; margin-right:10px;" href="<?php echo url('add_feature_goods'); ?>" >添加商品</a>
                  <button type="reset" class="btn btn-sm btn-danger hidden-xs" style="float:right;margin-right:10px;">清空查询条件</button>
                </form>
              </div>
              
              <div class="col-xs-12">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>序号</th>
                      <th>商品名</th>
                      <th>优惠价</th>
                      <th>原价</th>
                      <th>库存</th>
                      <th>商品分类</th>
                      <th>添加时间</th>
                      <th>收益比</th>
                      <th colspan="3">操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(is_array($goods['list']) || $goods['list'] instanceof \think\Collection || $goods['list'] instanceof \think\Paginator): $k = 0; $__LIST__ = $goods['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                      <tr>
                        <td> <?php echo $k; ?></td>
                        <td> <?php echo $vo['name']; ?></td>
                        <td> <?php echo $vo['price']; ?></td>
                        <td> <?php echo $vo['original_price']; ?> </td>
                        <td> <?php echo $vo['number']; ?></td>
                        <td> <?php echo $vo['class_name']; ?></td>
                        <td> <?php echo $vo['create_date']; ?></td>
                        <td> <?php echo $vo['profit_rate']; ?></td>
                        <td style="display: block">
                        	<a class="btn btn-sm btn-success" href="<?php echo url('edit_feature_goods',array('id'=>$vo['id'])); ?>" >修改</a>
                            <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="deleteInfo(this,<?php echo $vo['id']; ?>)">删除</a>
                            <?php if(($_SESSION['think']['user_type'] == 0) && ($vo['status'] == 1)): ?>
                            <!--超级管理员显示审核按钮-->
                                <button class="btn btn-success btn-sm" onclick="verify(this,<?php echo $vo['id']; ?>,'agree')">通过</button>
                                <button class="btn btn-danger btn-sm" onclick="verify(this,<?php echo $vo['id']; ?>,'disagree')">拒绝</button>
                            <?php elseif(($_SESSION['think']['user_type'] == 2) && ($vo['status'] == 1)): ?>
                            <!--普通商家显示审核中按钮，点击无效-->
                                <button class="btn btn-success btn-sm" onclick="javascript:layer.msg('待审核')">审核中</button>
                            <?php else: ?>
                            <!--显示已通过与已拒绝-->
                                <button class="btn  btn-sm" ><?php echo $vo['status']=="3"?"已通过":"<span style='color: red'>已拒绝</span>"; ?></button>
                            <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                  </tbody>
                </table>
                <div style="width:100%;margin: 0 auto; text-align:center;">
                  <ul class="pagination" >
                    <?php echo $goods['page']; ?>
                  </ul>
                </div>
              </div>
              
              <!-- /.span --> 
            </div>
            <!-- /.row --> 
            <!-- PAGE CONTENT ENDS --> 
          </div>
          <!-- /.col --> 
        </div>
        <!-- /.row --> 
      </div>
      <!-- /.page-content --> 
    </div>
  </div>
  <!-- /.main-content -->
  <div class="footer">
    <div class="footer-inner"> 
      <!-- #section:basics/footer -->
      <div class="footer-content"> <span class="bigger-120"> <span class="blue bolder"><?php echo config('WEB_SITE_NAME'); ?> </span><?php echo WEB_VERSION; ?>版 </span></div>
      <!-- /section:basics/footer --> 
    </div>
  </div>
  <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"><i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i></a> </div>
<!-- /.main-container --> 
<!-- basic scripts --> 
<script type="text/javascript">if($(window).width()<1024)  $("#sidebar").addClass('menu-min');</script>
<script src="/static/ace/js/bootstrap.js"></script>
<script src="/static/ace/js/ace/ace.js"></script> 
<script src="/static/ace/js/ace/ace.sidebar.js"></script> 
<script src="/static/ace/js/layer/layer.js"></script>
<script type="text/javascript">
  $('a[href="/Admin/Shop/feature"]').parents().filter('li').addClass('open active');
  <?php if(input('get.keywords')): ?>
    $('input[name="keywords"]').val('<?php echo $_GET["keywords"]; ?>');
  <?php endif; ?>
</script>
<script type="text/javascript">

//清除查询条件
jQuery(function($){
	$(document).on('click','button:reset',function(){
		location.href = '<?php echo url("feature"); ?>';
	})
});

// 排序
function sort(id,type){
	$.post('<?php echo url(sort); ?>',{id:id,type:type}).success(function(data){
		if(data.code == 0){
			layer.msg(data.msg,{icon:data.code,time:1000},function(){
				location.href = self.location.href;
			});
		}else{
			layer.msg(data.msg,{icon:data.code,time:1000},function(){
				location.href = self.location.href;
			})
		}
	});
}

function verify(obj,id,type) {
    if(!obj||!id||!type){
        layer.msg("提交信息错误！");
        return false;
    }
    var data = {
        'gid':id,
        'type':type=='agree'?'pass':'reject'
    }
    $.ajax({
        url:"validate",
        type: "post",
        data:data,
        success:function (r) {
            r = JSON.parse(r);
            if(r['code'] == 1){
                layer.msg(r['msg']);
                window.location.href = '';
            }
        },
        error:function (r) {
            console.log(r);
        }
    })


}

// 删除商品
function deleteInfo(obj,id){
	layer.confirm('确定要删除吗？<br>该轮播图所有的信息都将被完全删除，不可恢复！', {
		btn: ['确定','关闭'] //按钮
	}, function(){
		$.post("<?php echo url('feature_del'); ?>", {id: id}).success(function(data) {
			// console.log(data);return false;
            data = JSON.parse(data);
		    if (data.code == 0) {
				layer.msg(data.msg, {icon: data.code,time: 1500},function(){
					// return false;
				    location.href=self.location.href;

				});
			}else{
				layer.alert(data.msg, {icon: data.code,time: 1500},function(){
					// return false;
				    location.href=self.location.href;
				});
			}
		})
	});
}
</script>
</body>
</html>