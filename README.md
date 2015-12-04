# PHP ORM Benchmark

## Results

|orm                |time               |memory     |
|-------------------|------------------:|----------:|
|eloquent           |    69.567227363586|657.3546875|
|fuel               |    22.457361221314|378.0078125|
|phalcon            |    6.3767433166504|141.0859375|

## How to Benchmark

Install this repository and set `public` folder as your Web document root <http://localhost/>.

Install composer packages.

~~~
$ composer install
~~~

You may skip Phalcon by running `composer install --ignore-platform-reqs` if you do not have it installed.

Create database `php_dev` and import schema `schema/php_dev.sql`.

Configure `fuel/app/config/development/db.php`.

Rum benchmarks.

~~~
$ php oil r benchmark
~~~

See <http://localhost/>.

## Reference

* [Eloquent ORM](https://github.com/illuminate/database)
* [FuelPHP 1.x ORM](http://fuelphp.com/docs/packages/orm/intro.html)
* [Phalcon ORM](http://docs.phalconphp.com/en/latest/reference/models.html)
* [Yii 2 ActiveRecord](http://www.yiiframework.com/doc-2.0/guide-db-active-record.html)
* [Yii 1 ActiveRecord](http://www.yiiframework.com/doc/guide/1.1/en/database.ar)

