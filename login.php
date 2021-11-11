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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css\style_common.css"/>
    <style>
        body {
        background-image: url('coffeebackground.png');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.html" style="font-weight: bold; color:#4caf50;">&nbsp;&nbsp;Kopi Luwak</a>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"> Home <i style = "margin-top: 5px;" class="fas fa-home"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    MENU
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="allproducts.php">All Products</a>
                    <a class="dropdown-item" href="most_visited_products.php">Frequently Visited Products</a>
                    <span></span>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact us.php">Contact Us <i style = "margin-top: 5px;" class="fas fa-envelope"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="locate.html">Locate Us <i style = "margin-top: 5px;" class="fas fa-map-marked-alt"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="partner.php">Our Partners <i style = "margin-top: 5px;" class="fas fa-handshake"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allUsers.php">All Users List <i style = "margin-top: 5px;" class="fas fa-users"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="register.php">Join Now <i style = "margin-top: 5px;" class="fas fa-user-plus"></i> <span id="cart-item" class="badge badge-danger"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Sign In <i style = "margin-top: 5px;" class="fas fa-sign-in-alt"></i> <span id="cart-item" class="badge badge-danger"></span></a>
              </li>
            </ul>
          </div>
      </nav>
      </br></br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="img\source.gif" class="img-responsive logo" style="width: 20%;" alt="sorry" id="1" />
            </div>
            <div class="col-md-6   text-uppercase">
                <h1>Kopi Luwak</h1>
                <h4>Coffee</h4>
            </div>
        </div>

        <div class="row">
            <div class="wrapper">
                <h2>Login</h2>
                <p>Please fill in your credentials to login.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    <p>Don't have an account? <a style="color:black;" href="register.php">Sign up now</a>.</p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>