<html>
<body>

<?php

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

echo 'Here is a list of the current public.user table: ' . '<br/>';

$statement = $db->query('SELECT username, password FROM public.user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}

$statement = $db->query('SELECT name, level, trainer FROM public.pokemon');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'name: ' . $row['name'] . ' level: ' . $row['level'] . ' trainer#: ' . $row['trainer'] . '<br/>';
}

$statement = $db->query('SELECT pokemon_id, attack1, attack2 FROM public.attacks');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'Pokemon ID: ' . $row['pokemon_id'] . ' attack 1: ' . $row['attack1'] . ' attack 2: ' . $row['attack2'] . '<br/>';
}



?>

<p>The purpose of this database is to store pokemon for trainers online. In it's current state, the user cannot enter in data and search, but I have provided links for you to see the progress of the database. I have entered in some data into it already.</p>

<br><br>

<p>This link will take you to a page that will display to you all the users with pokemon in my database</p>
<a href="database02.php">Users</a>
<p>This link will take you to a page that will display to you all the pokemon that are currently stored in my database</p>
<a href="database03.php">Pokemon</a>
<p>This link will take you to a page that will display the pokemon's ID number and the attacks associated with that pokemon.</p>
<a href="database04.php">Attacks</a>

</body>
</html>
