<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 14-9-22
 * Time: 下午5:37
 */

namespace application\model;
use CFormModel,
    common\component\UserIdentity;

class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $modelName = 'Admin';

    public function rules()
    {
        return [
            ['username, password', 'required'],
            ['password', 'authenticate'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户',
            'password' => '密码',
        ];
    }

    public function authenticate()
    {
        $identity = new UserIdentity($this->username, $this->password);
        $identity->modelName = $this->modelName;
    }
} 