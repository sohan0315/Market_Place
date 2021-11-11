<?php 
if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: logout.php');
  session_destroy();
  exit();
}


?>

<html>
<head>
  <title>order online</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200" rel="stylesheet">
  <link rel="icon" href="img\logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="stylesheet" href="css\style1.css" />
  <style type="text/css">
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

</head>
<body >
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" style="color:black; background-color:#4caf50;" href="#">Kopi Luwak</a>
      </div>
      <ul>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <li><a href="#">Order online</a></li>
        <li> <a href="searchdirectory.php">UserDirectory</a></li>
        <li style="float:right"> <a href="logout.php">Logout</a></li>
        <!-- <li style="float:right "><button type="submit" value="Search" style="height: 33px; width: 60px; margin-top: 7px;"><i class="fa fa-search"></i></button></li>
        <li style="float:right">
          <input type="text" style="height: 33px; width: 100%; margin-top: 7px;" placeholder="Search.." name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>">
        </li> -->
      </form>
      </ul>
    </div>
  </nav>
<div class="container abc1">
  <div class="row">
    <div class="col-md-3">
    <a href="shopping_cart.php"><img src="img\source.gif" class="img-responsive" alt="sorry" style="height:20%" /></a>
    </div>
    <div class="col-md-5">
      <h1 style="padding-top:30px"> Welcome To Kopi Luwak </h1>
    </div>
  </div>
<!-- START-->
    <div class="row">
      <div class="form-group col-md-6 form">
    <form >

        <h2>Drinks</h2>
        <div class="checkbox abc">
        <div class="row"><div class="col-md-4"><label><input type="checkbox"/>Choco Frappe</label></div>
        <div class="col-md-4"><img src="img\chocofrappe.png" height="70px" width="70px"></div><div class="col-md-4"></div></div><br>
        <div class="row"><div class="col-md-4"><label><input type="checkbox"/>Majito</label></div>
        <div class="col-md-4"><img src="img\chocofrappe.png" height="70px" width="70px"></div></div><br>
        <div class="row"><div class="col-md-4"><label><input type="checkbox"/>Cappucino</label></div>
        <div class="col-md-4"><img src="img\chocofrappe.png" height="70px" width="70px"></div></div><br>
        <div class="row"><div class="col-md-4"><label><input type="checkbox"/>Espresso</label></div>
        <div class="col-md-4"><img src="img\chocofrappe.png" height="70px" width="70px"></div></div><br>

      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>
<!-- 

$k = trim($_POST["k"]);
//$k = isset($_GET['k']) ? $_GET['k'] : '';
if($k){
  session_start();
  $_SESSION["loggedin"] = true;
  $_SESSION["k"] = $k;

  header("location: search.php");
  exit;
}
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//   header("location: shopping_cart.php");
//   exit;


 -->