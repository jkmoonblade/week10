<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<div align="center">
<h1>Joe's Click and Ship!</h1>

<p>Tired of paying for stuff online?* Worry no more! With Joe's Click and Ship, you can find items you like, click on it, and have it ship to your house! It's that simple!**</p>

<h2>Come on In!</h2>
<p>I knew you'd want to check out these sweet deals.</p>
</div>

<form method="post" action="browse03.php" method="post">

	<p>What's your favorite color?</p>
	<input type="text" name="color"><br>

	<p>Check the boxes next to items you'd like to add to your cart.</p>
	<input type="checkbox" name="items[]" value="Tissue box">Tissue box
	<input type="checkbox" name="items[]" value="Toilet plunger">Toilet plunger
	<input type="checkbox" name="items[]" value="Ramen">Ramen
	<input type="checkbox" name="items[]" value="Forks">Forks
	<input type="checkbox" name="items[]" value="Couch">Couch
	<input type="checkbox" name="items[]" value="Free Healthcare">Free Healthcare
	<input type="checkbox" name="items[]" value="Hope">Hope<br>

<input type="submit">
</form>


<a href="cart03.php">View your Cart</a>

<?php 
$_SESSION["favcolor"] = $_POST["color"]; 
$_SESSION["items"] = $_POST["items"];

echo "Favorite color is: " . $_SESSION["favcolor"];
?>

<?
foreach ($_SESSION["items"] as $item)
{
	$item_clean = htmlspecialchars($item);
	echo "<p>$item_clean</p>";
}
?>

<p>*  You will be required to pay for items when they arrive on your doorstep.</p>
<p>** You are responible for shipping and handling fees.</p>

</body>
</html>