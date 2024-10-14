@extends('layout.bewertung_layout')

<!--
- Praktikum DBWT.Autoren:
- Steffen, Weyer, 3101839
- Can Karaca, Aslan, 3145122
-->

@section('title', 'Bewertung')

@section('main')

  <h2>Bewertung für {{$gericht["name"]}}</h2>
  <div id="layoutBewertung">
    @if($gericht['bildname']==NULL||!file_exists("img/gerichte/" . $gericht['bildname']))
      <td style="width: 100px"><img src="/img/gerichte/00_image_missing.jpg" alt="Bild des Gerichtes"
                                    style="size: auto"></td>
    @else
      <td style="width: 100px"><img src="/img/gerichte/{{$gericht['bildname']}}" alt="Bild des Gerichtes"
                                    style="size: auto"></td>
    @endif
    <form method="POST">
      <p>Ihre Bewertung für das Gericht:</p>
      <fieldset class="bewertung">
        <div>
          <input class="radButton" type="radio" id="mc" name="bewertung" value="sehr schlecht">
          <label class="radLabel" for="mc"> Sehr schlecht</label>
        </div>
        <div>
          <input class="radButton" type="radio" id="vi" name="bewertung" value="schlecht">
          <label class="radLabel" for="vi"> Schlecht</label>
        </div>
        <div>
          <input class="radButton" type="radio" id="ae" name="bewertung" value="gut">
          <label class="radLabel" for="ae"> Gut</label>
        </div>
        <div>
          <input class="radButton" type="radio" id="ae" name="bewertung" value="sehr gut" checked>
          <label class="radLabel" for="ae"> Sehr gut</label>
        </div>
      </fieldset>
      <label for="pass">Bemerkung:</label><br>
      <textarea rows="5" cols="40" id="beschreibung" name="bemerkung" minlength="5" required></textarea><br>
      <input type="hidden" id="gerichtID" name="gerichtID" value={{$gericht['id']}}>
      <input type="submit" value="Absenden"><br><br>
    </form>
  </div>
@endsection
