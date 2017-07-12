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
use app\api\model\Rfids;
use think\Request;
use app\common\util\Myclass;
/**
 * Description of map
 *
 * @author HDP
 */
class Rfid extends Controller{
    //模板位置申明
    function __construct()
    {
        parent::__construct();
        $this->view->replace(['__PUBLIC1__'    =>  'http://ongjgltez.bkt.clouddn.com',]);
        $this->view->replace(['__PUBLIC__'    =>  'https://static.wlwshow.cn',]);
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
                'message'    => 205,
            ));
        }
        // 数据验证
        $result = $this->validate($data,'Rfids');
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
                $rfid = new Rfids();
                $rfid->epc_id = Request::instance()->isGet() ? input('get.epc_id') : input('post.epc_id');
                $rfid->c_user = Request::instance()->isGet() ? input('get.c_user') : input('post.c_user');
                $rfid->id_length = Request::instance()->isGet() ? input('get.id_length') : input('post.id_length');
                $rfid->c_reserve = Request::instance()->isGet() ? input('get.c_reserve') : input('post.c_reserve');
                $rfid->c_epc = Request::instance()->isGet() ? input('get.c_epc') : input('post.c_epc');
                $rfid->c_tid = Request::instance()->isGet() ? input('get.c_tid') : input('post.c_tid');
                $rfid->uid = $user->user_id;
                $rfid->allowField(true)->save($rfid);
            } else {
                return json(array(
                    'status' => -1,
                    'message' => 204,
                ));
            }
            return json(array(
                'status' => 1,
                'message' => $rfid->rfid_id,
            ));
        }
    }
           
    //只查maps表
    public function show() {
//        $request = Request::instance();
//        if($request->cookie('uid'))
//        {
//            $uid = $request->cookie('uid');
//            //$list = Db::name('rfids')->where('uid',$uid)->paginate(10);
//            $rfid = new Rfids();
//            $list = $rfid->where('uid',$uid)->paginate(10);
//            $this->assign('list',$list);
////            $list2 = Rfids::all(['uid'=>$uid]);
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
        $rfid = new Rfids();
        $list = $rfid->where('uid',$uid)->paginate(8);
        $this->assign('list',$list);
        $this->assign('user',$user);
        return $this->fetch();
    }
  
    //数据获取
    public function get() {
        $request = Request::instance();
        if ($request->has('apikey','post')) {
            $user = Users::get(['apikey'=> input('post.apikey')])->value('user_id');
            //$rfid = new Rfid;
            $rfid = Rfids::where('uid',$user)->order('rfid_id','desc')->select();
            //dump($rfid);
        } else if($request->has('apikey','get'))
        {
            $user = Users::get(['apikey'=> $request->get('apikey')])->value('user_id');
            //$rfid = new Rfid;
            $rfid = Rfids::where('uid',$user)->order('rfid_id','desc')->select();
        } else {
            return json(array(
                'status' => -1,
                'message' => 201,
                'data'   => '',
            ));
        }
        if ($rfid) {
            return json(array(
                'status' => 1,
                'message'  => 200,
                'data'   => $rfid,
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
