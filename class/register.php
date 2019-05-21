<?php
	
	if(isset($_POST['username'])){

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		echo $username;
		echo $email;
		echo $password;
	}


?>