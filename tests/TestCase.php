<?php

namespace mindtwo\LaravelAutoCreateUuid\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	/**
	 * Setup the test environment.
	 */
	protected function setUp(): void
	{
	    parent::setUp();
	    $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
	}

	/**
	 * Define environment setup.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 * @return void
	 */
	protected function getEnvironmentSetUp($app)
	{
	    // Setup default database to use sqlite :memory:
	    $app['config']->set('database.default', 'testbench');
	    $app['config']->set('database.connections.testbench', [
	        'driver'   => 'sqlite',
	        'database' => ':memory:',
	        'prefix'   => '',
	    ]);
	}
}
