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
<!DOCTYPE html>
<html lang="zh-cn" data-ng-app="<?php echo property_exists($this, 'angularName') ? $this->angularName : ''?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->getPageTitle()?></title>
        <?php
        $this->widget('common\component\widget\Seo');
        $this->widget('\common\component\widget\AngularJS');
        ?>
    </head>
    <body>
    <?php echo $content;?>
    <input type="button" id="test1" value="test1"/>
    <input type="button" id="test2" value="test"/>
    <input type="text" id="test3"/>
    </body>
    <script>
        $(function(){
            var test3 = $('#test3'),
                test2 = $('#test2');
            test2.toggle(function(){
                test3.val(1);
            },function(){
                test3.val(2);
            });
            $('#test1').on('click', function(){
                test2.click();
            });
        });
    </script>
</html>
