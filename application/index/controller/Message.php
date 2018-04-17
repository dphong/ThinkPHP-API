<?php
/**
 * Created by PhpStorm.
 * User: Whark
 * Date: 2018/4/17
 * Time: 22:14
 */

namespace app\index\controller;


class Message extends BaseController
{
    public function __construct()
    {
        $this->while_rule = false;
        parent::__construct();
    }

    public function index()
    {
        return $this->fetch();
    }
}