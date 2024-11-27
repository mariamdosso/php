<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #F5D0FE;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: 400;
            font-size: 16px;
        }
        .cont{
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
        .saisie{
            display: flex;
            flex-direction: column;
            width: 50%;
        }
    </style>
</head>
<body>
<form method="POST" action="" class="cont">
        <div class="saisie">
    
            <label >heur :</label>
            <input type="time" name="heur" id="" required>
        </div>
        <div>
            <button type="submit">Enregistrer</button>
        </div>
    </form> 
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $heur= isset($_POST["heur"]) ? $_POST["heur"] : "";

        // Définir les heures d'ouverture et de fermeture
$heureOuverture = 9;  // 9h00
$heureFermeture = 18; // 18h00

// Obtenir l'heure actuelle en format 24 heures
$heureActuelle = (int)date("H");
var_dump($heureActuelle);
var_dump( $heur);

// Vérifier si le magasin est ouvert ou fermé
if ($heureActuelle >= $heureOuverture && $heureActuelle < $heureFermeture) {
    echo "Le magasin est actuellement ouvert.";
} else {
    echo "Le magasin est actuellement fermé.";
}
    }

?>

</body>
</html>