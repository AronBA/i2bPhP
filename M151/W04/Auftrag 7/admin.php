
<?php
session_start();
if(!isset($_SESSION['user']) || !$_SESSION["admin"]) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}

//Abfrage der Nutzer ID vom Login
$user = $_SESSION['user'];

echo "<h1>Willkommen: " .$user."</h1>";



?>
<html lang="en">
<head>

    <title>admin</title></head>
<body>
<h2>Das hier ist die Admin seite</h2>
<a href="logout.php"> Logout</a>
</body>



</html>
