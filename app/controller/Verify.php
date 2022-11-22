<?php

namespace app\controller;

use app\validate\User;
use think\exception\ValidateException;
use think\facade\Validate;

class Verify
{
    /**
     *
     */
    public function index()
    {
        try {
            validate(User::class)->batch(true)->scene('abc')->check([
                'name'      =>      '111',
                'price'     =>      '1111',
                'email'     =>      '11',
            ]);
        } catch (ValidateException $e){
            dump($e->getError());
        }
    }

    //用独立验证
    public function rule()
    {
        $validate = Validate::rule([
            'name|用户名' => 'require|max:20',
            'price' => 'number|between:1,100',
            'email' =>  'email',

            'username'  =>  'unique:user',
        ]);

        $validate->message([
            'name.require'  =>  '名字不能是空的！',
            'name.max'      =>  '名字最大是20个!'
        ]);

        $result = $validate->batch(true)->check([
            'name'  =>  'aaa',
            'price' =>  12,
            'email' =>  'xiaoxin@qq.com',
            'username'  =>  '路飞',
        ]);

        if (!$result){
            dump($validate->getError());
        }
    }

    public function route($id)
    {
        echo $id;
    }

    public function single()
    {
        dump(Validate::isEmail('xiaoxin@163.com'));
        dump(Validate::isRequire('1'));
    }
}