<?php
include ("gerichte.php");
    global $gerichte3;
    include ("Anzahl.php");
    include ("sqlanmelden.php");
    global $link;
    $result=mysqli_query($link,"insert into besucher(date)values (now())");
    include ("newsletteranmeldung.php");

?>

<!DOCTYPE html>
<!--
- Praktikum DBWT. Autoren:
- Nathan Matthew, Kurnia,3573660
- Muhammad Mulya, Salam, 3592614
-->

<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>E-Mensa Werbeseite Aachen</title>
  <style>
    .mainpage{
      font-family: "Comic Sans MS",sans-serif;
    }
    *,html{
      box-sizing: border-box;
    }

    body {
      background-color: white;
      margin: 0;
      padding: 0;
    }
    nav {
      display: flex;
      justify-content: space-between;
      padding: 0 4rem;
      background-color: #f8f8f8;

    }
    nav ul{


    }
    nav ul li a{
      text-decoration: none;
      font-family: "Segoe UI", sans-serif;
      color: black;
      font-weight: 600;
      padding:8px 0;
      transition: all;
      transition-duration: 300ms;
      margin-right: 55px;
    }
    nav div img{
      width: 60px;
    }
    nav ul li a:hover{
      border-bottom: 1px solid black;
    }
    .boxed2{
      border: 1px solid black;
      padding : 5px;
      display:inline-block;
    }
    table{
      border: 3px solid black;
      border-collapse:collapse;
      text-align: center;
    }
    .row{
      border: 3px solid black;
    }
    th, td{
      border: 1px solid black;
    }
    .button1{
      position: relative;
      margin-left:50px;
      border-radius:3px;
      background-color:floralwhite;
      border:solid black;
      text-align: center;
      text-decoration:none;
      font-weight:bold;
      cursor:pointer;
    }

    footer{
      border-top:2px solid coral;
      font-family:"arial", sans-serif;
      text-align:center;
    }
    .row{
      list-style: none;
      padding:0;
    }
    .l{
      display: inline-block;
      border-right:2px solid coral;
      padding-right: 15px;
      padding-left:15px;
    }
    .l2{
      display:inline-block;
      padding-left:15px;
    }
    .dank{
      text-align: center;
    }
    /* Startsektion */
    #start {
      text-align: center;
      background-color: #f2f2f2;
    }

    #start h1 {
      font-size: 36px;
      margin-bottom: 20px;
    }

    #start p {
      font-size: 18px;
      color: black;
      margin-bottom: 30px;
    }


    #start a {
      display: inline-block;
      background-color: #ff9800;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      font-weight: bold;
    }
    .pilihan {
      list-style: none;
      text-decoration: none;
      display: flex;
      color: black;
      justify-content: space-between;
    }
    .kita{
      margin-left: 200px;
      font-weight: bold;
    }
    .link{
      list-style: none;
      text-decoration: none;
      color: black;
    }
    #kosten,#Kontakt{
      background-color: #f2f2f2;

    }
    #Kosten1,#Zahlen,#Kontakt1,#Wichtig, #Speisen{
      margin-right: 150px;
      margin-left: 200px;
    }
    h1{
      margin-right: 150px;
      margin-left: 200px;
    }
    .grid-item{
      margin-right: 150px;
      margin-left: 200px;
    }
  </style>
</head>
<body>
<header>
  <nav>
    <div><img src="img/LOGO.png" alt="Logo"></div>

    <ul>
      <li>
        <a href="#start">Ankundigung</a>
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
</header>
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
    <h1>Köstlichkeiten, die Sie erwarten</h1>
    <section id="kosten">
      <section id="Kosten1">
  <<<table>
    <tr class="row">
      <td></td>
      <td>Preis intern</td>
      <td>Preis extern</td>
      <td>Übersicht</td>
      <<!--<td>Allergene</td>-->
      <?php
        foreach ($gerichte3 as $item) {
        echo '<tr>';
        echo '<td>' . $item['name'] . '</td>';
        echo '<td>' . $item['price intern'] . '0€</td>';
        echo '<td>' . $item['price extern'] . '0€</td>';
        echo '<td>' . $item['übersicht'] . '</td>';
        echo '</tr>';
      }
      ?>
    </tr>
    <tr>
      <td>Rindfleisch mit Bambus, Kaiserscohten und rotem Paprika,
      dazu Mie Nudeln</td>
      <td>3.50€</td>
      <td>6.20€</td>
      <td><img id=rind src="img/rindfleisch.jpg" alt="rind" widht="150" height="80">  </td>
    </tr>
    <tr>
      <td>Spinatrisotto mit kleinen Samosateigecken und gemischter Salat</td>
      <td>2.90€</td>
      <td>5.30€</td>
      <td><img id=spinat src="img/spinat.jpg" alt="spinat" widht="150" height="80"></td>
    </tr>
    <tr class="row">
      <td>...</td>
      <td>...</td>
      <td>...</td>
    </tr>
  </table>
  <?php
        /*$gerichte_limit_query = "SELECT * FROM gericht order by name LIMIT 5";
        $gerichte_limit_result = mysqli_query($link, $gerichte_limit_query);
        if (!$gerichte_limit_result) {
        echo "Fehler während der Abfrage:  ", mysqli_error($link);
        }

        if($gerichte_limit_result) {

        while ($rowGericht = mysqli_fetch_assoc($gerichte_limit_result)) {
        // hard-coded parameters (SQL Injection! aber wir sind doch die Admins :))
        $gericht_allergen_sub = "SELECT a.name, a.code FROM allergen AS a LEFT JOIN gericht_hat_allergen AS gr
        ON gr.code = a.code WHERE gr.gericht_id = " . $rowGericht["id"] . " ORDER BY a.name ASC";
        $gericht_allergen_result = mysqli_query($link, $gericht_allergen_sub);
        // kein Exit, da wir noch andere Gerichte holen können

        if (!$gericht_allergen_result) {
        echo "Fehler während der Abfrage:  ", mysqli_error($link);
        } else {
        while ($rowAllergie = mysqli_fetch_assoc($gericht_allergen_result)) {
        // allergen (row)
        $rowGericht["allergen"][] = $rowAllergie;
        $allergen[] = $rowAllergie;
        }
        }

        // Vergleichbar mit array_push, aber einfache Weise bei der Eingabe
        $gerichte[] = $rowGericht;
        }

        // Schließe query nach fetch
        mysqli_free_result($gerichte_limit_result);
        }
        ?>
        <table>
          <thead>
          <tr>
            <th></th>
            <th>Preis intern</th>
            <th>Preis extern</th>
            <th>Allergen</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          <?php

          foreach ($gerichte as $gericht) {
            // Liste von Allergen
            $allergen_list = "<ul>";
            if(isset($gericht["allergen"])) {
              foreach($gericht["allergen"] as $allerge) {
                $allergen_list = $allergen_list . "<li>" . $allerge["code"] . "</li>";
              }
            }
            $allergen_list = $allergen_list . "</ul>";

            echo "<tr>";
            echo "<td style='text-align: left;'>" . $gericht["name"] . "</td>";
            echo "<td>" . $gericht["preis_intern"] . "</td>";
            echo "<td>" . $gericht["preis_extern"] . "</td>";
            echo "<td>" . $allergen_list . "</td>";
            echo "</tr>";
          }*/
          ?>
         <<!-- </tbody>
        </table>-->
      </section>
  </section>
    <div class="grid-item">
      <h1 id="wunsch">
        <h1>Wunschgericht</h1>
       <a href="wunschgericht.php"> wunschgericht </a>
      </h1>
    </div>
  </div>
    <h1>E-Mensa in Zahlen</h1>
    <section id="Zahlen">
      <ul class="pilihan">
        <!--<li class="link"> <?php //echo $visitorCount;?> Besuche</li>-->
        <li class="link"><?php sqlanfragen("SELECT count(*) FROM besucher",$link); ?> Besucher</li>
       <li class="link"><?php sqlanfragen("SELECT count(*) FROM kundeninfo", $link);?> Anmeldungen zum Newsletter</li>
        <li class="link"><?php sqlanfragen("SELECT count(*) FROM gericht",$link); ?> Speisen</li>
        <!--<li class="link"><?php //readgericht();?> Speisen</li>-->
      </ul>
    </section>
    <h1>Interesse geweckt? Wir informieren Sie!</h1>
   <section id="Kontakt">
      <section id="Kontakt1">

        <form method="post" action="werbeseite.php">
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
    <?php checkeverything();?>
  </div>
</form>
      </section>
    </section>
    <h1>Das ist uns wichtig</h1>
    <section id="Wichtig">

    <ul class="kita">
      <li> Beste frische Saisonale</li>
      <li>Sauberkeit</li>
      <li>Ausgewagene abwechslungreiche Gerichte</li>
    </ul>
    </section>
      <h1 class="dank">Wir freuen uns auf Ihren Besuch!</h1>
<footer>
  <ul class="row1">
    <li class="l">(c) E-Mensa GmbH</li>
    <li class="l">Kurnia & Salam</li>
    <li class="l2">Impressum</li>
  </ul>
</footer>
</body>
</html>
