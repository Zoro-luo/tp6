<?php

namespace app\controller;

use think\facade\Validate;
use think\facade\View;

class Code
{
    public function form()
    {
        return View::fetch('form');
    }

    public function check()
    {
        //验证码验证规则
        /*$validate = Validate::rule([
            'captcha' => 'require|captcha'
        ]);
        $result = $validate->check([
            'captcha'   =>  input('post.code')
        ]);
        if (!$result) {
            dump($validate->getError());
        }*/

        if(!captcha_check(input('post.code'))){
            dump('验证失败');
        }

    }
}