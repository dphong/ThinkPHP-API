<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Url;
use think\Log;
use think\Request;
use app\index\model\Users;
use app\index\model\UserLevel;
use app\index\model\Test;
use app\index\model\Region;
use app\index\model\ShippingArea;
use org\util\ArrayList;
use app\common\util\Myclass;
use think\Session;
use think\Cookie;

class Index extends BaseController
{
    function __construct()
    {
        $this->while_rule = false;
        parent::__construct();
    }

    public function index()
    {
        return $this->fetch();
    }

    //我要寄件
    public function send()
    {
        return $this->fetch();
    }

    //快递单数据库内容
    public function sql()
    {
        return $this->fetch();
    }

    //数据库字典
    public function datadict()
    {
        return $this->fetch();
    }

    //智能物流系统
    public function iot()
    {
        return $this->fetch();
    }

    // 控制器验证
    public function add()
    {
        $data = input('post.');
        $result = $this->validate($data, 'Users');   // 数据验证
        if (input('post.flag') == 1) {
            if (true !== $result) {
                echo "<script language=javascript>alert ('" . $result . "');</script>";
                echo '<script language=javascript>window.location.href="/reg"</script>';
                return;
            }
        } else if (input('post.flag') == 2) {
            if (true !== $result) {
                return json(array(
                    'status' => -1,
                    'message' => $result,
                ));
                //echo "<script language=javascript>alert ('" . $result  ."');</script>";
                //echo '<script language=javascript>window.location.href="/reg"</script>';
                return;
            }
        } else {
            echo "<script language=javascript>alert ('错误的提交');</script>";
            echo '<script language=javascript>window.location.href="/send"</script>';
            return;
        }
        $users = new Users;
        $users->allowField(true)->save($data);  // 数据保存
        $id = $users->user_id;
        $users->apikey = createApi($id);    //根据ID创建API并保存
        $users->password = createPasswd(input('post.password'));
        $users->zcsj = time();
        $users->save($users);
        if (input('post.flag') == 1) {
            $this->success('创建用户成功，请登录，页面跳转中...', '/login');
        } else {
            return json(array(
                'status' => 1,
                'message' => '用户创建成功',
            ));
        }
    }

    public function check()
    {
        $request = Request::instance();
        $post_data = input('post.');
        echo '<center>';
        echo '</br><h3>POST:</h3></br><h2>';
        dump($post_data);
        $get_data = input('get.');
        echo '</h2></br></br><h3>GET:</h3></br><h2>';
        dump($get_data);
        echo '</h2></center>';
    }

    public function dataselect()
    {
        return $this->fetch();
    }
}
