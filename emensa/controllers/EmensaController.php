<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldener.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/besucher.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/newsletter.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/Gericht1.php');

class EmensaController
{
  public function emensahome(){
    $gerichtlist=db_gericht_select_all();
    $anmeldener=getallanmeldener();
    $anzahlbesucher=getbesucher();
    $bewertungen= db_bewertungen_get_highlight();
    $preis_intern = Gericht::take(21)->pluck('preis_intern');
    $preis_extern = Gericht::take(21)->pluck('preis_extern');
    logger()->info('hauptseite zugriff erfolgreich');
    return view('emensa',['gerichtlist'=>$gerichtlist,'anmeldenlist'=>$anmeldener,'besucher'=>$anzahlbesucher, 'bewertungen'=>$bewertungen, 'preis_intern'=>$preis_intern, 'preis_extern'=>$preis_extern]);
  }
  /*public function emensahome()
  {
    $gerichtlist = db_gericht_select_all();
    $anmeldener = getallanmeldener();
    $anzahlbesucher = getbesucher();
    $bewertungen = db_bewertungen_get_highlight();

    // Mengambil lima record pertama dengan metode take(5) dan mengambil nilai preis_intern dan preis_extern
    $highlightedGerichte = Gericht::take(5)->get(['preis_intern', 'preis_extern']);

    // Melakukan format untuk setiap nilai preis_intern dan preis_extern
    $highlightedGerichteFormatted = $highlightedGerichte->map(function ($gericht) {
      return [
        'preis_intern' => number_format($gericht->preis_intern, 2),
        'preis_extern' => number_format($gericht->preis_extern, 2),
      ];
    });

    logger()->info('hauptseite zugriff erfolgreich');

    return view('emensa', [
      'gerichtlist' => $gerichtlist,
      'anmeldenlist' => $anmeldener,
      'besucher' => $anzahlbesucher,
      'bewertungen' => $bewertungen,
      'highlightedGerichte' => $highlightedGerichteFormatted,
    ]);
  }*/


  /*public function wunschgericht(RequestData $request)
  {
    insertwunschgericht($request);
    return view('emensa', []);
  }*/

  public function newsletteranmeldungen(RequestData $request)
  {
    newsletter($request);
    return view('emensa', []);
  }
}
