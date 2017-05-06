<?php
namespace app\index\model;
use think\Model;
class Role  extends Model
{    
    public function users()
    {         
        return $this->belongsToMany('users', 'think_access');
    }    
}