<?php
	include("connect.php");

$email='';
$pass='';


if (isset($_POST['register'])) {
	
		$email=$_POST['email'];
		$pass=$_POST['pass'];
	//error handling
	if(!$email || !$pass){
		
		echo "Please insert both fields";
		
		
	}
	
	else{
		//secure data
		$email=mysql_real_escape_string($email);
		$pass=sha1($pass);
		 
		$query=mysql_query("SELECT *  FROM admin WHERE email ='$email'  and pass='$pass' LIMIT 1") or die("Could not check member");
		$count_query= mysql_num_rows($query);
		
		if ($count_query == 0) {
			echo "the Information you entered was incorrect";
			
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