#!/usr/bin/env bash

DIR=`dirname $0`;

echo "http://"$(docker-machine ip default)":"$(docker-compose -f $DIR/../../docker/docker-compose.yml port nginx 80 | sed 's/[0-9.]*://')

exit 0
