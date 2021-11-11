<?php

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<h4 class='text-center' style='color:red;'>
		Product is removed from your cart!</h4>";
    $_SESSION["cartcount"] = $_SESSION["cartcount"] - 1;
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break;
    }
}
  	
}
?>
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


<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
$total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>PRODUCT CODE</td>
<td>UNIT PRICE</td>
<td>..</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src=<?php echo $product["product_image"]; ?> style="border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;" /></td>
<td><?php echo $product["name"]; ?><br />
</td>
<td>
<?php echo $product["product_code"]; ?>
</td>
<td><?php echo "$".$product["product_price"]; ?></td>
<td><form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["product_code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='btn btn-primary'>Remove Item</button>
</form></td>
</tr>
<?php
$total_price += ($product["product_price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5">
</br>
<h2 class="text-center" style="margin-left: 50%;">TOTAL: <?php echo "$".$total_price; ?></h2>
</br>
<a type="button" style="margin-left: 70%;" href="qwerty.php" class='btn btn-dark' style='color:white'>Buy Now !</a>
</td>
</tr>
</tbody>
</table>		
<?php
}else{
echo "<h3>Your cart is empty!</h3>";
}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</body>
</html>