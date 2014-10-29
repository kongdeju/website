<div align="center">
<script language="JavaScript">
function myrefresh()
{
   window.location.reload();
}
setTimeout('myrefresh()',5000); //指定1秒刷新一次
</script>
<?php
chdir($_GET["new"]);
$dir = $_GET["new"];
$fname = $_GET["name"];
$out="seq_1.txt";
$status = 0;

if(file_exists($out)){
	echo "<br><br>";
	
	
	$url = "select.php?new=$dir&name=$fname";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
	
}else{
	echo "<br><br>";
	echo "<h2>Work is Undone. Please remember this page and visit this page later</h2>";
}

?>
</div>
