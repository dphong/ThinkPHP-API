<?php
namespace app\api\model;
use think\Model;
/**
 * Description of Maps
 *
 * @author HDP
 */
class Rfids extends Model{
    //put your code here
    //
    //开启自动写入时间戳
    protected $autoWriteTimestamp = true;
    protected $createTime = 'create_time';
    protected $updateTime = false;
    protected $auto = ['ip'];

    // status修改器
    protected function setIpAttr()
    {
        return request()->ip();
    }
    
    //获取器
    public function getCreateTimeAttr($value)
    {       
        return date('H:i:s Y/m/d',$value);
    }
   
}