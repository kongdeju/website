<?php
chdir($_POST["dir"]);
$fname = $_POST["filename"];
$pritm = $_POST["Tmpri"];
$protm = $_POST["Tmpro"];
$prilen = $_POST["Lenpri"];
$prolen = $_POST["Lenpro"];
$lenmin = $_POST["lenmin"];
$lenmax = $_POST["lenmax"];
$mid = $_POST["tmd"];
$dir = $_POST["dir"];
$uname = $_POST["username"];
echo "<h2>hello $uname !</h2>";
#system("nohup /home/kongdeju/github/ppdesigner/scripts/ppdesigner $fname -pritm $pritm -protm $protm -prilen $prilen -prolen $prolen -lenmin $lenmin -lenmax $lenmax &");
exec("perl /home/kongdeju/github/ppdesigner/scripts/ppdesigner $fname -pritm $pritm -protm $protm -prilen $prilen -prolen $prolen -lenmin $lenmin -lenmax $lenmax 1> /dev/null 2> /dev/null & ");
echo "<h1>Your jop is running now</h1>";
echo "<h2>Jop id : $mid</h2>";
#echo "<input type=\"submit\" value=\"Check your result here\" style=\"width:200px;height:50px\" >";
/*$out="seq_1.txt";
echo "Waitting";
while(1){
	if(file_exists($out)){
		echo "Work is Done";
		$status = 1;
		break;
	}else{
		echo ".";
		sleep(1);
		echo "<script>location:reload();</script>";
	}
}*/
?>
<a href="<?php echo "result.php?new=$dir" ?>">Check your result here</a>
