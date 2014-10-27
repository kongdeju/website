<head><script src="jquery.js"></script>
<?php

$array = explode('-',$_GET["seqs"]);
$i = 0;
$dir = array_pop($array) . '/out';
chdir($dir);
exec("rm head.txt");
$j = 1;
$fp=fopen("head.txt",'w');
foreach($array as $value){
	
	$line[$i] = ereg_replace("_", "\t", $value);
	$hang = $line[$i] . "\n";
	$name = ">seq_$j" . "\n";
	fwrite($fp, $name);
	fwrite($fp, $hang);
	$j++;
}

$input = $_GET["name"];

exec("perl /home/kongdeju/github/ppdesigner/scripts/pppredict $input");
exec("perl /home/kongdeju/github/ppdesigner/scripts/ppextract $input");
$pri = exec("ls *_primer.xls");
$pro = exec("ls *_probe.xls");
$out = fopen("pro_reg.bsp.xls",'r');
$primer = fopen($pri, 'r');
$probe = fopen($pro, 'r');
?>
<script>
$(function(){
	$("#deny").click(function(){
		alert("Try the last step again!");
	window.close();	
	})
})

$(function(){
	
	$("#accept").click(function(){
		$("div.com").show();
	})
})

</script>
<style>
#div{width: 100%;}
#leftoutcom{width:100%;text-align: center;}
#primer{width: 50%;float: right;overflow: auto;}
#probe{width: 50%;float: left;overflow: auto;}
.h1{color: green;}
.table{text-align: center;}

</style>
</head>
<h1 align="center" >Prediction Outcome</h1>
<div id="content">
	<div id="leftoutcom">
		<table align="center">
			<tr><td>probes</td><td></td><td>hit_region</td></tr>
				<?php
				$x = 1;
				while(!feof($out)){
	
					$line = fgets($out);
					if (preg_match('/seq/',$line)){
						$array1 = split("\t",$line);
						$num = $array1[2];
						echo "<tr><td>seq_$x</td><td>--->></td><td>$num</td></tr>";
						$x++;
					}
				}
				?>
		</table>
		<button type="button" id="accept">Accept</button>
		<button type="button" id="deny"> Deny </button>
	</div><br><br>
	<div id="primer" class="com" hidden="true" align="center">
		<h2 >Primers</h2>
		<?php
			echo "gene_name>>>\tdireaction>>>\tprimer>>>\tlength>>>\tPcr region length>>> \t Tm <br><br>";
			while(!feof($primer)){
				$line = fgets($primer);
				if(preg_match('/\w+/', $line)){
					$shuzu = split("\t",$line);
					echo "$shuzu[0]\t>>>$shuzu[1]\t>>>$shuzu[2]\t>>>$shuzu[3]\t>>>$shuzu[4]\t>>>$shuzu[5]<br><br>";
				}
			}
		?>
	</div>
	<div id="probe" class="com" hidden="true" align="center">
		<h2 >Porbes</h2>
		<?php
			echo "gene_name\t>>>probe\t>>>Tm<br><br>";
			while(!feof($probe)){
				$line = fgets($probe);
				if(preg_match('/\w+/', $line)){
					$shuzu = split("\t",$line);
					echo "$shuzu[0]\t>>>$shuzu[1]\t>>>$shuzu[3]\t<br><br>";
				}
			}
		?>
	</div>
</div>
<?php exec("rm *") ?>
<?php exec("cp ../$input .") ?>

