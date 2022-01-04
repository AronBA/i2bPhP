<?php

// Initialisierung
$error = '';
$firstname = $lastname = $email = $username = '';

// Wurden Daten mit "POST" gesendet?
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Ausgabe des gesamten $_POST Arrays
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if(isset($_POST['submit'])) {


        if (isset($_POST['firstname'])
            && !empty(trim($_POST['firstname']))
            && strlen(trim($_POST['firstname']) < 31)) {

            $firstname = htmlspecialchars(trim($_POST['firstname']));
        } else {
            $error .= "firstname falsch gemacht";
        }
        if (isset($_POST['lastname'])
            && !empty(trim($_POST['lastname']))
            && strlen(trim($_POST['lastname']) < 31)) {

            $firstname = htmlspecialchars(trim($_POST['lastname']));
        } else {
            $error .= "lastname falsch gemacht";
        }
        if (isset($_POST['email'])
            && !empty(trim($_POST['email']))
            && strlen(trim($_POST['email']) < 101)) {

            $firstname = htmlspecialchars(trim($_POST['email']));
        } else {
            $error .= "email falsch gemacht";
        }
        if (isset($_POST['username'])
            && !empty(trim($_POST['username']))
            && strlen(trim($_POST['username']) < 31)) {

            $firstname = htmlspecialchars(trim($_POST['username']));
        } else {
            $error .= "username falsch gemacht";
        }
        if (isset($_POST['password'])
            && !empty(trim($_POST['password']))
            && strlen(trim($_POST['password']) < 256)) {

            $firstname = htmlspecialchars(trim($_POST['password']));
        } else {
            $error .= "password falsch gemacht";
        }
    }
    // TODO: Serverseitige Validierung: lastname analog firstname
    // TODO: Serverseitige Validierung: email analog firstname
    // TODO: Serverseitige Validierung: username analog firstname
    // TODO: Serverseitige Validierung: password analog firstname
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrierung</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <h1>Registrierung</h1>
    <p>
        Bitte registrieren Sie sich, damit Sie diesen Dienst benutzen können.
    </p>
    <?php
    // Ausgabe der Fehlermeldungen
    if(strlen($error)){
        echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error . "</div>";
    }
    ?>
    <form action="" method="post">
        <!-- TODO: Clientseitige Validierung: vorname -->
        <div class="form-group">
            <label for="firstname">Vorname *</label>
            <input type="text" name="firstname" class="form-control" id="firstname"
                   value="<?php echo $firstname ?>"
                   placeholder="Geben Sie Ihren Vornamen an.">
        </div>
        <!-- TODO: Clientseitige Validierung: nachname -->
        <div class="form-group">
            <label for="lastname">Nachname *</label>
            <input type="text" name="lastname" class="form-control" id="lastname"
                   value="<?php echo $lastname ?>"
                   placeholder="Geben Sie Ihren Nachnamen an">
        </div>
        <!-- TODO: Clientseitige Validierung: email -->
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" name="email" class="form-control" id="email"
                   value="<?php echo $email ?>"
                   placeholder="Geben Sie Ihre Email-Adresse an.">
        </div>
        <!-- TODO: Clientseitige Validierung: benutzername -->
        <div class="form-group">
            <label for="username">Benutzername *</label>
            <input type="text" name="username" class="form-control" id="username"
                   value="<?php echo $username ?>"
                   placeholder="Gross- und Keinbuchstaben, min 6 Zeichen.">
        </div>
        <!-- TODO: Clientseitige Validierung: password -->
        <div class="form-group">
            <label for="password">Password *</label>
            <input type="password" name="password" class="form-control" id="password"
                   placeholder="Gross- und Kleinbuchstaben, Zahlen, Sonderzeichen, min. 8 Zeichen, keine Umlaute">
        </div>
        <button type="submit" name="button" value="submit" class="btn btn-info">Senden</button>
        <button type="reset" name="button" value="reset" class="btn btn-warning">Löschen</button>
    </form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>