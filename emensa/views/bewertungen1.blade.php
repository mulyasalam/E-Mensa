@extends('layout.bewertung_layout')

<!--
- Praktikum DBWT.Autoren:
- Steffen, Weyer, 3101839
- Can Karaca, Aslan, 3145122
-->

@section('title', 'Bewertungen')

@section('main')
  <a href="meinebewertungen1">Meine Bewertungen</a>
  @foreach($bewertungen as $bewertung)
    <hr>
    <div
      @if($bewertung['hervorgehoben'])
        style="font-weight: bold"
      @endif
    >
      Gericht: {{$bewertung->gericht['name']}}<br>
      Bewertung: {{$bewertung['sterne_bewertung']}} <br>
      Bemerkung: {{$bewertung['bemerkung']}} <br>
      Datum: {{$bewertung['bewertung_zeitpunkt']}}<br>
    </div>
    @if($_SESSION['admin'])
      @if($bewertung['hervorgehoben'])
        <a href="/bewertungen?hl={{$bewertung['id']}}">Hervorhebung abwählen</a>
      @else
        <a href="/bewertungen?hl={{$bewertung['id']}}">Hervorheben</a>
      @endif
    @endif
    <hr>
  @endforeach
@endsection
