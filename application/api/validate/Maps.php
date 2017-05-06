<?php
namespace app\api\validate;
use think\Validate;
class Maps extends Validate
{
    // 验证规则
    protected $rule = [
        ['apikey','require|length:32|alphaDash','201|201|201'],
        ['lng','require','202'],
        ['lng',['regex'=>'^\d{2,3}\.\d{0,6}$|^\d{2,3}$'], '202'],
        ['lat','require','203'],
        ['lat',['regex'=>'^\d{2,3}\.\d{0,6}$|^\d{2,3}$'],'203'],
    ];

}