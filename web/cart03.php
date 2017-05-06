<?php
echo "Favorite color is: " . $_SESSION["favcolor"];
?>

<?
foreach ($_SESSION["items"] as $item)
{
	$item_clean = htmlspecialchars($item);
	echo "<p>$item_clean</p>";
}
?>