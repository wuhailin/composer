<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 2014/10/4
 * Time: 7:41
 *
 * @var common\component\Controller $this
 * @var string                      $content
 */
$this->beginContent('//layouts/main');
Yii::app()->clientScript->registerScript('search', <<<EOD
$('.search-button').click(function() {
    $('.search-div').toggle();
    var html = $(this).html();
    $(this).html($(this).attr('data-html'));
    $(this).attr('data-html', html);
    return false;
});
$('.search-form form').submit(function() {
    $.fn.yiiGridView.update('{$this->id}-grid', {
        data: $(this).serialize()
    });
    return false;
});
EOD
);
$this->app->clientScript->registerScript('menu-toggle', <<<EOD
jQuery(function () {
    jQuery('body').on('click', 'a.btn-navbar', function (e) {
        var dataTarget = jQuery(this).data('target'),
            current = $(dataTarget);
        if ('' != dataTarget && current.length > 0) {
            current.toggle('linear');
        }
    });
});
EOD
);
$this->widget('common.component.NavBar', [
    //'type' => TbNavbar::TYPE_INVERSE,
    'brand'        => Yii::app()->name,
    'brandUrl'     => '/',
    'brandOptions' => [
        'title' => Yii::app()->name,
    ],
    'collapse'     => true,
    'fluid'        => true,
    'collapseName' => '.left-menu',
    'items'        => [
        [
            'class'       => 'bootstrap.widgets.TbMenu',
            'htmlOptions' => [
                'class' => 'pull-right'
            ],
            'items'       => [
                [
                    'label' => '欢迎您：' . Yii::app()->user->getState('name', '匿名用户'),
                    'url'   => 'javascript:void(0)'
                ],
                '---',
                [
                    'label' => '管理',
                    'url'   => 'javascript:void(0)',
                    'items' => [
                        [
                            'label' => '个人信息',
                            'url'   => $this->createAbsoluteUrl('index/profile'),
                        ],
                        '---',
                        [
                            'label' => '我的任务',
                            'url'   => $this->createAbsoluteUrl('index/task'),
                        ],
                        '---',
                        [
                            'label' => '退出',
                            'url'   => $this->createAbsoluteUrl('index/logout'),
                        ]
                    ]
                ],
                '---'
            ]
        ]
    ]
]);
?>
    <div id="page">
        <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td valign="top" class="cltd left-menu">
                    <?php $this->widget('common\component\widget\Menu', array(
                        'items' => Menus::getMenu(),
                    )); ?>
                </td>
                <td valign="top" align="center" class="cltd">
                    <div id="content">
                        <?php if (!empty($this->breadcrumbs)): ?>
                            <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                                'links'     => $this->breadcrumbs,
                                'separator' => '/',
                            )); ?>
                        <?php endif ?>
                        <?php if (!empty($this->subMenu)): ?>
                            <?php $this->widget('bootstrap.widgets.TbMenu', array(
                                'type'    => 'tabs',
                                'stacked' => false,
                                'items'   => $this->subMenu,
                            )); ?>
                        <?php endif ?>
                        <?php echo $content; ?>
                    </div>
                </td>
            </tr>
        </table>
    </div><!-- page -->
    <footer class="footer">
        <div class="container">
            版权所有 &copy; <?php echo date('Y'); ?> by <a href="/"><?php echo Yii::app()->name ?></a>，保留所有权利。
        </div>
    </footer>
<?php $this->endContent(); ?>