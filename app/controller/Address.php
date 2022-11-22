<?php

namespace app\controller;

class Address
{
    public function index()
    {

    }

    public function details($id)
    {
        return '详情id: '.$id;
    }

    public function search($id,$uid)
    {
        return '详情id: '.$id.',详情uid: '.$uid;
    }
}