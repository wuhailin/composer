<?php

/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 14-9-22
 * Time: 下午5:45
 */
class UserIdentity extends CUserIdentity
{
    /**
     * @var string
     */
    public $modelName;
    /**
     * @var common\model\Admin
     */
    public $model;
    /**
     * @var int
     */
    protected $_id;

    public function authenticate()
    {
        if ($this->modelName) {
            $this->model = CActiveRecord::model($this->modelName);
        }
        $this->model = $this->model->findByUsername($this->username);
        if (null === $this->model) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!$this->model->validatePassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->login();
        }
        return self::ERROR_NONE === $this->errorCode;
    }

    protected function login()
    {
        $this->_id = $this->model->id;
        $this->setState('model', $this->modelName);
        $this->setState('id', $this->_id);
        $this->setState('username', $this->model->username);
        $this->setState('name', $this->model->name);
        $this->errorCode = self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->_id;
    }
} 