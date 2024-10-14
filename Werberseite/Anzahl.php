<?php
function writebesucher(){
  $file = fopen('anmeldenzahl.txt', 'r');
  if (!$file) {
    die('Öffnen fehlgeschlagen');
  }
  $zahl = fgets($file, 1024);
  if(empty($zahl)){
    $zahl=0;
  }
  $zahl++;
  $file=fopen('anmeldenzahl.txt', 'w');
  fwrite($file,$zahl);
  fclose($file);
}

function readanmeldungen()
{
  $file = fopen('anmeldenzahl.txt', 'r');
  if (!$file) {
    die('Öffnen fehlgeschlagen');
  }
  $zahl = fgets($file, 1024);
  echo $zahl;
  fclose($file);
}

function readgericht(){
  $file = fopen('gericht.txt', 'r');
  if (!$file) {
    die('Öffnen fehlgeschlagen');
  }
  $zahl = fgets($file, 1024);
  echo $zahl;
  fclose($file);
}

// Fungsi untuk membaca dan mengupdate jumlah pengunjung
/*$filename = 'counter.txt';
function updateCounter($filename) {
  $counterFile = fopen($filename, 'r+');
  $counter = fread($counterFile, filesize($filename));

  // Menambahkan 1 ke jumlah pengunjung
  $counter++;

  // Memposisikan pointer di awal file untuk menulis ulang jumlah yang telah diupdate
  fseek($counterFile, 0);
  fwrite($counterFile, $counter);

  fclose($counterFile);

  return $counter;
}

// Nama file untuk menyimpan jumlah pengunjung
//$counterFileName = 'counter.txt';

// Mengupdate dan mendapatkan jumlah pengunjung
$visitorCount = updateCounter($filename);*/

