<?php
$link = mysqli_connect( "localhost"
                      , "root"
                      , "root"
                      , "emensawerbeseite"
                      , 3306
                      );  // Verbindungsaufbau zur Datenbank

if (!$link) {
  echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
  exit();
}

?>
