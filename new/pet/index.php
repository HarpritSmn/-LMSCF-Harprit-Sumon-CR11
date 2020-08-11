<?php
    ob_start();
    session_start();
    require_once 'actions/dbconnect.php';

    // it will never let you open index(login) page if session is set
    if (isset($_SESSION['user'])!="" ) {
        header("Location: home.php");
        exit;
    }

    if (isset($_SESSION['admin'])!="" ) {
        header("Location: indeks.php");
        exit;
    }
    $error = false;

    if (isset($_POST['btn-login'])) {

        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);
        
        if (empty($email)) {
            $error = true;
            $emailError = "Please enter your email address.";

        } else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $emailError = "Please enter valid email address.";
        }

        if (empty($pass)) {
            $error = true;
            $passError = "Please enter your password." ;
        }

        if (!$error) {
    
            $password = hash('sha256', $pass); 

            $res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'");
            $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
            $count = mysqli_num_rows($res); 
            
            if ($count == 1 && $row['userPass' ]==$password) {

                if ($row['status'] == 'admin') {
                    $_SESSION['admin'] = $row['userId'];
                    header("Location: indeks.php");

                } else {
                    $_SESSION['user'] = $row['userId'];
                    header("Location: home.php");
                }
                
                } else {
                    $errMSG = "Incorrect Credentials, Try again..." ;
                }
            }
        
        }
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>


<h2 class="display-4 d-flex justify-content-center">Sign In.</h2>
    <?php if (isset($errMSG)) {
        echo $errMSG; ?>
    <?php } ?>
<form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
 
   
           
<div class="container w-50 p-3">
    <input type="email" name="email" class="form-control border border-primary" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
    <span class="text-danger"><?php echo $emailError; ?></span><br>
 
    <input type="password" name="pass" class="form-control border border-primary" placeholder="Your Password" maxlength="15" />
    <span class="text-danger"><?php echo $passError; ?></span>
            
    <button type="submit" name="btn-login" class="m-5 btn btn-light">Sign In</button>
         
    <a href="register.php"><button type="button" class="m-5 btn btn-light"> Sign Up Here...</button></a>
          
</div>

    
</form>
</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>