<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 9:55 AM
 */

namespace sanjula007\Press;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PressFileParser
{
	protected $filename;
	protected $data;
	protected $rawData;

	/**
	 * PressFileParser constructor.
	 */
	public function __construct ( $fileName )
	{
		$this->fileName = $fileName;

		$this->splitFiler ();
		$this->explodeData ();
		$this->processFields ();
	}

	protected function splitFiler ()
	{
		preg_match ( '/^\-{3}(.*?)\-{3}(.*)/s' ,
					 File::exists ( $this->fileName ) ? File::get ( $this->fileName ) : $this->fileName
			,
					 $this->rawData );

	}

	protected function explodeData ()
	{


		foreach ( explode ( "\r\n" , trim ( $this->rawData[ 1 ] ) ) as $fieldString ) {
			preg_match ( '/(.*):\s?(.*)/' , $fieldString , $fieldArray );

			$this->data[ $fieldArray[ 1 ] ] = $fieldArray[ 2 ];

		}

		$this->data[ 'body' ] = $this->rawData[ 2 ];
	}

	protected function processFields ()
	{
		foreach ( $this->data as $field => $value ) {

			$class = "sanjula007\\Press\\Fields\\" . Str::title ( $field );

			if ( class_exists ( $class ) && method_exists ( $class , 'process' ) ) {
				$this->data = array_merge ( $this->data , $class::process ( $field , $value , $this->data ) );
			} else {
				$class      = "sanjula007\\Press\\Fields\\Extra";
				$this->data = array_merge ( $this->data , $class::process ( $field , $value , $this->data ) );
			}
		}

	}

	/**
	 * get the file data
	 */
	public function getData ()
	{
		return $this->data;
	}

	/**
	 * get the file data
	 */
	public function getRawData ()
	{
		return $this->rawData;
	}
}
