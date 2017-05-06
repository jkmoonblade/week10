<?php

session_start(); 

$street = htmlspecialchars($_POST["street"]);
$city = htmlspecialchars($_POST["city"]);
$state = htmlspecialchars($_POST["state"]);
$zip = htmlspecialchars($_POST["zip"]);
?>
<!DOCTYPE html>
<html>
<title>Week03 Prove Assignment</title>
<body>

<p>Here are the items you purchase:</p>
<br>
<?
foreach ($_SESSION["items"] as $item)
{
	$item_clean = htmlspecialchars($item);
	echo "<p>$item_clean</p>";
}
?>


<p>They will be shipped to this location:</p>
<br>

<?php 
	echo $street . ", " . $city . " " . $state .  ", " . $zip;
?>

</body>
</html>