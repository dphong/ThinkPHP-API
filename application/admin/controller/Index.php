<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Index extends Controller
{
    public function index($name = '张三', $sex='女')
    {            
        echo "hello: ".$name ." ".$sex;      
    }
    
    public function index2($name = '张三')
    {              
        return "index2";
    } 
    public function index3($name = '张三')
    {              
        return "index2";
    }      
}
