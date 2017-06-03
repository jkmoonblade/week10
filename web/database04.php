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

<h1>Current Attacks of Pokemon</h1>
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

$statement = $db->query('SELECT pokemon_id, attack1, attack2 FROM public.attacks');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'Pokemon ID: ' . $row['pokemon_id'] . '<br/>' . ' Attack 1: ' . $row['attack1'] . '<br/>' . ' Attack 2: ' . $row['attack2'] . '<br/>' . '<br/>';
}

?>

<a href="database01.php">Return to Home</a>

</body>
</html>