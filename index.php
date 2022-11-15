<!DOCTYPE html><html lang="de"><head></head><body>


<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}
?>
<h1>Material Liste: </h1>

<?php

//Laden der MYSQL Config + Verbindung Herstellen
include('config/config.php');


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
         "<td>" . $dsatz["material"] .
         "</tr>";
}

echo "<table>";
?>


<!-- Das Eingabeformular: -->
<h2>Aktionen:</h2>

<p>
<input type="submit" name="eintragen" formaction="artikel_hinzufügen.php" value="Neuer Artikel eintragen">
</p>
<p>
<input type="submit" name="bearbeiten" formaction="artikel_bearbeiten.php" value="ausgewählten Datensatz bearbeiten">
</p>
<p>
<input type="submit" name="löschen" formaction="artikel_löschen.php" value="ausgewählte Datensätze löschen">
</p>
<p>
<input type="submit" name="suchen" formaction="suche.php" value="Artikel suchen">
</p>
<p>
<input type="submit" name="logout" formaction="logout.php" value="Logout">
</p>
</form>

</body></html>

