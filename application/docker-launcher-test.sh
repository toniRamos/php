#!/bin/sh
docker run --name 'test' -d test-application
docker exec -ti test sh -c "./vendor/bin/phpunit" 
docker rm -f test