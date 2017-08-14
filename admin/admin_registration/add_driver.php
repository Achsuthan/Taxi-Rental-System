<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Driver Registration</title>
		<style type="text/css">
			body{
				margin-top: 120px;
				margin-bottom: 150px;
				margin-left: 400px;
				margin-right: 400px;
				-moz-box-shadow: 0 0 20px #ccc; 
				-webkit-box-shadow: 0 0 20px #ccc; 
				box-shadow: 0 0 20px #CFCFCF; 
				font-family: 'Calibri';
			}
			
			.error{
				font-family: 'Calibri';
				font-weight: 700;
				text-align: center; 	
			}
			
		</style>
	</head>

	<body>
		<div>
			<header style="background-color: #545C53;">
				<center><h3>Driver Registartion</h3></center>
				<hr/>
			</header>
			
			<div>
			<div id="reg" align="center">
			<table>
				<form action="add_driver.php" method="post">
					<tr><td>Driver ID: </td><td><input type="text" name="id" placeholder="ID"></td></tr>
					<tr><td>First Name: </td><td><input type="text" name="fname" placeholder="First Name"></td></tr>
					<tr><td>Last Name: </td><td><input type="text" name="lname" placeholder="Last Name"></td></tr>
					<tr><td>Address: </td><td><input type="text" name="add" placeholder="Address"></td></tr>
					<tr><td>NIC: </td><td><input type="text" name="nic" placeholder="NIC"></td></tr>
					<tr><td>Age: </td><td><input type="text" name="age" placeholder="Age"></td></tr>
					<tr><td>Salary: </td><td><input type="text" name="salary" placeholder="Salary"></td></tr>
					<tr><td colspan="3" align="center">  <input type="submit" value="Register" name="register" />
						<input type="reset" value="Reset" name="reset" />
						<input type='button' name='back' value='Back' onclick='history.go(-1)' /></td>
					</tr>
				</form>
			</table>				
			</div>
		</div>
		<?php
	include('connect.php');
	
	$id='';
	$fname='';
	$lname='';
	$add='';
	$nic='';
	$age='';
	$sal='';
	
	if(isset($_POST['register'])){
				
	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$add=$_POST['add'];		
	$nic=$_POST['nic'];
	$age=$_POST['age'];
	$sal=$_POST['salary'];
				
	if(!$id || !$fname || !$lname || !$add || !$nic || !$age || !$sal){						
		echo "<p class='error'>*Please insert all fields</p>";
	}
	else
		{
			//validate data
			$fname=preg_replace("#[^A-Z a-z]#i", "", $fname);
			$lname=preg_replace("#[^A-Z a-z]#i", "", $lname);
			$add=preg_replace("#[^0-9 A-Z a-z / , .]#i", "", $add);
			$nic=preg_replace("#[^0-9 a-z]#", "", $nic);
			$age=preg_replace("#[^0-9]#", "", $age);
			$sal=preg_replace("#[^0-9]#", "", $sal);
			
			if (!$fname || !$lname) {
					echo "<p class='error'>*Insert only characters for name</p>";			
			}
			else if(!$nic){
				echo "<p class='error'>*Insert only digits with 'v' or 'x' at end</p>";
			}
			else if(!$age){
				echo "<p class='error'>*Insert only 3 or less digits for age</p>";
			}
			else if(!$sal){
				echo "<p class='error'>*Insert only numbers for salary</p>";
			}
			else {								
					$query="INSERT INTO drivers(id,fname,lname,address,NIC,age,salary) VALUES('$id','$fname','$lname','$add','$nic','$age','$sal')";
					mysql_query($query);											
					echo "<p class='error'>*New Driver Added to the Database Successfully!</p>
					<center><input type='button' name='back' value='Back' onclick='history.go(-2)'/>
					<br/><br/>*Click the above 'Back' button to go back to the Admin page.</center>";								
			}													
			}	
				}
	
?>
		<p> </p>
    	<p> </p>
    	<div style="clear: both;"></div>
    	<footer style="background-color: #545C53;">
       	<p>&nbsp;</p>
    	<hr />
    	<div>
    		<center><p id="copyright"><b>Yamu Taxi Copyright &copy; 2011 - 2014. All Rights Reserved.</b></p></center>
    	</div>
		</footer>
	</body>
</html>
