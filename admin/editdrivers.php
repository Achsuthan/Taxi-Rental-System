<!DOCTYPE html>
<html>
	<head>
		<title>Edit Driver Details</title>
		<style type="text/css">
			.tab{
				font-family: 'Calibri';
			}
			
			td{
				padding: 5px;
			}
		</style>
	</head>
<?php
    include ('connect.php');

	$driveredit=$_SERVER['QUERY_STRING'];
	$query="SELECT * FROM drivers WHERE id='$driveredit'";
	$result=mysql_query($query);
	
	if(!$result)
	{
		die(mysql_error());
	}
			
	$row=mysql_fetch_array($result);
?>
		<body>
		<form id="editform" method="post" action="editdrivers.php">
			<table class="tab">
				<caption><h3>Edit Driver Details</h3></caption>
				<tr>
					<td><b>Driver ID:</b></td>
					<td><?php echo $row[0];?></td>
					<input type="hidden" name="id" value="<?php echo $row[0];?>" />
				</tr>
				<tr>
					<td><b>First Name:</b></td>
					<td><input type="text" name="fname" value="<?php echo $row[1]; ?>"></td>
				</tr>
				<tr>
					<td><b>Last Name:</b></td>
					<td><input type="text" name="lname" value="<?php echo $row[2]; ?>"></td>
				</tr>
				<tr>
					<td><b>Address:</b></td>
					<td><input type="text" name="add" value="<?php echo $row[3]; ?>"></td>
				</tr>
					<tr>
					<td><b>NIC:</b></td>
					<td><input type="text" name="nic" value="<?php echo $row[4]; ?>"></td>
				</tr>
				<tr>
					<td><b>Age:</b></td>
					<td><input type="text" name="age" value="<?php echo $row[5]; ?>"></td>
				</tr>
				<tr>
					<td><b>Salary:</b></td>
					<td><input type="text" name="sal" value="<?php echo $row[6]; ?>"></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input type="submit" name="submit" value="Update" />
					<input type="reset" name="reset" value="Reset" />
					<input type="button" name="back" value="Back" onclick="history.go(-1)" /></td>
				</tr>
			</table>
			
			<p>*After editing the records click the above 'Update' button to update the new records in the database<br/>
				*If you want to go back to the Admin page without updating, click the above 'Back' button<br/>
				*You can't edit the 'Driver ID' as it is the Primary Key
			</p>
			
<?php
	
	include("connect.php");
	
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$add=$_POST['add'];
		$nic=$_POST['nic'];
		$age=$_POST['age'];
		$sal=$_POST['sal'];
		
		$query="UPDATE drivers SET fname='$fname', lname='$lname', address='$add', NIC='$nic', age='$age', salary='$sal' WHERE id='$id' ";
		$result=mysql_query($query);
		
		if(!$result){
			die(mysql_errno());
		}
		else {
			echo "<h3>Records Updated to Database Successfully!</h3>";
			echo "<input type='button' name='back' value='Back' onclick='history.go(-2)' />";
			echo "<br/><br/>*Click the above 'Back' button to go back to the Admin page.";
		}
		
	}
	mysqli_close($con);
?>
	</body>
</html>
