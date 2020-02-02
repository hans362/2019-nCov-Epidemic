<?php
$url = 'https://arena.360.cn/api/service/data/ncov-live-3';
$outPageTxt = file_get_contents($url);
$res = json_decode($outPageTxt);
$res = $res->data->total;
$confirmed = $res->diagnosed;
$suspected = $res->suspected;
$dead = $res->died;
$cured = $res->cured;
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=" . $suspected . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = '360'";
sqlMethod($sql);