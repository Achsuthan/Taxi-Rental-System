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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<!--<script type="text/JavaScript">
		//Start of index photo animination javascript cording 
		var picCount=0; 
		var picArray= ["pics/2.jpg","pics/4.jpg","pics/taxi.jpg","pics/taxi1.jpg"];
 		function nextPic()
  			{ 
     			picCount=(picCount+1<picArray.length)? picCount+1 : 0;
     			var build='<img border="6" style="border-color: #F8A700;" src="'+picArray[picCount]+'" width="900px" height="400px">\n';
     			document.getElementById("_2mainimg").innerHTML=build; 
     			setTimeout('nextPic()',5000);
  			}
  			//End of  index background photo animination cording 	
  			// Starting of twitter cording
  			!function(d,s,id)
  					{
  						var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
  						if(!d.getElementById(id))
  							{
  								js=d.createElement(s);
  								js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
  								fjs.parentNode.insertBefore(js,fjs);
  							}		
  					}
  					(document, 'script', 'twitter-wjs');
  			//End of  twiter cording cording 	
		</script>-->
		<!--slider jquerry-->
		<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    	 <script  src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    	<script type="text/javascript">
    		function slider(){
    			
    			$(".slider #1").show("fade",500);
    			$(".slider #1").delay(5500).hide("slide", {direction:'left'},500);
    			
    			var sc=$(".slider img").size();
    			var count=2;
    			
    			setInterval(function(){
    				$(".slider #"+count).show("slide",{direction:'right'},500);
    				$(".slider #"+count).delay(5500).hide("slide", {direction:'left'},500);
    				
    				if(count==sc){
    					count=1;
    				}
    				else{
    					count=count+1;
    					
    				}
    		
    			},6500);
    			
    			
    		}
    	</script>
    	<!--end of slider jquerry-->
		<!--fb like script-->
		<div id="fb-roo t"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--fb like script end-->
<!--search script start
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.2.0/prototype.js"></script>-->
		<script type="text/javascript">
			function searchq(){
				var searchTxt = $("input[name='search']").val();
				
				$.post("index.php", (searchVal: searchTxt),function(output){
					$("#output").html(output);
				});
			}
			
			
		</script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/home.css" rel="stylesheet" type="text/css">
        <title>Welcome to Yamu Taxi</title>
    </head>
    <body onload="slider();" style="background-image: url('pics/mainback.jpg');"><!--"setTimeout('nextPic()',5000)"--> 
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
    				<td><a class="btn" href="/saad/Taxi/Registration/registration_6.php">Register</a></td><td>&nbsp;</td>
    					
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
    		<img id="_2logo" src="pics/logo1.png"/>
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
    	<!--<div id="_2mainimg" align="center">
  			<img border="6" src="pics/taxi1.jpg" width="900px" height="400px" style="border-color: #F8A700;"/>
		</div>-->
		<center>
		<div class="slider" align="center">
			<img id="1" src="pics/taxi1.jpg" alt="taxi1" width="900px" height="400px">
        	<img id="2" src="pics/2.jpg" alt="taxi2" width="900px" height="400px">
        	<img id="3" src="pics/4.jpg" alt="taxi3" width="900px" height="400px">
		</div>
		&nbsp;
		</center>
		<div id="num">
			<img src="pics/number.png" class="num" style="position: absolute; top: 700px; left: 20%;" />
			<center><p class="num" style="font-size: 30px; color: white;">2 656 656 <br/>
			<font style="color: white; font-size: 20px;"> Call Us Now & Get Your Self Picked Up</font></p></center>
			<img src="pics/number.png" class="num" style="position: absolute; top: 700px; left: 70%;" />
		</div>
    	<div>
    		&nbsp;
    		<table align="center">
    			<!--<tr>
    				<td>
    					<img src="pics/time.jpg" />
    				</td>
    				<td>&nbsp;</td>
    				<td>
    					<img src="pics/like.jpg" />
    				</td>
    				<td>&nbsp;</td>
    				<td>
    					<img src="pics/packagey.jpg" />
    				</td>
    			</tr>-->
    			<tr>
    				<td class="_2access">
    					<p><b>Fast& <font class="_2access" color="yellow">SAFE</font></b></p>
    					<p style="font-size: 16px;">We'll Get to you in no time and provide 
													you with the fastest & safest taxi service in town 
													hasle free Our vehicles and Drivers are well equipped and trained 
													to mainted the highest safety standards on the drive. </p>
 					</td>
    				<td>&nbsp;</td>
    				<td class="_2access">
    					<p><b>Best <font class="_2access" color="yellow">PRICE</font></b></p>
    					<p style="font-size: 16px;">Yamu Taxi Reasonable Price is the best you 
    												get to in any taxi service in town Easy and fast Payment 
    												methods and 24hour Value for money service just click a button
													and we'll get to you in no time.
						</p>
 					</td>
    				<td>&nbsp;</td>
    				<td class="_2access">
    					<p><b>Local <font class="_2access" color="yellow">ATTRACTIONS</font></b></p>
    					<p style="font-size: 16px;">We as Yamu Taxi offer a plenty of packages to our 
    												customers with efficient drivers and enchanting places
													to visit where it will fit your moment as you wish.</p>
 					</td>
    			</tr>
    		</table>
    	</div>
    	<!--<div id="_2wel">
    		<center><h2>Welcome to Yamu Taxi</h2></center>
    		<p><b>Welcome to the official site of Yamu Taxi, the pioneer and market leader in Taxi services in Sri Lanka. 
    			Now you can order your cabs online by filling out the booking form on the bottom right corner of our homepage. 
    		 Bookings will be attended to immediately as would be over our hotline. 
    		 Confirmation of your booking would be done instantly via SMS and Email. 
    		 For other custom made packages and tours please email us on bookings@2588588.com 
    		 or call us on 2588588 (International +94112588588) please browse through services for more information</b></p>
    	</div>-->
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
