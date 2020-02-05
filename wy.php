<?php
$url = 'https://news.163.com/special/epidemic/';
$outPageTxt = file_get_contents($url);
$outPageTxt = iconv("gb2312", "utf-8//IGNORE", $outPageTxt);
$dom = new DOMDocument();
@$dom->loadHTML($outPageTxt);
$dom->normalize();
$xpath = new DOMXPath($dom);
$data = $xpath->query('//*[@id="map_block"]/div/div[3]/div[2]/div[1]/div/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text;
}
$confirmed = $res;
$data = $xpath->query('//*[@id="map_block"]/div/div[3]/div[2]/div[2]/div/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text;
}
$suspected = $res;
$data = $xpath->query('//*[@id="map_block"]/div/div[3]/div[2]/div[3]/div/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text;
}
$dead = $res;
$data = $xpath->query('//*[@id="map_block"]/div/div[3]/div[2]/div[4]/div/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text;
}
$cured = $res;
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=" . $suspected . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = 'wy'";
sqlMethod($sql);