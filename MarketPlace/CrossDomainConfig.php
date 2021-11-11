<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER1', 'dhruvinshah.live');
define('DB_USERNAME1', 'Rohan777');
define('DB_PASSWORD1', 'Rohan@123');
define('DB_NAME1', 'automobile');
 
/* Attempt to connect to MySQL database */
$link1 = mysqli_connect(DB_SERVER1, DB_USERNAME1, DB_PASSWORD1, DB_NAME1);
 
// Check connection
if($link1 === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// else{
//     echo "IOIOIOIOO";
// }

/**********************************************************************************************/
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER2', 'sohanshirodkar.live');
define('DB_USERNAME2', 'Rohan');
define('DB_PASSWORD2', 'Rohan@777');
define('DB_NAME2', 'ddvv_travels');
 
/* Attempt to connect to MySQL database */
$link2 = mysqli_connect(DB_SERVER2, DB_USERNAME2, DB_PASSWORD2, DB_NAME2);
 
// Check connection
if($link2 === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

/**********************************************************************************************/
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER3', 'tanayganeriwal.live');
define('DB_USERNAME3', 'Rohan201');
define('DB_PASSWORD3', 'Tanay201');
define('DB_NAME3', 'AutoCar_Productions');
 
/* Attempt to connect to MySQL database */
$link3 = mysqli_connect(DB_SERVER3, DB_USERNAME3, DB_PASSWORD3, DB_NAME3);
 
// Check connection
if($link3 === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// ROHAN

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'Ganesh@7');
// define('DB_NAME', 'UserDirectory');
 
// /* Attempt to connect to MySQL database */
// $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// // Check connection
// if($conn === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Ganesh@7');
define('DB_NAME', 'cart_system');
 
/* Attempt to connect to MySQL database */
$conn2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($conn2 === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>