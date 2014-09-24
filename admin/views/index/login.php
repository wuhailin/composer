<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 2014/9/24
 * Time: 11:32
 * @var $this \common\component\Controller
 * @var TbActiveForm  $form
 * @var \application\model\LoginForm $model
 */
$form = $this->beginWidget('common\component\widget\ActiveForm');
echo $form->textFieldRow($model, 'username');
$this->endWidget($form);