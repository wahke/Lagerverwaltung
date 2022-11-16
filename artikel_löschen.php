<!DOCTYPE html>
<html lang="de">

<head>
<meta charset="utf-8">
<title>Lagerverwaltung v.16.11.2022 - Neuer Artikel eintragen</title>
<link href="./css/style.css" rel="stylesheet">
</head>
<body>
<?php

//Laden der MYSQL Config + Verbindung Herstellen
include('config/config.php');


//Ausgewählte Datensätze löschen:
for($i=1; $i<=999999; $i++){
    if(isset($_POST["auswahl$i"])){
        $deleteAnweisung = "DELETE FROM material WHERE id=$i";
        $result = mysqli_query($connect, $deleteAnweisung);
        echo "Datensatz mit der ID $i wurde gelöscht. <br>";
    }
}
?>

<input type=button onClick="parent.location='index.php'" value='Zurück'>

</body></html>