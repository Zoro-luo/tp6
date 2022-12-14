<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'name'      =>      'require|max:20',
        'price'     =>      'number|between:1,100',
        'email'     =>      'email',
        //'id'        =>      'number|between:1,10',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'name.require' => '姓名不得为空',
        'name.max' => '姓名不得大于 20 位',
        'price.number' => '价格必须是数字',
        'price.between' => '价格必须 1-100 之间',
        'email' => '邮箱的格式错误',
        //'id.number' =>  'id必须是数字',
        //'id.between' =>  'id必须 1-100 之间',
    ];

    protected $scene = [
        'insert'    =>  ['name','price','email'],
        'abc'      =>  ['name','price'],
        //'route'     =>  ['id'],
    ];

    protected function sceneEdit()
    {
        $edit = $this->only(['name','price']);
        return $edit;
    }


}
