<?php
$con = mysqli_connect("localhost","root","Ganesh@7","cart_system");
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
die();
}

  $product_rating = $_POST["rating"];
  $product_review = $_POST["review"];
  $sql="INSERT INTO review (rating,review) VALUES ('".$product_rating."','".$product_review."')";
  $query=mysqli_query($con,$sql);
  if(mysqli_affected_rows($con) > 0){
                 header("Location: displayreview.php");
   } else {
                 header("Location: MarketPlace_index.php");
   }
?>