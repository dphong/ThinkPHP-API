<?php
namespace app\api\model;
use think\Model;
class Users extends Model
{
   // 定义关联方法
    public function maps()
    {
        return $this->hasMany('Maps','uid','user_id');
    }
}
 
