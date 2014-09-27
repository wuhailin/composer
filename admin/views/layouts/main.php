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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $this->pageTitle?></title>
        <?php
        $this->widget('common\component\widget\Seo');
        ?>
    </head>
    <body>
    <table style="width: 100%;height: 100%" cellpadding="0" cellspacing="0">
        <tr>
            <td id="left" width="20%" valign="top">11</td>
            <td></td>
        </tr>
    </table>
    <?php echo $content;?>
    </body>
</html>
