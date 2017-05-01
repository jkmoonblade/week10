<?php
$cont = $_POST["cont"];
?>
<html>
<body>

Welcome!<br>
Your name is: <?php echo $_POST["name"]; ?><br>
Your email address is: <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo $_POST["email"]; ?><br>
Your major is: <?php echo $_POST["major"]; ?><br>
You've visted the following continents:
<ul>

<?
foreach ($cont as $cont)
{
	echo "<li><p><?php echo $_POST["cont"]; ?></p></li>";
}
?>		

	</ul>


Here are your comments: <?php echo $_POST["comment"]; ?><br>

</body>
</html>