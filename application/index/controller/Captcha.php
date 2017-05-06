<?php
namespace app\index\controller;

class Captcha extends \think\Controller
{

    // 验证码表单
    public function index()
    {
        return $this->fetch();
    }


    // 验证码检测
    public function check($code='')
    {
        $captcha = new \think\captcha\Captcha();
        if (!$captcha->check($code)) {
            $this->error('验证码错误');
        } else {
            $this->success('验证码正确');
        }
        
        // 函数助手
//        if (!captcha_check($code)) {
//            $this->error('验证码错误');
//        } else {
//            $this->success('验证码正确');
//        }        
        
    }    
}