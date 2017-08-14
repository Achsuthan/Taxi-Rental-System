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
<?php  include_once("connections/global.php") ;
//this code belongs to Rifhan_Akram IT14109386 ;)

if(isset($_POST['submit'])){
	
	$username=$_POST['username'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	$contact=$_POST['contact_6'];
	// $credit_card=$_POST['credit_card'];
	// //$address=$_POST['address'];
	// $cvv_no=$_POST['cvv_no'];
	
	//error handeling
 if((!$username) ||(!$fname)  || (!$lname) || (!$email) || (!$pass1) || (!$pass2) || (!$contact) ){
		
	echo "<div class='warning_6'><p>*Please Insert All fields</p></div>    ";
		
	}
	else {//main else
		if ($pass1!=$pass2) {
																//sub if statment checking for password fields is the same
			echo"<p class='warning_6'>Password Fields do not match</p>";
		}	
		
		else {
			//data validationg
			$username=preg_replace("#[^0-9a-z_]#i", "", $username);
			$fname=preg_replace("#[^a-z]#i", "", $fname);
			$lname=preg_replace("#[^a-z]#i", "", $lname);
			$pass1=sha1($pass1);
			
			$email=mysql_real_escape_string($email);
			$contact=preg_replace("#[^0-9]#", "", $contact);
			//$address=preg_replace("#[^0-9a-z/,-]#i", "", $address);
			// $credit_card=preg_replace("#[^0-9]#", "", $credit_card);
			// $cvv_no=preg_replace("#[^0-9]#", "", $cvv_no);
			//check for duplicates
			
			$user_query =mysql_query("SELECT username FROM users WHERE username='$username' LIMIT 1") or die("could not check username");
			$count_username=mysql_num_rows($user_query);
			
			$email_query=mysql_query("SELECT email FROM users WHERE email='$email' LIMIT 1") or die("could not check email");
			$count_email=mysql_num_rows($email_query);
			
			if ($count_username>0) {
					
				echo"<p class='warning_6'>*Your Username is already in use</p>";
				
			}
			else if ($count_email>0) {
				
				echo "<p class='warning_6'>* Your email is already in use</p>";
			}
			else if (!$fname || !$lname) {
				
				echo "<p class='warning_6'> Insert only characters for name  </p>";
				
			}
			else if (!$username) {
				
				echo "<p class='warning_6'>Insert only characters and numbers for username</p>";
				
			}
			else if (!$email) {
				
				echo "<p class='warning_6'>*Invalid Email</p>";
			}
			// elseif (!$credit_card || !$cvv_no ) {
// 				
				// echo "<p class='warning_6'>*Invalid Credit Card Number </p>";
// 				
			// }
			else if (!$contact) {
					echo "<p class='warning_6'>*Invalid Contact Number</p>";
				
				
			}
			else if (strlen($pass1) < 8) {
				
				echo "<p id='warning_6'>*Please Enter a password atleast 8 characters long</p>";
				
			}

			else {
				
				//insert the members to the data base
				$ip_address=$_SERVER['REMOTE_ADDR'];
				$query=mysql_query("INSERT INTO users(username,firstname,lastname,email,contact,password,ip_address,sign_up_date) VALUES('$username','$fname','$lname','$email','$contact','$pass1','$ip_address',now())")or die("Could not insert data");
				$member_id=mysql_insert_id();
				
			
				
				
				echo "<p id=suc_6>You Have Successfully Registered With Us</p>";
			}
				
				}
		}
	}
	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
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
        
        
        <link rel="stylesheet" type="text/css" href="style_6.css">
        <link rel="stylesheet" type="text/css" href="home.css">
        <title id="title_6">Yamu Taxi - Sign Up</title>
    
    <link href="comabout.css" rel="stylesheet" type="text/css">
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
    		
    	<div id="registration_6"> 
    					<h1 style="border-bottom: 2px solid #000000; ">SIGN UP WITH US </h1>
    		
    		 <table style="text-align: left; margin-top: 50px;" align="center">
    		 	<form action="registration_6.php" method="post" >
    				
    				    				
    			
    			
    			<tr><td>Name	:</td><td><input class="box_6" id="name_6" name="fname" placeholder="First" "></td>&nbsp;<td>
    				
    				<input class="box_6" id="lname_6" name="lname" type="text" placeholder="Last"></td></tr>
    				<tr><td>Username	:</td><td><input type="text" class="box_6" placeholder="Username" name="username" title="Use only underscope( _ ) as special character" ></td></tr>
    			<tr><td>E-mail	:</td><td><input class="box_6" type="email" placeholder="Email" name="email" ></td></tr>
    			<tr><td>Contact	:</td><td><input name="contact_6" placeholder="Contact no." class="box_6" type="text" ></td></tr>	
    			<!-- <tr><td>Address	:</td><td><textarea rows="4" cols="4" class="box_6" name="address" style="width: 200px; height: 100px;"></textarea></td></tr> --> 
    			<!-- <tr><td>Credit card no	:</td><td><input class="box_6" type="text" placeholder="card no" name="credit_card" title="Enter your 16 digit card no."></td>
    				<!-- <td><input style="width: 70px; height:27px;"  class="box_6" type="password" title="Enter your 3 digit CVV no. behind your card" placeholder="CVV" name="cvv_no"></td>
    			 -->
    			<tr>
    				<td>Password	:</td><td><input type="password" class="box_6" name="pass1" title="Enter a minimum of 8 characters "></td></tr>
    				<tr>
    					<td>Confirm Password	:</td><td><input type="password" class="box_6" name="pass2" ></td>
    					</tr>
    			
    				</table>
    					<div style="position: absolute; left:37%; top: 900px;">
    		
    						<input class="_2link" type="reset"  value="Reset" >&nbsp;&nbsp;
							<input class="_2link" type="submit" name="submit" value="Sign up" onclick="signup.php">
    				 
    		
    					</div>
    			</form>
    		
    	</div>
       
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
    		<center><p id="copyright"><b>Yamu Taxi Copyright &copy; 2011 - 2014. All Rights Reserved.</b></p></center>
    	</div>
    	</footer>
    	</div>
	</body>
</html>
