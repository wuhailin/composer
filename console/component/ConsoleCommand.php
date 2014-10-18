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
        print_r($_SERVER);
    }
} 