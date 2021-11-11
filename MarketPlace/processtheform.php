<?php
session_start();
$con = mysqli_connect("localhost","root","Ganesh@7","cart_system");
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
die();
}

$status="";
if (isset($_POST['product_code']) && $_POST['product_code']!=""){
$product_code = $_POST['product_code'];
$result = mysqli_query($con,"SELECT * FROM product WHERE product_code ='$product_code'");
$row = mysqli_fetch_assoc($result);
$name = $row['product_name'];
$product_code = $row['product_code'];
$product_price = $row['product_price'];
$product_image = $row['product_image'];

$cartArray = array(
	$product_code=>array(
	'name'=>$name,
	'product_code'=>$product_code,
	'product_price'=>$product_price,
	'quantity'=>1,
	'product_image'=>$product_image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($product_code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Demo Simple Shopping Cart using PHP and MySQL</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}

$result = mysqli_query($con,"SELECT * FROM product");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='product_code' value=".$row['product_code']." />
			  <div class='product_image'><img src='".$row['product_image']."' /></div>
			  <div class='name'>".$row['product_name']."</div>
		   	  <div class='product_price'>$".$row['product_price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</div>
</body>
</html>