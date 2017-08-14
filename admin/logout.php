<?php
    session_start();
	
	session_destroy();
	
	if(isset($_COOKIE["id_cookie"])){
		
		setcookie('username_cookie',",time()-50000,"/");
		
		setcookie('pass_cookie',",time()-50000,"/"); 
		
		
	}
	
	if(isset($_SESSION['email'])){
	
			header('Location:\saad\Taxi\Home\home.php');
	}		
?>
