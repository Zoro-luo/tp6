<?php

namespace app\controller;

use app\model\One;

class Inject
{
    protected $one;

    public function __construct(One $one)
    {
        $this->one = $one;
    }

    public function index()
    {
        echo session('name');
        return $this->one->username;
    }

    public function bind(){
        bind('one','app\model\One');    //手动绑定
        return app('one')->username;                //手动实例化
    }
}