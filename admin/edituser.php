<!DOCTYPE html>
<html>
	<head>
		<title>Edit User Details</title>
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

	$useredit=$_SERVER['QUERY_STRING'];
	$query="SELECT * FROM users WHERE username='$useredit'";
	$result=mysql_query($query);
	
	if(!$result)
	{
		die(mysql_error());
	}
			
	$row=mysql_fetch_array($result);
?>
		<body>
		<form id="editform" method="post" action="edituser.php">
			<table class="tab">
				<caption><h3>Edit User Details</h3></caption>
				<tr>
					<td><b>User Name:</b></td>
					<td><?php echo $row[4];?> </td>
					<input type="hidden" name="username" value="<?php echo $row[0];?> " />
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
					<td><b>E-mail:</b></td>
					<td><input type="text" name="email" value="<?php echo $row[3]; ?>"></td>
				</tr>
				<tr>
					<td><b>Phone #:</b></td>
					<td><input type="text" name="phone" value="<?php echo $row[4]; ?>"></td>
				</tr>
				<tr>
					<td><b>Sign Up Date:</b></td>
					<td><?php echo $row[6]; ?></td>
					<input type="hidden" name="signup" value="<?php echo $row[6];?> " />
				</tr>
				<tr>
					<td><b>IP Address:</b></td>
					<td><?php echo $row[7]; ?></td>
					<input type="hidden" name="ip" value="<?php echo $row[7];?> " />
				</tr>
				<tr>
					<td><b>Last Logged In:</b></td>
					<td><?php echo $row[8]; ?></td>
					<input type="hidden" name="lastlog" value="<?php echo $row[8];?> " />
				</tr>
				
				<tr>
					<td colspan="3" align="center"><input type="submit" name="submit" value="Update" />
					<input type="reset" name="reset" value="Reset" />
					<input type="button" name="back" value="Back" onclick="history.go(-1)" /></td>
				</tr>
			</table>
			
			<p>*After editing the records click the above 'Update' button to update the new records in the database<br/>
				*If you want to go back to the Admin page without updating, click the above 'Back' button<br/>
				*You can't edit the 'User Name' as it is the Primary Key
			</p>
			
<?php
	
	include("connect.php");
	
	if(isset($_POST['submit']))
	{
		$user=$_POST['username'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$signup=$_POST['signup'];
		$ip=$_POST['ip'];
		$lastlog=$_POST['lastlog'];
		
		$query="UPDATE users SET firstname='$fname', lastname='$lname', email='$email', contact='$phone',
				sign_up_date='$signup', ip_address='$ip', last_logged_in='$lastlog'	WHERE username='$user' ";
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
