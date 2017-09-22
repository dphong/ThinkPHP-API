<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\api\controller;
use think\Controller;
use think\Db;
use think\Url;
use think\Cache;
use think\Request;
use app\api\model\Users;
use think\Validate;
use app\api\model\Maps;
use app\api\model\Car;
use app\common\util\Myclass;
/**
 * Description of map
 *
 * @author HDP
 */
class Map extends Controller{
    //模板位置申明
    function __construct()
    {
        parent::__construct();
        $myclass = new Myclass();
        if($myclass->is_https()) {
            $this->view->replace(['__PUBLIC__'    =>  'https://static.whark.cn',]);
        } else {
            $this->view->replace(['__PUBLIC__'    =>  'http://ongjgltez.bkt.clouddn.com',]);
        }
    }
    
    //index
    public function index()
    {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $request = Request::instance();
        if( $request->param('lng') && $request->param('lat')){
            $data = $request->param();
            $lng = input('?get.lng')?input('get.lng'):input('post.lng');
            $lat = input('?get.lat')?input('get.lat'):input('post.lat');
                // 数据验证
            $result = $this->validate($data,'Position');
            if (true !== $result) {
                return json(array(
                    'status' => -1,
                    'message'    => $result,
                ));
            }
        }
        /*
         * 修复地图展示界面，传参确定地图显示的位置   DpHong  2017.5.17
         */
//        } else if(Request::instance()->isPost()){
//            return json(array(
//                'status' => -1,
//                'message'    => "缺少数据",
//            ));
//        }
        
//        if ($_SERVER["REQUEST_METHOD"] == "POST") {
//            if( empty($_POST["lng"])){
//                $lngErr = "  经度是必填的";
//            } else {
//                $_SESSION['lng']=test_input($_POST["lng"]);
//                if (!preg_match("/^(((\d|[1-9]\d|1[1-7]\d|0)\.\d{0,4})|(\d|[1-9]\d|1[1-7]\d|0{1,3})|180\.0{0,4}|180)$/",$_SESSION['lng'])){
//                    $lngErr = "  无效的经度格式!";
//                }
//            }
//            if( empty($_POST["lat"])){
//                $latErr = "  纬度是必填的";
//            } else {
//                $_SESSION['lat']=test_input($_POST["lat"]);
//                if (!preg_match("/^([0-8]?\d{1}\.\d{0,4}|90\.0{0,4}|[0-8]?\d{1}|90)$/",$_SESSION['lat'])){
//                    $latErr = "  无效的纬度格式!";
//                }
//            }
//            if ($lngErr != "" || $latErr != ""){
//                //echo '<script language=javascript>window.location.href="position.php"</script>';
//                $_SESSION['lngErr'] = $lngErr;
//                $_SESSION['latErr'] = $latErr;
//                //$this->error('错误提示页面跳转','admin/map/position');
//                echo '<script language=javascript>window.location.href="position"</script>';
//            }
//            
//        }
        //echo '<script language=javascript>map.centerAndZoom(point,17);</script>';
        if (!empty($lng))
        {
            $point = "point = new BMap.Point($lng,$lat);";
            $this->assign('setMarker',"setMarker($lng,$lat);");
        }
        else{
            $point =  'point = new BMap.Point(117.234877,31.756886);';
            $this->assign('setMarker',"setMarker(117.234877,31.756886);");
        }
        $this->assign('point', $point);
        $myclass = new Myclass();
        $user = $myclass->isLogin();
        $uid = $request->cookie('uid');
        $this->assign('user',$user);
        return $this->fetch();
    }
    
    //数据插入
    public function add()
    {
         $request = Request::instance();
//        if ($request->has('apikey','post')) {
//            $data = $request->post();
//        } else if($request->has('apikey','get'))
//        {
//            $data = $request->get();
        if( $request->param('apikey')){
            $data = $request->param();
        } else {
            return json(array(
                'status' => -1,
                'message'    => 205,
            ));
        }
        // 数据验证
        $result = $this->validate($data,'Maps');
        if (true !== $result) {
            return json(array(
                'status' => -1,
                'message'    => $result,
            ));
        } else {
            //查询apikey
            //$user = Users::get(['apikey'=> $request->param('apikey')]);
            
            $apikey = $request->param('apikey');
            
            //使用缓存存储ApiKey和用户ID
            $userid_cache = Cache::get($apikey);
            if(empty($userid_cache)) {
                $user = Users::get(['apikey'=> $apikey]);
                $userid_cache = $user->user_id;
                Cache::set($apikey, $userid_cache);
            }
            //if($user)
            if($userid_cache)
            {
                $map = new Maps();
                $map->lng = Request::instance()->isGet() ? input('get.lng') : input('post.lng');
                $map->lat = Request::instance()->isGet() ? input('get.lat') : input('post.lat');
                $map->code = Request::instance()->isGet() ? input('get.code') : input('post.code');
                //echo $user->user_id;
                $map->uid = $userid_cache;
                //$map->add_time = time();
                //echo $map->add_time;
                $map->allowField(true)->save($map);
            } else {
                return json(array(
                    'status' => -1,
                    'message' => 204,
            ));
            }
            return json(array(
                'status' => 1,
                'message' => $map->map_id,
            ));
        }
    }
           
    //只查maps表
    public function show() {
//        $request = Request::instance();
//        if($request->cookie('uid'))
//        {
//            $uid = $request->cookie('uid');
//            //$list = Db::name('maps')->where('uid',$uid)->paginate(10);
//            //$list2 = Maps::all(['uid'=>$uid]);
//            
//            //$page = $list->render();
//            return $this->fetch();
//        } else {
//            echo "<script language=javascript>alert ('" . "请登录"  ."');</script>";
//            echo '<script language=javascript>window.location.href="/login"</script>';
//        }
        /*
         * 修复查看数据界面，已登录用户，状态显示异常，并实现分页   DpHong  2017.5.17
         */
        $request = Request::instance();
        $myclass = new Myclass();
        $user = $myclass->isLogin();
        $uid = $request->cookie('uid');
        $maps = new Maps();
        $list = $maps->where('uid',$uid)->paginate(10);
        $this->assign('list',$list);
        $this->assign('user',$user);
        return $this->fetch();
        
        //$list = Db::table('tp_maps')->where('uid',$uid)->select();
//        foreach($list as $key=>$user){
//            echo $user->lng;
//        }
        //dump($list2);
//        if($list){
        
        
//        } else {
//            return json(array(
//                'status' => -1,
//                'msg'    => '没有数据',
//            ));
//        }
//        dump($list);
        
    }
    
    //users表和maps表的关联查询
    public function show2() {
        $user = Users::get(1);
//        dump($user);
        $this->assign('list',$user->maps);
        return $this->fetch();
    }
  
    //数据获取
    public function get() {
        $request = Request::instance();
        
        /*
        if ($request->has('apikey','post')) {
            $user = Users::get(['apikey'=> input('post.apikey')])->value('user_id');
            //$map = new Maps;
            $map = Maps::where('uid',$user)->order('map_id','desc')->select();
            //dump($map);
        } else if($request->has('apikey','get'))
        {
            $user = Users::get(['apikey'=> $request->get('apikey')])->value('user_id');
            //$map = new Maps;
            $map = Maps::where('uid',$user)->order('map_id','desc')->select();
        
         */
        
        if( $request->param('apikey')){
            
            $apikey = $request->param('apikey');
            
            //使用缓存存储ApiKey和用户ID
            $userid_cache = Cache::get($apikey);
            if(empty($userid_cache)) {
                $user = Users::get(['apikey'=> $apikey]);
                $userid_cache = $user->user_id;
                Cache::set($apikey, $userid_cache);
                echo "not use cache";
            }
            echo "test data";
            $map = Maps::where('uid',$userid_cache)->order('map_id','desc')->select();
            
        } else {
            return json(array(
                'status' => -1,
                'message' => 201,
                'data'   => '',
            ));
        }
        if ($map) {
            return json(array(
                'status' => 1,
                'message'  => 200,
                'data'   => $map,
            ));
        } else {
            return json(array(
                'status' => 1,
                'message' => 202,
                'data'   => '',
            ));
        }
        return json(array(
                'status' => -1,
                'message' => 203,
                'data'   => '',
        ));
    }
    
     /**
     * 随机字符
     * @param number $length 长度
     * @param string $type 类型
     * @param number $convert 转换大小写
     * @return string
     */
    function random($length=6, $type='string', $convert=0){
        $config = array(
            'number'=>'1234567890',
            'letter'=>'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'string'=>'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789',
            'all'=>'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
        );
        if(!isset($config[$type])) $type = 'string';
        $string = $config[$type];

        $code = '';
        $strlen = strlen($string) -1;
        for($i = 0; $i < $length; $i++){
            $code .= $string{mt_rand(0, $strlen)};
        }
        if(!empty($convert)){
            $code = ($convert > 0)? strtoupper($code) : strtolower($code);
        }
        return $code;
    }
    
    //示例POST上传
    public function position() {
        session_start();
        //echo $_SESSION['lngErr'];
        if(!empty($_SESSION['lngErr']) || !empty($_SESSION['latErr']))
        {
            $this->assign('lngErr',$_SESSION['lngErr']);
            $this->assign('latErr',$_SESSION['latErr']);
            $this->assign('lng', $_SESSION['lng']);
            $this->assign('lat',$_SESSION['lat']);
        } else
        {
            $this->assign('lngErr',"");
            $this->assign('latErr',"");
            $this->assign('lng', "");
            $this->assign('lat',"");
        }
        //echo '';
        $_SESSION['lngErr']=$_SESSION['latErr']="";
        return $this->fetch();
    }
}
