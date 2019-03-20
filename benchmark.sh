#!/bin/sh

# run node
time (for i in {1..10}; do node nodejs/main.js > /dev/null; done;)

# run php
time (for i in {1..10}; do php php/main.php > /dev/null; done;)

# run python
time (for i in {1..10}; do python3 python3/main.py > /dev/null; done;)

