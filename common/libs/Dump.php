<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-21
 * Time: 下午2:52
 */

namespace common\libs;


class Dump
{
    public function __construct()
    {
        echo '<pre>';
        \CVarDumper::dump(func_get_args());
        echo '<pre>';
    }

    public static function dump()
    {
        echo '<pre>';
        \CVarDumper::dump(func_get_args());
        echo '<pre>';
        exit;
    }
} 