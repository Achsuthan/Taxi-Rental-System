<!DOCTYPE html>
<html>
	<head>
		<title>Delete User Records</title>
	</head>
<?php
	
	include('connect.php');

	$questions=$_POST['question'];
	$answer=$_POST['answer'];
	
	if (!$questions || !$answer) {
		echo "<br/><h3>Please insert relevant fields!</h3>";
		echo "<input type='button' name='back' value='Back' onclick='history.go(-1)' />";
		echo "<br/><br/>*Click the above 'Back' button to go back to the Admin page.";
	}
	else {
		$query="INSERT INTO faq(question, answer) VALUES('$questions','$answer')" or die ('could not insert');
		
		mysql_query($query) or die('Could not insert');	

		echo "<br/><h3>Successfully Added to the Database!</h3>";
		echo "<input type='button' name='back' value='Back' onclick='history.go(-1)' />";
		echo "<br/><br/>*Click the above 'Back' button to go back to the Admin page.";
	}
	
	mysqli_close($con);
?>
</html>