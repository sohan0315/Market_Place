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
    <link rel="stylesheet" href="css\product.css"/>
    <style>
        body {
        background-image: url('coffeebackground.png');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;
        }
    </style>

</head>
<style>
    body {
      background-image: url('coffeebackground.png');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: cover;
    }
    </style>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="shopping_cart.php" style="font-weight: bold; color:#4caf50;">&nbsp;&nbsp;Kopi Luwak</a>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="searchdirectory.php"><i class="fas fa-address-book"></i></i>&nbsp;&nbsp;User Directory</a>
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
    </ul>
  </div>
  </form>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="shopping_cart.php"><i class="fas fa-mobile-alt mr-2"></i>Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
      </ul>
    </div>
</nav>

<div class="container abc1">
  <div class="row">
    <div class="col-md-3">
    <a href="shopping_cart.php"><img src="img\source.gif" class="img-responsive" alt="sorry" style="width: 40%;" /></a>
    </div>
    <div class="col-md-5">
      <h1 style="padding-top:30px"> Welcome To Kopi Luwak </h1>
    </div>
  </div><br>
  <form action="search.php" method="post" style="max-width:500px;margin:auto">
    <h2>User Directory</h2>
    <br>
    <div class="input-container">
      <i class="fa fa-user icon"></i>&nbsp;&nbsp;&nbsp;
      <input style="height: 35px; width: 68%; border-radius: 7px; color: #4caf50; font-weight: bold;" class="input-field" type="text" placeholder="First Name" name="fname" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : ''; ?>">
    </div>
  </br>
    <div class="input-container">
      <i class="fa fa-user icon"></i>&nbsp;&nbsp;&nbsp;
      <input style="height: 35px; width: 68%; border-radius: 7px; color: #4caf50; font-weight: bold;" class="input-field" type="text" placeholder="Last Name" name="lname" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : ''; ?>">
    </div>
  </br>
    <div class="input-container">
      <i class="fa fa-envelope icon"></i>&nbsp;&nbsp;&nbsp;
      <input style="height: 35px; width: 68%; border-radius: 7px; color: #4caf50; font-weight: bold;" class="input-field" type="text" placeholder="Email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
    </div>
    </br>
    <div class="input-container">
      <i class="fa fa-phone icon"></i>&nbsp;&nbsp;&nbsp;
      <input style="height: 35px; width: 68%; border-radius: 7px; color: #4caf50; font-weight: bold;" class="input-field" type="number" placeholder="Number" name="number" value="<?php echo isset($_GET['number']) ? $_GET['number'] : ''; ?>">
    </div>
    </br>
    <button type="submit" class="btn">Search</button>
  </form>
</body>
</html>

