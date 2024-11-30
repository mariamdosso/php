
<?php

$file = 'test.json'; 
$articles = [];
if (file_exists($file)) {
    $data = file_get_contents($file);
    $articles = json_decode($data, true) ?? [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['nombre'], $_POST['amount'], $_POST['date'])) {
    
    $new_article = [
        'nom' => htmlspecialchars($_POST['nom']),
        'nombre' => htmlspecialchars($_POST['nombre']),
        'amount' => htmlspecialchars($_POST['amount']),
        'date' => (int) $_POST['date'],
    ];
   
    $articles[] = $new_article;

    file_put_contents($file, json_encode($articles, JSON_PRETTY_PRINT));

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['empty_list']) && $_GET['empty_list'] === 'true') {
    file_put_contents($file, json_encode([], JSON_PRETTY_PRINT));
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sup.css">
</head>
<body>
    <div class="container gap-1">
        <form action="" method="post" class="container_form">
            <h2 >Veuillez renseigner le formulaire pour enregistrer un achat</h2>

            <div class="flex_col space_beetween">
                <label for="article_name" >
                    <span>Nom de l'article:</span>
                    <input type="text" name="nom" id="article_name" required class="input">
                </label>

                <label for="article_number">
                    <span>nombre d'articles :</span>
                    <input type="number" name="nombre" id="article_number" required class="input">
                </label>

                <label for="amount">
                    <span>cout :</span>
                    <input type="number" name="amount" id="amount" required class="input">
                </label>
           

            
                <label for="by_date" >
                    <span>Date de l'achat :</span>
                    <input type="date" name="date" id="by_date" required class="input">
                </label>

            </div>

            <div class="btn">
                <button type="submit" class="btn">Enregistrer</button>
            </div>
        </form>

    </div>
</body>
</html>