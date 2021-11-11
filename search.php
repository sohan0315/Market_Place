<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css\style1.css" />
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        table, td, th {  
        border: 1px solid #ddd;
        text-align: left;
        }

        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        padding: 15px;
        }
    </style>
    <link rel="stylesheet" href="css\style.css" />
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color:black; background-color:#4caf50;" href="#">Kopi Luwak</a>
    </div>
    <ul>
    <form action="" method="GET" name="">
      <li><a href="shopping_cart.php">Order online</a></li>
      <li> <a href="searchdirectory.php">UserDirectory</a></li>
      <li style="float:right"> <a href="logout.php">Logout</a></li>
      <!-- <li style="float:right "><button type="submit" value="Search" style="height: 33px; width: 60px; margin-top: 7px;"><i class="fa fa-search"></i></button></li>
      <li style="float:right">
        <input type="text" style="height: 33px; width: 100%; margin-top: 7px;" placeholder="Search.." name="s" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>">
      </li> -->
    </form>
    </ul>
  </div>
</nav>
<div class="container abc1">
  <div class="row">
    <div class="col-md-3">
    <a href="shopping_cart.php"><img src="img\source.gif" class="img-responsive" alt="sorry" style="width: 40%;" /></a>
    </div>
    <div class="col-md-5">
      <h1 style="padding-top:30px"> Welcome To Kopi Luwak </h1>
    </div>
  </div>

    <div>
        <?php 
        session_start();
            
        if ($_SERVER['HTTP_REFERER'] == $url) {
            header('Location: logout.php');
            session_destroy();
            exit();
        }
        
        $fname = trim($_POST["fname"]);
        $lname = trim($_POST["lname"]);
        $email = trim($_POST["email"]);
        $number = trim($_POST["number"]);

        if(!$fname){$fname = "&*";}
        if(!$lname){$lname = "&*";}
        if(!$email){$email = "&*";}
        if(!$number){$number = "&*";}

        if($fname || $lname || $email || $number){

            require_once "config.php";

            $search_string = "SELECT * FROM users WHERE ";
            $search_string .= "last_name LIKE '%".$lname."%' OR firstname LIKE '%".$fname."%' OR home_phone LIKE '%".$number."%' OR cell_phone LIKE '%".$number."%' OR email LIKE '%".$email."%'";
            //echo $search_string;
            $result = mysqli_query($link, $search_string);

            $result_count = mysqli_num_rows($result);
            //echo "\n***********\n";
            //echo $result_count;
            if($result_count > 0){
                echo "<h1 style='padding: 17px; text-align: center;'>User Details.</h1>";
                echo "<table id='customers' style='width: 80%; margin-left: auto; margin-right: auto;'>
                <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Home Phone</th>
                <th>Cell Phone</th>
                <th>Email</th>
                </tr>";

                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['home_phone'] . "</td>";
                    echo "<td>" . $row['cell_phone'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else
                echo '<br><br><div style="align-content: center; margin-left: 15%;"><h3>There were no results for your search. Try searching for something else.</h3></div>';
        }

        mysql_free_result($result);


        ?>
    </div>

</body>
</html>
