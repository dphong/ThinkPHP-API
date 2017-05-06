<?php
namespace app\api\model;
use think\Model;
/**
 * Description of Maps
 *
 * @author HDP
 */
class Maps extends Model{
    //put your code here
    //
    //开启自动写入时间戳
    protected $autoWriteTimestamp = true;
    protected $createTime = 'create_time';
    protected $updateTime = false;
    protected $auto = ['ip'];

    // status修改器
    public function setLngAttr($value)
    {       
        return $value * 1000000;
    }
    public function setLatAttr($value)
    {       
        return $value * 1000000;
    }
    protected function setIpAttr()
    {       
        return request()->ip();
    }
    
    //获取器
    public function getLatAttr($value)
    {       
        return $value/1000000;
    }    
    public function getLngAttr($value)
    {       
        return $value/1000000;
    }    
    public function getCreateTimeAttr($value)
    {       
        return date('H:i:s Y/m/d',$value);
    }
   
}