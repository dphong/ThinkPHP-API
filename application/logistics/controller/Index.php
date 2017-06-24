<?php
namespace app\logistics\controller;
use think\Controller;
use think\Request;
use think\Db;
class Index extends Controller
{
    
    function __construct() 
    {
        parent::__construct();
        $this->view->replace(['__PUBLIC__'    =>  '/static',]);
    }
    
    public function index()
    {            
        return $this->fetch();
    }
}
