<?php
$servername = "dhruvinshah.live";
$username = "Rohan777";
$password = "Rohan@123";
$dbname = "automobile";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
  $fname=$_POST["fname"];
  $lname=$_POST["lname"];
  $email=$_POST["email"];
  $contact=$_POST["contact"];
  $address=$_POST["address"];
  $username=$_POST["username"];
  $password=sha1($_POST["password"]);
  $sql="INSERT INTO marketplace (First_Name,Last_Name,Email,Contact,Address,Username,Password) VALUES ('".$fname."','".$lname."','".$email."','".$contact."','".$address."','".$username."','".$password."')";
  $query=mysqli_query($conn,$sql);
  if(mysqli_affected_rows($conn) > 0){
    $message="REGISTERED";  
                 echo $message;
                 header("Location: marketplace_login.html");
   } else {
    $message="Already exists,try another username";  
                 echo $message;
                 header("Location: marketplace_registration.html");
   }
   
  mysqli_close($conn);
?>