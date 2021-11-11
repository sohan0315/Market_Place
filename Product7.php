<?php
session_start();
$index = 0;

foreach($_COOKIE as $cookie_name => $cookie_value){
    foreach ($cookie_value as $value) {
    $index = $index + 1;
    }
}

setcookie('my_array['.$index.']', 'Product7.php');
?>

<html>
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
        #fixedbutton {
            position: fixed;
            bottom: 175px;
            right: 175px; 
            width: 200px;
            height: 50px;
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
                <img src="img\source.gif" style="width: 20%;" class="img-responsive logo" alt="sorry" id="1" />
            </div>
            <div class="col-md-6   text-uppercase" style="color:black; font-weight: bolder;">
                <h1>Kopi Luwak</h1>
                <h4>Coffee</h4>
            </div>
        </div>

      </br></br></br>
            <div class="container">
              <div class="row">
                <div class="col">
                <div class="zoom" style="float:left">
                    <a href="Product7.php">
                    <img class="w-100" style="border-radius: 23px; width: 256px!important;" src="img\Product7.jpg" >
                    </a>
                </div>
                </div>
                <div class="col">
                  <h4 style="content:center">Menu / Frappuccino / Pistachio Coffee<h4>
                  </br>
                  <h6>Pistachio Coffee Frappuccino</h6>
                  <p>Sweet pistachio flavor blended with coffee, milk, and ice, then finished with whipped cream and a rich, salted brown-buttery topping—an icy-smooth, creamy delight to keep you energized in the new year.</p>
                </div>
              </div>
            <button id="fixedbutton" type="button" class="btn btn-dark"><a style="color:#4caf50" href="login.php"><i class="fas fa-shopping-basket"></i> Buy Now</a></button>

</body>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}
</script>
</html>
<?php
  function runMyFunction() {
    echo 'I just ran a php function';
  }

  if (isset($_GET['hello'])) {
    runMyFunction();
  }
?>