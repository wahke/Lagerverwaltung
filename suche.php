<html><head><meta charset="UTF-8"></head><body>




<h1>Ländersuche nach Einwohnern</h1>
<form action="suche.php" method="post">



<p>Scannen Sie den Barcode : <input name="gescant"></p>

<input type="submit" value="Suche starten">

</form>
<?php

//Laden der MYSQL Config + Verbindung Herstellen
include('config/config.php');



$eingabe = $_POST["gescant"];

//SQL-Abfrage-String generieren
$abfrage = "SELECT * FROM material WHERE barcode <= $eingabe";

//SQL-Abfrage ausführen
$result = mysqli_query($connect, $abfrage);

//Ergebnis am Bildschirm ausgeben
echo  "<h1>Auflisten des Artikels</h1>";
while($dsatz = mysqli_fetch_assoc($result)) {
   echo $dsatz["barcode"] . ": ";
   echo $dsatz["artikel"] . "<br>";
}

// Verbindung trennen:
mysqli_close($connect);

?>


<a href="index.php">Zurück zur Übersicht</a>
</body></html>

