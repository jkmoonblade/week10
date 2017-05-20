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

$statement = $db->query('SELECT name, level, trainer FROM public.pokemon');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'name: ' . $row['name'] . ' level: ' . $row['level'] . ' trainer#: ' . $row['trainer'] . '<br/>';
}

?>

<a href="database01.php">Return to Home</a>

</body>
</html>