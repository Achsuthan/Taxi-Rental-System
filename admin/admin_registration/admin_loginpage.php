<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Admin-Login</title>
		<meta name="description" content="">
		<meta name="author" content="Rifhan">

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
				<center><h3>Admin Login</h3></center>
				<hr/>
			</header>
			
			<div>
			<div id="reg" align="center">
			<table>
				<form action="/saad/admin/admin_registration/admin_loginpage.php" method="post">
					<tr><td>E-mail	:</td><td><input type="text" name="email" placeholder="E-mail"></td></tr>
					<tr><td>Password:</td><td><input type="password" name="pass" placeholder="password"></td></tr>
					<tr><td colspan="3" align="center">  <input type="submit" value="Register" name="register" />
						<input type="reset" value="Reset" name="reset" />
						<input type='button' name='back' value='Back' onclick='history.go(-1)' /></td>
					</tr>
				</form>
			</table>				
			</div>
		</div>
		
		<?php
	include("connect.php");

$email='';
$pass='';


if (isset($_POST['email'])) {
	
		$email=$_POST['email'];
		$pass=$_POST['pass'];
	//error handling
	if(!$email || !$pass){
		
		echo "<p class=error align=center>*Please insert both fields!<p>";
		
		
	}
	
	else{
		
		//secure data
		$email=mysql_real_escape_string($email);
		$pass=sha1($pass);
		 
		 
		$query=mysql_query("SELECT *  FROM admin WHERE email ='$email'  and pass='$pass' LIMIT 1") or die("Could not check member");
		$count_query= mysql_num_rows($query);
		
		if ($count_query == 0) {
			echo "<p class=error align=center>*Information you entered was incorrect!</p>";
			
		}
		else {
			//start sessions
			
			$_SESSION['pass']=$pass;
			while ($row=mysql_fetch_array($query)) {
				
				$username=$row['username'];
				
				
				
			}
			$_SESSION['username']=$username;
			
						header("location:\saad\admin\admin.php");
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
		</div>
	</body>
</html>
