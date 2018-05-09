<?php

namespace app\index\controller;

use think\Request;
use app\index\model\Users;

class Index extends BaseController
{
    function __construct()
    {
        $this->white_rule = false;
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
                self::jumpToUrl('/reg');
            }
        } else if (input('post.flag') == 2) {
            if (true !== $result) {
                return json(array(
                    'status' => -1,
                    'message' => $result,
                ));
            }
        } else {
            self::jumpToUrl(url('index/Index/send'), '错误的提交');
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
        $get_data = input('get.');

        $headerInfo = $request->header();
        if (isset($headerInfo['accept']) && $headerInfo['accept'] === 'application/json'
            || isset($post_data['json']) || isset($get_data['json'])
        ) {
            return $this->json(200, 'ok', [
                'get' => $get_data,
                'post' => $post_data,
                'header' => $headerInfo
            ]);
        }

        $this->assign('post', $post_data);
        $this->assign('get', $get_data);

        return $this->fetch();
    }

    public function dataselect()
    {
        return $this->fetch();
    }
}
