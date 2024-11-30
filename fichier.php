<?php

$file = 'database/members.json'; 
$file2 = 'test.txt';
$members = [];
$lastname_list = "";
if (file_exists($file)) {
    $data = file_get_contents($file);
    $members = json_decode($data, true) ?? [];
}else {
    mkdir("database");
}
if (file_exists($file2)) {
    $lastname_list = file_get_contents($file2);
    echo "<pre>". ($lastname_list). "</pre>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['cout'], $_POST['montant_payer'], $_POST['genre'])) {
    
    $new_member = [
        'nom' => htmlspecialchars($_POST['nom']),
        'prenom' => htmlspecialchars($_POST['prenom']),
        'date' => htmlspecialchars($_POST['date']),
        'cout' => (int) $_POST['cout'],
        'montant_payer' => (int) $_POST['montant_payer'],
        'genre' => htmlspecialchars($_POST['genre']),
        'solder' => ((int) $_POST['montant_payer'] >= (int) $_POST['cout'])
    ];
        $lastname_list.= $_POST['nom']."\n\n";
    file_put_contents($file2, $_POST['nom'], FILE_APPEND);
   

    $members[] = $new_member;

    file_put_contents($file, json_encode($members, JSON_PRETTY_PRINT));

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$filtered_members = $members;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter'])) {
    $filter = $_POST['filter'];
    if ($filter === 'solder') {
        $filtered_members = array_filter($members, fn($m) => $m['solder']);
    } elseif ($filter === 'non_solder') {
        $filtered_members = array_filter($members, fn($m) => !$m['solder']);
    }
}

if (isset($_GET['empty_list']) && $_GET['empty_list'] === 'true') {
    file_put_contents($file, json_encode([], JSON_PRETTY_PRINT));
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_GET["empty_listing"]) && $_GET["empty_listing"] == true) {
    echo "is ok";
    if(file_exists($file)){
        unlink($file);
        rmdir("database");
        header("Location:http://localhost/PROJET_TEXT/fichier.php");
        exit;
    }
    

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="chal.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" class="container_form">
            <h2 class="fs-1">Veuillez renseigner le formulaire pour ajouter un membre</h2>

            <div class="flex_row space_between">
                <label for="part_name" class="flex_col">
                    <span>Nom :</span>
                    <input type="text" name="nom" id="part_name" required class="input">
                </label>

                <label for="part_lastname" class="flex_col">
                    <span>Prénom :</span>
                    <input type="text" name="prenom" id="part_lastname" required class="input">
                </label>
            </div>

            <div class="flex_row space_between">
                <label for="birthday" class="flex_col">
                    <span>Date de naissance :</span>
                    <input type="date" name="date" id="birthday" required class="input">
                </label>

                <div class="flex_col items_center ml-4">
                    <p>Participation</p>
                    <div class="grid grid-col-2 gap-1">
                        <label class="flex_row gap-1  ">
                            <span>Particulier</span>
                            <input type="radio" name="cout" value="3000" required >
                        </label>
                        <label class="flex_row gap-1   ">
                            <span >Couple</span>
                            <input type="radio" name="cout" value="5000" required  >
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex_row space_between">
                <label for="amount_paid" class="flex_col">
                    <span>Montant payé :</span>
                    <input type="number" name="montant_payer" id="amount_paid" required class="input">
                </label>

                <label for="gender" class="flex_col">
                    <span>Genre :</span>
                    <select name="genre" id="gender" required>
                        <option value="f">Mme/Mlle</option>
                        <option value="m">M.</option>
                    </select>
                </label>
            </div>

            <div class="button_form_1">
                <button type="submit" class="btn">Enregistrer</button>
            </div>
        </form>

        <form action="" method="post" class="member_form flex_col">
            <div class="grid grid-col-3 member_container ">
                <label class="flex_row gap-1">
                    <span class="w-50">Tout</span>
                    <input type="radio" name="filter" value="tout" checked>
                </label>
                <label class="flex_row gap-1">
                    <span class="w-50">Solder</span>
                    <input type="radio" name="filter" value="solder">
                </label>
                <label class="flex_row gap-1">
                    <span class="w-50">Non solder</span>
                    <input type="radio" name="filter" value="non_solder">
                </label>
            </div>
            <div class="flex_row justify-content-end gap-1">
                <button type="submit" class="btn">Filtrer</button>
                <a href="fichier.php?empty_listing=true" class="btn lien-decoration">Vider le tableau</a>
            </div>
            <div class="grid grid-col-2 gap-1">

            <?php foreach ($filtered_members as $member): ?>
                <div class="card flex_col">
                    <?php 
                    if($member["genre"] === "m"){
                    ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="card-icon space_between fs-1" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                </svg>
                <?php } else {?> 

                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="card-icon space_between fs-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4m13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
                </svg>
                <?php }?>

                    <div class="card-body">
                        <span> Civilité : </span><span class="bolder"><?= $member["genre"] === "f" ? "Mme/Mlle" : "M." ?></span> <br>
                        <span>Nom complet :</span> <span class="bolder"><?= $member["nom"] . " " . $member["prenom"] ?></span><br>
                       <span>Âge :</span> <span class="bolder"><?= $member["date"] ?> ans</span><br>
                        <span>Forfait :</span> <span class="bolder"><?= $member["cout"] ?> FCFA</span><br>
                        <span>Acompte :</span><span class="bolder"> <?= $member["montant_payer"] ?> FCFA</span><br>
                        <span>État :</span> <span class="bolder"><?= $member["solder"] ? "Solder" : "Non solder" ?></span><br>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        </form>

    </div>
</body>
</html>

