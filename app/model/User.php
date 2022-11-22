<?php

namespace app\model;

use think\Model;
use think\model\concern\SoftDelete;

class User extends Model
{
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }













    // protected $connection = 'demo';

    //设置字段信息，需要写完整的数据表字段
//    protected $schema = [
//        'id' => 'int',
//        'username' => 'string',
//    ];

    //模型获取器
    /* public function getStatusAttr($value)
     {
         $status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
         return $status[$value];
     }*/

    /*public function getNothingAttr($value,$data)
    {
        $myGet = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
        return $myGet[$data['status']];
    }*/

    //email 修改器
    /*public function setEmailAttr($value)
    {
        return strtoupper($value);
    }*/

    //查询范围 男 5条
   /* public function scopeMale($query)
    {
        $query->where('gender', '男')
            ->field('id,username,gender,email')
            ->limit(5);
    }*/

    //类型转换
//    protected $type = [
//            'status'    =>  'boolean',
//            'price'     =>  'float',
//            'create_at' =>  'datetime:Y/m/d',
//        ];

    //定义list字段json类型
//    protected $json = ['list'];
//
//    //开启软删除
//    use SoftDelete;
//    protected $deleteTime = 'delete_time';
}