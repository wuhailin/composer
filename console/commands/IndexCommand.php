<?php
class IndexCommand extends ConsoleCommand
{
	public function actionIndex()
	{
        $model = Admin::model()->find();
        $this->fPrint($model->attributes);
	}

    public function actionTest()
    {
    }
}