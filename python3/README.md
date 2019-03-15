### Setup
```bash
pip3 install -r requirement.txt
```


### Usage
```bash
# run python3 local
python3 main.py

# or run python3 in Docker container
docker run -it --rm --name template-run-python -v "$PWD":/usr/src/myapp -w /usr/src/myapp python:3.7.2 pip3 install -r requirements.txt; python3 main.py


docker run -it --rm --name template-run-python -v "$PWD":/usr/src/myapp -w /usr/src/myapp python:latest \
 pip3 install -r requirements.txt; bash
```
