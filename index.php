
<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
<!-- Table goes in the document BODY -->
<table class="gridtable">
<tr>
	<th>数据来源</th><th>确诊</th><th>疑似</th><th>治愈</th><th>死亡</th>
</tr>
<?php require("dxy.php"); ?>
<tr>
	<td>丁香园</td><td><?php echo $confirmed; ?></td><td><?php echo $suspected; ?></td><td><?php echo $cured; ?></td><td><?php echo $dead; ?></td>
</tr>
<?php require("wy.php"); ?>
<tr>
	<td>网易</td><td><?php echo $confirmed; ?></td><td><?php echo $suspected; ?></td><td><?php echo $cured; ?></td><td><?php echo $dead; ?></td>
</tr>
<tr>
	<td>夸克</td><td><?php echo file_get_contents("https://lab.hans362.cn/kk.php?type=confirmed"); ?></td><td><?php echo file_get_contents("https://lab.hans362.cn/kk.php?type=suspected"); ?></td><td><?php echo file_get_contents("https://lab.hans362.cn/kk.php?type=cured"); ?></td><td><?php echo file_get_contents("https://lab.hans362.cn/kk.php?type=dead"); ?></td>
</tr>
</table>