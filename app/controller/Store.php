<?php

namespace app\controller;

use think\facade\Cache;
use think\facade\Cookie;
use think\facade\Request;
use think\facade\Session;

class Store
{
    public function session()
    {
//        Session::set('user','Mrlee');
//        Session::set('count',100);
//        return Session::get('user');
//        dump(Session::all());
//        dump(Request::session());
//        Session::flash('user','Mr.Lee');
        session('aa','AA');
    }

    public function get()
    {
//        echo session('aa');
        echo cookie('user');
    }

    public function cookie()
    {
        Cookie::set('user','luoquan555',3600);
    }

    public function redis(Request $request)
    {
//        Cache::set('user','luo',36000);
//        Cache::set('val',11);
//        dump( Cache::has('user') );
//        dump( Cache::get('user') );
//        dump( Cache::inc('val',5) );
//        dump( Cache::delete('val') );
//        dump( Cache::has('val') );
        //Cache::remember('start_time',time());
//        Cache::remember('start_time2',function (Request $request){});

//        dump( Cache::get('start_time2') );
//        Cache::clear();
//        dump( Cache::get('start_time2') );

//        Cache::tag('tag')->set('user','zhangsan');
//        Cache::tag('tag')->set('age',22);
//        dump(Cache::get('age'));

        cache('user','zaza1');
        dump( cache('user') );
        cache('user',null);
        dump( cache('user') );
    }

}