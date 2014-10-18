<?php
//Yii::import('application.component.ConsoleCommand');
class IndexCommand extends ConsoleCommand
{
	public function actionIndex()
	{
        $model = Admin::model()->find();
        //print_r($model->attributes);
        //print_r($_SERVER);
	}

    public function actionTest()
    {
    }
}