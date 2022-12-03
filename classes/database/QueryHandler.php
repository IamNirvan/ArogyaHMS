<?php

require $_SERVER["DOCUMENT_ROOT"]."/1_HND/HMS/classes/database/DatabaseConnection.php";

// This class contains functions that allows for interactions 
// with the database. They can be accessed via an object of this class.
class QueryHandler {

  // Function to handle select queries
  public static function handleSelectQuery($query) {
    $databaseConnection = new DatabaseConnection();
    $connection = $databaseConnection->getConnection();

    // The connection will be set to NULL if an error occurred when testing the connection
    if($connection != NULL) {
      // Execute the query
      $result = $connection->query($query);
      $connection->close();

      // Return a valid result set, otherwise NULL
      return ($result->num_rows > 0) ? $result : NULL;
    }
  }

  // Function to handle insert queries
  public static function handleInsertQuery($query) {
    $databaseConnection = new DatabaseConnection();
    $connection = $databaseConnection->getConnection();

    // Check if there is a problem with the connection
    // The connection will be NULL if an error occurred when testing the connection
    if($connection != NULL) {
      // Execute the query and return the result (boolean)
      if($connection->query($query)) {
        return TRUE;
      }
      // Display the error message
      // echo "<br><strong>ERROR WHEN INSERTING:</strong> $connection->error<br>";
      ErrorPrinter::printError("ERROR WHEN INSERTING", $connection->error);
      $result = $connection->query($query);
      $connection->close();
      return $result;
    }
  }

  // Function to handle delete queries
  public static function handleDeleteQuery($query) {
    $databaseConnection = new DatabaseConnection();
    $connection = $databaseConnection->getConnection();

    if($connection != NULL) {
      // Execute the query and return the result. 
      // The result indicates a successful or failed query execution
      if($connection->query($query)) {
        return TRUE;
      }
      // Display the error message
      // echo "<br><strong>ERROR WHEN DELETING:</strong> $connection->error<br>";
      ErrorPrinter::printError("ERROR WHEN DELETING", $connection->error);
      $result = $connection->query($query);
      $connection->close();
      return $result;
    }
  }

  // Function to handle update queries
  public static function handleUpdateQuery($query) {
    $databaseConnection = new DatabaseConnection();
    $connection = $databaseConnection->getConnection();

    if($connection != NULL) {
      // Execute the query and return the result (boolean)
      if($connection->query($query)) {
        return TRUE;
      }
      // Display the error message
      // echo "<br><strong>ERROR WHEN UPDATING:</strong> $connection->error<br>";
      ErrorPrinter::printError("ERROR WHEN UPDATING", $connection->error);
      $result = $connection->query($query);
      $connection->close();
      return $result;
    }
  }
}

// Test:
// $id = IDGenerator::generate("EMPLOYEE", "MAX(employeeID)", "SELECT MAX(employeeID) FROM arogya_health_care_v2.employee;");
// $query = "INSERT INTO arogya_health_care_v2.employee VALUES('EMP-01', 'John', 'Doe', '88478576787', 'Male', '12-06-2000', 'Neurosurgeon');";
// QueryHandler::handleInsertQuery($query);

// $upQuery = "UPDATE arogya_health_care_v2.employee SET specialization = 'Oncologist' WHERE employeeID = '1';";
// QueryHandler::handleUpdateQuery($upQuery);

// $delQuery = "DELETE FROM  arogya_health_care_v2.employee WHERE employeeID = '1';";
// QueryHandler::handleDeleteQuery($delQuery);

// $selQuery = "SELECT * FROM arogya_health_care_v2.employee";
// $record = QueryHandler::handleSelectQuery($selQuery);
// $fetched = $record->fetch_assoc();
// var_dump($fetched);
?>
