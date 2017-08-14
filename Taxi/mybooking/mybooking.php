<?php
    session_start();
	mysql_connect("localhost","root","") or die("Could not connect to server");
	mysql_select_db("test") or die ("Could not Select database");
	$logged='';
	$session_username='';
	if(isset($_SESSION['username'])){
		$session_username=$_SESSION['username'];
		$session_pass=$_SESSION['pass'];
		
		
		$query=mysql_query("SELECT * FROM users WHERE username='$session_username' ") or die("Could not check member");
		
		$count_count=mysql_num_rows($query);
		
		if($count_count > 0){
			
			$logged=1;
		}else{
			header("Location:logout.php");
			exit();
		}
		
	}else if(isset($_COOKIE["username_cookie"])){
		$session_username=$_COOKIE["username_cookie"];
		$session_pass=$_COOKIE["pass_cookie"];
		
		$query=mysql_query("SELECT * FROM users WHERE username='$session_username'AND password='$session_pass' LIMIT 1") or die("Could not check member");
		
		
		$count_count=mysql_num_rows($query);
		
		if($count_count>0){
			
			
			while($row=mysql_fetch_array($query)){
				$session_username=$row['username'];
				
			}
			$_SESSION["username"]=$session_username;
			// $_SESSION["id"]=$session_id;
			$_SESSION["pass"]=$session_pass;
			$logged=1;
			
		}
		else{
			header("Location:logout.php");
			exit();
		}
		
	}else{
		
		$logged=0;
		 }

	if ($logged!=1) {
		
		
		header("Location:/saad/Taxi/login/login.php ");
		
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Yamu Taxi - My Bookings</title>
		<meta name="description" content="">
		<meta name="author" content="Saad">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<!--fb like script-->
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--fb like script end-->
		<link href="mybookingcss.css" rel="stylesheet" type="text/css">
	</head>

	<body style="background-image: url('taxi_1.jpg')">
		<div id="body">
		<header>
		<div>
    		<table align="right" style="margin-right: 20px; margin-top: 10px;">
    			<tr>
    				<?php
    				if($logged==1){
    					?>
    					<td style="color:black; font-family: calibri;  font-weight: bold;"><?php echo $session_username; ?></td>
    					<td><a class="btn" href="/saad/Taxi/mybooking/mybooking.php">Bookings</a></td><td>&nbsp;</td>
    					<td><a class="btn" href="/saad/Taxi/logout.php">Logout</a></td><td>&nbsp;</td>
    					<?php
					}else{
    					?>
    					<td><a class="btn" href="/saad/Taxi/login/login.php">Sign In</a></td><td>&nbsp;</td>
    				<td><a class="btn" href="/saad/Taxi/Registration/registration_6.php">Register</a></td><td>&nbsp;</td>
    					
    					<?php
					}
					?>
    			</tr>
    		</table>
    	</div>
    	<div>
    		<img id="_2logo" src="logo1.png"/>
    	</div>
    	</header>
    	<p>&nbsp;</p>
    	<p>&nbsp;</p>
    	<p>&nbsp;</p>
    	&nbsp;
    	<div>
    		<nav>
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
  		<div id="bookings" align="center">
  			<?php
  				
				mysql_connect("localhost","root","") or die("could not connect");
				mysql_select_db("test") or die ("could not connnect");
				
				$user=$_SESSION['username'];
				
				
				$query=mysql_query("SELECT * FROM booking WHERE username= '$user'");
				
				echo "<table border=1 colspan=3 class=book>";
				echo "<tr><td class=bold>First Name</td><td class=bold >Last Name</td> <td class=bold >Date of Booking</td><td class=bold >Address</td> <td class=bold >Credit Card no </td>";
				while ($row= mysql_fetch_array($query)) {
					
					$fname=$row['F_Name'];
					$lname=$row['L_Name'];
					$address=$row['Address'];
					$date=$row['Date'];
					$card=$row['card'];
					
					echo "<tr><td class=cell>$fname</td> <td class=cell >$lname</td><td class=cell >$date</td><td class=cell >$address</td><td class=cell >$card</td> </tr>";
					
				}
				echo "</table>";
  				
  			
  			 ?>
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
    					<div class="fb-like" 
    					data-href="https://www.facebook.com/pages/Yamu-Taxi/361495110667359?skip_nax_wizard=true&amp;ref_type=site_footer" 
    					data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
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
    		<p style="font-size: 10px"><a href="/saad/admin/admin_registration/admin_loginpage.php">Admin Login</a></p>
    		<center><p id="copyright"><b>Yamu Taxi Copyright &copy; 2011 - 2014. All Rights Reserved.</b></p></center>
    	</div>
    	</footer>
    	</div>
	</body>
</html>
