#!/usr/bin/env sh
set -x

echo "Travis" | wall
cd /var/www/html && \
tar zxvf package.tgz -C . 
