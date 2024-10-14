@extends('layout.emensa_layout')

@section('style')
  <link type="text/css" rel="stylesheet" href="css/emensa.css">
@endsection

@section('title')
  Emensa
@endsection
@section('benutzer')

  @if(isset($_SESSION['login']))
    <?php
    $benutzer= $_SESSION['data'];
    ?>
    {{$benutzer['name']}} angemeldet &nbsp;&nbsp;&nbsp;
    <a href="/abmeldungen">abmelden</a>
    <br>
    <a href="<?php echo "/meinebewertungen?id=".$benutzer['id']; ?>"  > Meine_Bewertungen &nbsp;&nbsp;&nbsp;  </a>
    <a href="<?php echo "/bewertung?id=".$benutzer['id']."&admin=".$benutzer['admin']; ?>">Bewertungen &nbsp;&nbsp;&nbsp;</a>
    <a href="<?php echo "/bewertungen?id=".$benutzer['id']."&admin=".$benutzer['admin']; ?>">letze 30 bewertungen anzeigen</a>
    <br>
  @else
    <a href="<?php echo "/anmeldungen?bewertung=0"; ?>">anmelden</a>
  @endif
@endsection

@section('navi')
  <nav>
    <div><img src="img/LOGO.png" alt="Logo"></div>

    <ul>
      <li>
        <a href="#Ank">Ankundigung</a>
      </li>
      <li>
        <a href="#Speisen">Speisen</a>
      </li>
      <li>
        <a href="#Zahlen">Zahlen</a>
      </li>
      <li>
        <a href="#Kontakt">Kontakt</a>
      </li>
      <li>
        <a href="#Wichtig">Wichtig für uns</a>
      </li>
    </ul>
  </nav>
@endsection

@section('ank')
  <hr>
  <hr>
  <div class="mainpage">
    <section id="start">
      <h1>Willkommen bei E-Mensa!</h1>
      <h2>Spezialangebot des Tages: Vegane Vielfalt!</h2>
      <p>Liebe Gäste,</p>
      <p>Heute steht bei uns alles im Zeichen der veganen Küche! Besuchen Sie uns für ein köstliches veganes Mittagsangebot, das Ihre Geschmacksnerven verwöhnen wird.</p>
      <p><strong>Datum:</strong> [Datum des Angebots]</p>
      <p><strong>Uhrzeit:</strong> 11:30 Uhr bis 14:30 Uhr</p>
      <p>Ob Sie Veganer sind oder einfach Lust auf etwas Neues haben, wir laden Sie herzlich ein, an diesem veganen Genusstag teilzunehmen. Besuchen Sie uns und erleben Sie die köstliche Welt der pflanzlichen Küche.</p>
    </section>
    <h1>Bald gibt es Essen auch online ;)</h1>
    <section id="Speisen">

      <p class="boxed2">Lorem ipsum dolor sit amet. Qui earum eius est rerum numquam et dolorem consequatur eum repellat velit non
        corrupti saepe qui eligendi earum! Eos veniam maiores ut inventore possimus et quos fugit aut impedit dignissimos!
        Aut eius voluptas et molestiae dolorem eum ullam ipsam eos nobis accusantium. Id repellendus iusto et error ratione qui
        enim dolores ut iste velit aut voluptate suscipit ut autem laborum aut quam illum. In esse natus est quam quod aut dicta
        eius qui laboriosam sint. Sit doloribus laudantium sit provident animi in rerum magnam non quisquam ipsa in dignissimos
        consequatur ut quis quos. Eum libero officiis ut voluptatem fugit et rerum quia.</p>
    </section>
@endsection

@section('speisanzeigen')
      <h1>Köstlichkeiten, die Sie erwarten</h1>
      <section id="kosten">
        <section id="Kosten1">
          <table>
            <tr class="row">
                <tr>
                  <th>Name</th>
                  <th>Interner Preis</th>
                  <th>Externer Preis</th>
                  <th>Übersicht</th>

                  <th> @if (isset($benutzer))Bewertungen</th>
                  @endif
                  <th></th>
                </tr>
        @foreach($gerichtlist as $value=>$gericht)
          <tr>
            <td>{{$gericht['name']}}</td>
            <td>{{$preis_intern[$value]}}&euro;</td>
            <td>{{$preis_extern[$value]}}&euro;</td>
            <td>
              @if($gericht['bildname'] == NULL)
                <img src ="img/gerichte/00_image_missing.jpg" width="100" height="100">
              @else
                <img src ="img/gerichte/{{$gericht['bildname']}}" width="100" height="100">
              @endif
            <td>@if(isset($benutzer))
                <a href="{{ "/bewertung?"."id=".$benutzer['id']."&gerichtid=".$gericht['id']}}">bewerten</a>
            @endif
          </tr>
        @endforeach
      </table>
    </section>
      </section>
@endsection

@section('zahl')
      <h1>E-Mensa in Zahlen</h1>
      <section id="Zahlen">
        <ul class="pilihan">
          <li class="link">Besucher: {{count($besucher)}}</li>
          <li class="link">Anmeldungen zum Newsletter: {{count($anmeldenlist)}}</li>
          <li class="link">Speisen: {{count($gerichtlist)}}</li>
        </ul>
      </section>
@endsection

@section('newsletter')
      <h1>Interesse geweckt? Wir informieren Sie!</h1>
      <section id="Kontakt">
        <section id="Kontakt1">

          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Ihr Name:
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Ihre E-Mail:
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Newsletter bitte in:<br>
            <input type="text" id="vorname" name="vorname" placeholder="Vorname">
            <input type="email" name="email" id="name" placeholder="Email">
            <select name="sprache" id="sprache">
              <option value="de">Deutsch</option>
              <option value="en">Englisch</option>
              <option value="fr">Französisch</option>
            </select>
            <div id="datenschutz">
              <input type="checkbox" id="datenschutz-checkbox" name="Datenschutz">
              <label for="datenschutz-checkbox">Ich stimme die Datenschutzbestimmungen zu.</label>
              <input type="submit" class="button1" value="Zum Newsletter anmelden."> <br>
            </div>
          </form>
        </section>
      </section>
      <h2>Meinungen unserer Gäste</h2>
      <table style="width:100%">
        @foreach($bewertungen as $bewertung)
          <tr>
            <td>
              <br>
              Gericht: {{$bewertung['name']}} <br>
              Bewertung: {{$bewertung['sterne_bewertung']}}<br>
              Bemerkung: {{$bewertung['bemerkung']}}<br>
              <br>
            </td>
          </tr>
        @endforeach
      </table>
@endsection

@section('wichtig')
            <h1>Das ist uns wichtig</h1>
            <section id="Wichtig">

              <ul class="kita">
                <li> Beste frische Saisonale</li>
                <li>Sauberkeit</li>
                <li>Ausgewagene abwechslungreiche Gerichte</li>
              </ul>
            </section>
            <h1 class="dank">Wir freuen uns auf Ihren Besuch!</h1>
@endsection

@section('footer')
            <footer>

              <ul class="row1">
                <li class="l">(c) E-Mensa GmbH</li>
                <li class="l">Kurnia & Salam</li>
                <li class="l2">Impressum</li>
              </ul>
            </footer>
@endsection
