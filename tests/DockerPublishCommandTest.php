<?php

namespace LaravelFans\Docker\Tests;

class DockerPublishCommandTest extends TestCase
{
    public function testHandle()
    {
        $laravelPath = __DIR__ . '/../vendor/orchestra/testbench-core/laravel';
        $this->artisan('docker:publish')->run();
        $this->assertFileExists($laravelPath . '/docker/etc/apache2/sites-available/laravel.conf');
        $this->assertFileExists($laravelPath . '/docker/usr/local/bin/docker-laravel-entrypoint');
        $this->assertFileExists($laravelPath . '/docker/var/spool/cron/crontabs');
        $this->assertFileExists($laravelPath . '/Dockerfile');
        $this->assertFileExists($laravelPath . '/.dockerignore');
    }
}
