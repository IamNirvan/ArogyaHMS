<?php
require $_SERVER["DOCUMENT_ROOT"]."/1_HND/HMS/includes/database/queryHandler.php";

// Get the username and password from the login page
$username = $_POST["username"];
$password = $_POST["password"];

// Validate input
if(!empty($username) && !empty($password)) {
    // Check if the user account can be found
    $query = "SELECT * FROM useraccount WHERE username = '$username'";
    $result = handleSelectQuery($query);

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
        $_SESSION["usernameError"] = "Unknown username";
        header("Location: ../loginPage.php?error=Unknown username");
    }
}