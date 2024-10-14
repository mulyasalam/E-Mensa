@extends('layout.bewertung_layout')

<style>
  /* Stil um kleine Displays zu handhaben */
  @media (max-width: 650px) {
    label {
      display: block;
      margin-bottom: 5px;
    }
    input,
    select,
    textarea {
      width: 100%;
      box-sizing: border-box;
      margin-bottom: 10px;
    }
  }

  /* Stil um größere Displays zu handhaben */
  @media (min-width: 651px) {
    .formular {
      display: flex;
      grid-template-columns: max-content 1fr;
      grid-gap: 10px; /* Sesuaikan dengan kebutuhan Anda */
      /*posisikan agar formular ditengah*/
      width: 50%;
      margin: 0 auto;

    }
    label {
      text-align: right;
      margin-right: 10px;
      white-space: nowrap;
    }
    input,
    select,
    textarea {
      width: 100%; /* Sesuaikan dengan kebutuhan Anda */
      box-sizing: border-box;
      margin-bottom: 10px;
    }
  }
</style>

<div class="formular">
  <form method="GET" action="/bewertungspeicherung">
    <fieldset>
      <legend>Bewertung</legend>
      @if($gerichtid!=-1)
        <input type="hidden" name="gericht_id" value="{{$gerichtid}}">
        <div class="form-row">
          <label for="gericht_name"> Gericht: {{$gericht['name']}}</label>
          @if($gericht['bildname'] == NULL)
            <img src ="/img/gerichte/00_image_missing.jpg" width="100" height="100">
          @else
            <img src ="/img/gerichte/{{$gericht['bildname']}}" width="100" height="100">
          @endif
        </div>
      @else
        <div class="form-row">
          <label for="gericht_id">gericht id</label>
          <input type="text" name="gericht_id" id="gericht_id">
        </div>
      @endif

      <div class="form-row">
        <label for="bemerkung"> Bemerkung</label>
        <textarea rows="10" cols="80" name="bemerkung" id="bemerkung"></textarea>
      </div>

      <div class="form-row">
        <label for="sterne_bewertung">sterne_bewertung</label>
        <select name="sterne_bewertung">
          <option value="sehr gut">★★★★</option>
          <option value="gut">★★★</option>
          <option value="schlecht">★★</option>
          <option value="sehr schlecht">★</option>
        </select>
      </div>

      <div class="form-row">
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="benutzer_id" value="{{$id}}">
        <input type="submit" value="Submit">
      </div>

    </fieldset>
  </form>
</div>
