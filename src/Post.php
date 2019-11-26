<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 6:00 PM
 */

namespace sanjula007\Press;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
	protected $guarded = [];


	public function test ()
	{
		DB::table ( 'fds' );
	}
}
