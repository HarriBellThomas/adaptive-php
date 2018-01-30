set -x

tar -czf package.tgz $TRAVIS_BUILD_DIR && \
scp package.tgz $REMOTE_USER@$REMOTE_HOST:$REMOTE_APP_DIR && \
ssh $REMOTE_USER@$REMOTE_HOST 'bash -s' < ./scripts/untar.sh && \
echo "Ran SCP to production"
