<?php
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
$confirmed = '/(?<=\"confirmedCount":).+?(?=,)/';
$suspected = '/(?<=\"suspectedCount":).+?(?=,)/';
$cured = '/(?<=\"curedCount":).+?(?=,)/';
$dead = '/(?<=\"deadCount":).+?(?=,)/';
preg_match($confirmed, $res, $out);
$confirmed = $out[0];
preg_match($suspected, $res, $out);
$suspected = $out[0];
preg_match($dead, $res, $out);
$dead = $out[0];
preg_match($cured, $res, $out);
$cured = $out[0];
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=" . $suspected . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = 'dxy'";
sqlMethod($sql);