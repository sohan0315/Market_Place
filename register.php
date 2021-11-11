<?php
// Include config file
require_once "config.php";

//debugging
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

// Define variables and initialize with empty values
$username = $password = $confirm_password = $firstname = $email = $lastname = "";
$username_err = $password_err = $confirm_password_err = "";
$firstname_err = $email_err = $home_address = "";
$home_phone = 0;
$cell_phone = 0;
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a Email.";
    }

    //validate firstname
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter a Firstname.";
    }
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 10){
        $password_err = "Password must have atleast 10 characters.";
    } elseif(!preg_match("#[A-Z]+#",$password)){
        $password_err = "Your Password Must Contain At Least 1 Capital Letter!";
    } elseif(!preg_match("!@#$%^&*",$password)){
        $password_err = "Your Password Must Contain At Least 1 Special Character!";
    }
    else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // //Validates password & confirm passwords.
    // if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirm_password"])) {
    //     $password = test_input($_POST["password"]);
    //     $cpassword = test_input($_POST["confirm_password"]);
    //     if (strlen($_POST["password"]) <= '10') {
    //         $password_err = "Your Password Must Contain At Least 10 Characters!";
    //     }
    //     elseif(!preg_match("#[A-Z]+#",$password)) {
    //         $password_err = "Your Password Must Contain At Least 1 Capital Letter!";
    //     }
    //     elseif(!preg_match("!@#$%^&*",$password)) {
    //         $password_err = "Your Password Must Contain At Least 1 special Letter!";
    //     } else {
    //         $confirm_password_err = "Please Check You've Entered Or Confirmed Your Password!";
    //     }
    // }


    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($password_err) && empty($firstname_err) && empty($email_err)){
        
        // Prepare an insert statement
        //echo "CHECK 21111111";
        $sql = "INSERT INTO users (username, password, 	firstname, email, last_name, home_address, home_phone, cell_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $firstname = trim($_POST["firstname"]);
        $email = trim($_POST["email"]);
        $lastname = trim($_POST["lastname"]);
        $home_address = trim($_POST["home_address"]);
        $home_phone = trim($_POST["home_phone"]);
        $cell_phone = trim($_POST["cell_phone"]);


        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssii", $param_username, $param_password, $param_firstname, $param_email, $param_lastname, $param_home_address, $param_home_phone, $param_cell_phone);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_firstname = $firstname;
            $param_email = $email;
            $param_lastname = $lastname;
            $param_home_address = $home_address;
            $param_home_phone = $home_phone;
            $param_cell_phone = $cell_phone;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    </br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="img\source.gif" style="width: 20%;" class="img-responsive logo" alt="sorry" id="1" />
            </div>
            <div class="col-md-6   text-uppercase">
                <h1>Kopi Luwak</h1>
                <h4>Coffee</h4>
            </div>
        </div>

        <div class="row">
            <div class="wrapper">
                <h2>Sign Up</h2>
                <p>Please fill this form to create an account.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                        <label>Firstname</label>
                        <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" required>
                    </div>
                    <div class="form-group ">
                        <label>Lastname</label>
                        <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                    </div>
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group ">
                        <label>Home Address</label>
                        <input type="text" name="home_address" class="form-control" value="<?php echo $home_address; ?>">
                    </div>
                    <div class="form-group ">
                        <label>Home Phone</label>
                        <input type="number" name="home_phone" class="form-control" value="<?php echo $home_phone; ?>">
                    </div>
                    <div class="form-group ">
                        <label>Cell Phone</label>
                        <input type="number" name="cell_phone" class="form-control" value="<?php echo $cell_phone; ?>">
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" required>
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-default" value="Reset">
                    </div>
                    <p>Already have an account? <a href="login.php">Login here</a>.</p>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>