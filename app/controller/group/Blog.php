<?php

namespace app\controller\group;

class Blog
{
    public function index()
    {
        return 'group.blog.index.';
    }

    public function red()
    {
        return 'group.blog.red.';
    }

    public function details($id)
    {
        return '详情id: '.$id;
    }
}