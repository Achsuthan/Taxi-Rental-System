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

		<title>Yamu Taxi - Book Now</title>
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
		<link href="comabout.css" rel="stylesheet" type="text/css">
		
		
		
		<style>
		/* Start of form design css*/
		
			/* this css for button */
			.dark-matter 
				{
				    background: #FFCC02;
				    width:100px;
				    border: none;
				    padding: 10px 25px 10px 25px;
				    color: #585858;
				    border-radius: 4px;
				    -moz-border-radius: 4px;
				    -webkit-border-radius: 4px;
				    text-shadow: 1px 1px 1px #FFE477;
				    font-weight: bold;
				    box-shadow: 1px 1px 1px #3D3D3D;
				    -webkit-box-shadow:1px 1px 1px #3D3D3D;
				    -moz-box-shadow:1px 1px 1px #3D3D3D;
				}
			/*End of button css	*/
			
			/* This css for background color and form color*/
			.dark-matter1 
				{
    				margin-left: auto;
				    margin-right: auto;
				    max-width: 740px;
				    background: #555;
				    padding: 20px 0px 20px 10px;
				    font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
				    color: #D3D3D3;
				    text-shadow: 1px 1px 1px #444;
				    border: none;
				    border-radius: 10px;
				    -webkit-border-radius: 5px;
				    -moz-border-radius: 5px;
				    font-size: 15px;
				}
			/* End of form design css*/
				
			/* this css for heading (BOOKING)*/	
			.dark-matter2 h1 
				{
    				padding: 0px 0px 10px 40px;
    				display: block;
    				border-bottom: 1px solid #444;
    				margin: -10px 0px 30px 0px;
				}
			/*End of heading css*/
			
			/* This css for slider bar*/
			
			/* This is for slide bar background*/
			.container
				{
					height:360px;
					border:1 px solid #ccc;
					background:white;
					margin:10% auto;
					border-radius:40px;
				}
			/*End of slide bar background */
			
			/*This is for image changes and image possitions  */
			#images img 
				{
				    width: 400px;
				    height: 250px;
				    position: absolute;
			    	top: 0;
			    	left: -400px;
				}

			#images img 
				{
				    z-index: 1;
				    opacity: 0;
				    transition: all linear 1s;
				    -o-transition: all linear 1s;
				    -moz-transition: all linear 1s;
				    -webkit-transition: all linear 1s;
				}


			#images img:target 
				{
				    left: 0;
				    z-index: 9;
				    opacity: 1;
				}

			#images 
				{
				    width: 400px;
				    height: 250px;
				    overflow: hidden;
				    position: relative;
				    margin: 20px auto;
				}
			#images img 
				{
				    width: 400px;
				    height: 250px;
				    position: absolute;
				    top: 0;
				    left: -400px;
				    z-index: 1;
				    opacity: 0;
				    transition: all linear 500ms;
				    -o-transition: all linear 500ms;
				    -moz-transition: all linear 500ms;
				    -webkit-transition: all linear 500ms;
				}

			/* This is for button css*/
			#dark-matter 
				{
					text-decoration: none;
				    background: #FFCC02;
				    width:400px;
				    border: none;
				    padding: 10px 25px 10px 25px;
				    color: #585858;
				    border-radius: 50px;
				    -moz-border-radius: 4px;
				    -webkit-border-radius: 4px;
				    text-shadow: 1px 1px 1px #FFE477;
				    font-weight: bold;
				    box-shadow: 1px 1px 1px #3D3D3D;
				    -webkit-box-shadow:1px 1px 1px #3D3D3D;
				    -moz-box-shadow:1px 1px 1px #3D3D3D;
				}
			/*End of button css*/
			
			
			/*End of image possition and image changes */
		</style>
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
    				<td><a class="btn" href="/saad/Taxi/Registration/registration_6.php">Register</a></td>
    					
    					<?php
					}
					?>
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
  		
  		
  		  		
  		  		<br/>
		<br/>
		<br/>
		<div style="float:left;width: 30%"><!-- give the div for page -->
			<pre> </pre>
		</div>
		
		<form action="connect.php" method="POST" class="dark-matter1"><!-- starting form and action and method -->
			<lable class="dark-matter2"><h1 style="font-size: 40px">Booking Yamu Taxi</h1></lable>
			<table> 
				
				<tr>
					<td>
						Name   
					</td>
					<td>
						:
					</td>
					<td>
						<select name="name_type"><!-- drop down values for name type -->
							<option value="Mr" >Mr. </option>
							<option value="Miss">Miss </option>
							<option value="Mrs">Mrs.</option>
						</select>
						<!-- end of drop down values-->
						<input type="text" name="f_name" id="f_name" required placeholder="Your firstname" title="Please Enter Your First Name in charecter " pattern="[a-zA-Z]{1,}"/><!--First name and validation-->
						<input type="text" name="l_name" id="l_name" required placeholder="Your lastname"  title="Please Enter Your Last Name in charecter" pattern="[a-zA-Z]{1,}"/><br/><!-- last name and validation-->
					</td>
				</tr>
				<tr>
					<td>
						Phone Number   
					</td>
					<td>
						      :
					</td> 
					<td>
						<input type="tel" name="phone" id="phone" required placeholder="Your phone number "  title="Please enter number in this formate ( don't start with zero ): ######### " pattern="[0-9]{9}"/><br/> <!-- phone number and validate the phone number-->
					</td>
				</tr>
				<tr>
					<td>
						Address   
					</td>
					<td>
						:
					</td>
					<td>
						<input type="text" name="address" id="Address" required placeholder="Your address  " title="Please enter address formate no(###),your address" pattern="[0-9]{0,}[,]{1}[0-9a-zA-Z]{0,}[/]{0,}[ ]{0,}[0-9a-zA-z]{0,}[,]{0,}[ ]{0,}[0-9a-zA-Z]{0,}{0,}[0-9a-zA-z]{0,}[ ]{0,}[0-9a-zA-Z]{0,}{0,}[0-9a-zA-z]{0,}[ ]{0,}[0-9a-zA-Z]{0,}{0,}[0-9a-zA-z]{0,}[ ]{0,}[0-9a-zA-Z]{0,}[-]{0,}[0-9a-zA-Z]{0,}"/><br/>
					</td>
				</tr>
				<tr>
					<td>
						Date   
					</td>
					<td>
						:
					</td>
					<td>			
						<input type="date" name="date" required placeholder="Your travel date " title="Please enter the date in dd/mm/yyyy formate all in number" pattern="[0-9]{2}[/][0-9]{2}[/][0-9]{4}"/> <!--date for travel and validation-->
					</td>
				</tr>
				<tr>
					<td>
						Travel Time   
					</td>
					<td>
						:
					</td>
					<td>
						<input type="time" name="time" required placeholder="Your travel time " title="Please enter the time in 24 hours formate (hh:mm) all in number" pattern="[0-9]{2}[:][0-9]{2}" />  <!-- time for travel validation-->
					</td>
				</tr>
				<tr>
					<td colspan="2"> </td>
				</tr>
				<tr>
					<td>
						No of Passanger to travel
					</td>
					<td>
						:
					</td>
					<td>
						<select name="no_of_passanger">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select> 
					</td>
				</tr>
				<tr>
					<td>
						Email
					</td>
					<td>
						:
					</td>
					<td>
						<input type="text" name="email" required placeholder="Your Email Address" title="Enter your email address formate example@example.com" pattern="[a-zA-Z0-9]{4,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z]{2,}" /><!-- email  and check the validation-->
					</td>
				</td>
				<tr>
					<td>
						Select the vehicle type
					</td>
					<td>
						:
					</td>
					<td>
						<select name="vehicle_type"><!--drop down values for vechicle type-->
							<option value="car">Car</option>
							<option value="van" >Van</option>
							<option value="tuck tuck" >Tuk Tuk</option>
						</select><!-- end of dropdown values for vehicle type-->
					</td>
				</tr>
				
				<tr>
					<td>
						Credit Card
					</td>
					
					<td>
						:
					</td>
					
					<td>
						<input type="text" name="card" required placeholder="Your credit card number" title="Please enter Your credit card number" pattern="[0-9]{16}"/>
						<input type="password" name="cvv" required placeholder="CVV " title="Enter your CVV" pattern="[0-9]{3}" style="width: 40px">
					</td>
				</tr>
				
				<tr>
					<td>
						<input type="submit" name="Submit" value="Submit"  class="dark-matter"> <!-- submit button -->
					</td>
					<td>
						<input type="reset" name="Reset"  value="Reset" class="dark-matter"><!-- reset button-->
					</td>
				</tr>
			</table><!-- end of table-->
		</form><!--end of form-->
		<div style="float:left; width: 10%">
			<pre>  </pre>
		</div>
		<!--Finish of main booking form  -->
		
		
		<div class="container" style="width: 450px">
			<br/></br/>
				<div id="images">
					<img id="image1" src="Car.png" />
					<img id="image2" src="Van.png" />
    				<img id="image3" src="Tuck.png" />

				</div>
				
				<div >
				    <p align="center"> 
				    	<a href="#image1" id="dark-matter">Car</a>
				    	<a href="#image2" id="dark-matter">Van</a>
				    	<a href="#image3" id="dark-matter">Tuk Tuk</a>
					</p>
				</div>
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
    		<center><p id="copyright"><b>Yamu Taxi Copyright &copy; 2011 - 2014. All Rights Reserved.</b></p></center>
    	</div>
    	</footer>
    	</div>
	</body>
</html>
