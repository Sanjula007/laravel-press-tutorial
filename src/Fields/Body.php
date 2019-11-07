<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 1:52 PM
 */

namespace sanjula007\Press\Fields;

use sanjula007\Press\MarkdownParser;

class Body extends FieldContract
{
	public static function process ( $type , $value , $data )
	{
		return [
			$type => MarkdownParser:: parse ( $value ) ,
		];
	}
}
