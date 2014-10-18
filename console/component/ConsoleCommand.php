<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 2014/10/19
 * Time: 0:32
 */
class ConsoleCommand extends CConsoleCommand
{
    public function init()
    {
    }

    protected function fPrint()
    {
        ob_start();
        print_r(func_get_args());
        $content = ob_get_contents();
        ob_clean();
        echo $content;
    }
} 