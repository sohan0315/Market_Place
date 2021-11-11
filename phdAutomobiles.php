<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css\style_common.css"/>
    <link rel="stylesheet" href="css\table.css"/>
    <style>
        body {
        background-image: url('coffeebackground.png');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.html" style="font-weight: bold; color:#4caf50;">&nbsp;&nbsp;Kopi Luwak</a>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"> Home <i style = "margin-top: 5px;" class="fas fa-home"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    MENU
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="allproducts.php">All Products</a>
                    <a class="dropdown-item" href="most_visited_products.php">Frequently Visited Products</a>
                    <span></span>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact us.php">Contact Us <i style = "margin-top: 5px;" class="fas fa-envelope"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="locate.html">Locate Us <i style = "margin-top: 5px;" class="fas fa-map-marked-alt"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="partner.php">Our Partners <i style = "margin-top: 5px;" class="fas fa-handshake"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allUsers.php">All Users List <i style = "margin-top: 5px;" class="fas fa-users"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="register.php">Join Now <i style = "margin-top: 5px;" class="fas fa-user-plus"></i> <span id="cart-item" class="badge badge-danger"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Sign In <i style = "margin-top: 5px;" class="fas fa-sign-in-alt"></i> <span id="cart-item" class="badge badge-danger"></span></a>
              </li>
            </ul>
          </div>
      </nav>
    </br></br><div style="color:black; margin-left: 45%;"><h6>PHD AUTOMOBILES</h6></div></br></br>
    <?php
        $url = 'https://dhruvinshah.live/admin.php';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        //preg_match_all("<td style='text-align:center'>Admin</td>", $result, $matches);
        //print_r($matches);
        curl_close($curl);
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($result);
        libxml_clear_errors();
        $xpath = new DOMXpath($dom);

        $data_test = array();
        $data = array();
        // get all table rows and rows which are not headers
        $table_rows_test = $xpath->query('//table/th');
        foreach($table_rows_test as $row => $tr) {
            foreach($tr->childNodes as $td) {
                $data_test[$row][] = preg_replace('~[\r\n]+~', '', trim($td->nodeValue));
            }
            $data_test[$row] = array_values(array_filter($data_test[$row]));
        }


        $table_rows = $xpath->query('//table/tr');
        foreach($table_rows as $row => $tr) {
            foreach($tr->childNodes as $td) {
                $data[$row][] = preg_replace('~[\r\n]+~', '', trim($td->nodeValue));
            }
            $data[$row] = array_values(array_filter($data[$row]));
        }

        echo '<table id="customers" style="margin-left: 140px;">';
        foreach($data_test as $row){
            echo '<th>';
            foreach($row as $value){
                echo $value;
            }
            echo '</th>';
        }
        foreach($data as $row){
            echo '<tr>';
            foreach($row as $value){
                echo '<td>';
                echo $value;
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    ?>
</body>

</html>
