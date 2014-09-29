<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-21
 * Time: 下午1:55
 * @var common\component\Controller $this
 * @var string $content
 */
$this->bootstrap->init();
$this->app->clientScript->registerCssFile('/css/styles.css');
?>
<html lang="zh-cn">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $this->pageTitle?></title>
        <?php
        $this->widget('common\component\widget\Seo');
        ?>
    </head>
    <body>
    <?php
    $this->widget('bootstrap.widgets.TbNavbar',[
        'brand' => $this->app->name,
        'fixed' => true,
        'collapse'=>true,
        'items' => [
        ]
    ]);
    ?>
    <div class="layouts" id="right">
        11111
    </div>
    <div id="left" class="layouts">
        <?php
        $this->widget('CMenu', [
            'items' => Menus::getMenu(),
        ]);
        ?>
    </div>
    <?php echo $content;?>
    </body>
</html>
