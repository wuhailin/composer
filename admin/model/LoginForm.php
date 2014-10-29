<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 14-9-22
 * Time: 下午5:37
 */

class LoginForm extends CFormModel
{
    public $username;
    public $password;
    /**
     * @var UserIdentity
     */
    protected $_identity;

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
            'username' => '用户帐号',
            'password' => '用户密码',
        ];
    }

    public function authenticate()
    {
        $this->_identity = new UserIdentity($this->username, $this->password);
        $this->_identity->modelName = 'common\model\Admin';
        if(!$this->_identity->authenticate()){
            $this->addError('password', '用户或密码错误！');
        }
    }

    public function login()
    {
        if(null === $this->_identity){
            $this->authenticate();
        }

        if(UserIdentity::ERROR_NONE === $this->_identity->errorCode){//check ok
            /**
             * @var CWebUser    $user
             */
            $user = Yii::app()->user;
            $user->login($this->_identity);
            return true;
        }
        return false;
    }
} 