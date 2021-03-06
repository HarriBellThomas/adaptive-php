#!/usr/bin/env sh
set -x

cd /var/www && \
rm -rf html && \
tar zxvf travis-deploy.tgz -C ./ && \
cd app && \
find . ! -name '.env' ! -path './vendor/*' ! -path './storage/*' -type f -exec rm -f {} + && \
cd .. && \
#chown -R deploy:www-data app && \
cp -r pkg/adaptive-php/src/* app && \
ln -s app/public html && \
cd app && \
#chown -R deploy:www-data storage && \
#chmod -R 775 storage && \
chown -R deploy:www-data bootstrap/cache && \
chmod -R 775 bootstrap/cache && \
cd .. && \
rm -rf html-templates/* && \
cp -r pkg/adaptive-php/html-templates/* html-templates && \
chown -R deploy:www-data html-templates && \
chmod -R 775 html-templates
