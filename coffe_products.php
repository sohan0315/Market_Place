<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: shopping_cart.php");
    exit;
}
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $hashed_password;
                            
                            if($username == 'Admin' && $id == 11){
                                // Redirect user to welcome page
                                header("location: welcome.php");
                            }
                            else{
                                // Redirect user to welcome page
                                header("location: shopping_cart.php");
                            }

                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 16px sans-serif; }
    </style>
    <link rel="stylesheet" href="css\style.css" />
  <style>
    body {
      background-image: url('coffeebackground.png');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: cover;
    }
    img {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px;
      width: 250px;
    }

    img:hover {
      box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }

    .grid-container {
    display: grid;
    grid-template-columns: auto auto auto;
    /* background-color: #f2f0eb; */
    padding: 10px;
    }
    .grid-item {
    /* background-color: #f2f0eb; */
    /* border: 1px solid rgba(0, 0, 0, 0.8); */
    padding: 20px;
    font-size: 30px;
    text-align: center;
    }
    
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color:black; background-color:#4caf50;">Kopi Luwak</a>
            </div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <!--<li><a href="coffe_products.php">Order online</a></li>-->
                <li><a href="contact us.php">Contact us</a></li>
                <li> <a href="locate.html">Locate us</a></li>
                <li><a href="coffe_products.php">Summer Special</a></li>
                <li style="float:right"><a href="#">Sign in</a></li>
                <li style="float:right"> <a href="register.php">Join now</a></li>
            </ul>
        </div>
    </nav>

  <div>
  <h1 style="font-weight: bold; text-align: center;">YOU DESERVE SOME SUMMER<h1>
    <h4 style="font-weight: bold; text-align: center;">Treat yourself to the season’s most inspiring tastes.</h4>
  </div>

  <div class="grid-container">
  <div class="grid-item">
    <a href="login.php" ><img class="block" src="img\137-69967.png" ></a>
    <h6 style="color:#1e3932 font-size: 15px;">
      <span style="font-weight: bold; font-size: 15px;">Pineapple Matcha Drink</span>
    </h6>
    <div style="color:#1e3932; font-size: 15px;">
    Creamy coconutmilk with premium matcha tea and</br> a fruity twist.
    </div>
  </div>
  <div class="grid-item">
    <a href="login.php" ><img class="block" src="img\137-69968.png" ></a>
    <h6 style="color:#1e3932 font-size: 15px;">
      <span style="font-weight: bold; font-size: 15px;">Guava Passionfruit Drink</span>
    </h6>
    <div style="color:#1e3932; font-size: 15px;">
    Bursting with tropical flavors combined with coconutmilk.
    </div>
  </div>
  <div class="grid-item">
    <a href="login.php" ><img class="block" src="img\137-69969.png" ></a>
    <h6 style="color:#1e3932 font-size: 15px;">
      <span style="font-weight: bold; font-size: 15px;">Vanilla Sweet Cream Cold Brew</span>
    </h6>
    <div style="color:#1e3932; font-size: 15px;">
    Smooth and balanced with a splash of house-made vanilla
  </br> sweet cream.
    </div>
  </div>
  <div class="grid-item">
    <a href="login.php" ><img class="block" src="img\137-69970.png"></a>
    <h6 style="color:#1e3932 font-size: 15px;">
      <span style="font-weight: bold; font-size: 15px;">Salted Caramel Cream Cold Brew</span>
    </h6>
    <div style="color:#1e3932; font-size: 15px;">
    Slow-steeped coffee topped with a touch of caramel and</br> salted cold foam.
    </div>
  </div>
  <div class="grid-item">
    <a href="login.php" ><img class="block" src="img\137-70216.png"></a>
    <h6 style="color:#1e3932 font-size: 15px;">
      <span style="font-weight: bold; font-size: 15px;">Nitro Cold Brew</span>
    </h6>
    <div style="color:#1e3932; font-size: 15px;">
    Lush, cascading textures with a soft layer of crema.
    </div>
  </div>
  <div class="grid-item">
    <a href="login.php" ><img class="block" src="img\137-70217.png"></a>
    <h6 style="color:#1e3932 font-size: 15px;">
      <span style="font-weight: bold; font-size: 15px;">Nitro Cold Brew with Sweet Cream</span>
    </h6>
    <div style="color:#1e3932; font-size: 15px;">
    Our smooth classic topped with house-made sweet cream.
    </div>
  </div>
  <div class="grid-item"></div>
  <div class="grid-item"></div>
  <div class="grid-item"></div>
</div>


</body>
</html>