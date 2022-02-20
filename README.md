# Laravel Docker

[![codecov](https://codecov.io/gh/laravel-fans/laravel-docker/branch/main/graph/badge.svg)](https://codecov.io/gh/laravel-fans/laravel-docker)
[![Laravel 6](https://github.com/laravel-fans/laravel-docker/workflows/Laravel%206/badge.svg)](https://github.com/laravel-fans/laravel-docker/actions/workflows/laravel-6.yml)
[![Laravel 7](https://github.com/laravel-fans/laravel-docker/workflows/Laravel%207/badge.svg)](https://github.com/laravel-fans/laravel-docker/actions/workflows/laravel-7.yml)
[![Laravel 8](https://github.com/laravel-fans/laravel-docker/workflows/Laravel%208/badge.svg)](https://github.com/laravel-fans/laravel-docker/actions/workflows/laravel-8.yml)
[![Laravel 9](https://github.com/laravel-fans/laravel-docker/workflows/Laravel%209/badge.svg)](https://github.com/laravel-fans/laravel-docker/actions/workflows/laravel-9.yml)

Full Laravel production environment for Docker.

## install

Run in your Laravel project:

```shell
composer require --dev laravel-fans/docker
php artisan docker:publish
```

## build

Then you will find `Dockerfile` in your project, so you can build:

```
docker build -t laravel-demo .
docker run -it laravel-demo
docker run -p 8000:80 -e "APP_ENV=local" -e "DB_CONNECTION=sqlite" \
  -e "APP_KEY=base64:L+3avOYCfuq8nnDpHs74+5Et3sx27TssucHQIyqfpDY=" \
  -it laravel-demo
```

Feel free to change the `Dockerfile`.

## screenshots

![docker run laravel](https://user-images.githubusercontent.com/4971414/126929099-20fee54e-89e8-4d52-8c04-41eeab7ede2d.png)
