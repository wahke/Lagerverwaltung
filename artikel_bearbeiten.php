<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<title>Lagerverwaltung v.16.11.2022 - Artikel bearbeiten</title>
<link href="./css/style.css" rel="stylesheet">
</head>
<body>
<h1>Ausgewählten Datensatz bearbeiten</h1>

<?php

//Laden der MYSQL Config + Verbindung Herstellen
include('config/config.php');



// 2. Prüfe Radio-Button-Auswahl
if(isset($_POST["auswahl"])){

    // 3. Datenbankabfrage starten
    $id = $_POST["auswahl"];
    $abfrage = "SELECT * FROM material WHERE id = $id";
    $result = mysqli_query($connect, $abfrage);

    // 4. Datensatz in Variablen speichern
    $dsatz = mysqli_fetch_assoc($result);
    $artikel = $dsatz["artikel"];
    $lager_schrank = $dsatz["lager_schrank"];
    $lagerplatz = $dsatz["lagerplatz"];
	$lagerbestand = $dsatz["lagerbestand"];

    // 5. Das Bearbeiten-Formular anzeigen
    echo "<form action='artikel_bearbeiten.php' method='post'>";
    echo "<input name='id' type='hidden' value='$id'>";
	echo "<table>";
	echo "<tr><td>Name des Artikels:</td><td><b>" . $dsatz["artikel"] . "</b></td>
  </tr>";

	echo"  <tr>
    <td>Wo liegt der Artikel : </td>
    <td><select name='lager_schrank'>
	    <option value='Lager 1'>Lager 1</option>
	    <option value='Lager 2'>Lager 2</option>
		<option value='Schrank 1'>Schrank 1</option>
		<option value='Schrank 2'>Schrank 2</option>
		<option value='Keller 1'>Keller 1</option>
	   </select></td>
  </tr>";

	echo "   <tr>
    <td>Lagerplatz : </td>
    <td><select name='lagerplatz'>
	    <option value='Schublade 1'>Schublade 1</option>
	    <option value='Schublade 2'>Schublade 2</option>
		<option value='Schublade 3'>Schublade 3</option>
		<option value='Schublade 4'>Schublade 4</option>
		<option value='Schublade 5'>Schublade 5</option>
		<option value='Schublade 6'>Schublade 6</option>
		<option value='Boden 1'>Boden 1</option>
		<option value='Boden 2'>Boden 2</option>
		<option value='Boden 3'>Boden 3</option>
		<option value='Boden 4'>Boden 4</option>
		<option value='Boden 5'>Boden 5</option>
	   </select></td>
  </tr>";

    echo "<tr>
    <td>Lagerbestand : </td>
    <td><input name='lagerbestand' value='$lagerbestand'></td></tr>";
	echo "</table>";
    echo "<br><input name='bearbeitungAbschicken' value='Bearbeitung abschließen' type='submit'>";
    echo "</form>";

    echo "<br><input type=button onClick=\"parent.location='index.php'\" value='Zurück'>";
}















//6. Datensatz aktualisieren mit UPDATE
if(isset($_POST["bearbeitungAbschicken"])){
    $id = $_POST["id"];
    $lager_schrank = $_POST["lager_schrank"];
    $lagerplatz = $_POST["lagerplatz"];
	$lagerbestand = $_POST["lagerbestand"];

//String für Update-Anweisung erstellen
$update = "UPDATE material SET
lager_schrank ='$lager_schrank',
lagerplatz ='$lagerplatz',
lagerbestand ='$lagerbestand'
WHERE id = $id";

//MySQL-Anweisung ausführen
    mysqli_query($connect, $update);

    echo "Datensatz bearbeitet.<br><br>";
    echo "<input type=button onClick=\"parent.location='index.php'\" value='Zurück'>";
}

//Wenn der Nutzer in buecher.php keine Auswahl getroffen hat:
if(!isset($_POST["auswahl"]) && !isset($_POST["bearbeitungAbschicken"])){
    echo "Es wurde kein Datensatz ausgewählt.<br><br>";
    echo "<input type=button onClick=\"parent.location='index.php'\" value='Zurück'>";
}

?>

</body></html>
