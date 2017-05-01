<?php
$email = htmlspecialchars($_POST["email"]);
$places = $_POST["places"];
?>

<!DOCTYPE html>
<html>
<body>

<p>Welcome!</p><br>
<p>Your name is: <?php echo $_POST["name"]; ?></p><br>
<p>Your email address is: <a href="mailto:<?=$email ?>"><?=$email ?></a></p><br>
Your major is: <?php echo $_POST["major"]; ?><br>
You've visted the following continents:		
<ul>

<?
foreach ($places as $place)
{
	$place_clean = htmlspecialchars($place);
	echo "<li><p>$place_clean</p></li>";
}
?>		

	</ul>

Here are your comments: <?php echo $_POST["comment"]; ?><br>

</body>
</html>