# PHP ORM Benchmark

## Other Results

### [motin](https://github.com/motin)

(2015-12-09)

* MacBook Pro (Retina, 15-inch, Mid 2014)
  * Ubuntu 15.04 64bit (Docker)
    * PHP-FPM 5.6.4
      * Zend OPcache 7.0.4-dev
    * MySQL 5.6.27
    * Nginx 1.7.12

1. Doctrine ORM v2.5.2
1. Eloquent ORM (illuminate/database) v4.2.17
1. FuelPHP Orm 1.7.3
1. Phalcon ORM 2.0.9
1. Propel ORM 2.0-dev
1. Yii ActiveRecord 1.1.16
1. Yii ActiveRecord 2.0.6

|orm                |time (ms)|memory (KB) |
|-------------------|--------:|-----------:|
|doctrine           |    63.62|     1297.47|
|propel2            |    29.39|     1134.24|
|eloquent           |    21.75|      671.20|
|yii1               |    11.63|      800.38|
|fuel               |     7.89|      381.06|
|yii2               |     6.34|      818.15|
|phalcon            |     4.95|      149.43|
