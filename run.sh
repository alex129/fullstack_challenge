#!/bin/bash

DOCKER_UID=$(id -u)
DOCKER_GID=$(id -g)


echo "****************************************"
echo "* Running BiomeMakers Challenge Portal *"
echo "****************************************"
echo
echo "This will build a docker with php + laravel + nodejs + typescript + postgresql"
echo "It may take a while the first time"
echo "It needs the ports 8000, 8001, 8002"
echo "The server will run at http://localhost:8000"
echo "The javascript/css hot reload uses port 8001"
echo "Postgresql database uses port 8002"
echo ""

mkdir -p vendor
mkdir -p node_modules

docker run \
    --name biomemakers_challenge \
    --rm \
    -it \
    --mount type=bind,src="$(pwd)/",dst=/app \
    --mount type=volume,target=/app/storage/framework \
    --mount type=volume,target=/app/storage/logs \
    -p 8000:8000 \
    -p 8001:8001 \
    -p 8002:5432 \
    $(docker build --build-arg DOCKER_UID=$DOCKER_UID --build-arg DOCKER_GID=$DOCKER_GID -q .)


