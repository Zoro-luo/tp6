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
        Cookie::set('user','Aa',3600);
    }
}