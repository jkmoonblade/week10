<html>
<title>Pokemon Database</title>
<style>
body {
	background-image: url("http://hanksrepublic.com/wp-content/uploads/2017/05/inspiring-simple-background-blue-hd-desktop-wallpaper-high-definition.jpg");
	margin-right: 50px;
    margin-left: 50px;
}

h1, h2 {
	text-align: center;
}
</style>
<body>

<?php

session_start();

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:s22554@localhost:5432/project1";
}

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

?>

<h1 align="center">Joe's Pokemon Database!</h1>

<div align="center">
<img src="http://pre12.deviantart.net/f24e/th/pre/i/2012/340/d/a/pikachu_sleeping_by_jackspade2012-d5na29l.jpg" alt="Pikachu" style="width:304px;height:228px;">
</div>

<p>The purpose of this database is to store pokemon for trainers online. In it's current state, the user cannot enter in data and search, but I have provided links for you to see the progress of the database. I have entered in some data into it already.</p>

<br>

<form method="post" action="database01.php">

	<p>Please fill out the form if you want to insert pokemon into the database.</p><br>

	<p>Please enter your username</p>
	<input type="text" name="username"><br>

	<p>Please enter your password</p>
	<input type="text" name="password"><br>

	<p>Please enter the name of the pokemon you would like to deposit</p>
	<input type="text" name="pokemon"><br>

	<p>Please enter its level</p>
	<input type="text" name="level"><br>

	<p>Please enter the name of its First Attack</p>
	<input type="text" name="firstAttack"><br>

	<p>Please enter the name of its Second Attack</p>
	<input type="text" name="secondAttack"><br><br>

<input type="submit">
</form>

<?php 
$_SESSION["username"] = $_POST["username"]; 
$_SESSION["password"] = $_POST["password"]; 
$_SESSION["pokemon"] = $_POST["pokemon"]; 
$_SESSION["level"] = $_POST["level"]; 
$_SESSION["firstAttack"] = $_POST["firstAttack"]; 
$_SESSION["secondAttack"] = $_POST["secondAttack"]; 


try {

	$query = 'INSERT INTO public.user(username, password) VALUES(:username, :password)';
	$statement = $db->prepare($query);

	$statement->bindValue(':username', $_SESSION["username"]);
	$statement->bindValue(':password', $_SESSION["password"]);
	$statement->execute();

	$userId = $db->lastInsertId("public.user_id_seq");

	$query = 'INSERT INTO public.pokemon(name, level, trainer) VALUES(:name, :level, :trainer)';
	$statement = $db->prepare($query);

	$statement->bindValue(':name', $_SESSION["pokemon"]);
	$statement->bindValue(':level', $_SESSION["level"]);
	$statement->bindValue(':trainer', $userId);
	$statement->execute();

	$pokemonId = $db->lastInsertId("public.pokemon_id_seq");

	$query = 'INSERT INTO public.attacks(pokemon_id, attack1, attack2) VALUES(:pokemon_id, :attack1, :attack2)';
	$statement = $db->prepare($query);

	$statement->bindValue(':pokemon_id', $pokemonId);
	$statement->bindValue(':attack1', $_SESSION["firstAttack"]);
	$statement->bindValue(':attack2', $_SESSION["secondAttack"]);
	$statement->execute();
}
catch (Exception $ex){
	echo "Error with DB. Details: $ex";
	die();
}

?>



<p>This link will take you to a page that will display to you all the users with pokemon in my database</p>
<a href="database02.php">Users</a>
<p>This link will take you to a page that will display to you all the pokemon that are currently stored in my database</p>
<a href="database03.php">Pokemon</a>
<p>This link will take you to a page that will display the pokemon's ID number and the attacks associated with that pokemon.</p>
<a href="database04.php">Attacks</a>

</body>
</html>
