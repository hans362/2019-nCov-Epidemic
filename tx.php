<?php
$type = $_GET["type"];
header("http-equiv: content-type;Content-type: text/html; charset=utf-8");
$url = 'https://news.qq.com/zt2020/page/feiyan.htm';
$outPageTxt = file_get_contents($url);
echo $outPageTxt;
$dom = new DOMDocument();
@$dom->loadHTML($outPageTxt);
$dom->normalize();
$xpath = new DOMXPath($dom);

$data = $xpath->query('//*[@id="charts"]/div[3]/div[1]/div[1]/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text . '<br/>';
}
$confirmed = $res;

$data = $xpath->query('//*[@id="charts"]/div[3]/div[2]/div[1]/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text . '<br/>';
}
$suspected = $res;

$data = $xpath->query('//*[@id="charts"]/div[3]/div[3]/div[1]/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text . '<br/>';
}
$cured = $res;

$data = $xpath->query('//*[@id="charts"]/div[3]/div[4]/div[1]/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text . '<br/>';
}
$dead = $res;

if ($type == 'confirmed') {
	echo $confirmed;
}
if ($type == 'suspected') {
	echo $suspected;
}
if ($type == 'dead') {
	echo $dead;
}
if ($type == 'cured') {
	echo $cured;
}
