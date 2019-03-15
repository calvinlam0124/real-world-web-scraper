const fs = require('fs');
const $ = require('cheerio');
const rp = require('request-promise');

const url = "https://www.ithome.com.tw/latest";
const post_href_prefix = "https://www.ithome.com.tw";
const date = new Date();
const month = String(date.getMonth()+1).padStart(2,0);
const today = date.getFullYear() + "-" + month + "-" + date.getDate();
let posts = [];

rp(url)
    .then(function(html) {
        let items_html = $('div.item', html);

        items_html.map( (i,item_html)=>{
            var post = {};
            var node = $('p.title a', item_html);

            post.title = node.text();
            post.href = post_href_prefix +  node[0].attribs.href;

            var node = $('p.post-at', item_html);
            post.post_at = node.text().trim();

            if(post.post_at === today){
                posts.push(post);
            }
        });
        console.log(posts);

        fs.writeFile("data.json", JSON.stringify(posts), function(err) {
            if(err) {
                return console.log(err);
            }
        });
    })
    .catch(function(err) {
        //handle error
    });

console.log("abc");