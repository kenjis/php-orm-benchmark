#!/bin/bash

# This script is run within the php containers on start

# Fail on any error
set -o errexit

# Show what the script is doing
set -x

# PHP-FPM
cp /stack/php/php.ini /etc/php5/fpm/php.ini
for configfile in /stack/php/conf.d/*; do
    cp $configfile /etc/php5/fpm/conf.d/
done
for configfile in /stack/php/php-fpm/pool.d/*; do
    cp $configfile /etc/php5/fpm/pool.d/
done
cp /stack/php/php-fpm/php-fpm.conf /etc/php5/fpm/php-fpm.conf
php5-fpm
