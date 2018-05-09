<?php
/**
 * Created by PhpStorm.
 * User: Whark
 * Date: 2018/4/15
 * Time: 16:21
 */

namespace app\index\controller;

use app\index\model\Users;
use think\Request;
use think\Controller;
use think\response\Json;

class BaseController extends Controller
{
    // 用户ID
    protected $userId;

    // 用户信息
    protected $userInfo;

    // 是白名单还是黑名单模式
    protected $white_rule = true;

    // url规则
    protected $rule = [];

    // 当前url是否在规则当中
    protected $in_array;

    // 是否登录过期
    protected $expired = false;

    public function __construct()
    {
        parent::__construct();
        $this->view->replace(['__PUBLIC__' => 'https://whark.oss-cn-hangzhou.aliyuncs.com/thinkphp-api']);

        $this->in_array = in_array($_SERVER['REQUEST_URI'], $this->rule);

        $request = Request::instance();
        if ($request->cookie('uid')) {
            $user = Users::get(['user_id' => $request->cookie('uid')]);
            $validate = createPasswd($user->user_id . $user->username . $user->created_at);
            if ($request->cookie('validate') === $validate) {
                $this->userId = $request->cookie('uid');
                $this->userInfo = $user;
                $this->assign('user', $user);
            } else {
                $this->expired = true;
            }
        }


        if ($this->white_rule && !$this->in_array  // 是白名单，且不在名单中，验证用户
            || !$this->white_rule && $this->in_array) { // 是黑名单，且在名单中，验证用户

            if ($this->expired) {
                self::jumpToUrl('/login', '登录信息已过期，请重新登录');
            }

            if (!$this->userInfo) {
                self::jumpToUrl('/login', '您尚未登录，请登录');
            }
        }
    }

    public static function jumpToUrl($url = '/', $msg = '')
    {
        if ($msg) {
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
            echo '<script type="text/javascript">alert("' . $msg . '");</script>';
        }
        echo '<script type="text/javascript">window.location.href="' . $url . '";</script>';
        exit(0);
    }

    public function json($status = '200', $msg = '', $data = [], $code = 200, $header = [])
    {
        return new Json(
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $data
            ],
            $code,
            $header
        );
    }

}