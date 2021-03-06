mkdir ../pkg && \
cp -r $TRAVIS_BUILD_DIR ../pkg && \
tar -czf travis-deploy.tgz ../pkg/adaptive-php && \
rm -rf ../pkg && \
openssl aes-256-cbc -K $encrypted_c9ee5b34b6c3_key -iv $encrypted_c9ee5b34b6c3_iv -in deploy.enc -out deploy-hbt-adaptive -d && \
ls -la && \
chmod 0700 deploy-hbt-adaptive && \
ssh-add deploy-hbt-adaptive && \
scp -i deploy-hbt-adaptive travis-deploy.tgz $REMOTE_USER@$REMOTE_HOST:$REMOTE_APP_DIR && \
ssh $REMOTE_USER@$REMOTE_HOST 'bash -s' < ./scripts/untar.sh && \
echo "Ran SCP to production"
