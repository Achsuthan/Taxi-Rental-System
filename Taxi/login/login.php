
<?php
mysql_connect("localhost","root","") or die("could not connect");
mysql_select_db("test") or die ("could not connnect");




$output ='';

if (isset($_POST['search'])){
	$searchq = $_POST['search'];
	$searchq = preg_replace("#[^0-9a-z]#i","", $searchq);
	
	$query = mysql_query("SELECT * FROM vehicle WHERE Type LIKE '%$searchq%' OR features LIKE '%$searchq%' OR modelNo LIKE '%$searchq%' OR make LIKE'%$searchq%' OR model LIKE '%$searchq%' ") or die ("could not  cnnect");
	$count = mysql_num_rows($query);
	if ($count == 0){
		$output = 'there was no search results';		
	}
	else{
		
		while ($row = mysql_fetch_array($query)){
			
			$type = $row['type'];
			$feat = $row['features'];
			$modelN = $row['modelNo'];
			$model=$row['make'];
				$output .=  '<div>' .$model. ' '  .$type. ' ' .$feat.' '.$modelN. '</div>' ;
				
			
			
			
		}
	}

}
?>
<?php

	/*session_start();
    mysql_connect("localhost","root","") or die("Could not connect to server");
	mysql_select_db("test") or die ("Could not Select database");

if (isset($_POST['submit'])) {
		
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$remember=$_POST['remember'];
	
	//error handling
	if(!$user || !$pass){
		
		echo "<p class=error>Please insert both fields</p>";
		
		
	}
	else{
		//secure data
		$user=mysql_real_escape_string($user);
		$pass=sha1($pass);
		$query=mysql_query("SELECT * FROM users WHERE username='$user' and password='$pass' LIMIT 1") or die("Could not check member");
		$count_query= mysql_num_rows($query);
		echo $count_query;
		
		if ($count_query == 0) {
			echo "<p class='error'>the Information you entered was incorrect</p>";
			
		}
		else {
			//start sessions
			
			$_SESSION['pass']=$pass;
			while ($row=mysql_fetch_array($query)) {
				
				$username=$row['username'];
				
				
			}
			$_SESSION['username']=$username;
			
			if($remember=='yes'){
				//create cookies
				setcookie("username_cookie",$username,time()+60*60*24*100,"/");
				setcookie("pass_cookie",$pass,time()+60*60*24*100,"/");
				
			}
			header("location:/saad/Taxi/Home/home.php");
		}
		
	}
	
	
}*/
	session_start();
    mysql_connect("localhost","root","") or die("Could not connect to server");
	mysql_select_db("test") or die ("Could not Select database");

$user='';
$pass='';


if (isset($_POST['submit'])) {
	
		$user=$_POST['user'];
		$pass=$_POST['pass'];
	//error handling
	if(!$user || !$pass){
		
		echo "<h3 class='warning'>*Please insert both fields.</h3>";
		
		
	}
	
	else{
		//secure data
		$pass=sha1($pass);
		$email=mysql_real_escape_string($user);
		 
		$userquery=mysql_query("SELECT *  FROM users WHERE username ='$user' AND password='$pass' LIMIT 1"); //or die("Could not check member");
		$adminquery=mysql_query("SELECT * FROM admin WHERE email='$user' AND pass='$pass' LIMIT 1"); //or die("Could not check member");
		//$count_userquery= mysql_num_rows($userquery);
		//$count_adminquery= mysql_num_rows($adminquery);
		
		if (mysql_num_rows($userquery) == 1) {
				
			//start sessions
			$_SESSION['pass']=$pass;
			while ($row=mysql_fetch_array($userquery)) {
				
				$username=$row['username'];				
			}
			$_SESSION['username']=$username;
			
						header("location:/saad/Taxi/Home/home.php");
		}
		else if (mysql_num_rows($adminquery) == 1){
			//start sessions
			
			while ($row=mysql_fetch_array($adminquery)) {
				
				$email_ad=$row['email'];				
			}
			$_SESSION['email']=$email_ad;
			
			header("location:/saad/admin/admin.php");
		}
		else{
			echo "<h3 class='warning'>*The information you entered was wrong.</h3>";	
		}
		
	}
	
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
	
		<link rel="stylesheet" type="text/css" href="comabout.css">
		<!--search script start-->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.2.0/prototype.js"></script>
		<script type="text/javascript">
			function searchq(){
				var searchTxt = $("input[name='search']").val();
				
				$.post("index.php", (searchVal: searchTxt),function(output){
					$("#output").html(output);
				});
			}
			
			
		</script>
		<title>Yamu Taxi - Log In</title>
		
		<style>
			
body{
	margin: 0;
	padding: 0;
	/*background: #fff;*/

	/*color: #fff;*/
	font-family: "calibri";
	font-size: 12px;

}
/*.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(a.jpg);
	background-size: cover;*/
}

.login{
	position: absolute;
	top: calc(20% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 650px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	
	border: 1px solid #F8C508;
	/*color: #fff;*/
	font-family: "calibri";
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}
.login input[type=text]:focus{
	
	border:1px solid #F8C508;
	box-shadow:0px 0px 3px 1px #F8D24F;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	
	border: 1px solid #F8C508;
	border-radius: 2px;
	/*color: #fff;*/
	font-family: "calibri";
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 260px;
	height: 35px;
	background: #F8C508;
	border: 1px solid #F8C508;
	cursor: pointer;
	border-radius: 2px;
	color: #white;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	border:1px solid #ECBF27;
	box-shadow:0px 0px 3px 1px #F8D24F;
}

.warning{
	position: absolute;
	top: 250px;
	left: 555px;
}


		</style>
		
	</head>
          
     	 <body style="background-image: url('taxi_1.jpg'); background-attachment: fixed;">
				<div id="body">
		<header>
			<div>
    		<table align="right" style="margin-right: 20px; margin-top: 10px;">
    			<tr>
    				<td><a class="btn" href="\saad\Taxi\login\login.php">Sign In</a></td><td>&nbsp;</td>
    				<td><a class="btn" href="/saad/Taxi/Registration/registration_6.php">Register</a></td><td>&nbsp;</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    <form  action="\saad\Taxi\search\search\index.php" method="post" >
	<td colspan="4"><input type="text" name="search" placeholder="Search" onkeydown="searchq($output);"/>	
		<a href="\saad\Taxi\search\search\index.php"><img src="\saad\Taxi\search\search\searchbut.png" height="25px" width="25px" style="position: absolute;"/></a> </td>				
	</form>
</tr>    	
    		</table>
    	</div>
    	<div style="float: left;">
    		<img id="_2logo" src="logo1.png"/>
    	</div>
    	</header>
    	<p>&nbsp;</p>
    	<p>&nbsp;</p>
    	<p>&nbsp;</p>
    	&nbsp;
    	<div>
    		<nav style="margin-top: 28px;">
    			<table id="_2malinks" align="center" >
    				<tr><td>&nbsp;</td></tr>
    				<tr>
    					<td><a class="_2link" href="\saad\Taxi\Home\home.php">Home</a></td><td></td>
    					<td><a class="_2link" href="/saad/Taxi/about/comabout.php">About Us</a></td><td></td>
    					<!--<td><a class="_2link" href="register">Register</a></td><td></td>-->
    					<td><a class="_2link" href="/saad/Taxi/Booking/Booking.php">Book Now</a></td><td></td>
    					<td><a class="_2link" href="/saad\Taxi\Arul\info.php">Gallery</a></td><td></td>
    					<td><a class="_2link" href="/saad/Taxi/contacts/contact.php">Contacts</a></td><td></td>
    					<td><a class="_2link" href="\saad\Taxi\FAQ\connect.php">FAQ</a></td>
    				</tr>
    			</table>
    		</nav>
    	</div>
    	<p> </p>
    	<div style="min-height: 300px;">
  		<!--begin contents-->
				

  
		
			
		
		<br>
		<div class="login" align="center">
			<form action="login.php" method="post" style="margin-top: 50px;">
				<input type="text" placeholder="USERNAME" name="user"><br>
				<input type="password" placeholder="PASSWORD" name="pass"><br>
				<input type="checkbox" name="remember" value="yes" checked="checked"/><p style="font-family: "calibri " color:black;" >Remember me?</p>
				<input type="submit" value="Login" name="submit" >
			</form>	
		
</div>			
	<!--end contents-->
    	</div>
    	<p> </p>
    	<p> </p>
    	<div style="clear: both;"></div>
    	<footer style="background-color: #545C53;">
    	&nbsp;
    	<!--like buttons-->
    	<div style="float: left;">
    		<table id="likes">
    			<tr>
    				<td>&nbsp;</td>
    			</tr>
    			<tr>
    				<td>
    					<div class="fb-like" data-href="https://www.facebook.com/pages/Yamu-Taxi/361495110667359?skip_nax_wizard=true&ref_type=site_footer" data-width="300px" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
    				</td>
    			</tr>
    		</table>
    	</div>
    	<!--like buttons end-->
    	<div>
    		<nav>
    			<table id="_2malinks2" align="right">
    				<tr>
    					<td><a class="_2link2" href="\saad\Taxi\Home\home.php">Home</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="/saad/Taxi/About/comabout.php">About Us</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="/saad/Taxi/Booking/Booking.php">Book Now</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="/saad/Taxi/contacts/contact.php">Contacts</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="\saad\Taxi\Privacy\privacy.php">Privacy Policy</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="\saad\Taxi\FAQ\connect.php">FAQ</a></td>
    				</tr>
    			</table>
    		</nav>
    	</div>
    	<p>&nbsp;</p>
    	<hr />
    	<div>
    		<center><p id="copyright"><b>Yamu Taxi Copyright &copy; 2011 - 2014. All Rights Reserved.</b></p></center>
    	</div>
    	</footer>
    	</div>
	</body>
</html>