<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 2014/9/24
 * Time: 11:48
 */

namespace common\component\widget;

use TbActiveForm;

\Yii::import('bootstrap.widgets.TbActiveForm');

class ActiveForm extends TbActiveForm
{
    public function textField($model, $attribute, $htmlOptions = array())
    {
        if (!isset($htmlOptions['placeholder'])) {
            $htmlOptions['placeholder'] = $model->getAttributeLabel($attribute);
        }
        return parent::textField($model, $attribute, $htmlOptions);
    }

    public function passwordField($model, $attribute, $htmlOptions = array())
    {
        if (!isset($htmlOptions['placeholder'])) {
            $htmlOptions['placeholder'] = $model->getAttributeLabel($attribute);
        }
        return parent::passwordField($model, $attribute, $htmlOptions);
    }
}