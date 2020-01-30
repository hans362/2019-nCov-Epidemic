<?php
$type = $_GET["type"];
header("http-equiv: content-type;Content-type: text/html; charset=utf-8");
$url = 'https://interface.sina.cn/news/wap/fymap2020_data.d.json';
$outPageTxt = file_get_contents($url);
$res = json_decode($outPageTxt);
$res = $res->data;
//var_dump($res);
$confirmed = $res->gntotal;
$suspected = $res->sustotal;
$dead = $res->deathtotal;
$cured = $res->curetotal;