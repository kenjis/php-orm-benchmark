# PHP ORM Benchmark

## ORMs to Benchmark

1. Doctrine ORM v2.5.2
1. Eloquent ORM (illuminate/database) v4.2.17
1. FuelPHP Orm 1.7.3
1. Phalcon ORM 2.0.8
1. Propel ORM 2.0-dev
1. Yii ActiveRecord 1.1.16
1. Yii ActiveRecord 2.0.6

## Results

These are my benchmarks, not yours. **I encourage you to run on your (production equivalent) environments.**

### Benchmarking Environment

* CentOS 6.6 64bit (VM; VirtualBox with Vagrant Synced folder)
  * PHP 5.5.30 (Remi RPM)
    * Zend OPcache v7.0.4-dev
  * MySQL 5.1
  * Apache 2.2

(2015-12-10)

|orm                |time (ms)|memory (KB) |
|-------------------|--------:|-----------:|
|doctrine           |   109.81|     1310.06|
|propel2            |    51.32|     1144.60|
|eloquent           |    34.46|      673.80|
|yii1               |    17.84|      808.48|
|fuel               |    11.74|      389.72|
|yii2               |     9.09|      835.82|
|phalcon            |     7.25|      150.05|

If you are interested in other resutls, see [OTHER_RESULTS.md](OTHER_RESULTS.md).

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

(5) Generate config file for Propel.

~~~
$ bin/setup.propel2.sh
~~~

(6) Run benchmarks.

~~~
$ php oil r benchmark
~~~

See <http://localhost/>.

You can get markdown table for the results.

~~~
$ php oil r show:result_table
~~~

## References

* [Doctrine ORM](http://www.doctrine-project.org/projects/orm.html)
* [Eloquent ORM](https://github.com/illuminate/database)
* [FuelPHP 1.x Orm](http://fuelphp.com/docs/packages/orm/intro.html)
* [Phalcon ORM](http://docs.phalconphp.com/en/latest/reference/models.html)
* [Propel 2](http://propelorm.org/)
* [Yii 1 ActiveRecord](http://www.yiiframework.com/doc/guide/1.1/en/database.ar)
* [Yii 2 ActiveRecord](http://www.yiiframework.com/doc-2.0/guide-db-active-record.html)

## Other Benchmarks

* [François Zaninotto php-orm-benchmark with updated vendors](https://github.com/Big-Shark/forked-php-orm-benchmark)
* [PHP Framework Benchmark](https://github.com/kenjis/php-framework-benchmark)
* [PHP User Agent Parser Benchmarks](https://github.com/kenjis/user-agent-parser-benchmarks)
