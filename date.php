<?Php 

    date_default_timezone_set("Africa/Abidjan");

    $time = time();

    echo " l'heure actuelle est :",$time, "<br>";

    $date = date("d M Y");
    echo " la date actuelle est :",$date, "<br>";

    $date = date("d M Y G:i e", $time);
    echo " la date et l'heur actuelle est :",$date, "<br>";
 
$datestring = "2024-11-20"; // Assurez-vous que la chaîne est valide

$dateObject = date_create($datestring);
echo "<pre>". print_r($dateObject,true) ."</pre>" ;
echo date_format($dateObject, "D, d M Y");


// if ($dateObject !== false) {
    
//     echo "<pre>", print_r($dateObject, true), "</pre>";

//     echo date_format($dateObject, "D, d M Y "), "<br>"; // Exemple : Wed, 20 Nov 2024
//     echo date_format($dateObject, "l, jS F Y"), "<br>"; // Exemple : Wednesday, 20th November 2024
//     echo date_format($dateObject, DATE_ATOM), "<br>";   // Format ISO 8601
//     echo date_format($dateObject, DATE_COOKIE), "<br>"; 
//     echo date_format($dateObject, DATE_ATOM), "<br>"; 
// } else {
    
//     echo "Erreur : La chaîne de date '$datestring' est invalide.";
// }
?>


