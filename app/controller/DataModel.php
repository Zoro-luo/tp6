<?php

namespace app\controller;

use app\model\User as UserModel;
use think\facade\Db;

class DataModel
{
    public function index()
    {
        return json(UserModel::select());
    }

    public function insert()
    {
        $user = new UserModel();
        $user->save([
            'username' => '李白22',
            'password' => '123',
            'gender' => '男',
            'email' => 'libai@163.com',
            'price' => 100,
            'details' => '123',
            'list' => ['username'=>'辉夜', 'gender'=>'女','email'=>'huiye@163.com'],
            'uid' => 1011
        ]);
        echo $user->id;


        /*$user = UserModel::create([
            'username' => 'libai3',
            'password' => '123',
            'gender' => '男',
            'email' => 'libai2@123.com',
            'price' => 123,
            'details' => '1234',
            'uid' => 1011,
        ], ['username', 'password', 'details', 'price', 'email', 'uid','create_at','update_at'], false);
        echo $user->id;*/
    }

    public function field()
    {
        UserModel::select();
        //Db::name('user')->select();
    }

    public function getAttr()
    {
        $user = UserModel::find(19);
        //return $user->status;
//        return $user->nothing;
        //return dump($user);
    }

    public function scope()
    {
        //$result = UserModel::scope('male')->select();
        //$result = UserModel::male()->select();
        //return json($result);
        UserModel::withoutGlobalScope()->select();
        return Db::getLastSql();
    }

    public function type()
    {
        $user = UserModel::find(310);
        var_dump($user->status);
        var_dump($user->price);
        var_dump($user->create_at);
    }

    //软删除
    public function softDelete()
    {
//         UserModel::find(318)->delete();
        UserModel::destroy(318);
        $user = UserModel::select();
        return json($user);
    }

    public function softShow()
    {
        $user = UserModel::onlyTrashed()->select();
        echo Db::getLastSql();
//        return $user;
    }
}