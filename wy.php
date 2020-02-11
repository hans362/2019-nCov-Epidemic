<?php
$url = 'https://c.m.163.com/ug/api/wuhan/app/data/list-total';
$outPageTxt = file_get_contents($url);
$res = json_decode($outPageTxt);
$res = $res->data->chinaTotal->total;
$confirmed = $res->confirm;
$suspected = $res->suspect;
$dead = $res->dead;
$cured = $res->heal;
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=" . $suspected . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = 'wy'";
sqlMethod($sql);