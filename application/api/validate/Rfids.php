<?php
namespace app\api\validate;
use think\Validate;
class Rfids extends Validate
{
    // 验证规则
    protected $rule = [
        ['apikey','require|length:32|alphaDash','apikey必须|apikey长度32位|apikey字符非法'],
        ['epc_id','require|max:64|min:4','epc_id必须|rfid_id最长64位|rfid_idID最短4位'],
        ['c_user','require|max:240|min:0','c_user必须|c_user最长64位|c_user最短4位'],
        ['c_reserve','length:16','c_reserve长度应该为16位'],
        ['c_epc','max:72|min:8','c_epc最长72位|c_epc最短8位'],
        ['id_length','number','必须为数字'],
    ];
}