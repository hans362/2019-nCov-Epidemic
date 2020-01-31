<?php
$url = 'https://voice.baidu.com/act/newpneumonia/newpneumonia';
$outPageTxt = file_get_contents($url);
$preg = '/(?<=\"summaryDataIn":).+?(?=,"summaryDataOut")/';
preg_match($preg, $outPageTxt, $out);
$res = json_decode($out[0]);
$confirmed = $res->confirmed;
$suspected = $res->unconfirmed;
$dead = $res->died;
$cured = $res->cured;
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=" . $suspected . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = 'bd'";
sqlMethod($sql);