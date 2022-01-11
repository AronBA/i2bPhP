<?php
//verbindung zur Datenbank Auslagern
$host = 'localhost';
$database = 'm151';
$username = 'user';
$password = 'pw';

// mit datenbank verbinden
$mysqli = new mysqli($host, $username, $password, $database);

// fehlermeldung, falls die Verbindung fehl schlägt.
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_error . ') '. $mysqli->connect_error);
}

// Initialisierung
$error = $message =  '';
$firstname = $lastname = $email = $username = '';


$query = "SELECT firstname, lastname,username, password, email from m151.users";
// query vorbereiten
$stmt = $mysqli->prepare($query);
if($stmt===false){
    $error .= 'prepare() failed '. $mysqli->error . '<br />';
}
// parameter an query binden

// query ausführen
if(!$stmt->execute()){
    $error .= 'execute() failed '. $mysqli->error . '<br />';
}
$result = $stmt->get_result();

if($result->num_rows) {
// userdaten lesen
    $row = $result->fetch_assoc();
}


?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<table class="table table-striped" >
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th scope="col">E-Mail</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
    foreach($result as $row){
        $count++;

            $vorname = $row['firstname'];
            $nachname = $row['lastname'];
            $username = $row['username'];
            $password = $row['password'];
            $email = $row['email'];

            echo "
            <tr>
            <th scope='row'>$count</th>
            <td>$vorname</td>
            <td>$nachname</td>
            <td>$username</td>
            <td>$password</td>
            <td>$email</td>
            </tr>
            ";


    }
    ?>
    </tbody>
</table>




</body>
</html>
