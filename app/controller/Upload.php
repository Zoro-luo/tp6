<?php

namespace app\controller;

use think\facade\Filesystem;
use think\facade\Request;
use think\facade\Validate;
use think\facade\View;


class Upload
{
    public function upload()
    {


        return View::fetch('upload');
    }

    //单文件
    public function doUpload()
    {
        $file = Request::file('image');

        //编写规则
        $validate = Validate::rule([
            'image' => 'file|fileExt:jpg.png,gif'
        ]);

        //验证规则
        $result = $validate->check([
            'image' =>  $file
        ]);

        if ($result) {
            $info = Filesystem::putfile('topic',$file);
            dump($info);
        }else{
            dump($validate->getError());
        }
    }

    //多文件
    public function more()
    {
        $files = Request::file('image');
        $info = [];
        foreach ($files as $file){
            $info[] = Filesystem::putfile('topic',$file);
        }
        dump($info);
    }

    public function lang()
    {

    }
}