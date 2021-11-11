<!DOCTYPE html>

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

<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        </br>    
        <h3 class='text-center'>Your Orders..</h3>
        </br>
        <?php 
        session_start();
        $con = mysqli_connect("localhost","root","Ganesh@7","cart_system");
        if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
        }

        $sql = "SELECT OrderID, product_name, ProductCode, OrderDate, OrderTotal, User_Name FROM market_place_orders WHERE User_Name = '".$_SESSION['loggedinuser']."' ORDER BY OrderDate DESC";
// SELECT OrderID, product_name, ProductCode, OrderDate, OrderTotal, User_Name FROM market_place_orders WHERE User_Name = ".$_SESSION["loggedinuser"]." ORDER BY OrderDate DESC
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        echo '
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">OrderID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Total</th>
                    </tr>
                </thead>
                <tbody>';
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '
                <tr>
                    <td scope="row">'.$row['OrderID'].'</td>
                    <td>'.$row['product_name'].'</td>
                    <td>'.$row['ProductCode'].'</td>
                    <td>'.$row['OrderDate'].'</td>
                    <td>'.$row['OrderTotal'].'</td>
                </tr>';
            }
            echo '</tbody></table>';
          } else {
            echo "</br></br><h3 class='text-center'> If shopping does not make you happy, then you're in the wrong shop. </h3>";
          }

        ?>
    </div>
    <div class="col-2">&nbsp;</div>
</div>
