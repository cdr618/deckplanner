<!DOCTYPE HTML>
<html>
<head>
<?php
	session_start();
	if($_SESSION['type']=="rec"){
		$url='deck1.php';
	} else if($_SESSION['type']=="l"){
		$url='deck2.php';
	} else if($_SESSION['type']=="u"){
		$url='deck3.php';
	}
	$id=$_SESSION['id'];
	$board=$_POST['board'];
	$wood=$_POST['wood'];
	$stain=$_POST['stain'];
	$deck=$_POST['deck'];
	$height=$_POST['height'];
	$con = mysqli_connect("mysql.cs.mun.ca", "cs3715w17_cdr618", "G!AVr\$cw");
	mysqli_select_db($con, "cs3715w17_cdr618");
	$sql1 = "UPDATE Deck SET height='$height' WHERE id='$id'";
	$con->query($sql1);
	$sql2 = "UPDATE Deck SET woodtype='$wood' WHERE id='$id'";
	$con->query($sql2);
	$sql3 = "UPDATE Deck SET staintype='$stain' WHERE id='$id'";
	$con->query($sql3);
        
     
//	echo "$board+$wood+$stain+$deck+$height";
?>
<script type="text/javascript">
function displayImg1(){
	var i=document.getElementById("rail1");
	var str=i.options[i.selectedIndex].value;
	var img= new XMLHttpRequest();
	img.onreadystatechange = function() {
		if(img.readyState == 4){
			canvas1( img );
		}
	}
	var url= "images.php?index="+str;
	img.open("GET", url, true);
	img.send();
}
function displayImg2(){
	var i=document.getElementById("enclosure1");
	var str=i.options[i.selectedIndex].value;
	var img= new XMLHttpRequest();
	img.onreadystatechange = function() {
		if(img.readyState == 4){
			canvas2( img );
		}
	}
	var url= "images.php?index="+str;
	img.open("GET", url, true);
	img.send();
}
function displayImg3(){
	var i=document.getElementById("post1");
	var str=i.options[i.selectedIndex].value;
	var img= new XMLHttpRequest();
	img.onreadystatechange = function() {
		if(img.readyState == 4){
			canvas3( img );
		}
	}
	var url= "images.php?index="+str;
	img.open("GET", url, true);
	img.send();
}
function canvas1(img) {
    var image = document.getElementById("rail");
    image.src = img.responseText;
}
function canvas2(img){
	var image = document.getElementById("enclosure");
	image.src = img.responseText;
}
function canvas3(img) {
    var image = document.getElementById("post");
    image.src = img.responseText;
}
</script>
<style>
body {
	background-image: url("background.jpeg");
	background-size: 100%;
}
</style>
</head>
<body>
<h1 style="text-align:center;font-family:'Lucida Console', Monaco, monospace;"> Customize Your Railing. </h1>
<table align="center">
<tr><td colspan="2">Choose the railing for your deck.</td></tr>
<tr>
	<td><form action= <?php echo "$url"; ?> method="POST" name="nextPage">
	<img id="rail" src="railImg/basicRail.jpeg" "width=200 height=200"/>
	</td>
	<td><Select Name="railing" id="rail1" onchange="displayImg1();">
		<Option Selected value="basicRail">Standard</option>
		<Option value="enclosedRail">Enclosed</option>
		<Option value="roundedRail">Rounded</option>
	</Select></td>
</tr>

<tr><td colspan="2">Choose the enclosure for your deck.</td></tr>
<tr>
	<td>
	<img id="enclosure" src="encloseImg/lattice.jpeg" "width=200 height=200"/>
	</td>
	<td><Select Name="enclosure" id="enclosure1" onchange="displayImg2();">
		<Option Selected value="lattice">Lattice</option>
		<Option value="spindal">Spindals</option>
		<Option value="glass">Glass Panel</option>
	</Select></td>
</tr>

<tr><td colspan="2">Choose the type of posts for your deck.</td></tr>
<tr>
	<td>
	<img id="post" src="postImg/standard.jpeg" "width=200 height=200"/>
	</td>	
	<td><Select Name="post" id="post1" onchange="displayImg3();">
		<Option Selected value="standard">Standard</option>
		<Option value="frenchGothic">French Gothic</option>
		<Option value="newEnglandFlat">New England Flat Cap</option>
	</Select></td>
</tr>
<tr>
		
	<td><input type="submit" value="Submit"></td>	
	</form>

</tr>
</table>
</body>
</html>
