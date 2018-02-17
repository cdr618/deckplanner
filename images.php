<?php

	session_start();
/*	$con = mysqli_connect("mysql.cs.mun.ca", "cs3715w17_cdr618", "G!AVr\$cw");
	mysqli_select_db($con, "cs3715w17_cdr618");
*/		
	if($_GET['index']=="rectangular"){
		$_SESSION['type']="rec";
	} else if($_GET['index']=="u-Shaped"){
		$_SESSION['type']="u";
	} else if($_GET['index']=="l-Shaped"){
		$_SESSION['type']="l";
	}
/*	if($_POST['index']=="basicRail"){
		$railing1 = "UPDATE Deck SET railingtype='Basic Rail' WHERE id='$id'";
		$con->query($railing1);	
	}
*/
	
	$images = array("2x4"=>"boardImg/2x4.jpeg","2x6"=>"boardImg/2x6.jpeg","2x8"=>"boardImg/2x8.jpeg","2x10"=>"boardImg/2x10.jpeg","rectangular"=>"deckShape/rectangular.jpeg","u-Shaped"=>"deckShape/u-Shaped.jpeg","l-Shaped"=>"deckShape/l-Shaped.jpeg","glass"=>"encloseImg/glass.jpeg","lattice"=>"encloseImg/lattice.jpeg","spindal"=>"encloseImg/spindal.jpeg","frenchGothic"=>"postImg/frenchGothic.jpeg","standard"=>"postImg/standard.jpeg","newEnglandFlat"=>"postImg/newEnglandFlat.jpeg","basicRail"=>"railImg/basicRail.jpeg", "enclosedRail"=>"railImg/enclosedRail.jpeg", "roundedRail"=>"railImg/roundedRail.jpeg","bordeaux"=>"stainImg/bordeaux.jpeg", "clear"=>"stainImg/clear.jpeg", "naturaltone"=>"stainImg/naturaltone.jpeg", "pewter"=>"stainImg/pewter.jpeg", "semi-transparent"=>"stainImg/semi-transparent.jpeg", "transparent"=>"stainImg/transparent.jpeg", "cedar"=>"woodImg/cedar.jpeg", "composite"=>"woodImg/composite.jpeg", "pressureTreated"=>"woodImg/pressureTreated.jpeg", "redwood"=>"woodImg/redwood.jpeg");

	echo $images[$_GET['index']];
	

?>
