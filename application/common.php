<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

//API_Key生成
function createApi($id) {
//API_Key 生成ID后缀
$salt = 'nobug';
//API_Key生成算法
$api = md5(sha1($id.$salt));
//API_Key转换为大写
return strtoupper($api);
}
    
//密码生成
function createPasswd($password,$salt = 'iot') {
//API_Key 生成ID后缀
//    $salt = 'iot';
//API_Key生成算法
$api = md5(sha1($password.$salt));
//API_Key转换为大写
return $api;
}
