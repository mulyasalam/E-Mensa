<?php
function saltwithhash(string $password){
  return sha1('emensa'.$password);
}


/*function saltWithHash(string $password, string $salt): string
{
  $saltedPassword = $salt . $password;
  $hashedPassword = hash('sha256', $saltedPassword);
  return $hashedPassword;
}*/

// Benutzerinformationen
$email = 'admin@emensa.example';
$chosenPassword = 'emensa1234';// Setzen Sie hier Ihr eigenes Passwort ein


// Hash für das Passwort berechnen
$hashedPassword = saltWithHash($chosenPassword);
echo "Benutzer: $email\n";
echo "Passwort: $chosenPassword\n";

echo "Hashed Password: $hashedPassword\n";




