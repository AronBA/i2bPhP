<?php

session_start();
$_SESSION = [];
session_destroy();

echo "Logout erfolgreich";
?>
Hier gehts zum <a href="index.php"> login</a>!
