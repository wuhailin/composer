<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 2014/9/24
 * Time: 16:11
 * @property CActiveRecord  $owner
 */
namespace common\component\behavior;

class UserBehavior extends \CActiveRecordBehavior
{
    public $usernameField = 'username';
    public $passwordField = 'password';
    public $encryptField = 'encrypt';

    public function findByUsername($username = null)
    {
        return $this->owner->findByAttributes(array($this->usernameField => $username));
    }

    public function validatePassword($password = null)
    {
        return $this->owner->getAttribute($this->passwordField) == substr(sha1(md5($password).$this->owner->getAttribute($this->encryptField)), 4, 20);
    }
} 