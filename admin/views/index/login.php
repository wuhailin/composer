<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 2014/9/24
 * Time: 11:32
 * @var $this \common\component\Controller
 * @var TbActiveForm  $form
 * @var LoginForm $model
 */
$form = $this->beginWidget('common\component\widget\ActiveForm');

echo $form->errorSummary($model);
echo $form->textFieldRow($model, 'username');
echo $form->passwordFieldRow($model, 'password');

echo CHtml::openTag('div', ['class' => 'actions']);
$this->widget('bootstrap.widgets.TbButton', [
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => '登录',
]);
echo CHtml::closeTag('div');

$this->endWidget($form);