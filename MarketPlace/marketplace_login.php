<?php   
$servername = "localhost";
$username = "root";
$password = "Ganesh@7";
$dbname = "UserDirectory";

$dbServerName = "dhruvinshah.live";
$dbUsername = "Rohan777";
$dbPassword = "Rohan@123";
$dbName = "automobile";

$dbServerName1 = "tanayganeriwal.live";
$dbUsername1 = "Rohan201";
$dbPassword1 = "Tanay201";
$dbName1 = "AutoCar_Productions";

$dbServerName2 = "sohanshirodkar.live";
$dbUsername2 = "Rohan";
$dbPassword2 = "Rohan@777";
$dbName2 = "ddvv_travels";

$conn1 = new mysqli($servername, $username, $password, $dbname);
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
$conn2 = new mysqli($dbServerName1, $dbUsername1, $dbPassword1, $dbName1);
$conn3 = new mysqli($dbServerName2, $dbUsername2, $dbPassword2, $dbName2);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);   
}
elseif($conn1->connect_error){
    die("Connection failed: " . $conn1->connect_error);
}
elseif($conn2->connect_error){
    die("Connection failed: " . $conn2->connect_error);
}
elseif($conn3->connect_error){
    die("Connection failed: " . $conn3->connect_error);
}

if(isset($_POST["submit"])){  
    
    if(!empty($_POST['username']) && !empty($_POST['password'])) { 
        
        $user=$_POST['username'];  
        $pass=sha1($_POST['password']);
        $passr=$_POST['password'];
        $passs=md5($_POST['password']);
        $passt=$_POST['password'];   
        $query1=mysqli_query($conn1,"SELECT * FROM users WHERE username='".$user."'"); 
        $query=mysqli_query($conn,"SELECT * FROM client WHERE cus_username='".$user."' AND cus_pass='".$pass."'");
        $query2=mysqli_query($conn2,"SELECT * FROM register WHERE username='".$user."' AND u_password='".$passt."'");
        $query3=mysqli_query($conn3,"SELECT * FROM customer_account WHERE Email_ID='".$user."'");  
        $numrows=mysqli_num_rows($query);
        $numrows1=mysqli_num_rows($query1);
        $numrows2=mysqli_num_rows($query2);
        $numrows3=mysqli_num_rows($query3);
        if($numrows!=0){  
            while($row=mysqli_fetch_assoc($query))  
            {  
                    $dbusername=$row['cus_username'];  
                    $dbpassword=$row['cus_pass'];                     
            }  
            if(($user == $dbusername && $pass == $dbpassword))  
            {  
                if ($user == "admin"){
                    header("Location: admin.php");
                }  
                else{
                        session_start();
                        $_SESSION["loggedinuser"] = $dbusername;
                        header("Location: MarketPlace_index.php");
                    }        
                }
            }
            elseif($numrows1!=0){
                while($row1=mysqli_fetch_assoc($query1))  
            {  
                    $dbusername1=$row1['username'];  
                    $dbpassword1=$row1['password'];                      
            }  
            if($user == $dbusername1 && password_verify($passr,$dbpassword1))  
            {  
                if ($user == "admin"){
                    header("Location: admin.php");
                }  
                else{
                        session_start();
                        $_SESSION["loggedinuser"] = $dbusername1;
                        header("Location: MarketPlace_index.php");
                    }        
                }
            }
            elseif($numrows2!=0){
                while($row2=mysqli_fetch_assoc($query2))  
            {  
                    $dbusername2=$row2['username'];  
                    $dbpassword2=$row2['u_password'];                       
            }  
            if($user == $dbusername2 && $passt == $dbpassword2)  
            {  
                if ($user == "admin"){
                    header("Location: admin.php");
                }  
                else{
                        session_start();
                        $_SESSION["loggedinuser"] = $dbusername2;
                        header("Location: MarketPlace_index.php");
                    }        
                }
            }
            elseif($numrows3!=0){
                while($row3=mysqli_fetch_assoc($query3))  
            {  
                    $dbusername3=$row3['Email_ID'];  
                    $dbpassword3=$row3['Password'];                       
            }  
            if($user == $dbusername3 && $passs == $dbpassword3)  
            {  
                if ($user == "admin"){
                    header("Location: admin.php");
                }  
                else{
                        session_start();
                        $_SESSION["loggedinuser"] = $dbusername3;
                        header("Location: MarketPlace_index.php");
                    }        
                }
            }
            else {  
               echo "Login Unsuccessful";
               header("Location: login.html");
            }  

       }else{  
        echo "All fields are required!";  
        }  
} 
?>