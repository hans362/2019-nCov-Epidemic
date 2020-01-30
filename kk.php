<?php
$type = $_GET["type"];
header("http-equiv: content-type;Content-type: text/html; charset=utf-8");
$url = 'https://m.sm.cn/api/rest?format=json&method=Huoshenshan.healingPos';
$outPageTxt = file_get_contents($url);
$res = json_decode($outPageTxt);
$res = $res->colums;
//var_dump($res);
$confirmed = $res[0][1];
$suspected = '暂无数据';
$dead = $res[0][3];
$cured = $res[0][2];
