<?php
$servename="localhost";
$username="root";
$bd="connexion";
$password="";

try {
  $conn = new PDO("mysql:host=$servename;dbname=$bd", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>