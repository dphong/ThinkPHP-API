<?php
namespace app\api\validate;

use think\Validate;

class Logistics extends Validate {
    
    // 验证规则
    protected $rule = [
        /*['apikey','require|length:32|alphaDash','apikey必须|apikey长度32位|apikey字符非法'],
        ['epc_id','require|max:64|min:4','epc_id必须|rfid_id最长64位|rfid_idID最短4位'],
        ['c_user','require|max:240|min:0','c_user必须|c_user最长64位|c_user最短4位'],
        ['c_reserve','length:16','c_reserve长度应该为16位'],
        ['c_epc','max:72|min:8','c_epc最长72位|c_epc最短8位'],
        ['id_length','number','必须为数字'],
         */
        ['apikey','require|length:32|alphaDash','apikey必须|apikey长度32位|apikey字符非法'],
        ['send_name','require','send_name必须'],
        ['send_phone','require','send_phone必须'],
        ['send_province','require','send_province必须'],
        ['send_address','require','send_address必须'],
        ['receive_name','require','receive_name必须'],
        ['receive_phone','require','receive_phone必须'],
        ['receive_province','require','receive_province必须'],
        ['receive_address','require','receive_address必须'],
        ['object_type','require','object_type必须'],
        ['object_weight','require','object_weight必须']
    ];
}
/*
send_name	varchar(30)	否 	 	 	寄件人姓名 
send_phone	char(11)	否 	 	 	寄件人手机号 
send_province	char(30)	否 	 	 	寄件省市 
send_address	varchar(100)	否 	 	 	寄件地址 
receive_name	varchar(30)	否 	 	 	收件人姓名 
receive_phone	char(11)	否 	 	 	收件人手机号 
receive_province	char(30)	否 	 	 	收件人省市 
receive_address	varchar(100)	否 	 	 	收件地址 
object_type	varchar(20)	否 	 	 	物品类型 
object_weight	float	否 	 	 	物品重量 
object_remark	varchar(200)	是 	NULL 	 	物品备注 
pickup_time	date	是 	NULL 	 	上门取件时间 
pickup_remark	varchar(200)	是 	NULL 	 	上门取件备注 
order_price	float	是 	NULL 	 	订单价格 
order_time	date	否 	 	 	下单时间 
*/