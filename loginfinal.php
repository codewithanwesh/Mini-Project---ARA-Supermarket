<?php
//This script will handle login
session_start();
// check if the user is already logged in
//if(isset($_SESSION['username']))
//{
    //header("location: welcome.php");
    //exit;
//}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'form1');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    die('Error: Cannot connect');
}
//require_once "config.php";
$email = $pass = "";
$err = $error = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))
    {
        $err = "Username or Password cannot be empty!";
    }
    else{
        $email = trim($_POST['email']);
        $pass= trim($_POST['password']);
    }


if(empty($err))
{
    $query = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        echo $row['name'];
        //Verify password
        if($pass == $row['password']){
            echo $row['password'];
            //$_SESSION['user_id'] = $row['user_id'];
            header("Location: finalchoice.html");
            
        }else{
            $error = "Invalid password";
        }
    }else{
        $error = "User not found";
    }
    mysqli_close($conn);  
    
          
}  
} 

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    
    <title> Login </title>
  </head>
  <body>
  

<div class="form-container">

<hr>

<form action="" method="post">
<h3>Login Now</h3>
  <!--> <div class="form-group"><!-->
    <label for="exampleInputEmail1"></label>
    <input type="email" name="email"  placeholder="Enter email">
    <span> <?php echo $err; ?></span>
  <!--</div>
  <div class="form-group">!-->
    <label for="exampleInputPassword1"></label>
    <input type="password" name="password" placeholder="Enter Password">
    <span> <?php echo $error; ?></span>
  </div>
  <input type="submit" name="submit" value="login now" class="form-btn">
  <p>don't have an account? <a href="registertest.php">register now</a></p>
  <!--<button type="submit" class= "form-btn">Login Now</button><br><br>-->
  <!--<a href="register.php">New User!! Register Here</a>-->
</form>
</div> 
</html>