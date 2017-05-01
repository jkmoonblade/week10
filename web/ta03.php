<?php
$cont = $_POST["cont"];
?>
<!DOCTYPE html>
<html>
<body>

<p>Welcome!</p><br>
<p>Your name is: <?php echo $_POST["name"]; ?></p><br>
<p>Your email address is: <?php echo $_POST["email"]; ?></p><br>
Your major is: <?php echo $_POST["major"]; ?><br>
You've visted the following continents:
<ul>

<?php
foreach ($cont as $cont)
{
	echo "<li><p><?php echo $_POST["cont"]; ?></p></li>";
}
?>		

	</ul>


Here are your comments: <?php echo $_POST["comment"]; ?><br>

</body>
</html>