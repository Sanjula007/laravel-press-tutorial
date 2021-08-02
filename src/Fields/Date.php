<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 1:52 PM
 */

namespace sanjula007\Press\Fields;

use Carbon\Carbon;

class Date extends FieldContract
{
    public static function process($type, $value, $data)
    {
        return [
            $type => Carbon::parse($value),
        ];
    }
}
