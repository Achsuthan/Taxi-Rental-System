<?php
	header('Cache-Control: no cache');
	session_cache_limiter('must-revalidate');
?>
<?php
	session_start();
	mysql_connect("localhost","root","") or die("Could not connect to server");
	mysql_select_db("test") or die ("Could not Select database");
	$count_count='';
	$session_name='';
	if (isset($_SESSION['email'])) {
		
		$session_name=$_SESSION['email'];
		
		$query=mysql_query("SELECT * FROM admin WHERE email='$session_name' ") or die("Could not check member");
		
		$count_count=mysql_num_rows($query);
		
		$logged=1;
	
		
		
	}	
		if($logged!=1){
			
			header("Location:/saad/Taxi/login/login.php");
		}	
 ?>
 
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Welcome to Admin Panel</title>
		<meta name="description" content="">
		<meta name="author" content="Saad">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link href="admin.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div>
		<header style="background-color: #545C53;">
			<div align="right">
				<table>
				<tr>
					<td>Logged in as</td><td><?php echo $session_name; ?></td>
					<td><a href="logout.php">Logout</a></td>
				</tr>
				</table>
		</div>
			<center><h1>Welcome To Admin Panel</h1></center>
			<hr/>
		</header>
		<!--begin content-->
		
		<div style="min-height: 320px;">
		<div>
			<p style="margin-left: 20px;">*Admin, changes made here will be updated to the relevant databasesso that please make the
				necessary changes only. Also make sure that you Sign Out before leaving.<br/>
				*Please refresh the page after making the changes.</p>
		</div>
		<div>
		<form name="myform" method="post" action="admin.php">
			<table align="center">
				<tr>
					<td><input class="button" type="submit" name="users" value="Users" /></td>
					<td><input class="button" type="submit" name="booking" value="Bookings" /></td>
					<td><input class="button" type="submit" name="drivers" value="Drivers" /></td>
					<td><input class="button" type="submit" name="admins" value="Admins" /></td>
					<td><input class="button" type="submit" name="faq" value="Manage FAQ" /></td>
					<td><input class="button" type="submit" name="sitemap" value="Site Map" /></td>
				</tr>
			</table>
		</form>
		</div>
		
		<?php
    		include ("connect.php");
		
			//bookings table
			if (isset($_POST['booking']))
			{
			$query=mysql_query("SELECT * FROM booking");
			$username=mysql_query("SELECT username FROM users");
				
			echo "<table border=1 align=center class=tab>
				<caption><h2>Booking Details</h2></caption>
				<tr>
					<th>ID</th>
					<th>User Name</th>
					<th>Phone #</th>
					<th>Address</th>
					<th>Date</th>
					<th>Passengers</th>
					<th>Vehicles</th>
					<th> </th>
				</tr>";
			
			while ($rows = mysql_fetch_array($query))
			{
				echo "<tr>";
				echo "<td>" .$rows['ID']. "</td>";
				echo "<td>" .$rows['username']. "</td>";
				echo "<td>" .$rows['Phone_Number']. "</td>";
				echo "<td>" .$rows['Address']. "</td>";
				echo "<td>" .$rows['Date']. "</td>";
				echo "<td>" .$rows['No_Of_Passanger']. "</td>";
				echo "<td>" .$rows['Vehicle_Type']. "</td>";
				echo "<td> <input type=checkbox /> </td>";
				echo "</tr>";
			}
			echo "</table>";
			}
			//end bookings table
			
			//users table
			if (isset($_POST['users']))
			{
			$query=mysql_query("SELECT * FROM users");
			
			if(!$query)
			{
			die(mysql_error());
			}
				
			echo "<table border=1 align=center class=tab>
				<caption><h2>Users Details</h2></caption>
				<tr>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>E-mail</th>
					<th>Phone #</th>
					<th>Sign Up Date</th>
					<th>IP Address</th>
					<th>Last Logged In</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>";
			
			while ($rows=mysql_fetch_array($query))
			{
				echo "<tr>";
				echo "<td>" .$rows['username']. "</td>";
				echo "<td>" .$rows['firstname']. "</td>";
				echo "<td>" .$rows['lastname']. "</td>";
				echo "<td>" .$rows['email']. "</td>";
				echo "<td>" .$rows['contact']. "</td>";
				echo "<td>" .$rows['sign_up_date']. "</td>";
				echo "<td>" .$rows['ip_address']. "</td>";
				echo "<td>" .$rows['last_logged_in']. "</td>";
				echo "<td>"."<a href=edituser.php?".$rows['username'].">Edit</a></td>";
				echo "<td>"."<a href=delete_user.php?".$rows['username'].">Delete</a></td>";
				echo "</tr>";
			}
			echo "</table>";
			}
			//end users table
			
			//drivers table
			if (isset($_POST['drivers']))
			{
			echo "<div style='width: 900px'>
				<p align=right><a href='\saad\admin\admin_registration\add_driver.php'>Add a New Driver</a></p>
				</div>";
			$query=mysql_query("SELECT * FROM drivers");
			
			if(!$query)
			{
			die(mysql_error());
			}
				
			echo "<table border=1 align=center class=tab>
				<caption><h2>Drivers Details</h2></caption>
				<tr>
					<th>Driver ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Address</th>
					<th>NIC</th>
					<th>Age</th>
					<th>Salary</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>";
			
			while ($rows=mysql_fetch_array($query))
			{
				echo "<tr>";
				echo "<td>" .$rows['id']. "</td>";
				echo "<td>" .$rows['fname']. "</td>";
				echo "<td>" .$rows['lname']. "</td>";
				echo "<td>" .$rows['address']. "</td>";
				echo "<td>" .$rows['NIC']. "</td>";
				echo "<td>" .$rows['age']. "</td>";
				echo "<td>" .$rows['salary']. "</td>";
				echo "<td>"."<a href=editdrivers.php?".$rows['id'].">Edit</a></td>";
				echo "<td>"."<a href=delete_drivers.php?".$rows['id'].">Delete</a></td>";
				echo "</tr>";
			}
			echo "</table>";
			}
			//end drivers table
			
			//faq table
			if(isset($_POST['faq']))
			{
				echo "<table align=center class=tab>
						<caption><h2>FAQ Management</h2></caption>
						<caption>*Type the Question and relevant answer to update to the Database</caption>
							<form action='faq.php'  method='post' name='faq'>
							<tr>
								<td>
								<textarea rows=8 cols=30 name=question placeholder=Question></textarea>
								</td>
								<td>
								<textarea rows=8 cols=30 name=answer placeholder=Answer></textarea>
								</td>
							</tr>							
							<tr>
								<td colspan=2 align=center> <input type=submit value=Update name=update ></td>
							</tr>
							</form>
					</table>";	
			}
				//end faq
				
			//sitemap	
			if (isset($_POST['sitemap']))
			{
			echo "<table align=center class=tab>
				<caption><h2>Site Map</h2></caption>
				<tr>
					<td><a href='\saad\Taxi\Home\home.php'>Home Page</a></td>
					<td><a href='/saad/Taxi/Booking/Booking.php'>Book Now</a></td>
				</tr>
    			<tr>
    				<td><a href='/saad/Taxi/about/comabout.php'>About Us</a></td>
    				<td><a href='/saad/Taxi/contacts/contact.php'>Contacts</a></td>
    			</tr>
    			<tr>
    				<td><a href='/saad/Taxi/Registration/registration_6.php'>Register</a></td>
    				<td><a href='/saad/Taxi/login/login.php'>LogIn</a></td>
    			</tr>
    			<tr>
    				<td><a href='\saad\Taxi\Privacy\privacy.php'>Privacy Policy</a></td>
    				<td><a href='\saad\Taxi\FAQ\connect.php'>FAQ</a></td>
    			</tr>
    			<tr>
    				<td><a href='/saad\Taxi\Arul\info.php'>Gallery</a></td>
    			</tr>
				</table>";
			}
			//end sitemap
			
			//admin table
			if (isset($_POST['admins']))
			{
			$query=mysql_query("SELECT * FROM admin");
				
			echo "<table border=1 align=center class=tab>
				<caption><h2>Admin Details</h2></caption>
				<tr>
					<th>Name</th>
					<th>E-mail</th>
					<th>Address</th>
					<th>NIC</th>
					<th>Contact #</th>
				</tr>";
			
			while ($rows = mysql_fetch_array($query))
			{
				echo "<tr>";
				echo "<td>" .$rows['name']. "</td>";
				echo "<td>" .$rows['email']. "</td>";
				echo "<td>" .$rows['address']. "</td>";
				echo "<td>" .$rows['nic']. "</td>";
				echo "<td>" .$rows['contact_no']. "</td>";
				echo "</tr>";
			}
			echo "</table>";
			}
			//end admin table
				
			mysqli_close($con);
		?>
		</div>
		<!--end content-->
		<p align="right" style="margin-right: 10px;"><a href="/saad/admin/admin_registration/admin_register.php">Register a New Admin</a></p>
    	<div style="clear: both;"></div>
    	<footer style="background-color: #545C53;">
       	<p>&nbsp;</p>
    	<hr />
    	<div>
    		<center><p id="copyright"><b>Yamu Taxi Copyright &copy; 2011 - 2014. All Rights Reserved.</b></p></center>
    	</div>
		</footer>
	</body>
</html>