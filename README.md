# Laravel Docker

[![codecov](https://codecov.io/gh/laravel-fans/laravel-docker/branch/main/graph/badge.svg)](https://codecov.io/gh/laravel-fans/laravel-docker)

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
