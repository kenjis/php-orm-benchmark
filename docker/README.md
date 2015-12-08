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

### Benchmarking Environment

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
|propel2            |    36.83|     1178.08|
|eloquent           |    25.89|      671.20|
|yii1               |    14.14|      800.39|
|fuel               |     9.26|      381.07|
|yii2               |     7.20|      818.16|
|phalcon            |     5.66|      149.42|

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

Generate the configuration file for Propel 2:
~~~
bin/setup.propel2.sh
~~~

Run benchmarks:
~~~
php oil r benchmark
~~~

Format benchmark results into markdown:
~~~
php oil r show:result_table
~~~

### Check the results

To see the results graph, run the following script from outside the docker shell, from the repository root:

~~~
bin/docker-url.sh
~~~

It echoes an URL, which you should open up in your browser.
