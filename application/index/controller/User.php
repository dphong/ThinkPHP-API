<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Url;
use app\index\model\Users;
use app\index\model\UserLevel;
use app\index\model\Test;
use app\index\model\Comment;
use think\Validate;
use think\Request;
use app\common\util\Myclass;
class User extends Controller
{
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

   // 创建用户数据页面
    public function reg()
    {
        return view();
//        return view("user/reg");
    }
    
    //用户名验证
    public function valid() {
        $request = Request::instance();
        if($request->post('name') == 'username') {
            $username = $request->post ('param');
            $user = Users::get(['username'=>$username]);
            /*$user = S('username');
            if(emptyempty($user)) {
                $user = Users::get(['username'=>$username]);
                S('username', $user);
                dump("fdsa");
            }
            dump($user);*/
            if(!$user) {
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
    
        //验证码验证
    public function code() {
        $request = Request::instance();
        if($request->post('name') == 'code') {
            $code = $request->post ('param');
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
        $result = $this->validate($data,'Users');   // 数据验证
        if(input('post.flag')==1)
        {
            if (true !== $result) {
                echo "<script language=javascript>alert ('" . $result  ."');</script>";
                echo '<script language=javascript>window.location.href="/reg"</script>';
                return;
            }
        } else if(input('post.flag')==2)
        {
            if (true !== $result) {
                return json(array(
                    'status' => -1,
                    'message'    => $result,
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
        if(input('post.flag')==1){
            $this->success('创建用户成功，请登录，页面跳转中...','/login');
        }else{
            return json(array(
                'status' => 1,
                'message'    => '用户创建成功',
            ));
        }
    }
    
/*    $('#username').blur(  
        function() {  
            var username = $(this).val();  
            $.post("index.php/Home/Index/checkName", {  
                'username' : username//前一个username需要跟UserModel对应，即跟数据库字段对应  
            }, function(data) {  
                if (data == 0) {  
                    error['username'] = 0;  
                    $('#tooltip1').attr('class',  
                            'tooltip-info visible-inline success');  
                } else {  
                    error['username'] = 1;  
                    $('#tooltip1').attr('class',  
                            'tooltip-info visible-inline error');  
                    $('#mess1').html(data);  
                }  
            })  
        });*/
    
    //用户登录
    public function login() {
        return view();
    }
    
    //个人中心
    public function home($code='') {
        
        $request = Request::instance();
        if($request->post())
        {
            $rule = [
                'username' => ['regex'=>'^[_a-zA-Z0-9-]{1,20}$|^[\w!#$%&\'*+\/=?^_`{|}~-]+(?:\.[\w!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?$'],
                'password'  => 'require|min:6|max:20',
            ];
            $validate = new Validate($rule);
            $result   = $validate->check($request->post());
            if($result){
                $username = $request->post('username');
                $password = createPasswd($request->post('password'));           
                $user = Users::get(['username'=> $username , 'password' => $password]);
                if(!$user){
                    $user = Users::get(['email'=> $username , 'password' => $password]);
                    if(!$user){
                        $user = Users::get(['telephone'=> $username , 'password' => $password]);
                        if(!$user){
                            echo "<script language=javascript>alert ('" . "用户名或密码错误"  ."');</script>";
                            echo '<script language=javascript>window.location.href="/login"</script>';
                        }
                    }
                }
                //防止sql注入
            } else {
                echo "<script language=javascript>alert ('" . "用户名或密码错误"  ."');</script>";
                echo '<script language=javascript>window.location.href="/login"</script>';
            }
        } else if($request->cookie('uid')){
            $user = Users::get(['user_id'=> $request->cookie('uid')]);
            $validate = createPasswd($user->user_id . $user->username . $user->zcsj);
            if($request->cookie('validate') !== $validate)
            {
                echo "<script language=javascript>alert ('" . "登录信息已过期，请重新登录"  ."');</script>";
                echo '<script language=javascript>window.location.href="/login"</script>';
            }
        } else {
            //echo "<script language=javascript>alert ('" . "请登录"  ."');</script>";
            echo '<script language=javascript>window.location.href="/login"</script>';
        }
        $validate = createPasswd($user->user_id . $user->username . $user->zcsj);
        cookie('uid', $user->user_id, 31536000);
        cookie('validate', $validate, 2592000);
        $this->assign('list',$user);
        return $this->fetch();
    }
    
    //查看数据
    public function data() {
        $request = Request::instance();
        if($request->cookie('uid')){
            $user = Users::get(['user_id'=> $request->cookie('uid')]);
            $validate = createPasswd($user->user_id . $user->username . $user->zcsj);
            if($request->cookie('validate') !== $validate)
            {
                echo "<script language=javascript>alert ('" . "登录信息已过期，请重新登录"  ."');</script>";
                echo '<script language=javascript>window.location.href="/login"</script>';
            }
        } else {
            echo "<script language=javascript>alert ('" . "请登录"  ."');</script>";
            echo '<script language=javascript>window.location.href="/login"</script>';
        }
        $this->assign('list',$user);
        return $this->fetch();
    }
    
    //退出登录
    public function logout() {
        cookie('uid', null);
        cookie('validate', null);
        echo '<script language=javascript>window.location.href="/login"</script>';
    }
    
}
