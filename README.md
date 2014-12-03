# PHP ORM Benchmark

## Results

|orm                |time               |memory     |
|-------------------|------------------:|----------:|
|eloquent           |    78.812265396119|657.3546875|
|fuel               |    22.980213165283|378.0078125|
|phalcon            |    6.4730882644653|145.0078125|

## How to Benchmark

Install this repository and set `public` folder as your Web document root <http://localhost/>.

Install composer packages.

~~~
$ composer install
~~~

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
