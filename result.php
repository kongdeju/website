<div align="center">
<?php
chdir($_GET["new"]);
$dir = $_GET["new"];
$fname = $_GET["name"];
$out="seq_1.txt";
$status = 0;

if(file_exists($out)){
	echo "<br><br>";
	echo "<a href=\"select.php?new=$dir&name=$fname\"><h2>Work is Done </h2></a>";

}else{
	echo "<br><br>";
	echo "<h2>Work is Undone. Please remember this page and visit this page later</h2>";
}

?>
</div>
