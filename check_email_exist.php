<?php 
	include 'db.php';
	if(isset($_POST['email'])){
		$email = $_POST['email'];

		$check_sql = "SELECT * FROM users WHERE email = '".$email."'";

		// echo $check_sql; exit();
        $result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($result) > 0) {
        	// output data of each row
	        $row = mysqli_fetch_assoc($result);
	       	if($email==$row['email'])
	        {
	            echo "Email already exists";
	        }
        }else{
            echo "alright";
        }
	}
?>