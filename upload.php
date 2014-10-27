<html>
<div align="center">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <h2><font color="#009100">Welcom <?php echo $_POST["name"]; ?>!</font></h2>
 </head>

<body>

<?php
$fname = $_POST["name"] . '_' .  time();
$fdir = 'uploads/' . $fname;
$old = umask(0);
mkdir($fdir,0777);
umask($old);
$target_dir = "/var/www/$fdir/";
$username = $_POST["name"];
$target_dirname = $target_dir . basename( $_FILES["uploadFile"]["name"]);
$rname = basename($_FILES["uploadFile"]["name"]);

$stat=0;

if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"],$target_dirname)) {
    echo "<h4>The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.</h4>";
    $stat=1;
} else {
    echo "Sorry, there was an error uploading your file.";

}

?>



<br>
 <div id="run">
<h1> Run ppdesigner</h1>
<form name="input" action="run.php" method="post">
Tm of primer 	 : <input type="text" name="Tmpri" size="2" value="55"  onClick="if (this.value==55){this.value=''}" /><?php echo "±"; ?><input type="text" name="udpri" value=5 onClick="if (this.value==5)    {this.value=''}" size="2" /><br>
Tm of probe &nbsp	 : <input type="text" name="Tmpro" value=55 onClick="if (this.value==55)    {this.value=''}" size="2" /><?php echo "±"; ?><input type="text" name="udpro" value=5 onClick="if (this.value==5)    {this.value=''}" size="2" /><br>
Length of primer : <input type="text" name="Lenpri" value=20 onClick="if (this.value==20)    {this.value=''}" size="2"/><br>
Length of probe  &nbsp &nbsp: <input type="text" name="Lenpro" value=18 onClick="if (this.value==18)    {this.value=''}" size="2" /><br>
Maxiusm length of PCR region : <input type="text" name="lenmax" value=120 onClick="if (this.value==120)    {this.value=''}" size="2" /><br>
Minimus length of PCR region : <input type="text" name="lenmin" value=60 onClick="if (this.value==60)    {this.value=''}" size="2" /><br>
<?php 
echo "<input type=\"text\" name=\"dir\" value=\"$target_dir\" hidden=\"true\"  >";
echo "<input type=\"text\" name=\"filename\" value=\"$rname\"  hidden=\"true\" >";
echo "<input type=\"text\" name=\"tmd\" value=\"$fname\" hidden=\"true\">";
echo "<input type=\"text\" name=\"username\" value=\"$username\" hidden=\"true\">";
?>
<input type="submit" Value="Run" style="font-size:25px;height:50px;width:200px;)"  onMouseOver="this.style.backgroundColor='lightblue'" onMouseOut="this.style.backgroundColor=''">
</form>
</div>
</div>
</body>
</html> 
