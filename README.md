# PHP ORM Benchmark

## ORMs to Benchmark

1. Doctrine ORM v2.5.2
1. Eloquent ORM (illuminate/database) v4.2.17
1. FuelPHP Orm 1.7.3
1. Phalcon ORM 2.0.8
1. Yii ActiveRecord 1.1.16
1. Yii ActiveRecord 2.0.6

## Benchmarking Environment

* CentOS 6.6 64bit (VM; VirtualBox)
  * PHP 5.5.30 (Remi RPM)
    * Zend OPcache v7.0.4-dev
  * MySQL 5.1
  * Apache 2.2

## Results

These are my benchmarks, not yours. **I encourage you to run on your environments.**

(2015/12/06)

|orm                |time (ms)|memory (KB) |
|-------------------|--------:|-----------:|
|doctrine           |   139.43|     1310.03|
|eloquent           |    42.95|      673.75|
|yii1               |    24.61|      808.42|
|fuel               |    13.23|      389.73|
|yii2               |     9.09|      835.77|
|phalcon            |     7.70|      150.00|

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

## References

* [Doctrine ORM](http://www.doctrine-project.org/projects/orm.html)
* [Eloquent ORM](https://github.com/illuminate/database)
* [FuelPHP 1.x Orm](http://fuelphp.com/docs/packages/orm/intro.html)
* [Phalcon ORM](http://docs.phalconphp.com/en/latest/reference/models.html)
* [Yii 1 ActiveRecord](http://www.yiiframework.com/doc/guide/1.1/en/database.ar)
* [Yii 2 ActiveRecord](http://www.yiiframework.com/doc-2.0/guide-db-active-record.html)
