<?php
	session_start();
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$basename = "projekt";
	$port = 3306; #Staviti port 3306 ako nije mijenjan ručno u postavkama
	
	$dbc = mysqli_connect($hostname, $username, $password, $basename, $port) or 
			die("Greška pri spajanju na bazu!");
	//mysqli_set_charset($dbc, "utf-8");
?>