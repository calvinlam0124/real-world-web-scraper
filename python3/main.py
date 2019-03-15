#!/usr/bin/env python3

import sys
import pprint

import os
import json
import requests
from bs4 import BeautifulSoup
import time

dir_path = os.path.dirname(os.path.realpath(__file__))

url = "https://www.ithome.com.tw/latest"
response = requests.get(url)
soup = BeautifulSoup(response.text, "html.parser")
selector = "div.view-latest-news div.item"
items = soup.select(selector)

post_dicts = []
for item in items:
    post_dict = {}

    item_soup = BeautifulSoup(str(item), "html.parser")
    selector = "p.title a"

    a_tag = item_soup.select(selector)
    title = a_tag[0].text
    href = a_tag[0]["href"]

    selector = "p.post-at"
    post_at_tag = item_soup.select(selector)
    post_at = post_at_tag[0].text.strip()

    post_dict["title"] = title
    post_dict["href"] = "https://www.ithome.com.tw" + href
    post_dict["post_at"] = post_at

    if post_at == time.strftime("%Y-%m-%d", time.localtime()):
        post_dicts.append(post_dict)

json_string = json.dumps(post_dicts)
print(json_string)


f = open(dir_path + "/data.json", "w")
f.write(json_string)