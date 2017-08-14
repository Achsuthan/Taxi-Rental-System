<?php
    session_start();
	include_once("connect.php");
	
	if(isset($_SESSION["username"])){
		$session_username=$_SESSION["username"];
		$session_pass=$_SESSION["pass"];
		$session_id=$_SESSION["id"];
		
		$query=mysql_query("SELECT * FROM member WHERE id='$session_id' AND password='$sessiom_pass' LIMT 1") or die("Could not check member");
		
		$count_count=mysql_num_rowa($query);
		if($count_count>0){
			
			$logged=1;
		}else{
			header("Location:logout.php");
			exit();
		}
		
	}else if(isset($_COOKIE["id_cookie"])){
		$session_id=$_COOKIE["id_cookie"];
		$session_pass=$_COOKIE["pass_cookie"];
		
		$query=mysql_query("SELECT * FROM member WHERE id="$session_id" AND password="$sessiom_pass" LIMT 1") or die("Could not check member");
		
		$count_count=mysql_num_rowa($query);
		if($count_count>0){
			while($row=mysql_fetch_array($query)){
				$session_username=$row["username"]
			}
			
			$_SESSION["username"]=$session_username;
			$_SESSION["id"]=$session_id;
			$_SESSION["pass"]=$session_pass;
			
			$logged=1;
		}else{
			header("Location:logout.php");
			exit();
		}
		
	}else{
		
		$logged=0;
	}
?>