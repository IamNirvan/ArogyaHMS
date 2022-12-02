<?php

session_start();

require "./QueryHandler.php";

class Account {
  private $username;
  private $password;
  private $employeeID;

  public static function login($username, $password) {
    $selectQuery = "SELECT * FROM arogya_health_care_v2.userAccount WHERE username = '$username';";
    $result = QueryHandler::handleSelectQuery($selectQuery);

    // Check if there are records in the result
    if($result == NULL) {

      $fetched = $result->fetch_assoc();

      // Hash the password using the default algorithm (Bcrypt)
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT)

      // Check if username and password match
      if($fetched['userName'] == $username && $fetched['accountPassword'] == $hashedPassword) {
          $_SESSION["loggedUser"] = $username;
          $_SESSION["AccountPassword"] = $hashedPassword;
          $_SESSION["employeeID"] = $fetched["employeeID"];
      }else {
        // Incorrect password
      }

    } else {
      // Account could not be found
    }
  }



  
}

?>
