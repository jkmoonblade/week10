<?php

session_start();
?>

<!DOCTYPE html>
<html>
<title>Week03 Prove Assignment</title>
<style>
body {
	background-color: white;
	margin-right: 50px;
    margin-left: 50px;
}

h1, h2 {
	text-align: center;
}
</style>
<body>

<form method="post" action="confirmation.php">
Street Address: <input type="text" name="street"><br>
City: <input type="text" name="city"><br>
State: <input type="text" name="state"><br>
ZIP:<input type="text" name="zip"><br>
<p>Confirm your purchase</p>

<?php 
$_SESSION["street"] = $_POST["street"]; 
$_SESSION["city"] = $_POST["city"];
$_SESSION["state"] = $_POST["state"];
$_SESSION["zip"] = $_POST["zip"];

?>

<input type="submit">

<a href="cart03.php">View your Cart</a>
</form>
</body>
</html>