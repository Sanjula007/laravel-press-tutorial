<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 5:38 PM
 */

namespace sanjula007\Press;


use Illuminate\Support\ServiceProvider;

class PressBaseServiceProvider extends ServiceProvider
{
	/**
	 *
	 */
	public function boot ()
	{
		$this->registerResources ();
	}

	private function registerResources ()
	{

		$this->loadMigrationsFrom ( __DIR__ . '/../database/migrations' );
	}

	public function register ()
	{

	}
}
