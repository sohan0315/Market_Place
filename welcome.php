<!doctype html>
<html>
<head>
    <title>conference room booking app - sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/themes/1/conf-room1.min.css" rel="stylesheet" />
    <link href="css/themes/1/jquery.mobile.icons.min.css" rel="stylesheet" />
    <link href="../../lib/jqm/1.4.4/jquery.mobile.structure-1.4.4.min.css" rel="stylesheet" />
    <link href="app.css" rel="stylesheet" />
    <script src="../../lib/jquery/2.1.1/jquery-2.1.1.min.js"></script>
    <script src="../../lib/jqm/1.4.4/jquery.mobile-1.4.4.min.js"></script>
</head>
 
<body>
    <div data-role="page">
        <div data-role="header" data-theme="c">
            <h1>Log In</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content">
            <h3>Log in</h3>
            <label for="txt-email">email address</label>
            <input type="text" name="txt-email" id="txt-email" value="">
            <label for="txt-password">password</label>
            <input type="password" name="txt-password" id="txt-password" value="">
           
            <a href="./validation.php" data-rel="popup" data-transition="pop" data-position-to="window" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5" >submit</a>
            
            
        </div><!-- /content -->
    </div><!-- /page -->
</body>
</html>

2. <!DOCTYPE html>
<html>
<head>
     <?php
        //echo "adi";
        extract( $_POST);
        #$username = 'ad';
        #$password = 'ad';
 
        if (!$username || !$password) {
            fieldsBlank();
            die();
        }
        $NewUser = null;
        if( isset($NewUser)) {
            echo 'isset';
 
        }
        else{
 
            if(!( $file = fopen("/password.txt", 'r'))){
                print('<title>Error</title></head>
                    <body>Could not open passwod file
                    </body></html>');
                die();
            }
 
            $userVerified = 0;
 
            while(!feof($file) && !$userVerified){
 
                $line = fgets($file, 255);
                #echo $line;
                $line = chop($line);
                #echo $line;
                $field = preg_split("/,/", $line);
 
                #echo $field[0];
 
                if($username = $field[0]){
                    $userVerified =1;
 
                    if(checkpassword($password, $field) == true)
                        accessGranted($username);
                    else
                        wrongpassword();
                }
            }
 
            fclose($file);
 
            if( !$userVerified)
                accessDenied();
                }
 
            function checkpassword($userpassword, $filedata){
                $uppercase = preg_match('@[A-Z]@', $password);
                $expression = preg_match('!@#$%^&*', $password);
 
                if(!$uppercase || !$expression || strlen($password) < 10) {
                    echo "Password doesn't satisfy required fields:";
                    return false;
                }else{
                    if($userpassword == $filedata[1])
                        return true;
                    else
                        return false;
                }
                
 
            }
 
            function userAdded($name)
            {
                print('<title>Thank you</title></head>
                    <body style =\"font-family: arial;
                    font-size: 1em; color: blue\">
                    <strong> You have been userAddedto the user list, $name.
                    <br /> Enjoy the site.</strong>');
            }
 
            function accessGranted($name){
                #console.log('accessGranted');
                header('Location: index123.html');
                print("<title>Thank You</title></head>
                    <body style = \"font-family: arial;
                    font-size: 1em; color:blue\">
                    <strong>Permission has been
                    granted, $name. <br />
                    Enjoy the site.</strong>");
 
            }
 
            function wrongpassword(){
                print("<title>Access Denied</title></head>
                    <body style = \"font-family: arial;
                    font-size:1em; color: red\">
                    <strong>You entered an invalid
                    password.<br/>acess has
                    been denied.</strong>");
            }
