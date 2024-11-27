
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="acquis.css">
</head>
<body>
        <form action="" method="POST">
       
            <div class="container">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="" required>

                <label >prenom :</label>
                <input type="text" name="prenom" id="" required>

                <label > annee d'adhesion :</label>
                <input type="date" name="annee" id="" required>

                <label >age :</label>
                <input type="number" name="age" id="" required>

                <label for="">identifiant :</label>
                <input type="text" name="identifiant"  required>

                <label for="">genre :</label>
                <input type="text" name="genre"  required>
                <div>
                    <button type="submit">Enregistrer</button>
                </div>
         </div>  
     </form>
    <?php
        session_start();
        // $_SESSION["utilisateur"]= [];
        // session_destroy();
        if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["annee"]) && isset($_POST["age"]) && isset($_POST["identifiant"]) && isset($_POST["genre"])){
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $annee = $_POST["annee"];
            $age = $_POST["age"];
            $identifiant = $_POST["identifiant"];
            $genre = $_POST["genre"];
    

            $utilisateur = [
                "nom" => $nom,
                "prenom" => $prenom,
                "annee" => $annee,
                "age" => $age,
                "identifiant" => $identifiant,
                "genre" => $genre
            ];
            $_SESSION["utilisateurs"][] = $utilisateur;

            foreach ($_SESSION["utilisateurs"] as $p) {
            ?>
                <div class="card">
                <?php if($p["genre"] == "f"){  ?>
                    <img src="femme.png" alt="">
                    
                <?php   }else {  ?>
                    <img src="homme.jpg" alt="">
                    <?php }  ?>

                    nom : <?= htmlspecialchars($p["nom"]) ;?><br> ;
                    prenom : <?= htmlspecialchars( $p["prenom"]) ;?><br> ;
                    annee :  <?= htmlspecialchars($p["annee"]) ;?> <br> ;
                    age :  <?= htmlspecialchars( $p["age"]) ;?> <br>;
                    identifiant : <?= htmlspecialchars( $p["identifiant"]) ;?> <br> ;
                    genre : <?= htmlspecialchars( $p["genre"]) ;?> <br> ;
                </div>
                 <?php
            }
        } 
    ?>
</body>
</html>
