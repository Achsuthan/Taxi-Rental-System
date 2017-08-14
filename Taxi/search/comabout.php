<?php
session_start();

mysql_connect("localhost","root","") or die("could not connect");
mysql_select_db("search") or die ("could not connnect");




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

		<title>comabout</title>
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
<!--search script end-->	
		<link href="comabout.css" rel="stylesheet" type="text/css">
	</head>

	<body style="background-image: url('taxi_1.jpg')" bgproperties="fixed">
		<div id="body">
		<header>
		<div>
    		<table align="right" style="margin-right: 20px; margin-top: 10px;">
    			<tr>
    				<td><a class="btn" href="/saad/Taxi/login/login.php">Sign In</a></td><td>&nbsp;</td>
    				<td><a class="btn" href="/saad/Taxi/Registration/registration_6.php">Register</a></td><td>&nbsp;</td>
    			</tr>
    			<tr>
    				<td>&nbsp;</td>
    			</tr>	
    			<tr>
    				<form  action="\common\search\index.php" method="post" >
					<td colspan="3"><input type="text" name="search" placeholder="Search" onkeydown="searchq($output);"/>
						
					<a href="\common\search\index.php"><img src="searchbut.png" height="25px" width="25px" style="position: absolute;"/></a> </td>
					
    			</tr>    			
    			</form>
    			
    		</div>	
    	</table>
    	<div>
    		<img id="_2logo" src="logo.png"/>
    	</div>
    	</header>
    	<p>&nbsp;</p>
    	<p>&nbsp;</p>
    	<p>&nbsp;</p>
    	&nbsp;
    	<div>
    		<nav>
    			<table id="_2malinks" align="center" >
    				<tr>
    					<td><a class="_2link" href="#">Home</a></td><td></td>
    					<td><a class="_2link" href="about">About Us</a></td><td></td>
    					<!--<td><a class="_2link" href="register">Register</a></td><td></td>-->
    					<td><a class="_2link" href="product">Book Now</a></td><td></td>
    					<td><a class="_2link" href="contact">Contacts</a></td><td></td>
    					<td><a class="_2link" href="help">FAQ</a></td>
    				</tr>
    			</table>
    		</nav>
    	</div>
    	<p> </p>
    	<div style="min-height: 300px;">
  		<!--begin contents-->
  		
  		
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
    					<td><a class="_2link2" href="#">Home</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="about">About Us</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="register">Book Now</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="contact">Contacts</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="privacy">Privacy Policy</a></td><td>&nbsp;&nbsp; | &nbsp;&nbsp;</td>
    					<td><a class="_2link2" href="help">FAQ</a></td>
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
