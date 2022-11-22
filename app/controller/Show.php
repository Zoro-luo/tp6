<?php

namespace app\controller;

use think\facade\View;
use think\Request;

class Show
{
    public function index(Request $request)
    {
        /*View::assign([
            'name'  =>  'mr Lee',
            'age'   =>   18,
        ]);*/
        /*return View::fetch('index',[
            'name'  =>  'mr Lee',
            'age'   =>   18,
        ]);*/
        //助手函数
        return view('index',[
            'name'  =>  'mr Lee',
            'age'   =>   18,
        ]);
    }

    public function test(Request $request)
    {
        $name = 'MR lee';
        require 'test/1.php';
    }

    public function condition()
    {
        return View::fetch('condition',[
            'number'=> 3,
            'id'=> 2,
        ]);
    }

    public function block()
    {
        return View::fetch('block',[
                'title' => '标题1'
            ]);
    }

}