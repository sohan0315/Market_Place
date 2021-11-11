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

</br>
</br>

<h1 class="text-center"><?php echo $status; ?></h1>

</br>
</br>

<div class="row">
    <div class="col-2">&nbsp;</div>
    <div class="col-8">
    <?php
        session_start();
        $connd = mysqli_connect("dhruvinshah.live","Rohan777","Rohan@123","automobile");
        if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
        }

        $result = mysqli_query($connd,"SELECT * FROM services");
        echo '<div class="card-deck">';
        $count = 0;
        while($row = mysqli_fetch_assoc($result)){
          if($count%3==0){
            //echo 'z';
            $count = $count + 1;
            echo"</div>";
            echo"<br>";
            echo '<div class="card-deck">';
            echo "<div class='card text-white bg-info mb-3' style='max-width: 50rem;!important'>
                    <form method='post' action=''>
                    <input type='hidden' name='service_code' value=".$row['service_code']." />
                    <div class='card-header'>".$row['service_name']."</div>
                    <div class='card-body'>
                        <img class='card-img-top' src='".$row['service_image_url']."' style='width: 80%;' alt='Card image cap'>
                    </div>
                    <div class='card-footer text-muted'>
                        <a type='submit' href='services/".$row['service_code'].".php' class='btn btn-dark' style='color:white'>Check Out !</a>
                    </div>
                    </form>
                    </div>";
          }
          else{
            //echo 'zv';
            $count = $count + 1;
            echo "<div class='card text-white bg-info mb-3' style='max-width: 50rem;!important'>
                    <form method='post' action=''>
                    <input type='hidden' name='service_code' value=".$row['service_code']." />
                    <div class='card-header'>".$row['service_name']."</div>
                    <div class='card-body'>
                        <img class='card-img-top' src='".$row['service_image_url']."' style='width: 80%;' alt='Card image cap'>
                    </div>
                    <div class='card-footer text-muted'>
                        <a type='submit' href='services/".$row['service_code'].".php' class='btn btn-dark' style='color:white'>Check Out !</a>
                    </div>
                    </form>
                    </div>";
          }
        }
    ?>
    </div>
    <div class="col-2">&nbsp;</div>
</div>


</html>