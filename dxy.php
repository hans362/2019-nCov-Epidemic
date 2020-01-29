<?php
$type = $_GET["type"];
header("http-equiv: content-type;Content-type: text/html; charset=utf-8");
$url = 'https://3g.dxy.cn/newh5/view/pneumonia';
$outPageTxt = file_get_contents($url);
$dom = new DOMDocument();
@$dom->loadHTML($outPageTxt);
$dom->normalize();
$xpath = new DOMXPath($dom);
$data = $xpath->query('//*[@id="getStatisticsService"]/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text . '<br/>';
}
//echo $res;
$confirmed = '/(?<=\"confirmedCount":).+?(?=,)/';
$suspected = '/(?<=\"suspectedCount":).+?(?=,)/';
$cured = '/(?<=\"curedCount":).+?(?=,)/';
$dead = '/(?<=\"deadCount":).+?(?=,)/';
if ($type == 'confirmed') {
	preg_match($confirmed, $res, $out);
	echo $out[0];
}
if ($type == 'suspected') {
	preg_match($suspected, $res, $out);
	echo $out[0];
}
if ($type == 'dead') {
	preg_match($dead, $res, $out);
	echo $out[0];
}
if ($type == 'cured') {
	preg_match($cured, $res, $out);
	echo $out[0];
}
