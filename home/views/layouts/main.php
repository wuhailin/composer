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
?>
<html>
    <head>
        <title><?php echo $this->pageTitle?></title>
        <?php
        $this->widget('common\component\widget\Seo');
        ?>
    </head>

    <body>
    <?php echo $content;?>
    </body>
</html>
