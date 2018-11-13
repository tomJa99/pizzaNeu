<?php
//echo date("H:i:s");
$link = mysqli_connect("localhost", "root", "", "pizza")or die("DB Verbindung geht nicht: " . mysqli_error($link));
mysqli_set_charset($link, "utf8");

$suche = htmlspecialchars($_REQUEST['suche']);
$suche = mysqli_real_escape_string($link, $suche);
$query = "SELECT ort,strasse,kundenbetreuer FROM standorte WHERE ort LIKE '%$suche%' OR kundenbetreuer LIKE '%$suche%'";
$result = mysqli_query($link, $query);

$ergebnis=[];
while($row = mysqli_fetch_object($result))
{
    $ergebnis[] = $row;
}

echo json_encode($ergebnis);