<?php 
session_start();
$_SESSION['type'] = "u";

$railing = $_POST['railing'];
$post = $_POST['post'];
$enclosure = $_POST['enclosure'];
$id = $_SESSION['id'];

$con = mysqli_connect("mysql.cs.mun.ca", "cs3715w17_cdr618", "G!AVr\$cw");
	mysqli_select_db($con, "cs3715w17_cdr618");
	$sql1 = "UPDATE Deck SET posttype='$post' WHERE id='$id'";
	$con->query($sql1);
	$sql2 = "UPDATE Deck SET closuretype='$enclosure' WHERE id='$id'";
	$con->query($sql2);
	$sql3 = "UPDATE Deck SET railingtype='$railing' WHERE id='$id'";
	$con->query($sql3);


?>
<html>
<body style="background-color:#66ccff">
<h1 style="text-align:center;font-family:'Lucida Console', Monaco, monospace;"> U-Shape Deck </h1>
<p style="text-align:center;font-family:'Lucida Console', Monaco, monospace;"> Please enter the parameters of your deck in meters.</p>
<form method="POST" action="deckProducer.php" id="deckForm">
<table align="center" style="border-spacing:0;border-collapse: collapse;">
<tr>
<td rowspan="4" style="text-align:center;">
<input type="text" name="out"><br> Outer sides of the "U" </input>
</td>
<td colspan="3" style="text-align: center;">
<input type="text" name="uwidth"> Width of the "U"</input>
</td>
</tr>
<tr>
<td style="width:300px;padding:0px;border-style: none;">
<div style="width:300px;height:200px;border-top:1px solid #000;border-left:1px solid #000; border-right:1px solid #d9b38c;background-color:d9b38c;padding:0px;"><div>
</td>
<td style="padding:0px;border-style: none;">
<div style="width:420px;height:200px;border-top:1px solid #000;border-bottom:1px solid #000;background-color:d9b38c;padding:0px;"><div>
</td>
<td style="padding:0px;border-style: none;">
<div style="width:300px;height:200px;border-top:1px solid #000;border-right:1px solid #000;background-color:d9b38c;padding:0px;"><div>
</td>
</tr>
<tr>
<td style="padding:0px;border-style: none;">
<div style="width:300px;height:200px;border-bottom:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;background-color:d9b38c;padding:0px;"><div>
</td>
<td>
</td>
<td style="padding:0px;border-style: none;">
<div style="width:300px;height:200px;border-bottom:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;background-color:d9b38c;padding:0px;"><div>
</td>
</tr>
<tr>
<td style="text-align: center;">
<input type="text" name="arms"><br> Width of the arms of the "U"</input>
</td>
</tr>
</table>
<br>
<input type="submit" value="Submit"></input>
</form>
</body>
</html>
