#!/usr/bin/env sh
set -x

cd /var/www && \
rm -rf html && \
tar zxvf travis-deploy.tgz -C . && \
find ./app -not -name '.env' -not -name 'vendor' -delete && \
chown deploy:www-data app
cp -r pkg/adaptive-php/src/* app && \
ln -s app/public html
cd app && \
chown -R deploy:www-data storage && \
chmod -R 775 storage && \
chown -R deploy:www-data bootstrap/cache && \
chmod -R 775 bootstrap/cache
