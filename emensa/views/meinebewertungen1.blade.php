@extends('layout.bewertung_layout')

<!--
- Praktikum DBWT.Autoren:
- Steffen, Weyer, 3101839
- Can Karaca, Aslan, 3145122
-->

@section('title', 'Meine Bewertungen')

@section('main')
  @foreach($bewertungen as $bewertung)
    <hr>
    Gericht: {{$bewertung['name']}}<br>
    Bewertung: {{$bewertung['sternebewertung']}} <br>
    Bemerkung: {{$bewertung['bemerkung']}} <br>
    Datum: {{$bewertung['bewertungszeitpunkt']}}<br>
    <form method="POST">
      <input type="hidden" id="bewertungID" name="bewertungID" value={{$bewertung['id']}}>
      <input type="submit" value="Löschen"><br>
    </form>
    <hr>
  @endforeach
@endsection
