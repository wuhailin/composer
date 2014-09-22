<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 14-9-22
 * Time: 下午5:45
 */

namespace common\component;
use CUserIdentity,
    CActiveRecord;

class UserIdentity extends CUserIdentity
{
    public $modelName;
    public function authenticate()
    {
        $model = CActiveRecord::model($this->modelName);
    }
} 