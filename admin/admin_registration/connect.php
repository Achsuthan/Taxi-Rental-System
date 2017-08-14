<?php
    $con=mysqli_connect("localhost", "root", "");
	mysql_select_db("test");
	
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: ".
		mysqli_connect_errno();
	}
?>