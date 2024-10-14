<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldener.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/besucher.php');
class AbmeldungController
{
  function abmeldungen(){
    logger()->info('abmelden erfolgreich');
    session_destroy();
    header('Location: /');
    exit();
  }
}
