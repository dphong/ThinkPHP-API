<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Send
 *
 * @author HDP
 */
namespace app\index\model;
use think\Validate;

class Send extends \think\Model
{
	public static $email_config = [
		'host'			=> 'smtp.exmail.qq.com',//邮箱host地址
		'username' 		=> '',//邮箱账号
		'password' 		=> '',//邮箱密码
		'from' 			=> '',//来自哪儿，一般为邮箱账号即可
		'fromname' 		=> '安德兔',//发件人名称
		'altbody' 		=> '安德兔注册验证码，如果您看见的是本条内容请与安德兔管理员联系！',//邮件默认内容，当收件人屏蔽了内容或某些意外情况时展现
	];

	public function email($data=[])
	{
		$validate = new Validate([
			['email','require|email','邮箱输入错误|邮箱输入错误'],
			['subject','require','请输入邮件标题'],
			['message','require','请输入邮件内容'],
		]);
		if (!$validate->check($data)) {
			return $validate->getError();
		}
		$config = self::$email_config;
		vendor('phpmailer.phpmailer');
		$phpmailer = new \phpmailer(); //实例化
		$phpmailer->Host		=	$config['host']; //smtp服务器的名称（这里以QQ邮箱为例）
		$phpmailer->SMTPAuth 	= 	TRUE; //启用smtp认证
		$phpmailer->Username 	= 	$config['username']; //你的邮箱名
		$phpmailer->Password 	= 	$config['password']; //邮箱密码
		$phpmailer->From 		= 	$config['from']; //发件人地址（也就是你的邮箱地址）
		$phpmailer->FromName 	=	$config['fromname']; //发件人姓名
		$phpmailer->CharSet		=	'utf-8'; //设置邮件编码
		$phpmailer->Subject 	=	$data['subject']; //邮件主题
		$phpmailer->Body 		=	$data['message']; //邮件内容
		$phpmailer->AltBody 	=	$config['altbody']; //邮件正文不支持HTML的备用显示
		$phpmailer->WordWrap 	=	50; //设置每行字符长度
		$phpmailer->IsSMTP(true);	 // 启用SMTP
		$phpmailer->IsHTML(true); 	// 是否HTML格式邮件
		$phpmailer->AddAddress($data['email']);
		$status = $phpmailer->Send();
		return true;
	}
}
?>