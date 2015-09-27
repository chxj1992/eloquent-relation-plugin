<?php
namespace Medlinker\EloquentRelationPlugin\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'Jenssegers\Mongodb\MongodbServiceProvider',
            'Jenssegers\Mongodb\Auth\PasswordResetServiceProvider',
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'mongodb');

        $app['config']->set('database.connections.mongodb', [
            'host' => '127.0.0.1',
            'database' => 'unittest',
        ]);
    }
}