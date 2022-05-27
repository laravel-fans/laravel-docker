<?php

namespace LaravelFans\Docker\Tests;

use LaravelFans\Docker\DockerServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function getPackageProviders($app)
    {
        return [
            DockerServiceProvider::class,
        ];
    }
}
