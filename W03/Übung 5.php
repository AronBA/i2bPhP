<html lang="de">
<head>
    <title>Website</title>
</head>
<body>
<form action="" method="post">
    <p>Gib zahl ein:</p>
    <label for "haarfarbe">Ihre Zahlen</label>
    <input type="text" name="zahl1"  id="zahl1" />
    <input type="text" name="zahl2"  id="zahl2" />
    <input type = "submit" name="submit" >
    <br>
    <?php

    if (isset($_POST['submit'])) {
        $zahl1 = $_POST['zahl1'];
        $zahl2 = $_POST['zahl2'];
        $summe = $zahl2 + $zahl1;
        $produkt = $zahl2 * $zahl1;
        echo "Wenn man ".$zahl1." und ".$zahl2." addiert, erhält man ".$summe.". Wenn man die beiden Zahlen multipliziert, erhält man ".$produkt;

    }
    ?>
</form>
</body>
</html>