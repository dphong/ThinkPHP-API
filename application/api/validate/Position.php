<?php

namespace app\api\validate;
use think\Validate;
/**
 * Description of Position
 *
 * @author Xiao_DX
 */
class Position extends Validate{
    //put your code here
    // 验证规则
    protected $rule = [
        ['lng','require','经度是必填的'],
        ['lng',['regex'=>'^\d{2,3}\.\d{0,6}$|^\d{2,3}$'], '经度格式错误'],
        ['lat','require','纬度是必填的'],
        ['lat',['regex'=>'^\d{2,3}\.\d{0,6}$|^\d{2,3}$'], '纬度格式错误'],
    ];
}
