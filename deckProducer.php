<html>
<?php
session_start();

$con = mysqli_connect("mysql.cs.mun.ca", "cs3715w17_cdr618", "G!AVr\$cw");
mysqli_select_db($con, "cs3715w17_cdr618");

$id = $_SESSION['id'];


$lumberprice = 215.28;
$postprice = 3.34;
$stainprice = 50;
$railprice = 10;
$closureprice = 20;
$woodmult = 1;
$closuremult = 1;
$postmult = 1;
$railingmult = 1;

if($_SESSION['type'] == "rec"){

$len = $_POST['length'] * 100;
$wid = $_POST['width'] * 100;
$arear = (($len / 100) * ($wid / 100));
$perir = (($len * 2) + ($wid * 2)) / 100;

$sql1 = "UPDATE Deck SET length='$len' WHERE id='$id'";
$con->query($sql1);
$sql2 = "UPDATE Deck SET width='$wid' WHERE id='$id'";
$con->query($sql2);
$post1 = "SELECT posttype FROM Deck WHERE id='$id'";
$result1 = $con->query($post1);
$railing1 = "SELECT railingtype FROM Deck WHERE id='$id'";
$result2 = $con->query($railing1);
$closure1 = "SELECT closuretype FROM Deck WHERE id='$id'";
$result3 = $con->query($closure1);
$wood1 = "SELECT woodtype FROM Deck WHERE id='$id'";
$result4 = $con->query($wood1);
$stain1 = "SELECT staintype FROM Deck WHERE id='$id'";
$result5 = $con->query($stain1);

echo
'<body style="background-color:#66ccff">'.
'<h1 style="text-align:center;font-family:\'Lucida Console\', Monaco, monospace;"> A Preview of Your Deck </h1>'.
'<div style="width:100px;border-bottom:1px solid #000;text-align:center;font-family:\'Lucida Console\', Monaco, monospace;">This length represents 1 metre</div>'.
'<table align="center">'.
'<tr>'.
'<td>'.
'</td>'.
'<td style="text-align:center;">'.
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'</td>'.
'<td>'.
'<div style="width:';echo $wid; echo'px;height:';echo $len; echo'px;border:1px solid #000;background-color:d9b38c;padding:0px;"><div>'.
'</td>'.
'</tr>'.
'</table>'.
'<br>'.
'<br>'.
'<table align="center" border="1">'.
'<tr>'.
'<td>'.
'Post Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result1)) {
        if($row["posttype"] == 'standard'){
            $postmult = 1;
        }
        else if($row["posttype"] == 'frenchGothic'){
            $postmult = 1.05;
        }
        else if($row["posttype"] == 'newEnglandFlat'){
            $postmult = 1.1;
        }
        echo $row["posttype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Railing Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result2)) {
        if($row["railingtype"] == 'basicRail'){
            $railingmult = 1;
        }
        else if($row["railingtype"] == 'enclosedRail'){
            $railingmult = 1.1;
        }
        else if($row["railingtype"] == 'roundedRail'){
            $railingmult = 1.15;
        }
        echo $row["railingtype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Closure Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result3)) {
        if($row["closuretype"] == 'lattice'){
            $closuremult = 1;
        }
        else if($row["closuretype"] == 'spindal'){
            $closuremult = 1.1;
        }
        else if($row["closuretype"] == 'glass'){
            $closuremult = 1.5;
        }
        echo $row["closuretype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Wood Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result4)) {
        if($row["woodtype"] == 'cedar'){
            $woodmult = 1.1;
        }
        else if($row["woodtype"] == 'redwood'){
            $woodmult = 1.2;
        }
        else if($row["woodtype"] == 'composite'){
            $woodmult = 1;
        }
        else if($row["woodtype"] == 'pressureTreated'){
            $woodmult = 1.05;
        }
        echo $row["woodtype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Stain Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result5)) {
        echo $row["staintype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Total Cost:'.
'</td>'.
'<td>';
$floorcost = $lumberprice * $arear * $woodmult + $stainprice;
$postnum = ceil($perir/2.4384);
$perimcost = ($railprice * $perir * $railingmult) + ($postprice * $postnum) + ($closureprice * $closuremult * $perir);
$total = $floorcost + $perimcost;
$sqlt = "UPDATE Deck SET totalcost='$total' WHERE id='$id'";
	$con->query($sqlt);
$totalcost1 = "SELECT totalcost FROM Deck WHERE id='$id'";
$result6 = $con->query($totalcost1);
while ($row=mysqli_fetch_array($result6)) {
        echo $row["totalcost"];
}
echo
'</td>'.
'</tr>'.
'</table>'.
'</html>';
}
else if($_SESSION['type'] == "l"){
$top = $_POST['top'] * 100;
$topright = $_POST['tright'] * 100;
$bottom = ($_POST['bottom'] - $_POST['top']) * 100;
$bottomright = $_POST['bright'] * 100;

$areal = (($top / 100) * ($topright / 100)) + (($top / 100) * ($bottomright / 100)) + (($bottom / 100) * ($bottomright / 100));
$peril = (($top * 2) + ($bottom * 2) + (($topright + $bottomright) * 2)) / 100;

$sql3 = "UPDATE Deck SET top='$top' WHERE id='$id'";
$con->query($sql3);
$sql4 = "UPDATE Deck SET topright='$topright' WHERE id='$id'";
$con->query($sql4);
$sql5 = "UPDATE Deck SET bottom='$bottom' WHERE id='$id'";
$con->query($sql5);
$sql6 = "UPDATE Deck SET bottomright='$bottomright' WHERE id='$id'";
$con->query($sql6);
$post1 = "SELECT posttype FROM Deck WHERE id='$id'";
$result1 = $con->query($post1);
$railing1 = "SELECT railingtype FROM Deck WHERE id='$id'";
$result2 = $con->query($railing1);
$closure1 = "SELECT closuretype FROM Deck WHERE id='$id'";
$result3 = $con->query($closure1);
$wood1 = "SELECT woodtype FROM Deck WHERE id='$id'";
$result4 = $con->query($wood1);
$stain1 = "SELECT staintype FROM Deck WHERE id='$id'";
$result5 = $con->query($stain1);

echo
'<body style="background-color:#66ccff">'.
'<h1 style="text-align:center;font-family:\'Lucida Console\', Monaco, monospace;"> A Preview of Your Deck </h1>'.
'<div style="width:100px;border-bottom:1px solid #000;text-align:center;font-family:\'Lucida Console\', Monaco, monospace;">This length represents 1 metre</div>'.
'<table align="center" style="border-spacing:0;border-collapse: collapse;>'.
'<tr colspan="3">'.
'<td>'.
'</td>'.
'</tr>'.
'<tr>'.
'<td style="padding:0px;">'.
'<div style="width:'; echo $top; echo 'px;height:'; echo$topright; echo 'px;border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #d9b38c;background-color:d9b38c;padding:0px;"><div>'.
'</td>'.
'<td colspan="2" style="text-align:top;">'.
'</td>'.
'<tr>'.
'<td style="padding:0px;">'.
'<div style="width:'; echo $top; echo'px;height:'; echo$bottomright; echo 'px;border-left:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #d9b38c;border-right:1px solid #d9b38c;background-color:d9b38c;padding:0px;"><div>'.
'</td>'.
'<td style="padding:0px;">'.
'<div style="width:'; echo $bottom; echo'px;height:'; echo$bottomright; echo'px;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;background-color:d9b38c;padding:0px;"><div>'.
'</td>'.
'<td>'.
'</tr>'.
'<tr colspan="3">'.
'<td colspan="3">'.
'</td>'.
'</tr>'.
'</table>'.
'<br>'.
'<br>'.
'<table align="center" border="1">'.
'<tr>'.
'<td>'.
'Post Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result1)) {
        if($row["posttype"] == 'standard'){
            $postmult = 1;
        }
        else if($row["posttype"] == 'frenchGothic'){
            $postmult = 1.05;
        }
        else if($row["posttype"] == 'newEnglandFlat'){
            $postmult = 1.1;
        }
        echo $row["posttype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Railing Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result2)) {
        if($row["railingtype"] == 'basicRail'){
            $railingmult = 1;
        }
        else if($row["railingtype"] == 'enclosedRail'){
            $railingmult = 1.1;
        }
        else if($row["railingtype"] == 'roundedRail'){
            $railingmult = 1.15;
        }
        echo $row["railingtype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Closure Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result3)) {
        if($row["closuretype"] == 'lattice'){
            $closuremult = 1;
        }
        else if($row["closuretype"] == 'spindal'){
            $closuremult = 1.1;
        }
        else if($row["closuretype"] == 'glass'){
            $closuremult = 1.5;
        }
        echo $row["closuretype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Wood Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result4)) {
        if($row["woodtype"] == 'cedar'){
            $woodmult = 1.1;
        }
        else if($row["woodtype"] == 'redwood'){
            $woodmult = 1.2;
        }
        else if($row["woodtype"] == 'composite'){
            $woodmult = 1;
        }
        else if($row["woodtype"] == 'pressureTreated'){
            $woodmult = 1.05;
        }
        echo $row["woodtype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Stain Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result5)) {
        echo $row["staintype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Total Cost:'.
'</td>'.
'<td>';
$floorcost = $lumberprice * $areal * $woodmult + $stainprice;
$postnum = ceil($peril/2.4384);
$perimcost = ($railprice * $peril * $railingmult) + ($postprice * $postnum) + ($closureprice * $closuremult * $peril);
$total = $floorcost + $perimcost;
$sqlt = "UPDATE Deck SET totalcost='$total' WHERE id='$id'";
	$con->query($sqlt);
$totalcost1 = "SELECT totalcost FROM Deck WHERE id='$id'";
$result6 = $con->query($totalcost1);
while ($row=mysqli_fetch_array($result6)) {
        echo $row["totalcost"];
}
echo
'</td>'.
'</tr>'.
'</table>'.
'</html>';
}
else if($_SESSION['type'] == "u"){
$uwid = ($_POST['uwidth'] - ($_POST['arms'] * 2)) * 100;
$outside = ($_POST['out'] / 2) * 100;
$arm = $_POST['arms'] * 100;

$areau = (($uwid / 100) * ($outside / 100)) + (($arm / 100) * ($outside / 100) * 4);
$periu = (($outside * 6) + ($uwid * 2) + ($arm * 4)) / 100;

$sql7 = "UPDATE Deck SET widthofu='$uwid' WHERE id='$id'";
$con->query($sql7);
$sql8 = "UPDATE Deck SET outsideofu='$outside' WHERE id='$id'";
$con->query($sql8);
$sql9 = "UPDATE Deck SET armsofu='$arm' WHERE id='$id'";
$con->query($sql9);
$post1 = "SELECT posttype FROM Deck WHERE id='$id'";
$result1 = $con->query($post1);
$railing1 = "SELECT railingtype FROM Deck WHERE id='$id'";
$result2 = $con->query($railing1);
$closure1 = "SELECT closuretype FROM Deck WHERE id='$id'";
$result3 = $con->query($closure1);
$wood1 = "SELECT woodtype FROM Deck WHERE id='$id'";
$result4 = $con->query($wood1);
$stain1 = "SELECT staintype FROM Deck WHERE id='$id'";
$result5 = $con->query($stain1);

echo
'<body style="background-color:#66ccff">'.
'<h1 style="text-align:center;font-family:\'Lucida Console\', Monaco, monospace;"> A Preview of Your Deck </h1>'.
'<div style="width:100px;border-bottom:1px solid #000;text-align:center;font-family:\'Lucida Console\', Monaco, monospace;">This length represents 1 metre</div>'.
'</style>'.
'<table align="center" style="border-spacing:0;border-collapse: collapse;>'.
'<tr>'.
'<td rowspan="4" style="text-align:center;">'.
'</td>'.
'<td>'.
'</td>'.
'</tr>'.
'<tr>'.
'<td style="width:'; echo $arm; echo 'px;padding:0px;">'.
'<div style="width:'; echo $arm; echo 'px;height:'; echo$outside; echo 'px;border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #d9b38c;background-color:d9b38c;padding:0px;"><div>'.
'</td>'.
'<td style="padding:0px;">'.
'<div style="width:'; echo $uwid; echo 'px;height:'; echo$outside; echo 'px;border-top:1px solid #000;border-bottom:1px solid #000;background-color:d9b38c;padding:0px;"><div>'.
'</td>'.
'<td style="padding:0px;">'.
'<div style="width:'; echo $arm; echo 'px;height:'; echo $outside; echo 'px;border-top:1px solid #000;border-right:1px solid #000;background-color:d9b38c;padding:0px;"><div>'.
'</td>'.
'</tr>'.
'<tr>'.
'<td style="padding:0px;">'.
'<div style="width:'; echo $arm; echo 'px;height:'; echo$outside; echo 'px;border-bottom:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;background-color:d9b38c;padding:0px;"><div>'.
'</td>'.
'<td>'.
'</td>'.
'<td style="padding:0px;">'.
'<div style="width:'; echo $arm; echo 'px;height:'; echo $outside; echo 'px;border-bottom:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;background-color:d9b38c;padding:0px;"><div>'.
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'</td>'.
'</tr>'.
'</table>'.
'<br>'.
'<br>'.
'<table align="center" border="1">'.
'<tr>'.
'<td>'.
'Post Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result1)) {
        if($row["posttype"] == 'standard'){
            $postmult = 1;
        }
        else if($row["posttype"] == 'frenchGothic'){
            $postmult = 1.05;
        }
        else if($row["posttype"] == 'newEnglandFlat'){
            $postmult = 1.1;
        }
        echo $row["posttype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Railing Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result2)) {
        if($row["railingtype"] == 'basicRail'){
            $railingmult = 1;
        }
        else if($row["railingtype"] == 'enclosedRail'){
            $railingmult = 1.1;
        }
        else if($row["railingtype"] == 'roundedRail'){
            $railingmult = 1.15;
        }
        echo $row["railingtype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Closure Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result3)) {
        if($row["closuretype"] == 'lattice'){
            $postmult = 1;
        }
        else if($row["closuretype"] == 'spindal'){
            $postmult = 1.1;
        }
        else if($row["closuretype"] == 'glass'){
            $postmult = 1.5;
        }
        echo $row["closuretype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Wood Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result4)) {
        if($row["woodtype"] == 'cedar'){
            $woodmult = 1.1;
        }
        else if($row["woodtype"] == 'redwood'){
            $woodmult = 1.2;
        }
        else if($row["woodtype"] == 'composite'){
            $woodmult = 1;
        }
        else if($row["woodtype"] == 'pressureTreated'){
            $woodmult = 1.05;
        }
        echo $row["woodtype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Stain Type:'.
'</td>'.
'<td>';
while ($row=mysqli_fetch_array($result5)) {
        echo $row["staintype"];
}
echo
'</td>'.
'</tr>'.
'<tr>'.
'<td>'.
'Total Cost:'.
'</td>'.
'<td>';
$floorcost = $lumberprice * $areau * $woodmult + $stainprice;
$postnum = ceil($periu/2.4384);
$perimcost = ($railprice * $periu * $railingmult) + ($postprice * $postnum) + ($closureprice * $closuremult * $periu);
$total = $floorcost + $perimcost;
$sqlt = "UPDATE Deck SET totalcost='$total' WHERE id='$id'";
	$con->query($sqlt);
$totalcost1 = "SELECT totalcost FROM Deck WHERE id='$id'";
$result6 = $con->query($totalcost1);
while ($row=mysqli_fetch_array($result6)) {
        echo $row["totalcost"];
}
echo
'</td>'.
'</tr>'.
'</table>'.
'</body>';
}
?>
</html>

