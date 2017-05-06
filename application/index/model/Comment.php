<?php
namespace app\index\model;
use think\Model;
class Comment extends Model
{
    // 定义关联方法
    public function user()
    {
        return $this->belongsTo('Users','user_id','uid');
    }       
}
 
