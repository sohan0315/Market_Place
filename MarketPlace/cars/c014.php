<!DOCTYPE html>

<?php
session_start();
// $con = mysqli_connect("localhost","root","Tanayg@201","AutoCar_Productions");
$con = mysqli_connect("tanayganeriwal.live","Rohan201","Tanay201","AutoCar_Productions");
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
die();
}
$connd = mysqli_connect("dhruvinshah.live","Rohan777","Rohan@123","automobile");
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
die();
}
$status="";
if (isset($_POST['product_code']) && $_POST['product_code']!=""){
$product_code = $_POST['product_code'];
$result = mysqli_query($con,"SELECT * FROM products WHERE product_code ='$product_code'");
$row = mysqli_fetch_assoc($result);
$name = $row['model'];
$product_code = $row['product_code'];
$product_price = $row['price'];
$product_image = $row['product_image'];

$cartArray = array(
	$product_code=>array(
	'name'=>$name,
	'product_code'=>$product_code,
	'product_price'=>$product_price,
	'quantity'=>1,
	'product_image'=>$product_image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($product_code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}

if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
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

</br>

<h1 class="text-center"><?php echo $status; ?></h1>

</br>

<div class="row">
    <div class="col-3">&nbsp;</div>
    <div class="col-8">
    <?php
        session_start();
        $con = mysqli_connect("tanayganeriwal.live","Rohan201","Tanay201","AutoCar_Productions");
        if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
        }

        $result = mysqli_query($con,"SELECT * FROM products where product_code = 'c014'");
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='card text-center text-white bg-info mb-3' style='max-width: 50rem;!important'>
                    <form method='post' action=''>
                    <input type='hidden' name='product_code' value=".$row['product_code']." />
                    <div class='card-header' style='color:black'>".$row['model']."</div>
                    <div class='card-body'>
                        <img class='card-img-top' src='".$row['product_image']."' style='width: 40%;' alt='Card image cap'>
                        <p class='card-text' style='color:black'>".$row['product_description']."</p>
                    </div>
                    <div class='card-footer text-muted'>
                        <button type='submit' class='btn btn-dark' style='color:white'>Add to Cart !</button>
                    </div>
                    </form>
                    </div>";
        }
        $sql1 = "SELECT * from service_review where product = 'Porsché 911'";
      $result = $connd->query($sql1);
      if ($result->num_rows > 0){
        while($row1 = $result->fetch_assoc()) {
          echo "Product Name:<br>";
          echo $row1["product"];
          echo "<br>Review:<br>" ;
          echo $row1["review"];
          echo "<br>Rating:<br>" ;
          echo $row1["rating"];
          $stars = $row1["rating"];
          $count = 1;
          $result1 = "";
          for($i = 1; $i <= 5; $i++){
          if($stars >= $count){
              $result1 .= "<span>&#x2605</span>";
          } else {
              $result1 .= "<span>&#x2606</span>";
          }
          $count++;
        }
        echo $result1;
        echo "<br>";
      }  
    }
    ?>
    </div>
    <div class="col-2">&nbsp;</div>
</div>


</html>

<?php
$conr = mysqli_connect("localhost","root","Ganesh@7","cart_system");
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
die();
}


$_SESSION["cartcount"] = $cart_count;

$result = mysqli_query($conr,"SELECT * FROM most_visited_product where product_code = 'c014'");
$visited_count_temp = 0;

while($row = mysqli_fetch_assoc($result)){
  $visited_count_temp = $row['visited_count'] + 1;
}

// echo $visited_count_temp;

$sql = 'UPDATE most_visited_product SET visited_count ='.$visited_count_temp.' WHERE product_code = "c014"';

if ($conr->query($sql) === TRUE) {
  echo " ";
} else {
  echo "Error updating record: " . $conr->error;
}

?>