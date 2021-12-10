<?php

namespace LaravelFans\Docker;

use FilesystemIterator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DockerPublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:publish
        {--php-version= : PHP version, default same as local PHP version}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Dockerfile';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $basePath = $this->laravel->basePath();

        File::copyDirectory(__DIR__ . '/stubs', $basePath, FilesystemIterator::CURRENT_MODE_MASK);

        // TODO: no testable, can not mock
        $phpVersion = $this->option('php-version') ?? PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
        $this->replaceVersion("$basePath/Dockerfile", $phpVersion);

        $this->info('published successfully.');
    }

    private function replaceVersion($dockerfile, $phpVersion)
    {
        $content = File::get($dockerfile);
        $content = preg_replace('/FROM php:\d\.\d/i', "FROM php:${phpVersion}", $content);
        File::put($dockerfile, $content);
    }
}
