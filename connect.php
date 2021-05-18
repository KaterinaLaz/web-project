<?php

function OpenCon(){

	//database user
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "web";

	//create connection 
	$conn = new mysqli($servername,$username,$password,$dbname) or die ("connect faild: %s\n". $conn -> error);
	
	
	return $conn;
}

function CloseCon($conn){

	$conn -> close();
}
?>
