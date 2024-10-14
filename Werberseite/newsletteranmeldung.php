<?php

$action="formdata.html";
function checkname($name) : bool{
  $allnichtsichtbar=true;
  if(strlen($name)==0){
    return false;
  }
  for($i=0;$i<strlen($name);$i++){
    $char=ord($name[$i]);
    if(($char>32||$char<0)&&$char!=127){
      $allnichtsichtbar=false;
      break;
    }
  }
  if($allnichtsichtbar){
    return false;
  }else{
    return true;
  }
}
/*die E-Mail-Adresse korrekt formatiert ist (also einem Muster wie
name@example.com entspricht),die E-Mail-Adresse nicht von rcpt.at, damnthespam.at, wegwerfmail.de oder
trashmail.* (wie trashmail.de oder trashmail.com) stammt*/
function checkemail($email) : bool{
  // Überprüfen, ob die E-Mail-Adresse dem Muster name@example.com entspricht
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  }

  // Überprüfen, ob die E-Mail-Adresse von einer der angegebenen Domains stammt
  $allowedDomains = ['rcpt.at', 'damnthespam.at', 'wegwerfmail.de'];
  $emailDomain = explode('@', $email)[1];
  if (in_array($emailDomain, $allowedDomains)) {
    return false;
  }

  // Überprüfen, ob die E-Mail-Adresse mit trashmail.* beginnt
  if (preg_match('/^trashmail\./', $emailDomain)) {
    return false;
  }

  return true;
}

function checkeverything(){
  if (!empty($_POST)) {
    $allcheck = true;
    if (empty($_POST["vorname"])) {
      $allcheck = false;
      echo "vorname is required " . '<br>';

    } else {
      if (!checkname($_POST["vorname"])) {
        $allcheck = false;
        echo "vorname ist leer " . '<br>';
      }
    }
    if (empty($_POST["email"])) {
      $allcheck = false;
      echo "Email is required" . '<br>';

    } else {
      if (!checkemail($_POST["email"])) {
        $allcheck = false;
        echo "E-Mail mit falschen Format" . '<br>';
      }
    }
    if (empty($_POST['Datenschutz'])) {
      $allcheck = false;
      echo 'Datenschutz nicht bestimmt';
    }
    if ($allcheck) {
      echo 'erfolgreich angemelden!';
      $file = fopen('anmeldendata.txt', 'a');
      if (!$file) {
        die('Öffnen fehlgeschlagen');
      }
      foreach ($_POST as $txt) {

        fwrite($file, $txt);
        fwrite($file, ';');
      }
      fwrite($file, "\n");
      fclose($file);
      if (!empty($_POST)) {
        $link = mysqli_connect("localhost",
          "root",
          "root",
          "emensawerbeseite",
          3306
        );
        if (!$link) {
          echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
          exit();
        }
        $vorname = $_POST['vorname'];
        $email = $_POST['email'];
        $vorname = mysqli_real_escape_string($link, $vorname);
        $email = mysqli_real_escape_string($link, $email);
        $sql = "INSERT INTO kundeninfo(vorname,email) VALUES ('$vorname','$email')";
        writebesucher();

        mysqli_query($link, $sql);
        mysqli_close($link);
      }
    }
  }
}

?>
