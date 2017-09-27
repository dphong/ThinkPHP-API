<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this tempc_usere file, choose Tools | Tempc_useres
 * and open the tempc_usere in the editor.
 */

namespace app\api\controller;
use think\Controller;
use think\Db;
use think\Url;
use app\api\model\Users;
use think\Validate;
use app\api\model\LogisticsTable;
use think\Request;
use app\common\util\Myclass;
/**
 * Description of map
 *
 * @author HDP
 */
class Logistics extends Controller{
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
    }
    
    //数据插入
    public function add()
    {
         $request = Request::instance();
        if( $request->param('apikey')){
            $data = $request->param();
        } else {
            return json(array(
                'status' => -1,
                'message'    => '必须包含apikey',
            ));
        }
        // 数据验证
        $result = $this->validate($data,'Logistics');
        if (true !== $result) {
            return json(array(
                'status' => -1,
                'message'    => $result,
            ));
        } else {
            //查询apikey
            $user = Users::get(['apikey'=> $request->param('apikey')]);
            if($user)
            {
                $logistics = new LogisticsTable();
                $logistics->send_name = Request::instance()->isGet() ? input('get.send_name') : input('post.send_name');
                $logistics->send_phone = Request::instance()->isGet() ? input('get.send_phone') : input('post.send_phone');
                $logistics->send_province = Request::instance()->isGet() ? input('get.send_province') : input('post.send_province');
                $logistics->send_address = Request::instance()->isGet() ? input('get.send_address') : input('post.send_address');
                $logistics->receive_name = Request::instance()->isGet() ? input('get.receive_name') : input('post.receive_name');
                $logistics->receive_phone = Request::instance()->isGet() ? input('get.receive_phone') : input('post.receive_phone');
                $logistics->receive_province = Request::instance()->isGet() ? input('get.receive_province') : input('post.receive_province');
                $logistics->receive_address = Request::instance()->isGet() ? input('get.receive_address') : input('post.receive_address');
                $logistics->object_type = Request::instance()->isGet() ? input('get.object_type') : input('post.object_type');
                $logistics->object_weight = Request::instance()->isGet() ? input('get.object_weight') : input('post.object_weight');
                
                $logistics->object_remark = $request->param('object_remark');
                $logistics->pickup_time = $request->param('pickup_time');
                $logistics->pickup_remark = $request->param('pickup_remark');
                $logistics->order_price = $request->param('order_price');
                
                $logistics->uid = $user->user_id;
                $logistics->allowField(true)->save($logistics);
            } else {
                return json(array(
                    'status' => -1,
                    'message' => 204,
                ));
            }
            
            if(isset($_GET['data_type']))
            {
                $this->assign('id',$logistics->id);
                return $this->fetch();
            } else {
                //数据API使用时，返回JSON数据
                return json(array(
                    'status' => 1,
                    'message' => $logistics->id,
            ));
            }
        }
    }
           
    //只查maps表
    public function show() {
//        $request = Request::instance();
//        if($request->cookie('uid'))
//        {
//            $uid = $request->cookie('uid');
//            //$list = Db::name('logisticss')->where('uid',$uid)->paginate(10);
//            $logistics = new Logistics();
//            $list = $logistics->where('uid',$uid)->paginate(10);
//            $this->assign('list',$list);
////            $list2 = Logistics::all(['uid'=>$uid]);
////            $this->assign('list',$list2);
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
        $logistics = new Logistics();
        $list = $logistics->where('uid',$uid)->paginate(8);
        $this->assign('list',$list);
        $this->assign('user',$user);
        return $this->fetch();
    }
  
    //数据获取
    public function get() {
        $request = Request::instance();
        if ($request->has('apikey','post')) {
            $user = Users::get(['apikey'=> input('post.apikey')])->value('user_id');
            //$logistics = new Rfid;
            $logistics = LogisticsTable::where('uid',$user)->order('id','desc')->select();
            //dump($logistics);
        } else if($request->has('apikey','get'))
        {
            $user = Users::get(['apikey'=> $request->get('apikey')])->value('user_id');
            //$logistics = new Rfid;
            $logistics = LogisticsTable::where('uid',$user)->order('id','desc')->select();
        } else {
            return json(array(
                'status' => -1,
                'message' => 201,
                'data'   => '',
            ));
        }
        if ($logistics) {
            return json(array(
                'status' => 1,
                'message'  => 200,
                'data'   => $logistics,
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
    
    //示例POST上传
    public function position() {
        session_start();
        //echo $_SESSION['idErr'];
        if(!empty($_SESSION['idErr']) || !empty($_SESSION['c_userErr']))
        {
            $this->assign('idErr',$_SESSION['idErr']);
            $this->assign('c_userErr',$_SESSION['c_userErr']);
            $this->assign('id', $_SESSION['id']);
            $this->assign('c_user',$_SESSION['c_user']);
        } else
        {
            $this->assign('idErr',"");
            $this->assign('c_userErr',"");
            $this->assign('id', "");
            $this->assign('c_user',"");
        }
        //echo '';
        $_SESSION['idErr']=$_SESSION['c_userErr']="";
        return $this->fetch();
        
    }
}
