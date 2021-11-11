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
<h1 class="text-center" style="font-weight: bold;"></h1>
</br>
<div class="row">
    <div class="col-1"></div>
    <div class="col-4">
        <div class="card text-center">
            <div class="card-header">
            <h3 style="color:#28a745; font-weight: bold;">Luxury Package !</h3>
            </div>
            <div class="card-body">
            <?php
                $aDoor = $_POST['formDoor'];
                require_once "CrossDomainConfig.php";
                
                $sql = "SELECT * FROM hotel WHERE type='LUX' and place IN('".implode("','",$aDoor)."')";
                $total = 0;
                $result = $link2->query($sql);
                if ($result->num_rows > 0) {
                    echo '<table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Place</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>';
                    while($row = $result->fetch_assoc()) {
                        $total = $total + $row["Price"];
                        echo '<tr>
                        <td>'.$row["Place"].'</td>
                        <td>'.$row["Name"].'</td>
                        <td>'.$row["Price"].'</td>
                    </tr>';
                    }
                    echo '</tbody></table>';
                    echo '<h4>Total : '.$total.'</h4>';
                }
                else {
                    echo "0 results";
                }
            ?>
            </div>
            <div class="card-footer text-muted">
            <a href="#" class="btn btn-success">Book Now!</a>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
    <div class="col-4">
    <div class="card text-center">
        <div class="card-header">
        <h3 style="color:#28a745; font-weight: bold;">Budget Package !</h3>
        </div>
        <div class="card-body">
        <?php
            $aDoor = $_POST['formDoor'];
            require_once "CrossDomainConfig.php";
            
            $sql = "SELECT * FROM hotel WHERE type='CFO' and place IN('".implode("','",$aDoor)."')";
            $total = 0;
            $result = $link2->query($sql);
            if ($result->num_rows > 0) {
                echo '<table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Place</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>';
                while($row = $result->fetch_assoc()) {
                    $total = $total + $row["Price"];
                    echo '<tr>
                    <td>'.$row["Place"].'</td>
                    <td>'.$row["Name"].'</td>
                    <td>'.$row["Price"].'</td>
                </tr>';
                }
                echo '</tbody></table>';
                echo '<h4>Total : '.$total.'</h4>';
            }
            else {
                echo "0 results";
            }
        ?>
        </div>
        <div class="card-footer text-muted">
        <a href="#" class="btn btn-success">Book Now!</a>
        </div>
    </div>
    </div>
    <div class="col-1"></div>
</div>
</br></br>

</html>