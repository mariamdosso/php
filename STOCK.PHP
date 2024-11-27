<?php
/*Connexion à la base de données
$host = 'localhost';
$dbname = 'nom_de_votre_base';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

Filtrer les transactions par date si les dates sont fournies
$date_debut = isset($_GET['date_debut']) ? $_GET['date_debut'] : null;
$date_fin = isset($_GET['date_fin']) ? $_GET['date_fin'] : null;

$sql = "SELECT * FROM transactions WHERE 1";

if ($date_debut && $date_fin) {
    $sql .= " AND date_transaction BETWEEN :date_debut AND :date_fin";
}

$stmt = $conn->prepare($sql);

if ($date_debut && $date_fin) {
    $stmt->bindParam(':date_debut', $date_debut);
    $stmt->bindParam(':date_fin', $date_fin);
}

$stmt->execute();
$transactions = $stmt->fetchAll();

*/?>
if (isset($_GET['chiffre']) && $_GET['chiffre'] > $adeviner){ ?>
    votre chiffre est trop grand 
    <?php } elseif (isset($_GET['chiffre']) && $_GET['chiffre'] < $adeviner){ ?>
    votre chiffre est trop petit
<?php } else{ ?>
    bravo vous avez deviner le chiffre <?= $adeviner ?>
    <?php } ?>
    
<form action="" method="Get">
<div class="form-group">
  <input type="checkbox" name="parfum[]" value="fraise">fraise<br>
  <input type="checkbox" name="parfum[]" value="vanille">vanille<br>
  <input type="checkbox" name="parfum[]" value="chocolat">chocolat<br>
</div>
  <input type= "number"  name= "chiffre"  placeholder= "entre 0 et 1000">
  <input type= "text" name="demo" value="test">
  <button type= "submit">deviner</button>
</form>