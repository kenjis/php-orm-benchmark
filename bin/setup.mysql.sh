#!/bin/sh

check() {
    if [ $? != 0 ]; then
        echo "Aborted."; exit 1;
    fi
}

DIR=`dirname $0`;

mysql=`which mysql`;
if [ "$mysql" = "" ]; then
    mysql=`which mysql5`;
fi

if [ "$mysql" = "" ]; then
    echo "Can not find mysql binary. Is it installed?";
    exit 1;
fi

if [ "$DB_USER" = "" ]; then
	echo "\$DB_USER not set. Using 'root'.";
    DB_USER="root";
fi

pw_option=""
if [ "$DB_PW" != "" ]; then
	pw_option=" -p$DB_PW"
fi

DB_HOSTNAME=${DB_HOSTNAME-127.0.0.1};

"$mysql" --host="$DB_HOSTNAME" -u"$DB_USER" $pw_option -e 'CREATE DATABASE '$DB_NAME';'
check;

"$mysql" --host="$DB_HOSTNAME" -u"$DB_USER" $pw_option $DB_NAME < $DIR/../schema/php_dev.sql
check;
