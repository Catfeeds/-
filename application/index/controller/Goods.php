<?php
namespace app\index\controller;

use app\admin\model\Banner;
use app\common\controller\Base;
use app\index\model\GoodsOrder;
use think\Build;
use think\Db;
use think\Exception;
use think\Request;
use app\index\model\Goods as GoodsModel;
use app\index\model\GoodClassify;
class Goods extends Base
{

	private $banner;

	/**
	 *
	 * 获取轮播图
	 * Goods constructor.
	 * @param Request|null $request
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public function __construct(Request $request = null)
	{
		parent::__construct($request);
//		获取轮播图
		$banners = Db::name('banner')->where(['state'=>1])->limit(4)->order(['sort'])->select();
//		echo Db::name('banner')->getLastSql();
//		exit;
//		传递轮播图
		$this->banner = $banners;
	}

	/**
	 *
	 * 获取优惠专区和特色专区的数据
	 * @return mixed
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	 public function index(){
		$page_size = 5;
		//获取优惠专区图片

		$preferential = Db::table("sn_goods")->alias('a')->join('goods_detail b','a.id = b.gid')->field('a.id,b.name,b.price,b.original_price,b.brand,b.detail_pic')->limit($page_size)->where('area_type = 2')->select();
		//		传递优惠专区
		$this->assign('preferential',$preferential);

		//获取特色专区商品
		$feature = Db::table("sn_goods")->alias('a')->join('goods_detail b','a.id = b.gid')->field('a.id,b.name,b.price,b.original_price,b.brand,b.detail_pic')->limit($page_size)->where('area_type = 1')->select();
		//        传递特色专区
		 $this->assign('feature',$feature);
//		print_r($feature);

//		 传递轮播图
		 $this->assign('banner',$this->banner);
		return $this -> fetch();
	}
	
	/**
     * 输出上品的分类
	 * controller 商品分类
	 */
	public function classify(){

		$good_types = Db::name('goods_classify')->select();
		$this->assign("classify",$good_types);
		try{
			if(!$_GET['classify']){
//				 "首次访问当前页面";
				$echo_goods = $this->get_goods_by_type(1,1);
			}else if(!$_GET['page']){
//				首次访问某一类别，page为1
				$echo_goods = $this->get_goods_by_type($_GET['classify'],1);
			}else{
				$echo_goods = $this->get_goods_by_type($_GET['classify'],$_GET['page']);
			}
		}catch (\Exception $e){
			$echo_goods = $this->get_goods_by_type(1,1);
		}

			return $this->fetch();

//		 传递轮播图
		$this->assign('banner',$this->banner);

	}


	/**
	 *
	 * 根据类别获取商品并分页
	 * @param $classify
	 * @param $page
	 * @throws \think\exception\DbException
	 */
	public function get_goods_by_type($classify,$page)
    {
		$page_size = 6;
//
		$configs = ['query'=>['classify'=>$classify]];
//		print_r($configs);
		$goods = Db::name('goods_detail')->where(['cid'=>$classify])->where(['status'=>3])->paginate($page_size,false,$configs);
		$pages = $goods->render();
		$this->assign('pages',$pages);
		$this->assign('goods_detail',$goods);
		//		 传递轮播图
		$this->assign('banner',$this->banner);

//		exit();



    }
    /**
     *
     *优惠专区
     * @return mixed
     * @throws \think\exception\DbException
     */
	public function preferential(){
	    $page_size = 6 ;

		$preferential = Db::table("sn_goods")->alias('a')->join('goods_detail b','a.id = b.gid')->field('a.id,b.name,b.price,b.original_price,b.brand,b.detail_pic')->where('area_type = 1')->paginate($page_size);
		$page = $preferential->render();
		$this->assign("preferential",$preferential);
		$this->assign("pre_page",$page);
		//		 传递轮播图
		$this->assign('banner',$this->banner);
		return $this->fetch();


	}

    /**
     * 特色专区,搜索商品也跳转此处
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function feature(){

//    	搜索区域
	if($_GET['search_text']){

	}

        $page_size = 8;

    //        传递特色专区
    //查询特色专区
        $feature = Db::table("sn_goods")->alias('a')->join('goods_detail b','a.id = b.gid')->field('a.id,b.name,b.price,b.original_price,b.brand,b.detail_pic')->where('area_type = 2')->paginate($page_size);
        $page = $feature->render();
        $this->assign('feature',$feature);
        $this->assign('page',$page);
//            print_r($feature[0]);
//            exit;
        return $this -> fetch();


//		 传递轮播图
	    $this->assign('banner',$this->banner);
    }


	/**
	 *
	 * 处理该订单信息，生成订单号
	 * @return false|string
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
    public function product_order()
    {
//    	未接收到购买信息
//	    print_r($_POST);
//	    exit();
    	if(!$_POST){
			$r = [
				'code'=>-1,
				'msg'=>'提交失败！',
				'data'=>''
			];
			return json_encode($r);
	    }
//      数据库未读取到商品信息
//	    print_r($_POST);
//	    print_r(Db::table('sn_goods')->where(['id'=>$_POST['gid']])->select());
//    	echo Db::name('sn_goods')->getLastSql();
//    	exit();
	    if(sizeof(Db::table('sn_goods')->where(['id'=>$_POST['gid']])->select())<1){
	    	$r = [
	    		'code'=>-1,
			    'msg'=>'商品信息错误！'
		    ];
	    	return json_encode($r);
	    }
//      未登录
	    if(!$_SESSION['think']['uid']){
	    	$r = [
	    		'code'=>-2,
			    'msg'=>'未登录！请先登录！'
		    ];
	    	return json_encode($r);
	    }
	    $gid = $_POST['gid'];
//	    商品信息
	    $googd_info = Db::table('sn_goods_detail')->where(['gid'=>$gid])->where(['status'=>3])->find();
//	    print_r($googd_info);
//	    exit();
	    $uid = $_SESSION['think']['uid'];
	    $number = $_POST['number'];
//	    print_r($gid);
//		print_r($uid);
//	    print_r($number);
	    $goods = new GoodsOrder();
//	    商品id
	    $order['gid'] = $gid;
//	    买家id
	    $order['buy_uid'] = $uid;
//	    创建时间
	    $order['create_time'] = time();
//	    店铺id
	    $order['sell_sid'] = Db::table('sn_goods')->where(['id'=>$gid])->field('shop_id')->select();
	    $order['sell_sid'] = $order['sell_sid'][0]['shop_id'];
//	    商品单价
	    $order['g_price'] = $googd_info['price'];
//	    购买数量
	    $order['g_number'] = $number;
//	    总价
	    $order['money'] = $order['g_price'] * $order['g_number'];
//	    支付状态
	    $order['order_status'] = 1;
//	    订单号
		$order['order_number'] = generateOrderNumber();
	    if($goods->insert($order)){
//		    print_r($order);
		    $r = [
		        'code'=>1,
			    'data'=>$order['order_number'],
		    ];

	    }else{
	    	$r = [
	    		'code'=>-1,
			    'msg'=>'生成订单信息失败！'
		    ];
	    }
	    return json_encode($r);





    }


	/**
	 *
	 * 订单结算页面
	 * @return mixed
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
    public function clear()
    {
    	if(!($_POST||$_GET)){
//    		未接收到数据，自动后退
			echo "<script>window.history = -1;</script>";
	    }
//	    从直接购买传递过来的
    	if($_GET['type'] == 'buy'){
		    $user_info = Db::table('sn_user_addr')->where(['uid'=>$_SESSION['think']['uid']])->select();
		    $user_order = Db::table('sn_goods_order')->alias('a')->join('sn_goods_detail b','a.gid = b.gid')->where(['order_number'=>$_GET['ord'],'buy_uid'=>$_SESSION['think']['uid']])->select();
//		    echo Db::name('goods_order')->getLastSql();

		    $this->assign('user_info',$user_info);
		    $this->assign('user_order',$user_order);

//			pre($user_order);
//			pre($user_info);
//		    从购物车传递过来的
	    }else if(isset($_POST['type']) && ($_POST['type'] == "car")){
			$list = $_POST['data'];
			foreach ($list as $k=>$v){
				$arr[] = $v[0];
			}
			$string = implode(',',$arr);
		    $user_info = Db::table('sn_user_addr')->where(['uid'=>$_SESSION['think']['uid']])->select();
		    $user_order = Db::table('sn_goods_order')->alias('a')->join('sn_goods_detail b','a.gid = b.gid')->where('order_number','in',$string)->where(['buy_uid'=>$_SESSION['think']['uid']])->select();
		    $this->assign('user_info',$user_info);
		    $this->assign('user_order',$user_order);
	    }else{
    		echo "接收数据错误！";
    		exit();
	    }

    	return $this->fetch();
    }


	/**
	 *
	 * 处理订单结算
	 * @return bool
	 */
    public function do_clear()
    {
    	$r = [
    		'code'=>1,
		    'msg'=>''
	    ];

    	pre($_POST);
		return json_encode($r);
    }


	/**
	 *
	 * 根据传递过来的id，渲染商品详情
	 * @return false|mixed|string
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public function detail(){
		if(!$_GET['id']){
			return json_encode(['r'=>'未接收到特定数据']);
//			exit;
		}
//		print_r($_GET['id']);
		$goods_detail = Db::name('goods_detail')->where(['gid'=>$_GET['id']])->where(['status'=>3])->find();
//		echo Db::name('sn_goods_detail')->getLastSql();
//		var_dump($goods_detail);
//		exit();
		if(!$goods_detail){
			echo "<script>history.go(-1);</script>";
		}
		$pictures = explode(';',$goods_detail['picture']);
//		print_r($pictures);
//		exit;
		$this->assign('pics',$pictures);
		$this->assign('goods_detail',$goods_detail);

		return $this -> fetch('detail');
	}

    /**
	 * controller 激活券
	 */
	public function activate(){
		//		 传递轮播图
		$this->assign('banner',$this->banner);
		return $this -> fetch();
	}
	
	/**
	 * controller 修改券
	 */
	public function change(){
		//		 传递轮播图
		$this->assign('banner',$this->banner);
		return $this -> fetch();
	}
	
	/**
	 * controller 手续费券
	 */
	public function tip(){
		//		 传递轮播图
		$this->assign('banner',$this->banner);
		return $this -> fetch();
	}
	
	/**
	 * controller 入驻券
	 */
	public function enter(){
		//		 传递轮播图
		$this->assign('banner',$this->banner);
		return $this -> fetch();
	}


	/**
	 *
	 * 购物车内容显示
	 * @return mixed
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public function car(){
		$page_size = 4;
		$user_info = Db::table('sn_user_addr')->where(['uid'=>$_SESSION['think']['uid']])->select();
		$user_order = Db::table('sn_goods_order')->alias('a')->join('sn_goods_detail b','a.gid = b.gid')->where(['buy_uid'=>$_SESSION['think']['uid'],'order_status'=>1])->paginate($page_size);

		$page = $user_order->render();
//	    echo Db::name('sn_goods_order')->getLastSql();

//	    pre($user_order);
//	    pre($user_info);
//	    exit;
		$this->assign('page',$page);
		$this->assign('user_info',$user_info);
		$this->assign('user_order',$user_order);
		return $this -> fetch();
	}

	/**
	 * 删除订单，仅限于未支付
	 * @return false|string
	 */
	public function delete_ord()
	{
		if(!$_POST){
			$r = [
				'code'=>-1,
				'msg'=>'数据传递错误！'
			];
			return json_encode($r);
		}
		$r = [
			'code'=>1,
			'msg'=>$_POST
		];
//		开启事务
		Db::startTrans();
		try{
			Db::name('goods_order')->where(['order_number'=>$_POST['ord_id']])->delete();
			Db::commit();
				$r = [
					'code'=>1,
					'msg'=>'删除成功'
				];
		}catch (\Exception $e){
			$r = [
				'code'=>-1,
				'msg'=>'删除失败'
			];
//			回滚
			Db::rollback();
		}
		return json_encode($r);
	}
}
