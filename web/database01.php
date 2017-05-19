<?php
// Start the session
session_start();

try
{
  $user = 'postgres';
  $password = 's22554';
  $db = new PDO('pgsql:host=127.0.0.1;dbname=project1', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>