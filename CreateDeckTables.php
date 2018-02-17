<?php
$con = mysqli_connect("mysql.cs.mun.ca", "cs3715w17_cdr618", "G!AVr\$cw");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully";

mysqli_select_db($con, "cs3715w17_cdr618");
$sql = "CREATE TABLE Deck (id INT(6) AUTO_INCREMENT NOT NULL PRIMARY KEY, name VARCHAR(30) NOT NULL, height FLOAT, top FLOAT, topright FLOAT, bottomright FLOAT, bottom FLOAT, width FLOAT, length FLOAT, widthofu FLOAT, outsideu FLOAT, widthofarms FLOAT, posttype VARCHAR(30), railingtype VARCHAR(30), closuretype VARCHAR(30), woodtype VARCHAR(30), staintype VARCHAR(30), ifrailing BOOLEAN, totalcost FLOAT)";

if ($con->query($sql) === TRUE) {
    echo "Table Deck created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

$con->close();
?>
