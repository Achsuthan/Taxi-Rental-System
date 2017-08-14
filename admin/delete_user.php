<!DOCTYPE html>
<html>
	<head>
		<title>Delete User Records</title>
	</head>
<?php
    include ('connect.php');

	$userdelete=$_SERVER['QUERY_STRING'];
	$query="DELETE FROM users WHERE username='$userdelete'";
	$result=mysql_query($query);
	
	if(!$result)
	{
		die(mysql_error());
	}
	else {
		echo "<br/><h3>Selected User Records Deleted Successfully!</h3>";
		echo "<input type='button' name='back' value='Back' onclick='history.go(-1)' />";
		echo "<br/><br/>*Click the above 'Back' button to go back to the Admin page.";
	}		
	
	mysqli_close($con);
?>



</html>