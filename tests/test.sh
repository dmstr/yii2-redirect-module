#!/usr/bin/env bash

export COMPOSE_PROJECT_NAME=${COMPOSE_PROJECT_NAME:-testredirect}

docker-compose --x-networking pull

docker-compose --x-networking up -d & wait
docker-compose --x-networking ps

docker-compose --x-networking run php sh /app/src/setup.sh
docker-compose --x-networking run php codecept build -c /app/vendor/dmstr/yii2-redirect-module/codeception.yml
docker-compose --x-networking run php codecept run -c /app/vendor/dmstr/yii2-redirect-module/codeception.yml