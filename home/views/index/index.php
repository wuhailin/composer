<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-21
 * Time: 下午1:55
 * @var IndexController $this
 * @var common\model\Article $model
 */
$this->widget('bootstrap.widgets.TbGridView', [
    'dataProvider' => $model->search(),
    'columns' => [
        'title',
        [
            'name' => 'content',
            'type' => 'html',
            'value' => 'isset($data->content) ? $data->content->body: ""',
        ]
    ]
]);