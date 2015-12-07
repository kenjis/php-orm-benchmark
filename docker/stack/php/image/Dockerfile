# Dockerfile for running PHP ORM Benchmarks
# ===============================================================

FROM ubuntu:15.04

# Prepare Debian environment
ENV DEBIAN_FRONTEND noninteractive

# Performance optimization - see https://gist.github.com/jpetazzo/6127116
# this forces dpkg not to call sync() after package extraction and speeds up install
RUN echo "force-unsafe-io" > /etc/dpkg/dpkg.cfg.d/02apt-speedup
# we don't need and apt cache in a container
RUN echo "Acquire::http {No-Cache=True;};" > /etc/apt/apt.conf.d/no-cache

# Update the below commented date time to match the time docker fetched the system package information - an update will trigger docker to fetch the information anew
RUN apt-get update && \
    apt-get upgrade -y -q # 2015-12-07 10:43

# Enable locales, editors and general tools for administration processes
ENV TERM xterm
RUN apt-get install -y -q \
        locales \
        software-properties-common \
        curl \
        wget \
        less \
        nano \
        vim

# HHVM and Phalcon repositories
RUN apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0x5a16e7281be7a449 && \
        apt-add-repository "deb http://dl.hhvm.com/ubuntu $(lsb_release -sc) main" && \
        apt-add-repository ppa:phalcon/stable

# Install HHVM and PHP Phalcon
RUN apt-get update && \
        apt-get install -y -q hhvm php5-phalcon

# Install specific version of PHP-FPM (if not available - show what versions were available in debian jessie at the moment of APT_DOCKER_CACHE_TRIGGER above)
RUN apt-get install -y -q \
        php5-fpm=5.6.4* \
  || (echo "php5-cli \n $(apt-cache show php5-cli | grep -i version)" && \
      echo "php5-fpm \n $(apt-cache show php5-fpm | grep -i version)" && \
      exit 1)

# HHVM binaries
RUN apt-get install -y -q \
        hhvm=3.10.1* \
  || (echo "hhvm \n $(apt-cache show hhvm | grep -i version)" && \
      exit 1)

# Install PHP extensions available via apt-get (required for PHP-FPM, but can also be useful to HHVM since default configurations for the extensions are incorporated in the docker image)
RUN apt-get install -y -q \
        php5-intl \
        php5-mysqlnd \
        php5-sqlite \
        php5-pgsql

# Database clients
RUN apt-get install -y -q \
        mysql-client

# Composer (so that we use a clean composer install)
RUN curl -sS https://getcomposer.org/installer | php && \
        mv /composer.phar /usr/local/bin/composer

# Global asset plugin (required by Yii 2)
RUN composer global require "fxp/composer-asset-plugin:~1.1.1"

# Version control systems
RUN apt-get install -y -q \
        git-flow \
        git-svn \
        mercurial \
        subversion

# Clean apt caches
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
