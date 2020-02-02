<?php
$url = 'http://zhongxinzhiyuan.cn:8089/geoserver/zxzy/wfs?service=WFS&version=1.0.0&request=GetFeature&typeName=zxzy%3Adata&outputFormat=json&cql_filter=label%3D1';
$outPageTxt = file_get_contents($url);
$res = json_decode($outPageTxt);
$res = $res->features;
$res = $res[0]->properties;
$confirmed = $res->diagnose;
$suspected = $res->suspect;
$dead = $res->death;
$cured = $res->cure;
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=" . $suspected . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = 'zxzy'";
sqlMethod($sql);