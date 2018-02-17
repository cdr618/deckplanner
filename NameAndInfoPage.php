<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript">
function displayImg(){
	var i=document.getElementById("deckShape");
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
function canvas1(img) {
    var image = document.getElementById("deck");
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
<h1 style="text-align:center;font-family:'Lucida Console', Monaco, monospace;"> Welcome to our Deck Planner! </h1>
<form action="woodtype.php" method="POST">
<table align="center">

<tr><td colspan="2">Please enter your name and we will begin.</td></tr>
<tr >
	<td colspan="2">Name:<input type="text" name="name"/></td>
</tr>
<tr>
<td>
	<input type="submit" value="Submit">
</td>
</tr>
</table>
</form>
</body>
</html>
