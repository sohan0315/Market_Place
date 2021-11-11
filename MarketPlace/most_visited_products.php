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
        <h3 class='text-center'>Our Most Visited Products..</h3>
        </br>
        <?php 
        session_start();
        $con = mysqli_connect("localhost","root","Ganesh@7","cart_system");
        if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
        }

        $sql = "SELECT * FROM most_visited_product WHERE product_code like 'p%'  ORDER BY visited_count DESC LIMIT 5";
        $sql2 = "SELECT * FROM most_visited_product WHERE product_code like 's%' ORDER BY visited_count DESC LIMIT 5";
        $sql3 = "SELECT * FROM most_visited_product WHERE product_code like 't%' ORDER BY visited_count DESC LIMIT 5";
        $sql4 = "SELECT * FROM most_visited_product WHERE product_code like 'c%' ORDER BY visited_count DESC LIMIT 5";

        
        // echo $sql2;echo $sql2;echo $sql2;

        $result = $con->query($sql);
        $result1 = $con->query($sql2);
        $result3 = $con->query($sql3);
        $result4 = $con->query($sql4);

        if ($result->num_rows > 0) {
            echo '
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Code</th>
                    </tr>
                </thead>
                <tbody>';
            $tempcount = 0;
            $limitcounter = 0;
            while($row = $result->fetch_assoc()) {
                if($row['visited_count']>1){
                    if(stripos($row["product_code"], 'p')  !== false && $tempcount == 0){
                        echo '<h6 class="card-header text-center" style="font-weight:bold; color:black ">
                        Store - Kopi Luwak
                        </h6>';
                        $tempcount = $tempcount + 1;
                    }
                    if(stripos($row["product_code"], 'p')  !== false && $limitcounter < 5){
                      echo '
                      <tr>
                          <td> <a href="https://rohandeshmukh.live/MarketPlace/products/'.$row['product_code'].'.php">'.$row['product_name'].'</td>
                          <td>'.$row['product_code'].'</td>
                      </tr>';
                      $limitcounter = $limitcounter + 1;
                    }
                }
            }
            echo '</tbody></table>';
        } 
        else {
            echo "</br></br><h3 class='text-center'> 123123 </h3>";
        }

        if ($result1->num_rows > 0) {
          echo '
          <table class="table table-hover">
              <thead>
                  <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Code</th>
                  </tr>
              </thead>
              <tbody>';
          $tempcount = 0;
          $limitcounter = 0;
          while($row = $result1->fetch_assoc()) {
              if($row['visited_count']>1){
                  if(stripos($row["product_code"], 's')  !== false && $tempcount == 0){
                      echo '<h6 class="card-header text-center" style="font-weight:bold; color:black ">
                      Store - PHDAUTOMOBILES
                      </h6>';
                      $tempcount = $tempcount + 1;
                  }
                  if(stripos($row["product_code"], 's')  !== false && $limitcounter < 5){
                    echo '
                    <tr>
                        <td> <a href="https://rohandeshmukh.live/MarketPlace/services/'.$row['product_code'].'.php">'.$row['product_name'].'</td>
                        <td>'.$row['product_code'].'</td>
                    </tr>';
                    $limitcounter = $limitcounter + 1;
                  }
              }
          }
          echo '</tbody></table>';
      } 
      else {
          echo "</br></br><h3 class='text-center'> 123123 </h3>";
      }

      if ($result3->num_rows > 0) {
        echo '
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product Code</th>
                </tr>
            </thead>
            <tbody>';
        $tempcount = 0;
        $limitcounter = 0;
        while($row = $result3->fetch_assoc()) {
            if($row['visited_count']>1){
                if(stripos($row["product_code"], 't')  !== false && $tempcount == 0){
                    echo '<h6 class="card-header text-center" style="font-weight:bold; color:black ">
                    Store - DDVV Tours and Travels
                    </h6>';
                    $tempcount = $tempcount + 1;
                }
                if(stripos($row["product_code"], 't')  !== false && $limitcounter < 5){
                  echo '
                  <tr>
                      <td> <a href="https://rohandeshmukh.live/MarketPlace/tours/'.$row['product_code'].'.php">'.$row['product_name'].'</td>
                      <td>'.$row['product_code'].'</td>
                  </tr>';
                  $limitcounter = $limitcounter + 1;
                }
            }
        }
        echo '</tbody></table>';
    } 
    else {
        echo "</br></br><h3 class='text-center'> 123123 </h3>";
    }

    if ($result4->num_rows > 0) {
      echo '
      <table class="table table-hover">
          <thead>
              <tr>
              <th scope="col">Product Name</th>
              <th scope="col">Product Code</th>
              </tr>
          </thead>
          <tbody>';
      $tempcount = 0;
      $limitcounter = 0;
      while($row = $result4->fetch_assoc()) {
          if($row['visited_count']>1){
              if(stripos($row["product_code"], 'c')  !== false && $tempcount == 0){
                  echo '<h6 class="card-header text-center" style="font-weight:bold; color:black ">
                  Store - AutoCAR PRODUCTIONS
                  </h6>';
                  $tempcount = $tempcount + 1;
              }
              if(stripos($row["product_code"], 'c')  !== false && $limitcounter < 5){
                echo '
                <tr>
                    <td> <a href="https://rohandeshmukh.live/MarketPlace/cars/'.$row['product_code'].'.php">'.$row['product_name'].'</td>
                    <td>'.$row['product_code'].'</td>
                </tr>';
                $limitcounter = $limitcounter + 1;
              }
          }
      }
      echo '</tbody></table>';
  } 
  else {
      echo "</br></br><h3 class='text-center'> 123123 </h3>";
  }

        ?>
    </div>
    <div class="col-2">&nbsp;</div>
</div>
