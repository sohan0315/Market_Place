<!DOCTYPE html>
<html>
<head>
  <title>REVIEW</title>
  <link rel="stylesheet" type = "text/css" href="css/temp1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
</head>
<body>

  <div class="header">
    <h1 style="margin-bottom: 0;"> REVIEW </h1>
  </div>
<div class="container">
<div class="row" style="height: auto;">
  <div class="col-lg-3 col-md-2 col-sm-1 col-xs-12">    
  </div>	         
  <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
	<?php
      $con = mysqli_connect("localhost","root","Ganesh@7","cart_system");
      if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      die();
      }
      $sql = "SELECT * from review";
      $result = $con->query($sql);
      $row = $result->fetch_assoc();
      echo "<br>Product Code<br>";
      echo $row["product_code"];
      echo "<br>Rating:<br>" ;
      echo $row["rating"];
      echo "<br>Review:<br>" ;
      echo $row["review"];


$stars = $row["rating"];
$count = 1;
$result = "";

for($i = 1; $i <= 5; $i++){
    if($stars >= $count){
        $result .= "<span>&#x2605</span>";
    } else {
        $result .= "<span>&#x2606</span>";
    }
    $count++;
}
?>
<p class="tool-tip"><a href="#" onMouseover="ddrivetip('Expert Rating')"; onMouseout="hideddrivetip()"></a><?php echo $result?></p>

</div>	 
<div class="col-lg-3 col-md-2 col-sm-1 col-xs-12">
</div>    
</div>	 
</div>	
</body>
</html>