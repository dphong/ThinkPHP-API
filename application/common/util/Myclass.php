<?php
namespace app\common\util;
use think\Request;
use app\api\model\Users;
class Myclass
{

    
    public function hello()
    {
        return '这是app\common\util\Myclass';
    }
        
    function isLogin() {
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
        return $user;
    }
}