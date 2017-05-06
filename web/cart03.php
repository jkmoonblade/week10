<?php
$color = htmlspecialchars($_POST["color"]);
echo "Favorite color is: " . $color;


<?
foreach ($_SESSION["items"] as $item)
{
	$item_clean = htmlspecialchars($item);
	echo "<p>$item_clean</p>";
}
?>