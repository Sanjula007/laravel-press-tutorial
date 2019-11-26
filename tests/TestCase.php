<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 5:43 PM
 */

namespace sanjula007\Press\Tests;


use sanjula007\Press\PressBaseServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
	protected function setUp ()
	: void
	{
		parent::setUp (); // TODO: Change the autogenerated stub


		$this->withFactories ( __DIR__ . '/../database/factories' );
	}


	/**
	 * Get package providers.
	 *
	 * @param  \Illuminate\Foundation\Application $app
	 *
	 * @return array
	 */
	protected function getPackageProviders ( $app )
	{
		return [
			PressBaseServiceProvider::class
		];
	}

	protected function getEnvironmentSetUp ( $app )
	{
		$app[ 'config' ]->set ( 'database.default' , 'testdb' );
		$app[ 'config' ]->set ( 'database.connections.testdb' ,
								[
									'driver'   => 'sqlite' ,
									'database' => ':memory:'
								] );

	}

}