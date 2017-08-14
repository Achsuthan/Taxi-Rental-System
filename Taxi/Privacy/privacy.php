
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

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Yamu Taxi - Privacy Policy</title>
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
	</head>

	<body style="background-image: url('taxi_1.jpg'); background-attachment: fixed;">
		<div id="body">
		<header>
		<div>
    		<table align="right" style="margin-right: 20px; margin-top: 10px;">
    			<tr>
    				<td style="color:black; font-family: calibri;  font-weight: bold;"><?php echo $session_name; ?></td>
    				<?php
    				if($count_count==1){
    					?>
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
<table>
<td background="black-dreams-in-red-website-background.jpg">
<h1 align="center">PRIVACY POLICY</h1>
<font color="black">
<font face="calibri">
<h6>Yamu taxi (SL) Limited ( �YamuTaxi�) is an Sri Lankan company incorporated and registered in Sri lanka with company number 07603404 whose registered office is at . 400 D R Wijewardena Mawatha 
Colombo 10 
Sri Lanka , SW3 1ES. YAMUTAXI is committed to protecting and respecting your, the user�s, privacy.</h6>
<h6>Safeguarding your personal information is important to GetTaxi and it recognises the responsibility you entrust it with when providing your personal data. This Privacy Policy details how your personal information is used by YamuTaxi both actively and passively, when you use the websitehone. YamuTaxi wishes to outline what information it may collect from you via the Site and/or the App, how it will use it, whether it will disclose information provided by you to third parties and the use of �cookies� on the Site and by the App.</h6>
<h6>YamuTaxi is committed to safe-guarding your personal information in line with the contrys data protection laws. Please read the following carefully to understand YamuTaxi�s views and practices regarding your personal data and how YamuTaxi will treat it.</h6>
<h6>By using YamuTaxi�s services or registering, downloading information or entering the Site and/or the App you consent to the processing (collecting, using, disclosing, retaining or disposing of personal data) of your information under the terms of this policy. The information YamuTaxi holds about you can be held on computer and/or paper files.</h6>
</h6>
<TABLE   align="center" style="background-position:center" bgcolor="#F1BA18">
<TD >
<font color="black">
<font face="calibri">
<table>
<tr>
<td width="15%">
<h3>Information YamuTaxi may collect from you</h3>
</td>
<td >
<h6>YamuTaxi uses information held about you in the following ways:</h6>
<ul>
<li>to ensure that content on the Site is presented in the most effective manner for you and for your computer and/or your mobile telephone;</li>
<li>to provide you with information, products or services that you request from YamuTaxi or which may interest you, where you have consented to be contacted for such purposes;</li>
<li>to carry out YamuTaxi�s obligations arising from any contracts entered into between you and YamuTaxi;</li>
<li>to allow you to participate in interactive features of GetTaxi�s service, when you choose to do so;</li>
<li>to contact you for your views on YamuTaxi�s services and to notify you about changes or developments to YamuTaxi�s service;</li>
<li>to improve the Site including tailoring it to your needs;</li>
<li>to use GPS to identify the location of users.</li>
</ul>
<h5>YamuTaxi may also use your data, or permit selected third parties to use your data, to provide you with information about goods and services which may be of interest to you and YamuTaxi or they may contact you about these by email, post or telephone.</h5>
<h5>If you are a new customer, and where YamuTaxi permits selected third parties to use your data, YamuTaxi  will contact you by electronic means only if you have consented to this. By using the Siteyou give your consent for us to provide your data to third parties and for the data you provide YamuTaxi to be used for additional reasons other than those set out above. You also consent to be contacted for marketing purposes.</h5>
</td>
</tr>
</table>
<table>
<tr>
<td width="15%">
<h3>Disclosure of your information</h3>
</td>
<td>
<h5>YamuTaxi may disclose your personal information to any member of YamuTaxi�s group, which means YamuTaxi�s ultimate holding company and its subsidiaries. YamuTaxi may also use your information to send you offers and news about YamuTaxi�s services or those of other carefully selected companies which YamuTaxi thinks may be of interest to you. YamuTaxi may contact you by post, email, telephone for these purposes.</h5>
<h5>YamuTaxi may also pass your information on to any successor or potential successor in title to the business and suppliers that process data on YamuTaxi�s behalf in Sri Lanka. YamuTaxi may also use and disclose information in aggregate (so that no individual customers are identified) for marketing and strategic purposes.</h5>
</td>
</tr>
</table>
<table>
<tr>
<td width="15%">
<h3>Your rights</h3>
</td>
<td>
<h5>You have the right to request that YamuTaxi does not process your personal data for marketing purposes. You can exercise your right to prevent such processing by contacting YamuTaxi directly by email.</a>.</h5>
<h5>You also have the right to ask YamuTaxi to amend any data it holds about you if it is inaccurate or misleading.</h5>
<h5>From time to time YamuTaxi may post links to third party websites on the Site. These links are provided as a courtesy to YamuTaxi�s customers and are not administered or verified in any way by YamuTaxi. Such links are accessed by you at your own risk and YamuTaxi makes no representations or warranties about the content of such websites and cannot be held liable for any losses you suffer as a result of using such third party websites. YamuTaxi may provide links to third party websites that use cookies. As a result, GetTaxi strongly recommends that you read the privacy policies of any third party websites before you provide any information to them.</h5>
</td>
</tr>
</table>
<table>
<tr>
<td width="15%">
<h3>Changes to YamuTaxi�s privacy policy</h3>
</td>
<td>
<h5>Any changes YamuTaxi may make to its this Privacy Policy in the future will be posted on this page. This Privacy Policy will be updated from time to time, so you may want to check it each time you send YamuTaxi personal information.  The date of the most recent revisions will appear on this page.</h5>
</td>
</td>
</td>
</tr>
</table>
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
