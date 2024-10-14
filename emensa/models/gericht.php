<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "gerichte"
 */
function db_gericht_select_all() {
  try {
    $link = connectdb();

    $sql = 'SELECT * FROM gericht ORDER BY name';
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
  }
  catch (Exception $ex) {
    $data = array(
      'id'=>'-1',
      'error'=>true,
      'name' => 'Datenbankfehler '.$ex->getCode(),
      'beschreibung' => $ex->getMessage());
  }
  finally {
    return $data;
  }

}
function db_gericht_preisintern_preisextern(){
  $link = connectdb();
  $sql = "SELECT name, preis_intern FROM gericht WHERE preis_intern > 2 ORDER BY name ASC";
  $result = mysqli_query($link, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_BOTH);

  mysqli_close($link);
  return $data;
}
function idgerichtlist(){
  $link = connectdb();
  $sql = "SELECT id,name FROM gericht ORDER BY name ASC limit 30";
  $result = mysqli_query($link, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_BOTH);
  $list=array();
  for($i=0;$i<sizeof($data);$i++){
    $list[$data[$i]['id']]=$data[$i]['name'];
  }
  mysqli_close($link);
  return $list;
}

function suchengericht($gerichtid){
  try {
    $link = connectdb();

    $sql = "SELECT * FROM gericht where id=$gerichtid ";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($link);
  }
  catch (Exception $ex) {
    $data = array(
      'id'=>'-1',
      'error'=>true,
      'name' => 'Datenbankfehler '.$ex->getCode(),
      'beschreibung' => $ex->getMessage());
  }
  finally {
    return $data;
  }
}
/*function db_gericht_preisintern_preisextern_allergen_werbeseite(){
  $link = connectdb();
  $sql = "SELECT DISTINCT id ,IFNULL(bildname,'00_image_missing.jpg') AS bildname, name, preis_intern, preis_extern,
            GROUP_CONCAT(code) AS code FROM gericht g LEFT JOIN gericht_hat_allergen a
            ON g.id = a.gericht_id GROUP BY name ASC LIMIT 5;";
  $result = mysqli_query($link, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_BOTH);

  mysqli_close($link);
  return $data;
}*/


