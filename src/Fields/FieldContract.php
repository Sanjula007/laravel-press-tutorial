<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 5:26 PM
 */

namespace sanjula007\Press\Fields;


abstract class FieldContract
{
    public static function process($fieldType, $fieldValue, $data)
    {
        return [
            $fieldType => $fieldValue,
        ];
    }
}
