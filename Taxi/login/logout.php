<?php
    session_start();
	
	session_destroy();
	
	if(isset($_COOKIE["id_cookie"])){
		
		setcookie("id_cookie",",time()-50000,"/); 
		setcookie("pass_cookie",",time()-50000,"/); 
		
	}
	
	if(isset($_SESSION["username"])){
		echo ("We could not logout try again");
		exit();
		
		}else{
			
			header("Location.index.php")
		}
?>
