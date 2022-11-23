<?php

namespace app\controller;

use think\facade\Filesystem;
use think\facade\Request;
use think\facade\View;


class Upload
{
    public function upload()
    {
        return View::fetch('upload');
    }

    public function doUpload()
    {
        $file = Request::file('image');
        $info = Filesystem::putfile('topic',$file);
        dump($info);
    }
}