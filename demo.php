<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #FFEDD5;
        }
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px; 
            border: 1px solid gray;
            width: 20%;
            position: relative;
            left: 600px;
            top: 100px;
        }
        .zone_saisie{
            display: flex;
            flex-direction: column;
            width: 50%;
        }
    </style>
</head>
<body>
    <form method="POST" action="" class="container">
        <div class="zone_saisie">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
    
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
        </div>
        
    </form>
    <?php
        session_start();
        if(!isset($_SESSION["info"])){
            $_SESSION["info"]= [];
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";

            $info = [
                "nom" => $nom,
                "email" => $email
            ];
            $_SESSION["info"][] = $info;
        }
        
    ?>
    <?php
if (!empty($_SESSION["info"])) {
    echo "<h2>Liste des informations</h2>";
    echo "<table border='1'>";
    echo "<tr>
        <th>Nom</th>
        <th>Email</th>
        </tr>";
    foreach ($_SESSION["info"] as $i) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($i["nom"]) . "</td>";
        echo "<td>" . htmlspecialchars($i["email"]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>
 
</body>
</html>

