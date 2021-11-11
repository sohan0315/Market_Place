<?php

  
  session_start();
  $connd = mysqli_connect("dhruvinshah.live","Rohan777","Rohan@123","automobile");
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
die();
}
  $product = $_POST['products'];
  $service_rating = $_POST["rating"];
  $service_review = $_POST["review"];
  $sql="INSERT INTO service_review (product,rating,review) VALUES ('".$product."','".$service_rating."','".$service_review."')";
  // $query=mysqli_query($connd,$sql);
  // if ($connd->query($sql) === TRUE) {
  //   echo '';
  // } else {
  //     echo $sql;
  // }
  if($connd->query($sql) === TRUE){
                 header("Location: MarketPlace_index.php");
   } else {
                 header("Location: mplreview.html");
   }
?>
