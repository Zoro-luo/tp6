<?php

namespace app\controller;

use app\model\User;
use think\facade\Log;
use think\facade\View;

class Page
{
    public function index()
    {
        $list =  User::paginate([
            'list_rows' =>  4,
            'var_page'  =>  'page'
        ]);
        return View::fetch('index',[
            'list'  =>  $list,
        ]);
    }

    public function log(){
        Log::record('测试日志！！');
    }
}