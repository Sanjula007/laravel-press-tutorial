<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 1:52 PM
 */

namespace sanjula007\Press\Fields;

class Extra extends FieldContract
{
	public static function process ( $type , $value , $data )
	{
		$data_extra_arr          = empty( $data[ 'extra' ] ) ? [] : json_decode ( $data[ 'extra' ] , true );
		$data_extra_arr[ $type ] = $value;
		return [
			'extra' => json_encode ( $data_extra_arr ) ,
		];
	}
}
