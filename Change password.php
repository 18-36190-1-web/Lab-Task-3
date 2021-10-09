<?php
// define variables and set to empty values
$userErr = $passwordErr = $cpasswordErr = $firstErr = $lastErr = $teamErr = "";
$username = $password = $cpassword = $firstname = $lastname = $teamname = "";

// The preg_match() function searches a string for pattern, returning true if the pattern exists, and false otherwise.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    }
    //Validates Username
    if (empty($_POST["username"])) {
        $userErr = "You Forgot to Enter Your Username!";
    } else {
        $username = test_input($_POST["username"]);
        //Checks if name only contains  alpha numeric characters, period, dash or  underscore 
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $usernameErr = "Only alpha numeric characters, period, dash or  underscore only"; 

        } else {
        $username = test_input($_POST["username"]);
        //Checks if name must contain at least two (2) characters  
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $usernameErr = " must contain at least two (2) characters "; 

        }
    //Validates password & confirm passwords.
    if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["cpassword"]);
        if (strlen($_POST["password"]) <= '8') {
            $passwordErr = "Your Password Must not be less than eight (8) characters !";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain  must contain at least one of the special characters (@, #, $,  %);
        }

        else {
            $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
        }
    }
    //Validates firstname
    if (empty($_POST["firstname"])) {
        $firstErr = "You Forgot to Enter Your First Name!";
    } else {
        $firstname = test_input($_POST["firstname"]);
        //Checks if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
            $firstErr = "Only letters and white space allowed"; 
        }
    }
   if (empty($_POST["lastname"])) {
        $lastErr = "You Forgot to Enter Your Last Name!";
    } else {
        $lastname = test_input($_POST["lastname"]);
        //Checks if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
            $lastErr = "Only letters and white space allowed"; 
        }
        }
    if (empty($_POST["teamname"])) {
        $teamErr = "You Forgot to Enter Your Team Name!";
    } else {
        $teamname = test_input($_POST["teamname"]);
    }
}
/*Each $_POST variable with be checked by the function*/
function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>