<?php
$url = 'https://view.inews.qq.com/g2/getOnsInfo?name=disease_h5';
$outPageTxt = file_get_contents($url);
$res = json_decode($outPageTxt);
$res = $res->data;
$res = json_decode($res);
$confirmed = $res->chinaTotal->confirm;
$suspected = $res->chinaTotal->suspect;
$dead = $res->chinaTotal->dead;
$cured = $res->chinaTotal->heal;
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=" . $suspected . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = 'tx'";
sqlMethod($sql);