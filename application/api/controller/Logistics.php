<?php

namespace app\api\controller;
use app\index\controller\BaseController;
use think\Controller;
use think\Db;
use think\Url;
use app\api\model\Users;
use think\Validate;
use app\api\model\LogisticsTable;
use think\Request;
/**
 * Description of map
 *
 * @author HDP
 */
class Logistics extends BaseController {
    //模板位置申明
    function __construct()
    {
        $this->white_rule = false;

        $this->rule = [
            'show',
        ];

        parent::__construct();
    }
    
    //index
    public function index()
    {
    }
    
    //数据插入
    public function add()
    {
         $request = Request::instance();
        if( $request->param('apikey')){
            $data = $request->param();
        } else {
            return json(array(
                'status' => -1,
                'message'    => '必须包含apikey',
            ));
        }
        // 数据验证
        $result = $this->validate($data,'Logistics');
        if (true !== $result) {
            return json(array(
                'status' => -1,
                'message'    => $result,
            ));
        } else {
            //查询apikey
            if($this->userInfo)
            {
                $allData = input('post.') + input('get.');
                $logistics = new LogisticsTable();
                $logistics->send_name = $allData['send_name'];
                $logistics->send_phone = $allData['send_phone'];
                $logistics->send_province = $allData['send_province'];
                $logistics->send_address = $allData['send_address'];
                $logistics->receive_name = $allData['receive_name'];
                $logistics->receive_phone = $allData['receive_phone'];

                $logistics->receive_province = $allData['receive_province'];
                $logistics->receive_address = $allData['receive_address'];

                $logistics->object_type = $allData['object_type'];
                $logistics->object_weight = $allData['object_weight'];
                $logistics->object_remark = $allData['object_remark'];

                $logistics->pickup_time = $request->param('pickup_time');
                $logistics->pickup_remark = $request->param('pickup_remark');
                $logistics->order_price = $request->param('order_price');
                $logistics->postal_code = $request->param('postal_code');
                
                $logistics->uid = $this->userId;
                $logistics->allowField(true)->save($logistics);
            } else {
                return json(array(
                    'status' => -1,
                    'message' => 204,
                ));
            }
            
            if(isset($_GET['data_type']))
            {
                $this->success("恭喜您，下单成功，您的订单号为 {$logistics->id} ，页面跳转中...", url('index/Index/index'));
            } else {
                //数据API使用时，返回JSON数据
                return json(array(
                    'status' => 1,
                    'message' => $logistics->id,
            ));
            }
        }
    }
           
    //只查logistics表
    public function show() {
        /*
         * 修复查看数据界面，已登录用户，状态显示异常，并实现分页   DpHong  2017.5.17
         */
        $logistics = new LogisticsTable();
        $list = $logistics->where('uid',$this->userId)->paginate(8);
        $this->assign('list',$list);
        return $this->fetch();
    }
  
    //数据获取
    public function get() {
        $request = Request::instance();
        if ($request->has('apikey','post')) {
            $user = Users::get(['apikey'=> input('post.apikey')])->value('user_id');
            //$logistics = new Rfid;
            $logistics = LogisticsTable::where('uid',$user)->order('id','desc')->select();
            //dump($logistics);
        } else if($request->has('apikey','get'))
        {
            $user = Users::get(['apikey'=> $request->get('apikey')])->value('user_id');
            //$logistics = new Rfid;
            $logistics = LogisticsTable::where('uid',$user)->order('id','desc')->select();
        } else {
            return json(array(
                'status' => -1,
                'message' => 'APIKey error',
                'data'   => '',
            ));
        }
        if ($logistics) {
            return json(array(
                'status' => 1,
                'message'  => 200,
                'data'   => $logistics,
            ));
        } else {
            return json(array(
                'status' => 1,
                'message' => 202,
                'data'   => '',
            ));
        }
        return json(array(
                'status' => -1,
                'message' => 203,
                'data'   => '',
        ));
    }
}
