#!/usr/bin/env sh
set -x

cd /var/www && \
tar zxvf travis-deploy.tgz -C . && \
rm -rf html && \
mkdir html && \
chown deploy:www-data html && \
cp -r pkg/adaptive-php/src/* html && \
rm -rf src 
