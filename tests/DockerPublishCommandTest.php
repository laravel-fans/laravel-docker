<?php

namespace LaravelFans\Docker\Tests;

use Illuminate\Support\Facades\File;

class DockerPublishCommandTest extends TestCase
{
    public function testHandle()
    {
        $laravelPath = __DIR__ . '/../vendor/orchestra/testbench-core/laravel';
        $this->artisan('docker:publish')->run();
        $this->assertFileExists($laravelPath . '/docker/etc/apache2/sites-available/laravel.conf');
        $this->assertFileExists($laravelPath . '/docker/usr/local/bin/docker-laravel-entrypoint');
        $this->assertFileExists($laravelPath . '/docker/var/spool/cron/crontabs');
        $phpVersion = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
        $this->assertFileExists($laravelPath . '/Dockerfile');
        $this->assertTrue(strpos(File::get($laravelPath . '/Dockerfile'), "FROM php:${phpVersion}-apache") !== false);
        $this->assertFileExists($laravelPath . '/.dockerignore');
        $this->assertFileDoesNotExist($laravelPath . '/Dockerfile.dev');
    }

    public function testHandleWithPhpVersion()
    {
        $laravelPath = __DIR__ . '/../vendor/orchestra/testbench-core/laravel';
        $this->artisan('docker:publish', ['--php-version' => '7.4'])->run();
        $this->assertTrue(strpos(File::get($laravelPath . '/Dockerfile'), 'FROM php:7.4-apache') !== false);
        $this->assertFileDoesNotExist($laravelPath . '/Dockerfile.dev');
    }

    public function testHandleWithPhpVersionAndDev()
    {
        $laravelPath = __DIR__ . '/../vendor/orchestra/testbench-core/laravel';
        $this->artisan('docker:publish', ['--php-version' => '8.0', '--dev' => true])->run();
        $this->assertTrue(strpos(File::get($laravelPath . '/Dockerfile'), 'FROM php:8.0-apache') !== false);
        $this->assertTrue(strpos(File::get($laravelPath . '/Dockerfile.dev'), 'INCLUDE+ Dockerfile') !== false);
    }
}
