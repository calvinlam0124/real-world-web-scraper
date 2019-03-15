### Run
```sh
node main.js

docker run --rm -v `pwd`:/usr/src/myapp node:11.11 sh -c '/usr/local/bin/node /usr/src/myapp/main.js'


docker run --rm -v `pwd`:/usr/src/myapp -w /usr/src/myapp node:11.11 sh -c '/usr/local/bin/npm install; /usr/local/bin/node main.js'
```