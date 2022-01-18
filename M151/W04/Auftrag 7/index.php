<?php
session_start();
//Datenbankverbindung
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

$error = '';
$message = '';


// Formular wurde gesendet und Besucher ist noch nicht angemeldet.
if(isset($_SESSION['login']) && $_SESSION["admin"]){
    header("location: admin.php");

} else if (isset($_SESSION['login'])){
    header("location: user.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)){
    // username
    if(!empty(trim($_POST['username']))){

        $username = trim($_POST['username']);

        // prüfung benutzername
        if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}/", $username) || strlen($username) > 30){
            $error .= "Der Benutzername entspricht nicht dem geforderten Format.<br />";
        }
    } else {
        $error .= "Geben Sie bitte den Benutzername an.<br />";
    }
    // password
    if(!empty(trim($_POST['password']))){
        $password = trim($_POST['password']);

        // passwort gültig?
        if(!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)){
            $error .= "Das Passwort entspricht nicht dem geforderten Format.<br />";
        }
    } else {
        $error .= "Geben Sie bitte das Passwort an.<br />";
    }

    // kein fehler
    if(empty($error)){
        // query
        $query = "SELECT username, password, admin from users where username = ?";
        // query vorbereiten
        $stmt = $mysqli->prepare($query);
        if($stmt===false){
            $error .= 'prepare() failed '. $mysqli->error . '<br />';
        }
        // parameter an query binden
        if(!$stmt->bind_param("s", $username)){
            $error .= 'bind_param() failed '. $mysqli->error . '<br />';
        }
        // query ausführen
        if(!$stmt->execute()){
            $error .= 'execute() failed '. $mysqli->error . '<br />';
        }
        // daten auslesen
        $result = $stmt->get_result();
        // benutzer vorhanden
        if($result->num_rows){
            // userdaten lesen
            $row = $result->fetch_assoc();
            // passwort prüfen
            if( password_verify($password, $row["password"])){
                $message .= "Sie sind nun eingeloggt";
                $_SESSION['user'] = $username;
                if ($row["admin"]){
                    $_SESSION["admin"] = true;
                } else {
                    $_SESSION["admin"] = false;
                }

                if ($_SESSION["admin"] == true){
                    header('Location: admin.php');
                } else {
                    header('Location: user.php');
                }


                // benutzername oder passwort stimmen nicht,
            } else {
                $error .= "Benutzername oder Passwort sind falsch";
            }
        } else {
            $error .= "Benutzername oder Passwort sind falsch";
        }
    }
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
    <h1>Home</h1>
    <p>
        Willkommen auf der Useless Website!
    </p>
    <?php
    // fehlermeldung oder nachricht ausgeben
    if(!empty($message)){
        echo "<div class=\"alert alert-success\" role=\"alert\">" . $message . "</div>";
    } else if(!empty($error)){
        echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error . "</div>";
    }
    ?>
    <button type="button" name="button" value="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">login</button>
    <button type="button" name="button" value="submit" class="btn btn-info btn-lg" data-toggle="modal" href="reg.php"><a style="link: none" href="../reg.php">registierung</a></button>



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Info</h4>
                </div>
                <div class="modal-body">
                    <p><form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Benutzername *</label>
                            <input type="text" name="username" class="form-control" id="username"
                                   value=""
                                   placeholder="Gross- und Keinbuchstaben, min 6 Zeichen."
                                   maxlength="30" required="true"
                                   pattern="(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}"
                                   title="Gross- und Keinbuchstaben, min 6 Zeichen.">
                        </div>
                        <!-- password -->
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Gross- und Kleinbuchstaben, Zahlen, Sonderzeichen, min. 8 Zeichen, keine Umlaute"
                                   pattern="(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                                   title="mindestens einen Gross-, einen Kleinbuchstaben, eine Zahl und ein Sonderzeichen, mindestens 8 Zeichen lang,keine Umlaute."
                                   required="true">
                        </div>
                        <button type="submit" name="button" value="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Senden</button>
                        <button type="reset" name="button" value="reset" class="btn btn-warning">Löschen</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>

