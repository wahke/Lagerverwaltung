<!DOCTYPE html><html lang="de"><head></head><body>
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

<a href="index.php">Zurück zur Übersicht</a>

</body></html>