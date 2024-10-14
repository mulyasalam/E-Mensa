
<?php
$link = mysqli_connect(
  "localhost",
  "root",
  "root",
  "emensawerbeseite",
  3306
);

if (!$link) {
  echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
  exit();
}


$sql1 = "select id, name,preis_intern,preis_extern from gericht order by name asc limit 5";
$result1 = mysqli_query($link, $sql1);

$sql2 = "SELECT ge.id, ge.name,ge.preis_intern,ge.preis_extern,group_concat(distinct geh.code)as code from
        gericht ge left join gericht_hat_allergen geh on geh.gericht_id=ge.id group by ge.name asc LIMIT 5";
$result2 = mysqli_query($link, $sql2);

$allergen_code = "select code, gericht_id from gericht_hat_allergen";
$result3 = mysqli_query($link, $allergen_code);

/*$allergen = "select code, name, type from allergen";
$result_allergen = mysqli_query($link, $allergen);*/

$usedAllergen = [];

echo '<table>';
echo '<tr>' . '<th>' . ' Name ' . '</th>' . '<th>' . ' Preis_Intern ' . '</th>' . '<th>' . ' Preis_Extern' . '</th>' . '<th>' . ' Allergen_code ' . '</th>' . '</tr>';
while ($row = mysqli_fetch_assoc($result2)) {
  echo '<tr>' . '<td>' . $row['name'] . '</td>' . '<td>' . $row['preis_intern'] . '</td>' . '<td>' . $row['preis_extern'] . '</td>' . '<td>' . $row['code'] . '</td>' . '</tr>';
  while ($allergencode_row = mysqli_fetch_assoc($result3)) {
    if ($allergencode_row['gericht_id'] == $row['id']) {
      if (!in_array($allergencode_row['code'], $usedAllergen)) { // falls noch nicht vorhanden
        $usedAllergen[] = $allergencode_row['code'];
      }
    }
  }
}
echo '</table>';
/*while ($allergenrow = mysqli_fetch_assoc($result_allergen)) {
  foreach ($usedAllergen as $code) {
    if ($code == $allergenrow['code']) {
      echo '<li>' . $allergenrow['name'] . '</li>';
    }
  }
}*/
$query_random = "SELECT * FROM gericht ORDER BY RAND() LIMIT 5";
$result_random = mysqli_query($link, $query_random);

echo "<h2>Zufällige Gerichte:</h2>";
echo "<ul>";
while ($row_random = mysqli_fetch_assoc($result_random)) {
  echo "<li>{$row_random['name']} - Preis intern: {$row_random['preis_intern']}, Preis extern: {$row_random['preis_extern']}</li>";

}
echo "</ul>";

mysqli_close($link);
/*
// Annahme: Sie haben eine Datenbankverbindung hergestellt und sie ist in der Variable $conn gespeichert.

// 1) Laden Sie die Gerichte aus der Datenbank und zeigen Sie die Informationen an.
$query = "SELECT id,name,preis_intern,preis_extern FROM gericht ORDER BY name ASC LIMIT 5";
$result = mysqli_query($link, $query);

echo "<h2>Gerichte:</h2>";
echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<li>{$row['name']} - Preis intern: {$row['preis_intern']}, Preis extern: {$row['preis_extern']}</li>";
}
echo "</ul>";

// 2) Zeigen Sie zusätzlich pro Gericht die enthaltenen Allergene und eine Liste der verwendeten Allergene an.
$query_allergene = "SELECT g.name AS gericht_name, a.code FROM gericht g
                    JOIN gericht_hat_allergen ga ON g.id = ga.gericht_id
                    JOIN allergen a ON ga.gericht_id = g.id";
$result_allergene = mysqli_query($link, $query_allergene);

$allergene_list = array();
while ($row_allergene = mysqli_fetch_assoc($result_allergene)) {
  $gericht_name = $row_allergene['gericht_name'];
  $allergen_code = $row_allergene['code'];

  // Zeige die Allergene pro Gericht an
  echo "<p>{$gericht_name}: Allergen - {$allergen_code}</p>";

  // Füge das Allergen zur Liste der verwendeten Allergene hinzu
  if (!isset($allergene_list[$allergen_code])) {
    $allergene_list[$allergen_code] = true;
  }
}

// Zeige die Liste der verwendeten Allergene an
echo "<h3>Verwendete Allergene:</h3>";
echo "<ul>";
foreach ($allergene_list as $allergen_code => $value) {
  echo "<li>{$allergen_code}</li>";
}
echo "</ul>";

// 3) (Optional) Zeigen Sie 5 zufällige Gerichte an.
$query_random = "SELECT * FROM gericht ORDER BY RAND() LIMIT 5";
$result_random = mysqli_query($link, $query_random);

echo "<h2>Zufällige Gerichte:</h2>";
echo "<ul>";
while ($row_random = mysqli_fetch_assoc($result_random)) {
  echo "<li>{$row_random['name']} - Preis intern: {$row_random['preis_intern']}, Preis extern: {$row_random['preis_extern']}</li>";
}
echo "</ul>";

// Schließe die Datenbankverbindung
mysqli_close($link);*/


?>
