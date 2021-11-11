<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart System</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
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
  <!-- Navbar end -->

  <!-- Displaying Products Start -->

  <div>
    <?php
        session_start();
        $array = array();
        foreach($_COOKIE as $cookie_name => $cookie_value){
            foreach ($cookie_value as $value) {
                array_push($array,$value);
            }
        }
        $size_array = sizeof($array);
        $temp = $size_array;
        $finalarray = array();
        $counter = 0;
        for($temp;$temp>=0;$temp--)
        {
            if(in_array($array[$temp], $finalarray))
            {
                continue;
            }
            else{
                if(sizeof($finalarray)<6)
                {
                    array_push($finalarray,$array[$temp]);
                    $counter = $counter + 1;
                }
            }
        }
        echo "<table>";
        foreach ($finalarray as $value) {
            echo'<tr><a style="color:black; margin-left: 45%; font-size: 40px;" href="'.$value.'">'.$value.'</a></br></br></br></tr>';
        }
        echo "</table>";
    ?>
    </div>


</body>

</html>