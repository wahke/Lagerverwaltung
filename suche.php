<?php
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<title>Lagerverwaltung v.16.11.2022 - Artikel Suchen</title>
<link href="./css/style.css" rel="stylesheet">
</head>
<body>


<h1>Artikelsuche:</h1>
<form action="suche.php" method="post">



<p>Scannen Sie den Barcode : <input autofocus name="gescant" maxlength="9"></p>

<input type="submit" value="Suche starten">

</form>
<?php

//Laden der MYSQL Config + Verbindung Herstellen
include('config/config.php');



$eingabe = $_POST["gescant"];

//SQL-Abfrage-String generieren
$abfrage = "SELECT * FROM material WHERE barcode='$eingabe'";

//SQL-Abfrage ausführen
$result = mysqli_query($connect, $abfrage);

//Ergebnis am Bildschirm ausgeben
echo  "<h1>Auflistung des Artikels</h1>";
while($dsatz = mysqli_fetch_assoc($result)) {
	
	echo "<table>";
	echo "<tr><td>Name des Artikels:</td><td><b>" . $dsatz["artikel"] . "</b></td>  </tr>";
    echo "<tr><td>Wo liegt der Artikel:</td><td>" . $dsatz["lager_schrank"] . " - " . $dsatz["lagerplatz"] .  "</td></tr>";
    echo "<tr><td>Es gibt noch </td><td>" . $dsatz["lagerbestand"] . " "  . $dsatz["einheit"] . "</td><tr>" ;
    echo "<table>";
}

// Verbindung trennen:
mysqli_close($connect);

?>
<br>
<!--<p>
<input type="submit" name="bearbeiten" formaction="artikel_bearbeiten.php" value="ausgewählten Datensatz bearbeiten">
</p>-->
<br>
<input type=button onClick="parent.location='index.php'" value='Zurück'>
</body></html>
