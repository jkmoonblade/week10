<?php

session_start(); 
?>
<!DOCTYPE html>
<html>
<title>Week03 Prove Assignment</title>
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
<p>Of course you don't.</p>
<br>
<a href="checkout.php">Return to Browse</a>

<br>
<a href="checkout.php">Continue to Checkout</a>
<br>
</body>
</html>