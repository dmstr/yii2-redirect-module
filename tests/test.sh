#!/usr/bin/env bash

export COMPOSE_PROJECT_NAME=${COMPOSE_PROJECT_NAME:-testredirects}

#docker-compose --x-networking pull

docker-compose --x-networking up -d & wait
docker-compose --x-networking ps

docker-compose --x-networking run php sh /app/src/run.sh

docker-compose --x-networking run php codecept build
docker-compose --x-networking run php codecept run -c /app/vendor/dmstr/yii2-redirect-module/codeception.yml