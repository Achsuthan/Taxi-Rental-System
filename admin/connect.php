<?php
    $con=mysqli_connect("localhost", "root", "");
	mysql_select_db("test") or die("Database not selected");
	
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: ".
		mysqli_connect_errno();
	}
?>