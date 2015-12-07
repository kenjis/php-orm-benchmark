#!/usr/bin/env bash

echo "http://"$(docker-machine ip default)":"$(docker-compose port nginx 80 | sed 's/[0-9.]*://')

exit 0