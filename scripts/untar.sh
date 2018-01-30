#!/usr/bin/env sh
set -x

cd /var/www && \
tar zxvf travis-deploy.tgz -C . && \
rm -rf html && \
mv pkg/adaptive-web html && \
rm -rf pkg 
