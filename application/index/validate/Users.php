<?php
namespace app\index\validate;
use think\Validate;
class Users extends Validate
{
    // 验证规则
    protected $rule = [
        ['username', 'require|min:3|max:20', '用户名是必填的|用户名不能短于3个字符|用户名不能长于20个字符'],
        ['username',['regex'=>'^[_a-zA-Z0-9-]{3,16}$'],'用户名不能包含特殊字符'],
        ['password','require|min:6','密码是必填的|密码不能小于6位'],
        ['repassword','require|min:6|confirm:password','密码是必填的|密码不能小于6位|密码输入不一致'],
        ['email', 'require', '邮箱是必填的'],
        ['email',['regex'=>'^[\w!#$%&\'*+\/=?^_`{|}~-]+(?:\.[\w!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?$'], '邮箱格式错误'],
        ['telephone', 'number', '手机号格式错误'],
        ['nickname',['regex'=>'/^[_a-z A-Z0-9-\x{4e00}-\x{9fa5}]+$/u'],'昵称不能包含特殊字符,能使用中文及英文连接符与下划线'],
    ];
    
    // 验证邮箱格式 是否符合指定的域名
    protected function checkMail($value, $rule)
    {
        $result = strstr($value,$rule);
        if($result)
            return true;
        else
            return "邮箱必须包含 $rule 域名";
    }

    protected $scene = [
        'edit'  =>  ['name','age'],
    ];
}