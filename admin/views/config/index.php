<?php
/**
 * @var $this ConfigController
 * @var $dataProvider CActiveDataProvider
 */

$this->widget('bootstrap.widgets.TbGridView', [
    'dataProvider' => $this->model->search(),
    'columns' => [
        'key',
        'name',
    ]
]);

