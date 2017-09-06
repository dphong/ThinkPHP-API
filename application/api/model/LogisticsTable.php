<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\api\model;
use think\Model;

/**
 * Description of Logistics_m
 *
 * @author HDP
 */
class LogisticsTable extends Model{
    
    //开启自动写入时间戳
    protected $autoWriteTimestamp = true;
    protected $createTime = 'order_time';
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
