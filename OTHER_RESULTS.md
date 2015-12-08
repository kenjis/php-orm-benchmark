# PHP ORM Benchmark

## Other Results

### [motin](https://github.com/motin)

(2015-12-07)

* Ubuntu 15.04 64bit (Docker)
  * PHP-FPM 5.6.4
    * Zend OPcache 7.0.4-dev
    * PhalconPHP 2.0.9
  * MySQL 5.6.27
  * Nginx 1.7.12

|orm                |time (ms)|memory (KB) |
|-------------------|--------:|-----------:|
|doctrine           |    77.57|     1297.48|
|propel2            |    36.83|     1178.08|
|eloquent           |    25.89|      671.20|
|yii1               |    14.14|      800.39|
|fuel               |     9.26|      381.07|
|yii2               |     7.20|      818.16|
|phalcon            |     5.66|      149.42|
