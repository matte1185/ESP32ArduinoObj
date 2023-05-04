<?php

if(isset($_GET["objects"])) {
   $objects = $_GET["objects"]; // get objects value from HTTP GET

   $servername = "localhost";
   $username = "";
   $password = "";
   $database_name = "oggetti";

   // Create MySQL connection from PHP to MySQL server
   $connection = new mysqli($servername, $username, $password, $database_name);
   // Check connection
   if ($connection->connect_error) {
      die("MySQL connection failed: " . $connection->connect_error);
   }

   $sql = "INSERT INTO nomi (nome) VALUES ('$objects')";

   if ($connection->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $connection->error;
   }

   $connection->close();
} else {
   echo "Objects are not set in the HTTP request";
}

?> 
