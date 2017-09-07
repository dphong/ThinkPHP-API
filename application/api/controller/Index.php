<?php
namespace app\api\controller;
use think\Controller;
use think\Db;
use think\Url;
use app\index\model\Users;
use think\Validate;
use think\Request;
use app\common\util\Myclass;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author HDP
 */
class Index extends Controller{
    //put your code here
    
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
    
        //API示例
    public function index() {
        return $this->fetch();
        //return view('map/sample');
    }
    
    //API示例
    public function sample() {
        $request = Request::instance();
        $myclass = new Myclass();
        $user = $myclass->isLogin();
        $this->assign('user',$user);
        return $this->fetch();
        //return view('map/sample');
    }
}