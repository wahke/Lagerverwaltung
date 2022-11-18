<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}
//Laden der MYSQL Config + Verbindung Herstellen
include('config/config.php');

header("Refresh:10");
?>

<!DOCTYPE html><html lang="de">
<head>
<meta charset="utf-8">
<title>Lagerverwaltung v.<?php echo $version; ?> - Home</title>
<link href="./css/style.css" rel="stylesheet">
</head>
<body>
<!-- Das Eingabeformular: -->
<h2>Aktionen:</h2>

<p>
<input type="submit" name="eintragen" formaction="artikel_hinzufügen.php" value="Neuer Artikel eintragen">  |  <input type="submit" name="bearbeiten" formaction="artikel_bearbeiten.php" value="ausgewählten Datensatz bearbeiten">  |  <input type="submit" name="löschen" formaction="artikel_löschen.php" value="ausgewählte Datensätze löschen">  |  <input type="submit" name="suchen" formaction="suche.php" value="Artikel suchen">
</p>

<p>
<input type="submit" name="logout" formaction="logout.php" value="Logout">
</p>

<h1><p>Material Liste:</p></h1>


<?php


// Anzeige aller Datensätze der Tabelle
$abfrage = "SELECT * FROM material";

$result = mysqli_query($connect, $abfrage);

echo "<table border='1' cellpadding='5'>
      <tr>
      <th>Editieren</th>
      <th>Löschen</th>
      <th>ID</th>
      <th>Barcode</th>
      <th>Artikel</th>
      <th>Lager / Schrank</th>
      <th>Lagerplatz</th>
	  <th>Lagerbestand</th>
	  <th>Einheit</th>
	  <th>Kategorie</th>
	  <th>Bereich</th>
	  <th>Material</th>
	  <th>Etikette Drucken</th>
      </tr>";
echo "<form method='post'>";
while($dsatz = mysqli_fetch_assoc($result)){
    echo "<tr>";
    $id = $dsatz["id"];

    echo "<td><input type='radio' name='auswahl' value='$id'></td>" .
         "<td><input type='checkbox' name='auswahl$id' value='$id'></td>" .

         "<td>" . $dsatz["id"] . "</td>" .
         "<td>" . $dsatz["barcode"] ."</td>" .
         "<td>" . $dsatz["artikel"] . "</td>" .
         "<td>" . $dsatz["lager_schrank"] . "</td>" .
		 "<td>" . $dsatz["lagerplatz"] . "</td>" .
		 "<td align=right><b>" . $dsatz["lagerbestand"] . "</b></td>" .
         "<td>" . $dsatz["einheit"] . "</td>" .
		 "<td>" . $dsatz["kategorie"] . "</td>" .
		 "<td>" . $dsatz["bereich"] . "</td>" .
         "<td>" . $dsatz["material"] . "</td>" ;
	echo   '<td><a href="index.php?print=$id" target="_blank" onclick="window.open(this.href,this.target,\'width=640,height=480´\'); return false;"><img src="icons/drucken.png" ></img></a></td>';   
     echo   "</tr>";
}

echo "<table>";



?>



</form>
<p align="right"> <?php

echo date('H:i:s Y-m-d');
?></p>
</body></html>

