<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertung.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldener.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/besucher.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/Gericht1.php');
class BewertungController
{
    /*function bewertungen(RequestData $rd){
        $getdata=$rd->getGetData();
        $id=$getdata['id'];
        $gerichtid=isset($getdata['gerichtid'])?$getdata['gerichtid']:-1;
        $gericht = suchengericht($gerichtid);

        return view('bewertung',['id'=>$id,'gerichtid'=>$gerichtid,'gericht'=>$gericht]);
    }*/
  function bewertung(RequestData $rd) {
    $getdata = $rd->getGetData();
    $id = $getdata['id'];
    $gerichtid = isset($getdata['gerichtid']) ? $getdata['gerichtid'] : -1;

    // Menggunakan Eloquent untuk mengambil data gericht berdasarkan ID
    $gericht = ($gerichtid != -1) ? Gericht::find($gerichtid) : null;

    return view('bewertung', ['id' => $id, 'gerichtid' => $gerichtid, 'gericht' => $gericht]);
  }

  function bewertungspeichern(RequestData $rd)
  {
    /*$test = Gericht::find(1);
    $test->vegetarisch = "Ja";
    $test->save();*/
    $get = $rd->getGetData();
    $bemerkung = $get['bemerkung'];
    $benutzerid = $get['benutzer_id'];
    $gerichtid = $get['gericht_id'];
    $sterne = $get['sterne_bewertung'];

    // Menggunakan Eloquent untuk menyimpan data bewertung
    $bewertung = new Bewertung();
    $bewertung->benutzer_id = $benutzerid;
    $bewertung->gericht_id = $gerichtid;
    $bewertung->bewertung_zeitpunkt = date('Y-m-d H:i:s');
    $bewertung->bemerkung = $bemerkung;
    $bewertung->sterne_bewertung = $sterne;
    $bewertung->save();


    header('Location: /');
  }
  /*function bewertung(RequestData $rd) {
    $getdata = $rd->getGetData();
    $id = $getdata['id'];
    $gerichtid = isset($getdata['gerichtid']) ? $getdata['gerichtid'] : -1;

    // Menggunakan Eloquent untuk mengambil data gericht berdasarkan ID
    $gericht = ($gerichtid != -1) ? Gericht::find($gerichtid) : null;

  if($_POST!=NULL) {
      $gerichtIdFromForm = $getdata['gericht_id'];
      $idFromForm = $getdata['id'];
      $bemerkung = $getdata['bemerkung'];
      $benutzerId = $getdata['benutzer_id'];
      $sterne = $getdata['sterne_bewertung'];

      // Simpan data bewertung ke database menggunakan Eloquent
      $bewertung = new Bewertung();
      $bewertung->benutzer_id = $benutzerId;
      $bewertung->gericht_id = $gerichtIdFromForm;
      $bewertung->bewertung_zeitpunkt = now();
      $bewertung->bemerkung = $bemerkung;
      $bewertung->sterne_bewertung = $sterne;
      $bewertung->save();

      // Redirect atau lakukan tindakan lain setelah penyimpanan
      header('Location: /');
    }
    return view ('bewertung', ['id' => $id, 'gerichtid' => $gerichtid, 'gericht' => $gericht]);
  }*/





  function bewertungen(RequestData $rd)
  {
    $getdata = $rd->getGetData();
    $admin = $getdata['admin'];

    // Handle hervor action
    if (isset($getdata['benutzerid']) && isset($getdata['id']) && isset($getdata['hervor'])) {
      $benutzerid = $getdata['benutzerid'];
      $id = $getdata['id'];
      $hervor = $getdata['hervor'];

      // Toggle nilai hervor antara 0 dan 1
      $hervor = $hervor == 1 ? 0 : 1;

      // Menggunakan Eloquent untuk memperbarui status hervor
      $bewertung = Bewertung::find($id);
      $bewertung->hervorgehoben = $hervor;
      $bewertung->save();
    }

    // Menggunakan Eloquent untuk mendapatkan semua bewertungen
    $bewertungen = Bewertung::all();

    // Memuat list benutzer dan gerichte
    $listbe = idnamelist();
    $listge = idgerichtlist();

    // Menambahkan nama benutzer dan nama gericht ke dalam array bewertungen
    foreach ($bewertungen as &$bewertung) {
      $bewertung->benutzername = $listbe[$bewertung->benutzer_id];
      $bewertung->gerichtname = $listge[$bewertung->gericht_id];
    }

    return view('bewertungen', ['bewertungen' => $bewertungen, 'admin' => $admin]);
  }
  function meinebewertungen(RequestData $rd)
  {
    $getdata = $rd->getGetData();
    $id = $getdata['id'];

    // Handle deletion logic if 'delete' parameter is present
    if (array_key_exists('delete', $getdata)) {
      $deleteId = $getdata['delete'];
      // Menggunakan Eloquent untuk menghapus bewertungen berdasarkan ID
      Bewertung::where('id', $deleteId)->delete();
    }

    // Menggunakan Eloquent untuk mendapatkan bewertungen berdasarkan user_id
    $meinebewertung = Bewertung::where('benutzer_id', $id)->get();

    // Menggunakan Eloquent untuk mendapatkan list id gerichte
    $listge = Gericht::pluck('name', 'id')->all();

    // Menggabungkan informasi gerichtname ke dalam array bewertungen
    foreach ($meinebewertung as &$bewertung) {
      $bewertung['gerichtname'] = $listge[$bewertung['gericht_id']];
    }

    return view('meinebewertungen', ['bewertungen' => $meinebewertung, 'id' => $id]);
  }



  /*function meinebewertungen(RequestData $rd)
  {
    $getdata = $rd->getGetData();
    $id = $getdata['id'];

    // Menggunakan Eloquent untuk mendapatkan bewertungen berdasarkan user_id
    $meinebewertung = Bewertung::where('benutzer_id', $id)->get();

    // Menggunakan Eloquent untuk mendapatkan list id gerichte
    $listge = Gericht::pluck('name', 'id')->all();

    // Menggabungkan informasi gerichtname ke dalam array bewertungen
    foreach ($meinebewertung as &$bewertung) {
      $bewertung['gerichtname'] = $listge[$bewertung['gericht_id']];
    }

    return view('meinebewertungen', ['bewertungen' => $meinebewertung, 'id' => $id]);
  }


  function loeschenbewertungen(RequestData $rd)
  {
    $getdata = $rd->getGetData();
    $id = $getdata['id'];
    $benutzerid = $getdata['benutzerid'];

    // Menggunakan Eloquent untuk menghapus bewertungen berdasarkan ID
    Bewertung::where('id', $id)->delete();

    // Menggunakan Eloquent untuk mendapatkan bewertungen setelah dihapus
    $meinebewertung = Bewertung::where('benutzer_id', $benutzerid)->get();

    // Menggunakan Eloquent untuk mendapatkan list id gerichte
    $listge = Gericht::pluck('name', 'id')->all(); // Pastikan model Gericht telah di-import

    // Menggabungkan informasi gerichtname ke dalam array bewertungen
    foreach ($meinebewertung as &$bewertung) {
      $bewertung['gerichtname'] = $listge[$bewertung['gericht_id']];
    }

    return view('meinebewertungen', ['bewertungen' => $meinebewertung, 'id' => $id]);
  }*/


  /* function hervor(RequestData $rd){
       $getdata=$rd->getGetData();
       $benutzerid=$getdata['benutzerid'];
       $id=$getdata['id'];
       $hervor=$getdata['hervor'];
       if($hervor==1){
           $hervor=0;
       }else{
           $hervor=1;
       }
       $hervor= hervorheben($id,$hervor);
       $bewertungen=bewertungzeigen();
       $listbe=idnamelist();
       $listge=idgerichtlist();
       $admin=$rd->getGetData()['admin'];

       for($i=0;$i<sizeof($bewertungen);$i++){
           $bewertungen[$i]['benutzername']=$listbe[$bewertungen[$i]['benutzer_id']];
           $bewertungen[$i]['gerichtname']=$listge[$bewertungen[$i]['gericht_id']];
       }
       return view('bewertungen',['bewertungen'=>$bewertungen,'admin'=>$admin,'hervor'=>$hervor]);
   }*/



  /*function bewertungenanzeigen(RequestData $rd){
         $bewertungen=bewertungzeigen();
         $listbe=idnamelist();
         $listge=idgerichtlist();
         $admin=$rd->getGetData()['admin'];

         for($i=0;$i<sizeof($bewertungen);$i++){
             $bewertungen[$i]['benutzername']=$listbe[$bewertungen[$i]['benutzer_id']];
             $bewertungen[$i]['gerichtname']=$listge[$bewertungen[$i]['gericht_id']];
         }

         return view('bewertungen',['bewertungen'=>$bewertungen,'admin'=>$admin]);
     }
   function hervor(RequestData $rd)
   {
     $getdata = $rd->getGetData();
     $benutzerid = $getdata['benutzerid'];
     $id = $getdata['id'];
     $hervor = $getdata['hervor'];

     // Toggle nilai hervor antara 0 dan 1
     $hervor = $hervor == 1 ? 0 : 1;

     // Menggunakan Eloquent untuk memperbarui status hervor
     $bewertung = Bewertung::find($id);
     $bewertung->hervorgehoben = $hervor;
     $bewertung->save();

     // Menggunakan Eloquent untuk mendapatkan semua bewertungen setelah perubahan
     $bewertungen = Bewertung::all();

     // Memuat list benutzer dan gerichte
     $listbe = idnamelist();
     $listge = idgerichtlist();
     $admin = $getdata['admin'];

     // Menambahkan nama benutzer dan nama gericht ke dalam array bewertungen
     foreach ($bewertungen as &$bewertung) {
       $bewertung->benutzername = $listbe[$bewertung->benutzer_id];
       $bewertung->gerichtname = $listge[$bewertung->gericht_id];
     }

     return view('bewertungen', ['bewertungen' => $bewertungen, 'admin' => $admin, 'hervor' => $hervor]);
   }*/

}

