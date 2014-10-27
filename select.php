<html>
<head>
	<script src="jquery.js"></script>
<style>
#cont{width: 100%; height: 1000px;}
#leftdiv{width: 45%;height: 800px;float: left;}
#middiv{width: 8%;height: 800px;float:left;margin: 0;text-align: center;}
#rightdiv{width: 45%;height: 800px;float: right;}

#selector{width: 40%;height: 30px;margin: 0 auto;}
#selecting_aera{width: 100%;height: 700px;}
#verity{width: 50%;float: left;height: 30px;text-align: center;}
#verity2{width: 50%;float: right;height: 30px;text-align: center;}
</style>
<script>var workdir = <?php echo $mydir ?></script>
<script type="text/javascript">
var a;
var b;
 function showdiv(){
	$("div.leftdiv123").hide();
	var a =  '#' + $('#select option:selected').val();
	$(a).show();


};
$(document).ready(function(){

	$("option.opt").click(function(){
		showdiv();
	})
})
$(document).ready(function(){ //This is mouse click function
  $("li").click(function(){
  	$("li").css("background-color","white");
    $(this).css("background-color","#addd8e");
  });

});
var index;
$(function(){
	$("ol.leftol").children('li').click(function(){
			 c = $(this).text();
			 index = $(this).closest("div").attr("value") ;
			 input = '#rightolid li:eq(' + index + ')';
			
	})
})
$(function(){
	$("ol.rightol").children('li').click(function(){
			 
			 rindex = $(this).index();
			 rinput = '#rightolid li:eq(' + rindex + ')';
			
	})
})



$(function(){
	$("#add").click(function(){
		 $(input).text(c);
	})
	
})
$(function(){
	$("#del").click(function(){
		 x = $(rinput).empty();
		 
	})
	
})
</script>
<?php 
$my_dir = $_GET["new"];
$filename = $_GET["name"];
chdir($my_dir);
$a = exec("ls seq*.txt | wc -l") + 1;
$shishi = "nihao";
?>
<script>

var pripro = new Array();
var num = <?php echo $a; ?>;

var i;
var j;
for( i = 0;i < num -1 ;i++){
	pripro[i] = "Please select item from left seq_" + i; 
}
$(function(){
	$("#default").click(function(){
		 var z = 0;
		 for (z=0;z < num -1;z++){
		 	//qq = '#rightolid li:eq(' + z + ')';
		 	//$(qq).text(def[z]);
		 	z2 = z + 1;
		 	ww = "#rightolid li:eq(" + z + ")";
		 	ww2 = "#seq_" + z2 + " li:eq(0)";
		 	 $(ww).text($(ww2).text());
		 }
		 
	})
	
})
var verify_pripro = new Array();
$(function(){
	$("#verify").click(function(){
		 var nb = 0;
		var status = 1;
		 for(nb = 0; nb < num - 1; nb++){
		 	var mm = "#rightolid li:eq(" + nb + ")"
		 	verify_pripro[nb] = $(mm).text();
		 }
		
		
		 j = verify_pripro.join("-");
		//$.post("predict.php",{seqs:b});
		//$.post("predict.php",{seqs:b});
		alert('Your primers and probes are submitted successfully, You can verify them now');
		$("#cseq").text(j);
		$("#status").text(status);

	})
	
		 //j = verify_pripro.join("-");
		//$.post("predict.php",{seqs:b});
		//$.post("predict.php",{seqs:b});
		//alert('submitting your primers and probes successfully');
		//alert(j);
})
$(function(){
	
	$("#predict").click(function(){
	o = $("#status").text();
	k = $("#cseq").text();
	k = k.replace(/\s/g,'_');
	if(o == 0){
		alert('submit firstly');
	} 
	tmdwhy = $("#why").text();
	ffilename = $("#filename").text();
	k = 'checkout.php?seqs=' + k + '-' + tmdwhy;
	k = k + '&name=' + ffilename;
	window.open(k);
})
})
</script>
<br>
<h1 align="center">PPdesiner </h1>
</head>
<body>
<div id="cont"  >
<form>
<div id="leftdiv" >
<div id="selector">
<select id="select" style="width:100%;text-align:center;">
	<option > choose seq </option>
	<?php 
		for ($i=1; $i < $a; $i++) { 
			echo "<option class=\"opt\" value=\"seq_$i\"> seq_$i </option>";
			
		}

	?>
</select>
</div>
<div id="selecting_aera"  style="width:100%;height:100%;overflow:auto;">
	<?php 
		for ($i=1; $i < $a; $i++) { 
			$divnum = $i - 1;
			echo "<div id=\"seq_$i\" value=\"$divnum\" class=\"leftdiv123\" hidden=\"true\">";
			echo "<ol class=\"leftol\" id=\"ol_$i\">";
			$file = fopen("seq_$i.txt", "r") ;
			while (!feof($file)) {
				echo "<li>";
				echo fgets($file);
				echo "</li>";
			}
			echo "</ol>";
			echo "</div>";
		}
	?>
</div>
</div>
<div id="middiv" >
	<br><br><br><br><br><br><br><br><br>
<button type="button" id="add" >ADD>></button><br><br><br>
<button type="button" id="del">DEL<<</button><br><br><br>
<button type="button" id="default">DEFAULT</button><br><br><br>
</div>
<div id="rightdiv" >
<div id ="verity" >
<script>
var aaaa = '<button type="button" id="verify" style="width:50%;">Submit</button>';
document.write(aaaa);
</script>
</div>
<div id="verity2">
<button type="button" id="predict" style="width:50%;">Verify</button>
</div>
<div id="combine" contenteditable="true" style="width:100%;height:100%;overflow:auto;">
<ol class="rightol" id ="rightolid">
<?php 
	for ($i=0; $i < $a - 1 ; $i++) { 
		$j = $i + 1;
		echo "<li id=\"rightli_$i\">";
		echo "Please select your item from seq_$j";
		echo "</li>";
	}
?>
<li id="cseq" hidden="true"></li>
<li id="status" hidden="true"></li>
<li id="why" hidden="true"><?php echo $my_dir; ?></li>
<li id="filename" hidden="true"><?php echo $filename; ?></li>
</ol>
</div>
</form>
</body>
</html>
