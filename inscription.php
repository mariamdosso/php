<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="inscrip.css">
    <title>Enregistrement des transactions</title>
</head>
<body>
                   <form method="GET" action="inscription.php">
                          <label for="montant">Montant :</label>
        <input type="number" step="0.01" name="montant" required><br><br>

        <label for="operateur">Operateur :</label>
        <select name="choix" id="choix">
        <option value="WAVE">WAVE</option>
        <option value="MTN">MTN</option>
        <option value="ORANGE MONEY">ORANGE MONEY</option>
        <option value="MOOV">MOOV</option>
        <input type="text" name="operateur" ><br><br>
    </select>
        <label for="date_transaction">Date  :</label>
        <input type="date" name="date_transaction" required ><br><br>
        <label for="LISTE_D'OPERAtION" >TYPE D'OPERATION :</label>
        <select>
        <option value="RETRAIT">RETRAIT</option>
        <option value="DEPOT">DEPOT</option>
        <input type="TEXTE" name="TYPE D'OPERAtION" required><br><br>
        </select>

        <input class="st" type="submit" value="ENREGISTRER"><br><br> 
    </form>

    <form method="GET" action="liste_transactions.php">
        <label for="date_debut">Date  :</label>
        <input type="Date" name="date_debut"><br><br>
        <input type="submit" value="Filtrer">
    </form>
    <table border="3">
        <tr>
            <th>date</th>
            <th>operateur</th>
            <th>montant</th>
            <th>type d'operation</th>
        </tr>
        <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td><?php echo $transaction['date']; ?></td>
            <td><?php echo $transaction['operateur']; ?></td>
            <td><?php echo $transaction['montant']; ?></td>
            <td><?php echo $transaction['type d operation']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>





    

