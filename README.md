# PHP ORM Benchmark

## ORMs to Benchmark

1. Doctrine ORM v2.5.2
1. Eloquent ORM (illuminate/database) v4.2.17
1. FuelPHP Orm 1.7.3
1. Phalcon ORM 2.0.8
1. Yii ActiveRecord 1.1.16
1. Yii ActiveRecord 2.0.6

## Results

### Benchmarking Environment 1

These are my (kenjis) benchmarks, not yours. **I encourage you to run on your environments.**

* CentOS 6.6 64bit (VM; VirtualBox)
  * PHP 5.5.30 (Remi RPM)
    * Zend OPcache v7.0.4-dev
  * MySQL 5.1
  * Apache 2.2

(2015-Dec-06)

|orm                |time (ms)|memory (KB) |
|-------------------|--------:|-----------:|
|doctrine           |   139.43|     1310.03|
|eloquent           |    42.95|      673.75|
|yii1               |    24.61|      808.42|
|fuel               |    13.23|      389.73|
|yii2               |     9.09|      835.77|
|phalcon            |     7.70|      150.00|

### Benchmarking Environment 2

These are [motin](https://github.com/motin)'s benchmarks, running on a MacBook Pro (Retina, 15-inch, Mid 2014) using the supplied Docker environment.

* Ubuntu 15.04 64bit (Docker)
  * PHP-FPM 5.6.4
    * Zend OPcache 7.0.4-dev
    * PhalconPHP 2.0.9
  * MySQL 5.6.27
  * Nginx 1.7.12

(2015-Dec-07)

|orm                |time (ms)|memory (KB) |
|-------------------|--------:|-----------:|
|doctrine           |    77.57|     1297.48|
|eloquent           |    25.89|      671.20|
|yii1               |    14.14|      800.39|
|fuel               |     9.26|      381.07|
|yii2               |     7.20|      818.16|
|phalcon            |     5.66|      149.42|

## How to Benchmark

(1) Install this repository and install composer packages.

~~~
$ git clone https://github.com/kenjis/php-orm-benchmark.git
$ cd php-orm-benchmark
$ composer install
~~~

You may skip Phalcon by running `composer install --ignore-platform-reqs`, if you do not have it installed.

(2) Set `public` folder as your web document root. If you access <http://localhost/>, you can see the results graph.

(3) Create database `php_dev` and import schema `schema/php_dev.sql`.

(4) Configure `fuel/app/config/development/db.php`.

(5) Run benchmarks.

~~~
$ php oil r benchmark
~~~

See <http://localhost/>.

## Benchmarking using the supplied Docker Stack

Use the supplied Docker Stack in order to automatically set up the following benchmarking environments:

* Ubuntu 15.04 64bit (Docker)
  * PHP-FPM 5.6.4
    * Zend OPcache 7.0.4-dev
    * PhalconPHP 2.0.9
  * MySQL 5.6.27
  * Nginx 1.7.12

By sharing underlying software stacks, the benchmark results vary only according to the host machine's hardware specs and ORM implementations.

### Getting Started

Install [Docker Toolbox](https://www.docker.com/docker-toolbox).

Cd into the docker directory of this repo and make sure that docker toolbox is available:
~~~
cd docker
eval "$(docker-machine env default)"
~~~

Start the Nginx/PHP server stack:
~~~
docker-compose up -d
~~~

Start the supplied docker shell from within this repository's `docker` folder:
~~~
docker-compose run shell
~~~

Install composer dependencies:
~~~
composer install
~~~

Create database `php_dev` and import schema `schema/php_dev.sql`:
~~~
bin/setup.mysql.sh
~~~

Run benchmarks:
~~~
php oil r benchmark
~~~

Format benchmark results into markdown:
~~~
bin/results-to-markdown.sh
~~~

### Check the results

To see the results graph, run the following script from outside the docker shell, from the repository root:

~~~
bin/docker-url.sh
~~~

It echoes an URL, which you should open up in your browser.

## References

* [Doctrine ORM](http://www.doctrine-project.org/projects/orm.html)
* [Eloquent ORM](https://github.com/illuminate/database)
* [FuelPHP 1.x Orm](http://fuelphp.com/docs/packages/orm/intro.html)
* [Phalcon ORM](http://docs.phalconphp.com/en/latest/reference/models.html)
* [Yii 1 ActiveRecord](http://www.yiiframework.com/doc/guide/1.1/en/database.ar)
* [Yii 2 ActiveRecord](http://www.yiiframework.com/doc-2.0/guide-db-active-record.html)
