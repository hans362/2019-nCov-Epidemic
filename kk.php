<?php
$type = $_GET["type"];
header("http-equiv: content-type;Content-type: text/html; charset=utf-8");
$url = 'https://m.sm.cn/api/rest?format=json&method=Huoshenshan.healingPos';
$outPageTxt = file_get_contents($url);
$res = json_decode($outPageTxt);
$res = $res->colums;
//var_dump($res);

if ($type == 'confirmed') {
	echo $res[0][1];
}
if ($type == 'suspected') {
	echo '暂无数据';
}
if ($type == 'dead') {
	echo $res[0][3];
}
if ($type == 'cured') {
	echo $res[0][2];
}
