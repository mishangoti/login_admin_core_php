<?php 

    include 'db.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        header("location: dashboard.php");
    }

    if(isset($_POST['register'])){
        // echo $_POST['username'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $encrypt_password = md5($password);

        $insert_sql = "INSERT INTO users (name, email, password)VALUES ('".$username."','".$email."','".$encrypt_password."')";
        if (mysqli_query($conn, $insert_sql)) {
            // echo "New record created successfully";
            header('Location: index.php?success_flag=1');
        } else {
            echo "Error: " . $insert_sql . "" . mysqli_error($conn);
        }
        $conn->close(); 
    }
?>



<!DOCTYPE html>
<html lang="en">

    <?php 
        include 'header.php';
    ?>
    <style type="text/css">
        .has-error{
            color: red;
        }
        .has-success{
            color: green;
        }
    </style>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge4">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="https://www.shack.com.au/wp-content/themes/shack-homewares/assets/shack.svg" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form id="signupForm1" action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <div class="form_field">
                                        <input id="username" class="au-input au-input--full" type="test" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="form_field">
                                        <input  id="email" class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    </div>
                                    <p id="err_email_exist" style="color: red;"></p>
                                    <p id="succ_email_exist" style="color: green;"></p>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="form_field">
                                        <input  id="password" class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Conform Password</label>
                                    <div class="form_field">
                                        <input  id="confirm_password" class="au-input au-input--full" type="password" name="confirm_password" placeholder="Conform Password">
                                    </div>
                                </div>
                                <button id="submit_b" name="register" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Register</button>
                            </form>

                            <div class="register-link">
                                <p>
                                    You have account?
                                    <a href="index.php">Sign In Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    include 'footer.php';
?>
 
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>

    <script type="text/javascript">
        

        $( document ).ready( function () {
            

            $( "#signupForm1" ).validate( {
                rules: {
                    username: {
                        required: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    username: {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address"
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".form_field" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".form_field" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            });

            $( "#email" ).on('change', function(){
                var email = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "check_email_exist.php", 
                    data: { email: email },
                    success: function(result){
                        if(result == 'alright'){
                            $("#succ_email_exist").html('Alright');
                        } else {
                            $("#err_email_exist").html('Email already taken');
                        }
                    }
                });
            });
        });  
    </script>

</body>

</html>
<!-- end document-->