<?php

require $_SERVER["DOCUMENT_ROOT"]."/1_HND/HMS/classes/database/QueryHandler.php";

session_start();

// Get the username and password from the login page
$username = $_POST["username"];
$password = $_POST["password"];

// Validate input
if(!empty($username) && !empty($password)) {
    // Check if the user account can be found
    $query = "SELECT * FROM arogyahms.useraccount WHERE username = '$username'";
    $result = QueryHandler::handleSelectQuery($query);

    if($result != NULL) {
        $fetched = $result->fetch_assoc();

        // If the account is found, check if the password matches
        // return the result
        if($username == $fetched["username"] && $password == $fetched["accountPassword"]) {
            header("Location: ../dashboard.html");            
        }
        else {
            // incorrect password
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