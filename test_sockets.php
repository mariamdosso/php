<?php
// Démarrer la session pour conserver les informations entre chaque soumission
session_start();

// Initialiser le tableau des utilisateurs dans la session si ce n'est pas encore fait
if (!isset($_SESSION["utilisateurs"])) {
    $_SESSION["utilisateurs"] = [];
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire en utilisant les bons noms de champs
    $nom = isset($_POST["name"]) ? $_POST["name"] : ""; 
    $prenom = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";

    // Créer un tableau associatif pour un utilisateur
    $utilisateur = [
        "nom" => $nom,
        "prenom" => $prenom,
        "email" => $email,
        "message" => $message
    ];

    // Ajouter cet utilisateur au tableau des utilisateurs stocké en session
    $_SESSION["utilisateurs"][] = $utilisateur;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
    <link rel="stylesheet" href="socket.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<h2>Formulaire de Contact</h2>
<form method="POST" action="">
    <div class="container">
        <div>
            <label for="name">Nom :</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label for="lastname">Prenom:</label><br>
            <input type="text" id="lastname" name="lastname" required><br><br>
        </div>
        <div class="mail">
            <label for="email">E-mail :</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="message">Message :</label><br>
            <textarea id="message" name="message" rows="4" cols="50" ></textarea><br><br>
        </div>
        <div  class="button">
            <input type="submit" value="Envoyer" width="400" class="button-color">
        </div>
    </div>
</form>

<?php
if (!empty($_SESSION["utilisateurs"])) {
    echo "<h2>Liste des utilisateurs</h2>";
    echo "<table border='1'>";
    echo "<tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Message</th>
        </tr>";

    foreach ($_SESSION["utilisateurs"] as $u) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($u["nom"]) . "</td>";
        echo "<td>" . htmlspecialchars($u["prenom"]) . "</td>";
        echo "<td>" . htmlspecialchars($u["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($u["message"]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>