<?php 

	//Adatok a kapcsolódáshoz
	$conn = new mysqli("localhost", "root", "", "barmerre");
	
	//Kapcsolat ellenőrzése
	if($conn->connect_error){
		die("Connection Failed! ".$conn->connect_error);
	}

?>