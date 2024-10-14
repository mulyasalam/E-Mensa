<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');


class ExampleController
{
public function m4_7a_queryparameter(RequestData $rd) {
  $mein = [
    'name' => $rd->query['name'] ?? 'kein Name',
  ];
  return view('examples.m4_7a_queryparameter', $mein);
}

  public function m4_7b_kategorie(RequestData $rd){
    $kategorie =  db_kategorie_select_name_asc();
    return view('examples.m4_7b_kategorie', [
      'kategorie' => $kategorie
    ]);
  }

  public function m4_7c_gerichte(RequestData $rd){
    $gericht = db_gericht_preisintern_preisextern();
    return view('examples.m4_7c_gerichte',[
      'gericht' => $gericht
    ]);
  }

  public function layout(RequestData $rd){
    $getdata=$rd->getData();
    $no= isset($getdata['no'])?$getdata['no']:1;
    if($no==2){
      $var = ['no'=>$no];
      return view('examples.pages.m4_7d_page_2',$var);
    }else{
      $var = ['no'=>$no];
      return view('examples.pages.m4_7d_page_1',$var);
    }
  }
    public function page1(RequestData $rd)
    {
     $getdata=$rd->getData();
      $no= isset($getdata['no'])?$getdata['no']:1;
      if($no==1) {
        $var = ['no' => $no];
        return view('examples.pages.m4_7d_page_1', $var);
      }
  }
  public function page2(RequestData $rd)
  {
    $getdata=$rd->getData();
    $no= isset($getdata['no'])?$getdata['no']:1;
    if($no==1) {
      $var = ['no' => $no];
      return view('examples.pages.m4_7d_page_2', $var);
    }
  }
}
