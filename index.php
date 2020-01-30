<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:18px;
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
<table class="gridtable">
<tr>
	<th>数据来源</th><th>确诊</th><th>疑似</th><th>治愈</th><th>死亡</th>
    <?php
        include_once 'config.php';
        $result = mysqli_query($conn, "SELECT * from data");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['confirmed']."</td>";
            echo "<td>".$row['suspected']."</td>";
            echo "<td>".$row['cured']."</td>";
            echo "<td>".$row['dead']."</td>";
            echo "</tr>";
        }
    ?>
</tr>
</table>