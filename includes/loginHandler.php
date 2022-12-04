<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"]."/1_HND/HMS/includes/database/queryHandler.php";

// Get the username, password and account type from the login page
$username = $_POST["username"];
$password = $_POST["password"];
$accountType = $_POST["accountType"];

// Validate input
if(!empty($username) && !empty($password) && !empty($accountType)) {
    // Check if the user account can be found
    $query = "SELECT * FROM useraccount WHERE username = '$username' AND accountType = '$accountType';";
    $r = handleSelectQuery($query);
    $result = mysqli_fetch_assoc($r);

    // Check if a valid result was returned
    if($result) {
        // Check if the password matches
        if($username == $result["username"] && $password == $result["accountPassword"]) {
            $_SESSION["loggedUser"] = $username;
            header("Location: ../dashboard.php");            
        }
        else {
            // Incorrect password
            $_SESSION["passwordError"] = "Incorrect password";
            header("Location: ../loginPage.php?error=Incorrect password");
        }
    }
    else {
        // Account not found
        $_SESSION["usernameError"] = "Account not found";
        header("Location: ../loginPage.php?error=Account not found");
    }
}