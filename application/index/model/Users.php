<?php
namespace app\index\model;
use think\Model;
class Users extends Model
{
    
    // status修改器
    protected function getUserStatusAttr($value)
    {       
        return '正常';
    }    
    
    
//    // 定义关联方法
//    public function car()
//    {
//        // 用户HAS ONE档案关联
//        return $this->hasOne('Car','uid','user_id');
//    }    
    
    // 定义关联方法
    public function comm()
    {   
        return $this->hasMany('Comment','uid','user_id');
    }   
    
//    // 定义多对多关联
//    public function roles()
//    {
//        // 用户 BELONGS_TO_MANY 角色
//        return $this->belongsToMany('Role', 'think_access','role_id','user_id');
//    }    
    
//    // email查询
//    protected function scopeEmail($query) // ,$e
//    {
//        $query->where('email', 'tpshop@tpshop.cn');
//        //$query->where('email', $e);        
//    }
//
//    // level查询
//    protected function scopeLevel($query)
//    {
//        $query->where('level', 1);
//    }  
//    
//    // 全局查询范围
//    protected static function base($query)
//    {        
//        $query->where('user_id',1);
//    }    
//    // 类型转换
//    protected $type = array(
//                'birthday' => 'timestamp:Y-m-d', 
//    );
//    // 自动完成  insert update auto
//    protected $update = array(
//        'sex' => 0,
//        //'sex',
//    );

    // sex 属性修改器
//    protected function setSexAttr($value,$data)
//    {
//        return  $data['head_pic'] == 'boy.jpg' ? 1 : 0; 
//    }

    /*
    // RegTime读取器
    protected function getRegTimeAttr($regtime)
    {
        return '===='.date('Y-m-d', $regtime);
    }    

    // Email读取器
    protected function getEmailAttr($a,$data)
    {
        return $data['password'];
        //return print_r($data,true);
        //return '----------'.$a;
    } 
    
    // 写入器
    protected function setRegTimeAttr($value)
    {
        return strtotime($value);
        //return 1234567890;
    } 
     * 
     */       
}
 
