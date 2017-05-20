<?php
// Start the session
session_start();

try
{
  	$user = 'postgres';
  	$password = 's22554';
 	$db = new PDO('pgsql:host=localhost;dbname=project1', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

echo "Connected to " . $dbName;

?>