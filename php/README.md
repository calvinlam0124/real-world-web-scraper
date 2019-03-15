### requirement
- php
- ext-dom
- ext-json



### check-platform-reqs
```sh
docker run --rm -it \
    -v $PWD:/app \
    composer check-platform-reqs
```

### Run
```sh
# locally
php main.ph

# docker
docker run --rm -v `pwd`:/usr/src/myapp php:7.3.3 sh -c '/usr/local/bin/php /usr/src/myapp/main.php'
docker run --rm -v `pwd`:/usr/src/myapp php:5.6 sh -c '/usr/local/bin/php /usr/src/myapp/main.php'
```
