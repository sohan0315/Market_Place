<?php
	$conn = new mysqli("localhost","root","Ganesh@7","cart_system");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>