#!/usr/bin/env sh
set -x

cd /var/www && \
tar zxvf travis-deploy.tgz -C . && \
rm -rf html && \
mkdir html && \
chown www-data:www-data html && \
cp -r pkg/adaptive-web/* html && \
rm -rf pkg 
