<?php 
session_start();
$_SESSION['type'] = "l";

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
<h1 style="text-align:center;font-family:'Lucida Console', Monaco, monospace;"> L-Shape Deck </h1>
<p style="text-align:center;font-family:'Lucida Console', Monaco, monospace;"> Please enter the parameters of your deck in meters. The house is adjacent to the "top" of the L. </p>
<form method="POST" action="deckProducer.php" id="deckForm">
<table align="center" style="border-spacing:0;border-collapse: collapse;">
<tr colspan="3">
<td style="text-align:center;">
<input type="text" name="top"> Top</input>
</td>
</tr>
<tr>
<td style="padding:0px;">
<div style="width:400px;height:200px;border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #d9b38c;background-color:d9b38c;padding:0px;"><div>
</td>
<td colspan="2" style="text-align:top;">
<input type="text" name="tright"> Top Right</input>
</td>
<tr>
<td style="padding:0px;">
<div style="width:400px;height:200px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #d9b38c;border-top:1px solid #d9b38c;background-color:d9b38c;padding:0px;"><div>
</td>
<td style="padding:0px;">
<div style="width:400px;height:200px;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;background-color:d9b38c;padding:0px;"><div>
</td>
<td>
<input type="text" align="center" name="bright"> Bottom Right</input>
</tr>
<tr colspan="3">
<td colspan="2" style="text-align:center;">
<input type="text" name="bottom" > Bottom Length</input>
</td>
</tr>
</table>
<br>
<input type="submit" value="Submit"></input>
</form>
</body>
</html>
