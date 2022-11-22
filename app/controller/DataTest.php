<?php

namespace app\controller;

use app\model\User as UserModel;
use think\facade\Db;

class DataTest
{
    public function index()
    {
        $user = Db::connect('demo')->table('tp_user')->select();
    }

    public function select()
    {
        $res = Db::name('user')->where('id','>','25')->select();
        return json($res);
    }

    public function find()
    {
        $user = Db::table('tp_user')->where('id',19)->find();
        $getlast = Db::table('tp_user')->getLastSql();
        echo $getlast;

//        $findorfail = Db::table('tp_user')->where('id',19)->findOrEmpty();
//        return json($findorfail);

        $user = Db::name('user')->select()->toArray();
        dump($user);
        //return json($user);
    }

    public function demo()
    {
        $demo = Db::connect('demo')->table('tp_user')->select();
        return $demo;
    }

    public function demoModel()
    {
        $user = User::select();
        return json($user);
    }

    public function user()
    {
        $user = Db::table('tp_user')->where('id',27)->find();
        $sql = Db::getLastSql();
        $user1 = Db::table('tp_user')->where('id',1)->findOrEmpty();
        dump($user1);
        dump($sql);
        dump($user);
    }

    public function time()
    {
        $user = Db::name('user')->where('create_time','>','2018-1-1')->select()
                ->toArray();
        dump($user);
    }

    public function insert()
    {
        $data = [
            'username' => '辉夜',
            'password' => '123',
            'gender' => '女',
            'email' => 'huiye@163.com',
            'price' => 90,
            'details' => '123',
            'uid' => 1011,
            'status' => 1,
            'list' => ['username'=>'辉夜', 'gender'=>'女','email'=>'huiye@163.com'],
        ];
        Db::name('user')->json(['list'])->insert($data);


        /*$user = new UserModel();
        $user->username = '李白';
        $user->password = '123';
        $user->gender = '男';
        $user->email = 'libai@163.com';
        $user->price = 100;
        $user->details = '123';
        $user->save();*/

        /*$user = new UserModel();
        $user ->save([
            'username' => '李白2',
            'password' => '1234',
            'gender' => '男',
            'email' => 'libai2@163.com',
            'price' => 100,
            'details' => '123',
            'uid'   =>  '1021'
        ]);*/

       /* $list = [
            [
                'username' => '李白 3',
                'password' => '123',
                'gender' => '男',
                'email' => 'libai@163.com',
                'price' => 100,
                'details' => '123',
                'uid' => 1011
            ],
            [
                'username' => '李白 4',
                'password' => '123',
                'gender' => '男',
                'email' => 'libai@163.com',
                'price' => 100,
                'details' => '123',
                'uid' => 1011
            ]
        ];
        $user = new UserModel();
        $user->saveAll($list);*/
    }

    public function update()
    {
        /*$user = UserModel::find(19);
        $user->username = '蜡笔小西西';
        $user->email = '123@qq.com';
        $user->price = Db::raw('price+1');
        dump($user->force()->save());*/

        /*$user = new UserModel();
        $list = [
            ['id'=>301,'username'=>'黑人牙垢301','email'=>'beibei@qq.com'],
            ['id'=>302,'username'=>'黑人牙垢302','email'=>'beibei@qq.com'],
            ['id'=>79,'username'=>'黑人牙垢79','email'=>'beibei@qq.com'],
        ];
        $user->saveAll($list);*/

       /* UserModel::update([
            'id'=>79,'username'=>'黑人牙','email'=>'beibei@qq.com'
        ]);*/

        $data['list'] = ['username'=>'李嘿嘿', 'gender'=>'男', 'email'=>'libai@163.com'];
        $data['list']['username'] ='张飒撒';

        return Db::name('user')->where('id',317)->json(['list'])->save($data);
    }

    //模型的查询
    public function findModel()
    {
        /*$user = UserModel::find(301);
        return json($user);*/

        $user = UserModel::where('username','李白')->find();
        return json($user);
    }

    public function field()
    {

    }
}