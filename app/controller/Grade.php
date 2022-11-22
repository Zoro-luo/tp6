<?php

namespace app\controller;
use app\model\User as UserModel;
class Grade
{
    public function index()
    {
        $user = UserModel::find(19);
        return json($user->profile);
    }

}