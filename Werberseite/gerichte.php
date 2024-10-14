<?php
global $link;
$gerichte3= [[
  'name' =>'Gebratener Reis mit Hähnchen',
  'price intern' => 3.50,
  'price extern' => 6.20,
  'übersicht'=>'<img id=reis src="img/reis.jpg" alt="reis" width="150" height="80">',
],
[
  'name' =>'Reisnudeln mit Garnelen',
  'price intern' => 3.50,
  'price extern' => 6.20,
  'übersicht'=>'<img id=reisnudeln src="img/reisnudeln.jpg" alt="reisnudeln" widht="150" height="80">',
]
];


function sqlanfragen($sqlfragen,$link){
  $result=mysqli_query($link,$sqlfragen);
  if (!$result) {
    echo "Fehler während der Abfrage:  ", mysqli_error($link);
    exit();
  }
  while ($row = mysqli_fetch_assoc($result)) {
    foreach($row as $key=>$value){
      echo $value.' ';
    }
    echo'<br>';
  }
  mysqli_free_result($result);
}
?>

