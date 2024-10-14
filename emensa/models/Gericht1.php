<?php


class Gericht extends Illuminate\Database\Eloquent\Model
{
  public $timestamps = false;
  protected $primaryKey = 'id';
  protected $table = 'gericht';

  public function bewertungen()
  {
    return $this->hasMany('Bewertung');
  }

  function getPreisInternAttribute($preis_intern)
  {
    return number_format($preis_intern, 2);
  }

  function getPreisExternAttribute($preis_extern)
  {
    return number_format($preis_extern, 2);
  }

  function setVegetarischAttribute($value)
  {
    $acceptedTrue = ["yes", "ja", "wahr", true];
    $acceptedFalse = ["no", "nein", "falsch", false];
    $str = strtolower($value);
    $str = str_replace(" ", "", $str);
    if (in_array($str, $acceptedTrue))
      $this->attributes['vegetarisch'] = true;
    if(in_array($str, $acceptedFalse))
      $this->attributes['vegetarisch'] = false;
  }

  function setVeganAttribute($value)
  {
    $acceptedTrue = ["yes", "ja", "wahr", true];
    $acceptedFalse = ["no", "nein", "falsch", false];
    $str = strtolower($value);
    $str = str_replace(" ", "", $str);
    if (in_array($str, $acceptedTrue))
      $this->attributes['vegan'] = true;
    if(in_array($str, $acceptedFalse))
      $this->attributes['vegan'] = false;
  }
}

class Bewertung extends Illuminate\Database\Eloquent\Model
{
  public $timestamps = false;
  protected $table = 'bewertungen';
  protected $fillable = ['name'];

  public function gericht()
  {
    return $this->belongsTo('Gericht', 'gerichtid');
  }
}

function db_bewertungen_set_bewertung($bewertung)
{
  $link = connectdb();

  $statement = mysqli_stmt_init($link);
  mysqli_stmt_prepare($statement,
    "INSERT INTO bewertungen (bemerkung, sterne_bewertung, gericht_id, benutzer_id) VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($statement, 'ssii',
    $bewertung['bemerkung'],
    $bewertung['bewertung'],
    $bewertung['gerichtID'],
    $_SESSION['userID']);
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);

  mysqli_close($link);
}

function db_bewertungen_get_bewertungen_by_user($userID)
{
  $link = connectdb();

  $sql = "SELECT gericht.name,bewertungen.* FROM gericht,bewertungen WHERE gericht.id = bewertungen.gericht_id AND bewertungen.benutzer_id =" . $userID . " ORDER BY bewertungen.bewertung_zeitpunkt DESC";
  $result = mysqli_query($link, $sql);

  $data = mysqli_fetch_all($result, MYSQLI_BOTH);

  mysqli_close($link);
  return $data;
}

function db_bewertungen_highlight($bewertungID)
{
  $link = connectdb();

  $sql = "UPDATE bewertungen SET hervorgehoben = NOT hervorgehoben WHERE id=" . $bewertungID . ";";
  $result = mysqli_query($link, $sql);

  $data = mysqli_fetch_all($result, MYSQLI_BOTH);

  mysqli_close($link);
  return $data;
}

function db_bewertungen_get_highlight()
{
  $link = connectdb();

  $sql = "SELECT gericht.name,bewertungen.* FROM gericht,bewertungen WHERE gericht.id = bewertungen.gericht_id AND hervorgehoben = true;";
  $result = mysqli_query($link, $sql);

  $data = mysqli_fetch_all($result, MYSQLI_BOTH);

  mysqli_close($link);
  return $data;
}
