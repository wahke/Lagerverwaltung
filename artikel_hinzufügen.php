<!DOCTYPE html><html lang="de"><head>
<meta charset="UTF-8">
<title>Neuer Artikel eintragen</title>
<?php
    if(isset($_POST["neuerartikel"])){

//Laden der MYSQL Config + Verbindung Herstellen
include('config/config.php');



    //Nutzereingabe in Variablen speichern
    $barcode = $_POST["barcode"];
    $artikel = $_POST["artikel"];
    $lager_schrank = $_POST["lager_schrank"];
    $lagerplatz = $_POST["lagerplatz"];
	$einheit = $_POST["einheit"];
	$lagerbestand = $_POST["lagerbestand"];
	$kategorie = $_POST["kategorie"];
	$bereich = $_POST["bereich"];
	$material = $_POST["material"];
	

    // String für SQL-Anweisung erstellen
    $insertString = "INSERT INTO material (id, barcode, artikel, lager_schrank, lagerplatz, einheit, lagerbestand, kategorie, bereich, material) 
	VALUES (NULL, '$barcode', '$artikel', '$lager_schrank', '$lagerplatz', '$einheit', '$lagerbestand', '$kategorie', '$bereich', '$material');";

    // SQL-Anweisung durchführen
    $check = mysqli_query($connect, $insertString);

    if($check) {
        echo "Ein neuer Datensatz erfolgreich hinzugefügt";
    }}
?>

</head><body>

<h1>Neuer Artikel eintragen</h1>

<form action="artikel_hinzufügen.php" method="post">

<table>
  <tr>
    <td>Barcode eintragen : </th>
    <td><input name="barcode" value="A-00"></th>
  </tr>
  <tr>
    <td>Artikel : </td>
    <td><input name="artikel"></td>
  </tr>
  <tr>
    <td>Wo liegt der Artike : </td>
    <td><select name="lager_schrank">
	    <option value="Lager 1">Lager 1</option>
	    <option value="Lager 2">Lager 2</option>
		<option value="Schrank 1">Schrank 1</option>
		<option value="Schrank 2">Schrank 2</option>
		<option value="Keller 1">Keller 1</option>
	   </select></td>
  </tr>
  <tr>
    <td>Lagerplatz : </td>
    <td><select name="lagerplatz">
	    <option value="Schublade 1">Schublade 1</option>
	    <option value="Schublade 2">Schublade 2</option>
		<option value="Schublade 3">Schublade 3</option>
		<option value="Schublade 4">Schublade 4</option>
		<option value="Schublade 5">Schublade 5</option>
		<option value="Schublade 6">Schublade 6</option>
		<option value="Boden 1">Boden 1</option>
		<option value="Boden 2">Boden 2</option>
		<option value="Boden 3">Boden 3</option>
		<option value="Boden 4">Boden 4</option>
		<option value="Boden 5">Boden 5</option>
	   </select></td>
  </tr>
  <tr>
    <td>Einheit : </td>
    <td><select name="einheit">
	    <option value="Stück">Stück</option>
	    <option value="Meter">Meter</option>
		<option value="Packung">Packung</option>
	   </select></td>
  </tr>
  <tr>
    <td>Aktuelle Lagerbestand : </td>
    <td><input name="lagerbestand"></td>
  </tr>
  <tr>
    <td>Kategorie : </td>
    <td><select name="kategorie">
	    <option value="Bohrer">Bohrer</option>
	    <option value="Gewindeschneider">Gewindeschneider</option>
		<option value="Gewindestange">Gewindestange</option>
	   </select></td>
  </tr>
  <tr>
    <td>Bereich : </td>
    <td><input name="bereich"></td>
  </tr>
  <tr>
    <td>Material : </td>
    <td><input name="material"></td>
  </tr>
</table>

    <p><input type="submit" name="neuerartikel" value="Artikel eintragen"> <input type="reset"></p>

</form>

<a href="index.php">Zurück zur Übersicht</a>

</body></html>
