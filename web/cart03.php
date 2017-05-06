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

<p>Here are the items in your cart currently from your last submission:</p>
<br>
<?
foreach ($_SESSION["items"] as $item)
{
	$item_clean = htmlspecialchars($item);
	echo "<p>$item_clean</p>";
}
?>
<p>Would you like to remove any of them?</p>
<a href="browse03.php">Return to Browse</a>
<br>
<br>
<a href="checkout.php">Continue to Checkout</a>
<br>
</body>
</html>