tar -czf package.tgz $TRAVIS_BUILD_DIR && \
openssl aes-256-cbc -K $encrypted_c9ee5b34b6c3_key -iv $encrypted_c9ee5b34b6c3_iv -in deploy.enc -out deploy -d && \
ls -la && \
chmod 0700 deploy && \
scp -i deploy package.tgz $REMOTE_USER@$REMOTE_HOST:$REMOTE_APP_DIR && \
ssh $REMOTE_USER@$REMOTE_HOST 'bash -s' < ./scripts/untar.sh && \
echo "Ran SCP to production"
