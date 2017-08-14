<?php
	session_start();
	mysql_connect("localhost","root","") or die("Could not connect to server");
	mysql_select_db("test") or die ("Could not Select database");
	$count_count='';
	$session_name='';
	if (isset($_SESSION['username'])) {
		
		$session_name=$_SESSION['username'];
		
		$query=mysql_query("SELECT * FROM users WHERE username='$session_name' ") or die("Could not check member");
		
		$count_count=mysql_num_rows($query);
		
		
	}	

 ?>
 
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
<html>
	<head>
		
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>conformation</title>
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

			/* This css for bacground color and form color*/
			.dark-matter1 
				{
    				margin-left: auto;
				    margin-right: auto;
				    max-width: 740px;
				    background: #FFCC33;
				    padding: 20px 0px 20px 0px;
				    font: 20px "Helvetica Neue", Helvetica, Arial, sans-serif;
				    color: black;
				    text-shadow: 0px 0px 0px #444;
				    border: 3px solid;
				    border-color:black;
				    border-radius: 40px;
				    -webkit-border-radius: 40px;
				    -moz-border-radius: 40px;
				}		

				
			/*End of bacground color and form color*/			
					
		/* End of form design css*/
	</style>
	</head>
	<body style="background-image: url('taxi_1.jpg')">
		<div id="body">
		<header>
		<div>
    		<table align="right" style="margin-right: 20px; margin-top: 10px;">
    			<tr>
    				<?php
    				if($count_count==1){
    					?>
    					<td style="color:black; font-family: calibri;  font-weight: bold;"><?php echo $session_name; ?></td>
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
					<tr><td>&nbsp;</td></tr>
    			<tr>
    <form  action="\saad\Taxi\search\search\index.php" method="post" >
	<td colspan="4"><input type="text" name="search" placeholder="Search" onkeydown="searchq($output);"/>	
		<a href="\saad\Taxi\search\search\index.php"><img src="\saad\Taxi\search\search\searchbut.png" height="25px" width="25px" style="position: absolute;"/></a> </td>				
	</form>
</tr>    	
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
  		
  		
		<?php
		define('DB_NAME', 'test');
		define('DB_USER', 'root');
		define('DB_PASSWORD', '');
		define('DB_HOST', 'localhost');
		
		$link = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);//check the root,local host,pasword and database
		
		if(!$link)// this if statement for check for errors in connection
		{
			die('could not connect : '.mysql_error());
		}
		
		$db_selected=mysql_select_db(DB_NAME,$link);//select the database
		
		if(!$db_selected)//check the database connection
		{
			die('can\t use '. DB_NAME.':' .  mysql_error());
		}
		
		//get the all value from the form to store in the database
		$name_type= $_POST['name_type'];
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$no_of_passanger=$_POST['no_of_passanger'];
		$email=$_POST['email'];
		$vehicle_type=$_POST['vehicle_type'];
		$cvv=$_POST['cvv'];
		$card=$_POST['card'];
		
		
		//next line specify the enter the data from form in to database 
		$username=$_SESSION['username'];
		$sql="insert into booking (Name_type,F_Name,L_Name,card,cvv,Phone_Number,Address,Date,Travel_Time,No_Of_Passanger,Email,Vehicle_Type,username) values ('$name_type','$f_name','$l_name','$card','$cvv','$phone','$address','$date','$time','$no_of_passanger','$email','$vehicle_type','$username')";
		
		if (!mysql_query($sql))//check the insert quarry 
		{
			die('Error: '. mysql_error());
		}
		
		
		
		
		
		
		
		
		
		// booking sliip
		echo "<br/><br/><br/>";
		
		echo "<p align='center' class='dark-matter1'>Your Booking has been reserved  <br/>";
		$sql = 'select * from Booking order by ID DESC LIMIT 1; ';
		$retval =mysql_query($sql,$link);
		if(!$retval)//check the quary
		{
			die('Could not get data : ' . mysql_error());
		} 
		
		
		echo "Your Booking Slip <br/>";
		echo "............................................................................<br/><br/><br/>";
		 $row=mysql_fetch_array($retval);
			echo "ID : {$row['ID']}  <br/>";
			echo "Name : {$row['Name_type']} . ";
			echo "{$row['F_Name']}";
			echo " {$row['L_Name']} <br/>";
			echo "Credit Card Number : {$row['card']}</br>";
			echo "Phone Number : {$row['Phone_Number']}<br/>";
			echo "Address : {$row['Address']}<br/>";
			echo "Travel Date : {$row['Date']}<br/>";
			echo "Travel Time : {$row['Travel_Time']}<br/>";
			echo "Vehicle Type : {$row['Vehicle_Type']}<br/> ";
			echo "Total Deduction : 250/= <br/> ";
			echo "............................................................................<br/><br/><br/>";
			echo "<button onClick='window.print()' >Print this Slip</button></br></p>";
				
		//End of booking sliip
		mysql_close();
		?>
		
		
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
