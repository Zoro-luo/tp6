<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;

class Test extends BaseController
{
    public function index()
    {

        $user = Db::name('user')->select();
        return $user->toArray();


        return  $this->app->getBasePath();
        return "aaaaaa";
    }

    //事务
    public function getter()
    {

        Db::Transaction(function (){
            Db::name('user')->where('id',19)->save(['price'=>Db::raw('price - 3')]);
            Db::name('user')->where('id',20)->save(['price'=>Db::raw('price + 3')]);
        });
    }

    public function test()
    {
        //return Db::name('user')->limit(2)->select();
//       return Db::name('user')->limit(1,3)->select();
//        return json($dbObject->limit(1,2)->select());
        /*$user = $dbObject->where('username|email','like','%xiao%')
            ->where('price&uid','>',0)
            ->select();*/
        $user = Db::name('user')
            ->whereColumn('update_time','>=','create_time')
            ->select();
        dump($user);
       return json($user);
        //dump(Db::getLastSql());
    }

    public function field()
    {
        $user1 = Db::name('user')->field('id,username,price')->select();
        $user2 = Db::name('user')->field(['id','username','email'])->select();

        return Db::getLastSql($user1);
    }

    public function alias()
    {
       $user =  Db::name('user')->alias('a')->select();
       return json($user);
    }

    public function group()
    {
        $user = Db::name('user')->field('gender, SUM(price)')
                                        ->group('gender')
                                        ->select();
//        return Db::getLastSql();
        return json($user);
    }

    public function group2()
    {
        $user = Db::name('user')->fieldRaw('gender, SUM(price)')
                        ->group('gender,password')->select();
        return json($user);
    }

    public function having()
    {
       $result = Db::name('user')
                ->field('gender, SUM(price)')
                ->group('gender')
                ->having('SUM(price)>600')
                ->select();
       return json($result);
    }

    //原生查询
    public function query()
    {
        $user = Db::query('select * from tp_user');
//        $sql = Db::getLastSql($user);
        return json($user);
    }

    // 原生写入更新
    public function execute()
    {
        $result = Db::execute('update tp_user set username="王八蛋" where id=26');
        dump($result);
    }

    public function select1()
    {
        $res = Db::name('user')->where('id','>','25')->select();
        return json($res);
    }

    public function select2()
    {
        $res = Db::name('user')->where([
            'gender'    =>  '男',
            'price'     =>  100
        ])->select();
        return json($res);
    }

    public function select3()
    {
        $user = Db::name('user')->where([
            ['gender', '=', '男'],
            ['price', '=', '100']
        ])->select();
        return json($user);
    }

    public function select4()
    {
        $user = Db::name('user')
            ->whereRaw('(username LIKE "%小%" AND email LIKE "%163%") OR (price > 80)')
            ->select();
        return json($user);
        return Db::getLastSql();
    }
}