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
#exec("perl /home/kongdeju/github/ppdesigner/scripts/ppdesigner $fname -pritm $pritm -protm $protm -prilen $prilen -prolen $prolen -lenmin $lenmin -lenmax $lenmax 1> /dev/null 2> /dev/null & ");
echo "<h1>Your jop is running now</h1>";
echo "<h2>Jop id : $mid</h2>";
#echo "<input type=\"submit\" value=\"Check your result here\" style=\"width:200px;height:50px\" >";
echo "<h2><a href=\"result.php\">Check your result here </a></h2>";
?>

