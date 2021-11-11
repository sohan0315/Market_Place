<!DOCTYPE html>

<?php
session_start();
$con = mysqli_connect("localhost","root","Ganesh@7","cart_system");
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
die();
}

$total_price_final_temp = 0;
if(isset($_SESSION["shopping_cart"])){
    foreach ($_SESSION["shopping_cart"] as $product){
        $total_price_final_temp = $total_price_final_temp + $product["product_price"];
    }
}


if(isset($_SESSION["shopping_cart"])){
    foreach ($_SESSION["shopping_cart"] as $product){
        $order_id = rand();
        $sql = 'INSERT INTO market_place_orders (OrderID, ProductCode, OrderDate, OrderTotal, User_Name) VALUES ("'.$order_id.'","'.$product["product_code"].'",CURDATE(),"'.$total_price_final_temp.'","rohan")';
    }
}


if ($con->query($sql) === TRUE) {
  echo '';
} else {
    echo $sql;
}

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <style>
    body {
        background-image: url('original.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;
        font-family: 'Comic Sans MS', monospace;
        }
</style>
</head>

<body>
  <div id="nav-placeholder"></div>
  <script>
    $(function () {
      $("#nav-placeholder").load("MarketPlace_navbar.php");
    });
  </script>
  </br>
  <?php echo '<h3 class="text-center">Thank you for shopping with us !!!!</h3></br>';?>

<div class="row">
    <div class="col-2">Hello&nbsp;</div>
    <div class="col-8">
    <?php
    if(isset($_SESSION["shopping_cart"])){
        $total_price = 0;
        echo '<div class="card">';
        $count = 0;
        $total_price_copy = 0;
        foreach ($_SESSION["shopping_cart"] as $product){
            $total_price_copy = $total_price_copy + $product["product_price"];
            if(stripos($product["product_code"], 'p')  !== false ){
                if($count == 0){
                    echo '<h6 class="card-header text-center" style="font-weight:bold; color:#17a2b8 ">
                    Store - Kopi Luwak
                    </h6>';
                    $count = $count + 1;
                }
                echo '
                <div class="card-footer text-center text-muted">
                    <h5 class="card-title"> Product Name :'.$product["name"].'</br> Product Price :'.$product["product_price"].'</br> Product Code : '.$product["product_code"].'</h5>
                </div>
                ';
            }
        }
        echo '<div class="card-footer text-center text-muted">
                    <h5 class="card-title"> Total Price : '.$total_price_copy.' </h5>
                </div>';
        echo '</div>';
        echo '</br>';
    }


    ?>
    </div>
    <div class="col-2">&nbsp;</div>
</div>
