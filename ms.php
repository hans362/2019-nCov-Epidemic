<?php
$url = 'http://m.medsci.cn/wh.asp';
$outPageTxt = file_get_contents($url);
$outPageTxt = iconv("gb2312", "utf-8//IGNORE", $outPageTxt);
$dom = new DOMDocument();
@$dom->loadHTML($outPageTxt);
$dom->normalize();
$xpath = new DOMXPath($dom);
$data = $xpath->query('/html/body/ul/li[2]/strong/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text;
}
$confirmed = $res;
/*$data = $xpath->query('/html/body/ul/li[2]/strong/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text;
}
$suspected = $res;*/
$data = $xpath->query('/html/body/ul/li[3]/strong/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text;
}
$dead = $res;
$data = $xpath->query('/html/body/ul/li[4]/strong/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text;
}
$cured = $res;
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=NULL" . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = 'ms'";
sqlMethod($sql);