<?php
namespace app\index\model;
use think\Model;
class Region extends Model
{
    // 地区模型
    public function shippingArea()
    {
        // 地区表 BELONGS_TO_MANY 配送区域
        return $this->belongsToMany('ShippingArea', 'tp_area_region');
    }    
}