<?php

session_start();
$_SESSION = [];
session_destroy();

echo "Logout erfolgreich";
?>
Hier gehts zum <a href="login.php"> login</a>!
