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
        <h3 class='text-center'>Top 10 Product Review</h3>
        </br>
        <?php
        session_start();
        $connd = mysqli_connect("dhruvinshah.live","Rohan777","Rohan@123","automobile");
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
die();
}
        $sql1 = "SELECT * from service_review ORDER BY rating DESC LIMIT 10";
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
        echo "<br><br>";
      }  
    }
    ?>
       
    </div>
    <div class="col-2">&nbsp;</div>
</div>
