<?php

namespace app\index\controller;

use app\index\model\Users;
use think\Request;
use think\response\Json;
use think\Validate;
use app\index\controller\BaseController;

class User extends BaseController
{

    function __construct()
    {
        $this->rule = [
            '/login',
            '/reg',
            '/index/user/valid',
            '/index/user/code',
            '/index/user/add'
        ];
        parent::__construct();
    }

    // 创建用户数据页面
    public function reg()
    {
        return view();
//        return view("user/reg");
    }

    //用户名验证
    public function valid()
    {
        $request = Request::instance();
        if ($request->post('name') == 'username') {
            $username = $request->post('param');
            $user = Users::get(['username' => $username]);
            /*$user = S('username');
            if(emptyempty($user)) {
                $user = Users::get(['username'=>$username]);
                S('username', $user);
                dump("fdsa");
            }
            dump($user);*/
            if (!$user) {
                return json(array(
                    'status' => 'y',
                    'info' => ' '
                ));
            } else {
                return json(array(
                    'status' => 'n',
                    'info' => '该用户名已被注册'
                ));
            }
        } else {
            return json(array(
                'status' => 'n',
                'info' => '参数配置错误'
            ));
        }
    }

    // TODO:基于用户的验证码
    //验证码验证
    public function code()
    {
        $request = Request::instance();
        if ($request->post('name') == 'code') {
            $code = $request->post('param');
            $captcha = new \think\captcha\Captcha();
            if ($captcha->check($code)) {
                return json(array(
                    'status' => 'y',
                    'info' => ' '
                ));
            } else {
                return json(array(
                    'status' => 'n',
                    'info' => '验证码错误'
                ));
            }
        }
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
            echo '<script language=javascript>window.location.href="/reg"</script>';
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

    //用户登录
    public function login()
    {
        $request = Request::instance();

        if ('GET' === $request->method()) {
            return $this->fetch('login');
        } else {
            $rule = [
                'username' => ['regex' => '^[_a-zA-Z0-9-]{1,20}$|^[\w!#$%&\'*+\/=?^_`{|}~-]+(?:\.[\w!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?$'],
                'password' => 'require|min:6|max:20',
            ];
            $validate = new Validate($rule);
            $result = $validate->check($request->post());
            if ($result) {
                $username = $request->post('username');
                $password = createPasswd($request->post('password'));
                $user = Users::get(['username' => $username, 'password' => $password]);
                if (!$user) {
                    $user = Users::get(['email' => $username, 'password' => $password]);
                    if (!$user) {
                        $user = Users::get(['telephone' => $username, 'password' => $password]);
                        if (!$user) {
                            self::jumpToUrl('/login', '用户名或密码错误');
                        }
                    }
                }

                $validate = createPasswd($user->user_id . $user->username . $user->zcsj);
                cookie('uid', $user->user_id, 31536000);
                cookie('validate', $validate, 2592000);
                $this->assign('user', $user);
                return $this->fetch('home');
            }
            self::jumpToUrl('login', '用户名或密码错误');
        }
    }

    /**
     * 修改密码
     */
    public function resetPassword()
    {
        $request = Request::instance();
        if ('GET' === $request->method()) {
            return $this->fetch('resetPassword');
        } else {
            $old_password = $request->post('old_password');
            $new_password = $request->post('new_password');

            $user = $this->userInfo;
            if (createPasswd($old_password) === $user->password) {
                if (!empty($new_password)) {
                    $user->password = createPasswd($new_password);
                    $user->allowField(true)->save($user);  // 数据保存
                    return $this->json(200, '修改成功');
                } else {
                    $msg = '新密码不能为空';
                }
            } else {
                $msg = '原密码错误';
            }
            return $this->json(-1,  $msg);
        }

    }

    /**
     * 编辑信息
     * @return Json
     */
    public function edit()
    {
        $request = Request::instance();
        if ($request->put()) {
            $data = $request->put();
            $user = $this->userInfo;
            if ($user) {
                foreach ($data as $key => $value) {
                    if ('username' == $key && Users::get(['username' => $value])) {
                        return $this->json(-1, '用户名已存在');
                    }
                    $user->$key = $value;
                }
                $user->allowField(true)->save($user);  // 数据保存
                return $this->json(200, '更新成功');
            }

        }
        return $this->json(-1, '修改失败');
    }

    //个人中心
    public function home($code = '')
    {
        return $this->fetch();
    }

    //查看数据
    public function data()
    {
        return $this->fetch();
    }

    //退出登录
    public function logout()
    {
        cookie('uid', null);
        cookie('validate', null);
        self::jumpToUrl('/login');
    }

}
