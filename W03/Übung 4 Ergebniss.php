<html lang="de">
<head>
    <title>Website</title>
</head>
<body>
<?php

    if (isset($_POST['haarfarbe'])
        && !empty(trim($_POST['haarfarbe']))
        && strlen(trim($_POST['haarfarbe'])) <= 30) {

        $username = htmlspecialchars(trim($_POST['haarfarbe']));
        echo "Deine Haarfarbe ist: " .$username;
    }
    else{
        echo "Error";
    }

?>
</body>
</html>