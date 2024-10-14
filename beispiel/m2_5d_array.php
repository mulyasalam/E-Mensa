<?php
$famousMeals = [
  1 => ['name' => 'Currywurst mit Pommes',
    'winner' => [2001, 2003, 2007, 2010, 2020]],
  2 => ['name' => 'Hähnchencrossies mit Paprikareis',
    'winner' => [2002, 2004, 2008]],
  3 => ['name' => 'Spaghetti Bolognese',
    'winner' => [2011, 2012, 2017]],
  4 => ['name' => 'Jägerschnitzel mit Pommes',
    'winner' => 2019]
];


function showFamousMeals($famousMeals)
{
  echo "<ol>";
  foreach ($famousMeals as $meal) {
    echo "<li>" . $meal['name'] ."<br>";
    if (is_array($meal['winner'])) {
      echo implode(", ", array_reverse($meal['winner']));
    } else {
      echo $meal['winner'];
    }
    echo "</li>";
  }
  echo "</ol>";
}

function showNoWinner($famousMeals)
{
  $noWinner = [];
  for ($i = 2000; $i <= date("Y"); $i++) {
    $noWinner[$i] = true;
  }
  foreach ($famousMeals as $meal) {
    if (is_array($meal['winner'])) {
      foreach ($meal['winner'] as $year) {
        $noWinner[$year] = false;
      }
    } else {
      $noWinner[$meal['winner']] = false;
    }
  }
  $noWinner = array_filter($noWinner);
  echo "Keine Gewinner in den Jahren: " . implode(", ", array_keys($noWinner));
}

showFamousMeals($famousMeals);
showNoWinner($famousMeals);




