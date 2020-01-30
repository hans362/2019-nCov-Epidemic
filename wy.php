<?php
$type = $_GET["type"];
header("http-equiv: content-type;Content-type: text/html; charset=utf-8");
$url = 'https://news.163.com/special/epidemic/';
$outPageTxt = file_get_contents($url);
$outPageTxt = iconv("gb2312", "utf-8//IGNORE", $outPageTxt);
$dom = new DOMDocument();
@$dom->loadHTML($outPageTxt);
$dom->normalize();
$xpath = new DOMXPath($dom);
$data = $xpath->query('//*[@id="map_block"]/div/div[1]/div[2]/p[1]/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text . '<br/>';
}
//echo $res;
$confirmed = '/(?<=\确诊 ).+?(?= 例)/';
$cured = '/(?<=\治愈 ).+?(?= 例)/';
$dead = '/(?<=\死亡 ).+?(?= 例)/';
preg_match($confirmed, $res, $out);
$confirmed = $out[0];
$suspected = '暂无数据';
preg_match($dead, $res, $out);
$dead = $out[0];
preg_match($cured, $res, $out);
$cured = $out[0];
