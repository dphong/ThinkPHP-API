<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    //'/' => 'index/user/home',
    '/'      =>  'index/user/home',
    'sample' =>  'api/index/sample',
    'login'  =>  'index/user/login',
    'logout' =>  'index/user/logout',
    'reg' =>  'index/user/reg',
    'map'    =>  'api/map/index',
    'send'   =>  'index/index/send',
    'check'  =>  'index/index/check',
    'add'    =>  'index/index/add',
    'sql'    =>  'index/index/sql',
    'iot'    =>  'index/index/iot',
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[home]'     => [
      //  ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
      //  ':name' => ['index/hello', ['method' => 'post']],
    ],
    'hello/[:name]' =>['index/index/hello',['method' => 'get', 'ext' => 'html']],
    
    //'home' =>['index/user/home',['method' => 'get']],
    // 定义闭包
   // 'hello/[:name]' => function ($name) {
   //     return 'Hello, 闭包' . $name . '!';
  //  }, 
    'today/[:year]/[:month]' =>['index/index/today',['method'=>'get'],['year'=>'\d{4}','month'=>'\d{2}']],
];













