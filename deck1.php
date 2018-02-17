<?php
session_start();
$_SESSION['type'] = "rec";

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
<h1 style="text-align:center;font-family:'Lucida Console', Monaco, monospace;"> Rectangular Deck </h1>
<p style="text-align:center;font-family:'Lucida Console', Monaco, monospace;"> Please enter the length and width of your deck in meters.</p>
<br>
<br>
<form method="POST" action="deckProducer.php" id="deckForm">
<table align="center"style="border-spacing:0;border-collapse: collapse;">
<tr>
<td>
</td>
<td style="text-align:center;">
<input type="text" name="width"> Width</input>
</td></tr>
<tr><td>
<input type="text" name="length"> Length</input>
<td>
<div style="width:400px;height:200px;border:1px solid #000;background-color:d9b38c;padding:0px;"><div>
</td>
</tr>
</table>
<br>
<input type="submit" value="Submit"></input>
</form>
</html>

