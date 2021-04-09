# Laravel Docker

[![codecov](https://codecov.io/gh/laravel-fans/laravel-docker/branch/main/graph/badge.svg)](https://codecov.io/gh/laravel-fans/laravel-docker)
[![Laravel 6](https://github.com/laravel-fans/laravel-docker/workflows/Laravel%206/badge.svg)](https://github.com/laravel-fans/laravel-docker/actions/workflows/laravel-6.yml)
[![Laravel 7](https://github.com/laravel-fans/laravel-docker/workflows/Laravel%207/badge.svg)](https://github.com/laravel-fans/laravel-docker/actions/workflows/laravel-7.yml)
[![Laravel 8](https://github.com/laravel-fans/laravel-docker/workflows/Laravel%208/badge.svg)](https://github.com/laravel-fans/laravel-docker/actions/workflows/laravel-8.yml)

Full Laravel production environment for Docker.

## install

Run in your Laravel project:

```shell
composer install laravel-fans/docker
php artisan docker:publish
```

## build

Then you will find `Dockerfile` in your project, so you can build:

```
docker build -t laravel-demo .
docker run -t laravel-demo
```

Feel free to change the `Dockerfile`.
