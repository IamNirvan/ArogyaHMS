<?php

// require "DatabaseConnection.php";

class IDGenerator {
  public static function generate($tag, $primaryKeyColumnName, $query) {
    $databaseConnection = new DatabaseConnection();
    $connection = $databaseConnection->getConnection();
    $records = $connection->query($query);

    if($records->num_rows > 0) {
      while($fetched = $records->fetch_assoc()) {
        // var_dump($fetched[$primaryKeyColumnName]);
        $num = explode('-', $fetched[$primaryKeyColumnName])[1];
        // echo "The number is: $num";
        // var_dump($num);
        return "$tag-".++$num;
      }
    }
    return "$tag-1";
  }
}

// echo IDGenerator::generate("ACCOUNT", "MAX(userAccountID)", "SELECT MAX(userAccountID) FROM arogya_health_care.useraccount;");

 ?>
