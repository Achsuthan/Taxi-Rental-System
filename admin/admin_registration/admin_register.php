<?php
	session_start();
	mysql_connect("localhost","root","") or die("Could not connect to server");
	mysql_select_db("test") or die ("Could not Select database");
	$count_count='';
	$session_name='';
	if (isset($_SESSION['email'])) {
		
		$session_name=$_SESSION['email'];
		
		$query=mysql_query("SELECT * FROM admin WHERE email='$session_name' ") or die("Could not check member");
		
		$count_count=mysql_num_rows($query);
		
		if ($count_count !=1) {
			
			header("Location:/saad/Taxi/login/login.php");
			
		}
		
	}	

 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Admin Registration</title>
		<meta name="description" content="">
		<meta name="author" content="Rifhan">
		<link rel="stylesheet" type="text/css" href="reg.css" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<style type="text/css">
			body{
				margin-top: 170px;
				margin-bottom: 200px;
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
				<center><h3>Admin Registration</h3></center>
				<hr/>
			</header>
			<div id="reg" align="center">
			<table>
				<form action="admin_register.php" method="post">
					<tr><td>Name	:</td><td><input type="text" name="name" placeholder="Name"></td></tr>
					<tr><td>E-mail	:</td><td><input type="email" name="email" placeholder="E-mail" /></td></tr>
					<tr><td>Address	:</td><td><input type="text" name="add" placeholder="Address" /></td></tr>
					<tr><td>NIC		:</td><td><input type="text" name="nic" placeholder="NIC" /></td></tr>
					<tr><td>Contact #:</td><td><input type="text" name="num" placeholder="Contact No" /></td></tr>
					<tr><td>Password:</td><td><input type="password" name="pass" placeholder="Password" /></td></tr>
					<tr><td>Confirm password:</td><td> <input type="password" name="pass1" placeholder="Confirm Password" /></td></tr>
					<tr><td colspan="3" align="center">  <input type="submit" value="Register" name="register" />
						<input type="reset" value="Reset" name="reset" />
						<input type='button' name='back' value='Back' onclick='history.go(-2)' /></td>
					</tr>
				</form>
			</table>				
			</div>
		</div>
		<?php
	include('connect.php');
	
	$name='';
	$email='';
	$add='';
	$nic='';
	$no='';
	$pass='';
	
	if(isset($_POST['register'])){
				
	$name=$_POST['name'];		
	$email=$_POST['email'];
	$add=$_POST['add'];
	$nic=$_POST['nic'];
	$no=$_POST['num'];
	$pass=$_POST['pass'];
	$pass1=$_POST['pass1'];
				
	if(!$name || !$email || !$add || !$nic || !$no || !$pass || !$pass1){						
		echo "<p class='error'>*Please insert all fields</p>";
	}
	else{
		if ($pass!=$pass1) {							
			echo "<p class='error'>*Password Fields Do not match</p>";				
		}
		else{
			//validate data
			$name=preg_replace("#[^A-Z a-z]#i", "", $name);
			$email=mysql_real_escape_string($email);
			$add=preg_replace("#[^0-9 A-Z a-z . / , ]#i", "", $add);
			$no=preg_replace("#[^0-9]#", "", $no);
			$nic=preg_replace("#[^0-9 a-z]#i", "", $nic);
			$pass=sha1($pass);	
										
			$email_query=mysql_query("SELECT email FROM admin where email='$email' LIMIT 1") or die("Could not check email");
			$email_count=mysql_num_rows($email_query);
			
			if ($email_count >0) {
					echo "<p class='error'>*Your email already has an existing Admin account</p>";					
			}
			elseif (!$name) {
					echo "<p class='error'>*Insert only characters for name</p>";			
			}
			elseif (!$email) {								
					echo "<p class='error'>*Invalid E-mail Address</p>";						
			}
			elseif (!$no || (strlen($no)!=10)) {								
					echo "<p class='error'>*Invalid Contact #</p>";						
			}
			elseif (!$nic || (strlen($nic)!=10)) {								
					echo "<p class='error'>*Invalid NIC</p>";						
			}
			else {								
					$query="INSERT INTO admin(name,email,address,nic,contact_no,pass) VALUES('$name','$email','$add','$nic','$no','$pass')";
					mysql_query($query);											
					echo "<p class='error'>*Congratulations your are an Admin now!</p>
					<center><input type='button' name='back' value='Back' onclick='history.go(-2)'/>
					<br/><br/>*Click the above 'Back' button to go back to the Admin page.</center>";								
			}													
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
