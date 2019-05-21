<?php 
    include 'db.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        header("location: dashboard.php");
    }

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $enc_pass = md5($password);
        $login_sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$enc_pass."'";
        // echo $login_sql; exit();
        $result = mysqli_query($conn,$login_sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if(!$row){
            header("location: index.php?err_login=1");
        }else{
            // session_register("myusername");
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            header("location: dashboard.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php 
    include 'header.php';
?>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="https://www.shack.com.au/wp-content/themes/shack-homewares/assets/shack.svg" alt="CoolAdmin">
                            </a>
                        </div>
                        <?php if(isset($_GET['success_flag'])){ ?>
                            <div class="alert alert-success" role="alert">
                                Registration Success!, Login if you want to go in
                            </div>  
                        <?php } ?>
                        <?php if(isset($_GET['err_login'])){ ?>
                            <div class="alert alert-danger" role="alert">
                                Email id or Password incorrect
                            </div>  
                        <?php } ?>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <!-- <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label> -->
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                             <div class="register-link">
                                <p>
                                    You have account?
                                    <a href="register.php">Register Here</a>
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

</body>

</html>
<!-- end document-->