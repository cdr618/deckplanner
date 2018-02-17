
<html>
<head>
<?php

	session_start();
	$usr= $_POST["name"];
	$con = mysqli_connect("mysql.cs.mun.ca", "cs3715w17_cdr618", "G!AVr\$cw");
	mysqli_select_db($con, "cs3715w17_cdr618");
	$sql = "INSERT INTO Deck (name) VALUES ('$usr')";
	$con->query($sql);
	$sqlUser="SELECT * FROM Deck WHERE name='$usr'";
	$result= $con->query($sqlUser);

//	while ($row=mysqli_fetch_array($result)){
//		echo $row["name"];
//	}
	$sqlUser="SELECT id FROM Deck WHERE name='$usr'";
	$result= $con->query($sqlUser);
	while ($row=mysqli_fetch_array($result)){
		$_SESSION['id']= $row["id"];
	}
?>
<script type="text/javascript">

function displayImg1(){
	var i=document.getElementById("board1");
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
	var i=document.getElementById("wood1");
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
	var i=document.getElementById("stain1");
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
function displayImg4(){
	var i=document.getElementById("deckShape");
	var str=i.options[i.selectedIndex].value;
	var img= new XMLHttpRequest();
	img.onreadystatechange = function() {
		if(img.readyState == 4){
			canvas4( img );
		}
	}
	var url= "images.php?index="+str;
	img.open("GET", url, true);
	img.send();
}
function canvas4(img) {
    var image = document.getElementById("deck");
    image.src = img.responseText;

}
function canvas1(img) {
    var image = document.getElementById("board");
    image.src = img.responseText;
}
function canvas2(img) {
    var image = document.getElementById("wood");
    image.src = img.responseText;
}
function canvas3(img){
	var image = document.getElementById("stain");
	image.src = img.responseText;
}

</script>
<style>
.redtext {color: red;}
body {
	background-image: url("background.jpeg");
	background-size: 100%;
}
</style>
</head>
<body>
<h1 style="text-align:center;font-family:'Lucida Console', Monaco, monospace;">Choose Your Materials And Layout!</h1>
<table align="center">

<tr><td colspan="2">Choose the size of boards for your deck. </td></tr>
<tr>
	<td><form action="railing.php" name="deck" method="post">
	<img id="board" src="boardImg/2x4.jpeg" "width=200 height=200"/>	
	</td>
	<td>
	<Select Name="board" id="board1" onchange="displayImg1();">
		<Option Selected value="2x4">2x4 in</Option>
		<Option value="2x6">2x6 in</Option>	
		<Option value="2x8">2x8 in</Option>
		<Option value="2x10">2x10 in</Option>
	</Select></td>

</tr>

<tr><td colspan="2">Choose the type of wood for your deck. </td></tr>
<tr>
	<td>
	<img id="wood" src="woodImg/cedar.jpeg" "width=200 height=200"/>	
	</td>
	<td>
	<Select Name="wood" id="wood1" onchange="displayImg2();">
		<Option Selected value="cedar">Cedar</Option>
		<Option value="redwood">Redwood</Option>	
		<Option value="composite">Composite</Option>
		<Option value="pressureTreated">Pressure Treated</Option>
	</Select>
	</td>

</tr>
<tr><td colspan="2">Choose a stain for your deck.</td></tr>
<tr>
	<td>
	<img id="stain" src="stainImg/naturaltone.jpeg" "width=200 height=200"/>
	</td>
	<td>
	<Select Name="stain" id="stain1" onchange="displayImg3();">
		<Option Selected value="naturaltone">Naturaltone</Option>
		<Option value="clear">Clear</Option>	
		<Option value="transparent">Transparent</Option>
		<Option value="semi-transparent">Semi-Transparent</Option>
		<Option value="pewter">Pewter</Option>
		<Option value="bordeaux">Bordeaux</Option>
	</Select>
	
	</td>
</tr>
<tr>	
	<td>
	<img id="deck" src="deckShape/rectangular.jpeg" "width=200 height=200"/>
	</td>
	<td>
	<Select Name="deck" id="deckShape" onchange="displayImg4();">
		<Option Selected value="select">---Select---</option>
		<Option value="rectangular">Rectangular</Option>
		<Option value="l-Shaped">L-Shaped</Option>	
		<Option value="u-Shaped">U-Shaped</Option>
	</td>
</tr>
<tr>

<td colspan="2">
<input type="text" name="height">Enter the height of your deck.</input>
</td>
</tr>

<tr>	
	<td><input type="submit" value="Submit"></td>	
</tr>
</form>
</table>
</body>
</html>
