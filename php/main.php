<?php
date_default_timezone_set("Hongkong");

$url = "https://www.ithome.com.tw/latest";
$url_content = file_get_contents($url);

$items = []; // html string
$posts = [];
$post_href_prefix = "https://www.ithome.com.tw";
$today = date("Y-m-d");
$dom = new DomDocument;
$dom->loadHTML($url_content);

$xpath = new DomXPath($dom);
//$nodes = $xpath->query("//div[@class='thumb-container']/a[@class='gallerythumb']/@href");
$nodes = $xpath->query("//div[@class='item']");
foreach ($nodes as $node) {
    echo $node->nodeValue;
    $items[] = $dom->saveHTML($node);
}


foreach($items as $item_html){
    $post_dict = new stdClass();
    $dom->loadHTML($item_html);
    $xpath = new DomXPath($dom);

    $nodes = $xpath->query("//p[@class='title']/a");
    $post_dict->title = $nodes[0]->nodeValue;
    $post_dict->href = $post_href_prefix . $nodes[0]->attributes->getNamedItem('href')->nodeValue;

    $nodes = $xpath->query("//p[@class='post-at']");
    $post_dict->post_at = rtrim($nodes[0]->nodeValue);

    if($post_dict->post_at == $today){
        $posts[] = $post_dict;
    }
}






$file_location = __DIR__ . "/data.json";
$json_string = json_encode($posts);
file_put_contents($file_location, $json_string);
echo $json_string;
//print_r($posts);
