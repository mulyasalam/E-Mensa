<?php
// die ein Formular mit zwei Eingabefelder a und b
//sowie eine Schaltfläche „addieren“ darstellt. Klickt der/die Benutzer:in
//„addieren“ so soll das Ergebnis der Addition aus a und b unter dem
//Formular darstellt werden.
//Fügen Sie eine zusätzliche Schaltfläche „multiplizieren“ ein, bei deren
//Verwendung das Ergebnis der Multiplikation von a und b dargestellt wird.

 include ("m2_5a_standardparameter.php");
  $a=0;
  $b=0;
  $c=0;

  function multiplizieren($a,$b){
    return $a*$b;
  }
  if(isset($_GET['addieren'])){
    $a=$_GET['a'];
    $b=$_GET['b'];
    $c=addieren($a,$b);
  }
  if(isset($_GET['multiplizieren'])){
    $a=$_GET['a'];
    $b=$_GET['b'];
    $c=multiplizieren($a,$b);
  }
  echo "<form action='m2_5c_addform.php' method='get'>
  <input type='text' name='a' value='$a'>
  <input type='text' name='b' value='$b'>
  <input type='submit' name='addieren' value='addieren'>
  <input type='submit' name='multiplizieren' value='multiplizieren'>
  </form>";
  echo "Ergebnis: $c";
?>
