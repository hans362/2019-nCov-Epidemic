<?php
$url = 'https://m.sm.cn/api/rest?format=json&method=Huoshenshan.healingPos';
$outPageTxt = file_get_contents($url);
$res = json_decode($outPageTxt);
$res = $res->colums;
$confirmed = $res[0][1];
$suspected = 'NULL';
$dead = $res[0][3];
$cured = $res[0][2];
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=" . $suspected . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = 'kk'";
sqlMethod($sql);