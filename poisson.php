<!doctype html>
<html>
    <head>
<title>CHOIX DE POISSON</title>
    </head>
    <body>
        <form action="" method="POST">
        <label for="cape">cape:</label>
            <input type="checkbox" name="choix[]" value="cape"><br><br>
            <label for="cape rouge">cape rouge:</label>
            <input type="checkbox" name="choix[]" value="cape rouge"><br><br>
            <label for="belle dame">belle dame:</label>
            <input type="checkbox" name="choix[]" value="belle dame"><br><br>
            <label for="marquereau">marquereau:</label>
            <input type="checkbox" name="choix[]" value="marquereau"><br><br>
        <input type="submit" value="choisir">
        </form>
        <?php
        var_dump($_POST);
if (isset($_POST['choix'])) {
    $choix = $_POST['choix'];

    echo "Vous avez sélectionné les poissons suivante : <br>";
    foreach ($choix as $choi) {
        echo htmlspecialchars($choi) . "<br>";
    }
} else {
    echo "Aucun poisson n'a ete selectionnee.";
}
?>
    </body>
    </html>