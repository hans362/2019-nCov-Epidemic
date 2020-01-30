<?php
$type = $_GET["type"];
header("http-equiv: content-type;Content-type: text/html; charset=utf-8");
$url = 'http://m.medsci.cn/wh.asp';
$outPageTxt = file_get_contents($url);
//$outPageTxt = iconv("gb2312", "utf-8//IGNORE", $outPageTxt);
$dom = new DOMDocument();
@$dom->loadHTML($outPageTxt);
$dom->normalize();
$xpath = new DOMXPath($dom);
$data = $xpath->query('/html/body/div[1]/p[2]/text()');
$res = '';
for ($i = 0; $i < $data->length; $i++) {
    $items = $data->item($i);
    $text = $items->nodeValue;
    $res = $res . $text . '<br/>';
}
//echo $res;
$confirmed = '/(?<=\确诊 ).+?(?= 例)/';
$suspected = '/(?<=\疑似  ).+?(?=  例)/';
$cured = '/(?<=\治愈 ).+?(?= 例)/';
$dead = '/(?<=\死亡 ).+?(?= 例)/';
preg_match($confirmed, $res, $out);
$confirmed = $out[0];
preg_match($suspected, $res, $out);
$suspected = $out[0];
preg_match($dead, $res, $out);
$dead = $out[0];
preg_match($cured, $res, $out);
$cured = $out[0];
include_once 'config.php';
$sql = "UPDATE data SET confirmed=" . $confirmed . ", suspected=" . $suspected . ", cured=" . $cured . ", dead=" . $dead . " WHERE `source` = 'ms'";
sqlMethod($sql);