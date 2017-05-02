<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<h1 align="center">Joe's Click and Ship!</h1>

<p>Tired of paying for stuff online?* Worry no more! With Joe's Click and Ship, you can find items you like, click on it, and have it ship to your house! It's that simple!**</p>

<h2 align="center">Come on In!</h2>
<p align="center">I knew you'd want to check out these sweet deals.</p>

<form method="post" action="browse03.php" method="post">

	<p>What's your favorite color?</p>
	<input type="text" name="color"><br>

<input type="submit">
</form>


<?php 
$_SESSION["favcolor"] = $_POST["color"]; 
echo "Favorite color is " . $_SESSION["favcolor"];
?>

<p>*  You will be required to pay for items when they arrive on your doorstep.</p>
<p>** You are responible for shipping and handling fees.</p>

</body>
</html>