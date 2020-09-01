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
    protected $signature = 'docker:publish';

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

        $this->info('published successfully.');
    }
}

