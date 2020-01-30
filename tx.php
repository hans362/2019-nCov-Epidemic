<?php
$type = $_GET["type"];
header("http-equiv: content-type;Content-type: text/html; charset=utf-8");
$url = 'https://view.inews.qq.com/g2/getOnsInfo?name=disease_h5';
$outPageTxt = file_get_contents($url);
$res = json_decode($outPageTxt);
$res = $res->data;
$res = json_decode($res);
//var_dump($res);
$confirmed = $res->chinaTotal->confirm;
$suspected = $res->chinaTotal->suspect;
$dead = $res->chinaTotal->dead;
$cured = $res->chinaTotal->heal;