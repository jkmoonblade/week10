<html>
<title>Pokemon Database</title>
<style>
body {
	background-image: url("http://www.powerpointhintergrund.com/uploads/2017/05/simple-background-reprise-by-hexdef101-on-deviantart-11.png");
	margin-right: 50px;
    margin-left: 50px;
}

h1, h2 {
	text-align: center;
}
</style>
<body>

<h1>Current Users</h1>
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

echo 'Here is a list of the current public.user table: ' . '<br/>';

$statement = $db->query('SELECT username, password FROM public.user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'User: ' . $row['username'] . '<br/>' . ' Password: ' . $row['password'] . '<br/>' . '<br/>';
}

?>

<a href="database01.php">Return to Home</a>

</body>
</html>