<?php

namespace app\controller;

//use think\Request;
use think\facade\Request;

class Rely
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(Request $request){
        return $request->param('username');
    }

    public function get($id)
    {
//        return $this->request->param('username');
//        return Request::param('username');
//        return request()->param('username');


        //dump(Request::has('name','post'));
        return redirect(url('Inject/index'))->with('name', 'Mr.Lee');;
    }
}