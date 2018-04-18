<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\api\controller;

use app\index\controller\BaseController;
use think\Cache;
use think\Request;
use app\api\model\Users;
use think\Validate;
use app\api\model\Maps;

/**
 * Description of map
 *
 * @author HDP
 */
class Map extends BaseController
{
    //模板位置申明
    function __construct()
    {
        $this->while_rule = false;
        $this->rule = [
            'show'
        ];
        parent::__construct();
    }

    //index
    public function index()
    {
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $request = Request::instance();
        if ($request->param('lng') && $request->param('lat')) {
            $data = $request->param();
            $lng = input('?get.lng') ? input('get.lng') : input('post.lng');
            $lat = input('?get.lat') ? input('get.lat') : input('post.lat');
            // 数据验证
            $result = $this->validate($data, 'Position');
            if (true !== $result) {
                return json(array(
                    'status' => -1,
                    'message' => $result,
                ));
            }
        }
        /*
         * 修复地图展示界面，传参确定地图显示的位置   DpHong  2017.5.17
         */

        if (!empty($lng)) {
            $point = "point = new BMap.Point($lng,$lat);";
            $this->assign('setMarker', "setMarker($lng,$lat);");
        } else {
            $point = 'point = new BMap.Point(117.234877,31.756886);';
            $this->assign('setMarker', "setMarker(117.234877,31.756886);");
        }
        $this->assign('point', $point);
        return $this->fetch();
    }

    //数据插入
    public function add()
    {
        $request = Request::instance();
        if ($request->param('apikey')) {
            $data = $request->param();
        } else {
            return json(array(
                'status' => -1,
                'message' => 205,
            ));
        }
        // 数据验证
        $result = $this->validate($data, 'Maps');
        if (true !== $result) {
            return json(array(
                'status' => -1,
                'message' => $result,
            ));
        } else {
            //查询apikey
            //$user = Users::get(['apikey'=> $request->param('apikey')]);

            $apikey = $request->param('apikey');

            //使用缓存存储ApiKey和用户ID
            $userid_cache = Cache::get($apikey);
            if (empty($userid_cache)) {
                $user = Users::get(['apikey' => $apikey]);
                $userid_cache = $user->user_id;
                Cache::set($apikey, $userid_cache);
            }
            //if($user)
            if ($userid_cache) {
                $map = new Maps();
                $map->lng = Request::instance()->isGet() ? input('get.lng') : input('post.lng');
                $map->lat = Request::instance()->isGet() ? input('get.lat') : input('post.lat');
                $map->code = Request::instance()->isGet() ? input('get.code') : input('post.code');
                //echo $user->user_id;
                $map->uid = $userid_cache;
                //$map->add_time = time();
                //echo $map->add_time;
                $map->allowField(true)->save($map);
            } else {
                return json(array(
                    'status' => -1,
                    'message' => 204,
                ));
            }
            return json(array(
                'status' => 1,
                'message' => $map->map_id,
            ));
        }
    }

    //只查maps表
    public function show()
    {
        /*
         * 修复查看数据界面，已登录用户，状态显示异常，并实现分页   DpHong  2017.5.17
         */
        $request = Request::instance();
        $maps = new Maps();
        $list = $maps->where('uid', $this->userId)->paginate(10);
        $this->assign('list', $list);
        return $this->fetch();
    }

    //users表和maps表的关联查询
    public function show2()
    {
        $user = Users::get(1);
//        dump($user);
        $this->assign('list', $user->maps);
        return $this->fetch();
    }

    //数据获取
    public function get()
    {
        $request = Request::instance();

        if ($request->param('apikey')) {

            $apikey = $request->param('apikey');

            //使用缓存存储ApiKey和用户ID
            $userid_cache = Cache::get($apikey);
            if (empty($userid_cache)) {
                $user = Users::get(['apikey' => $apikey]);
                $userid_cache = $user->user_id;
                Cache::set($apikey, $userid_cache);
            }
            $map = Maps::where('uid', $userid_cache)->order('map_id', 'desc')->select();

        } else {
            return json(array(
                'status' => -1,
                'message' => 201,
                'data' => '',
            ));
        }
        if ($map) {
            return json(array(
                'status' => 1,
                'message' => 200,
                'data' => $map,
            ));
        } else {
            return json(array(
                'status' => 1,
                'message' => 202,
                'data' => '',
            ));
        }
        return json(array(
            'status' => -1,
            'message' => 203,
            'data' => '',
        ));
    }
}
