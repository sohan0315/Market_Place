<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    
    .subnav {
    float: left;
    overflow: hidden;
    }

    /* Subnav button */
    .subnav .subnavbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
    }

    /* Add a red background color to navigation links on hover */
    .navbar a:hover, .subnav:hover .subnavbtn {
    background-color: #4caf50;
    }

    /* Style the subnav content - positioned absolute */
    .subnav-content {
    display: none;
    position: absolute;
    left: 0;
    background-color: #4caf50;
    width: 100%;
    z-index: 1;
    }

    /* Style the subnav links */
    .subnav-content a {
    float: left;
    color: white;
    text-decoration: none;
    }

    /* Add a grey background color on hover */
    .subnav-content a:hover {
    background-color: #eee;
    color: white;
    }

    /* When you move the mouse over the subnav container, open the subnav content */
    .subnav:hover .subnav-content {
    display: block;
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
            <div class="subnav">
                <button class="subnavbtn">Menu  <i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <li><a href="allproducts.php">All products</a></li>
                    <li><a href="most_visited_products.php">Frequently Visited Products</a></li>
                    <li><a href="coffee_begin.php">Summer Special</a></li>
                </div>
            </div>
            <li><a href="contact us.php">Contact us</a></li>
            <li> <a href="locate.html">Locate us</a></li>
            <li style="float:right"><a href="login.php">Sign in</a></li>
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