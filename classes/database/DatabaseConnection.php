<?php

require $_SERVER["DOCUMENT_ROOT"]."/1_HND/HMS/classes/utility/ErrorPrinter.php";

// This class is responsible for creating a new connection
// object and returning it to the caller
class DatabaseConnection {
  private $username = "root";
  private $password = "";
  private $serverName = "localhost";
  private $databaseName = "arogyahms";

  public function getConnection() {
    $connection = new mysqli($this->serverName, $this->username, $this->password, $this->databaseName);

    // Test the connection
    if($connection->connect_error) {
      // Display the error message
      // echo $connection->connect_error;
      ErrorPrinter::printError("ERROR WHEN CONNECTING TO THE DATABASE", "Failed to connected to the database.");
      return NULL;
    }
    return $connection;
  }
}

// Test:
// $dbCon = new DatabaseConnection();
// $connection = $dbCon->getConnection();
// var_dump($connection);
