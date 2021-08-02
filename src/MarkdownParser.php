<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/4/2019
 * Time: 5:12 PM
 */

namespace sanjula007\Press;

use Parsedown;

class MarkdownParser
{

    public static function parse(string $string)
    {
        return Parsedown::instance()->text($string);
    }
}

