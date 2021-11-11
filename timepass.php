<html>

<head>
    <title>
        Kopi Luwak
    </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping Cart System</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css\style_test.css"/>
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
                <a class="nav-link" href="register.php"><i style = "margin-top: 5px;" class="fas fa-user-plus"></i> <span id="cart-item" class="badge badge-danger"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php"><i style = "margin-top: 5px;" class="fas fa-sign-in-alt"></i> <span id="cart-item" class="badge badge-danger"></span></a>
              </li>
            </ul>
          </div>
      </nav>
    <div class="container">
        <div class="row" style="height:20%;">
            <div class="col-md-6">
                <img src="img\source.gif" style="height:80%;" class="img-responsive logo" alt="sorry" id="1" />
            </div>
            <div class="col-md-6   text-uppercase">
                <h1>Kopi Luwak</h1>
                <h4>Coffee</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <br>
                <img class="imgresponsivecoffeeimage" src="img\Home_PAGE.jpg">
                <br>
            </div>

            <div class="col-md-6" >
                <p>Kopi luwak is brewed from coffee beans that transversed the gastrointestinal tract of an Asian palm civet, and were thus subjected to a combination of acidic, enzymatic and fermentation treatment. During digestion, digestive enzymes and gastric juices permeate through the endocarp of coffee cherries and break down storage proteins, yielding shorter peptides. This alters the composition of amino acids and impacts the aroma of the coffee. In the roasting process, the proteins undergo a non-enzymatic Maillard reaction.The palm civet is thought to select the most ripe and flawless coffee cherries. This selection influences the flavour of the coffee, as does the digestive process. The beans begin to germinate by malting, which reduces their bitterness.</p>
        </div>

    </div>
    <br>
    
</body>

</html>
