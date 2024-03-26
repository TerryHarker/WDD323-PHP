<?php
$hasError = false;
$errorMessages = array();

echo '<pre>POST ';
print_r($_POST);
echo '</pre>';

// zuerst prüfen ob Daten angekommen sind, wenn nicht, keine Verarbeitung
if( isset($_POST['prename']) && isset($_POST['surname']) ){
  // echo 'Alle Werte existieren';

  // prüfen auf leere Felder (für jedes Feld einzeln prüfen)
  if( empty( $_POST['prename'] ) ){
    // das Feld prename ist leer
    $hasError = true;
    $errorMessages[] = "Vorname darf nicht leer sein";
  }
  if( empty( $_POST['surname'] ) ){
    // das Feld prename ist leer
    $hasError = true;
    $errorMessages[] = "Nachname darf nicht leer sein";
  }

  // Prüfen auf Vorkommen von Zeichen - siehe String funktionen: https://www.php.net/manual/de/ref.strings.php
  // Zeichen zählen
  $nameLaenge = strlen($_POST['prename']);
  if( $nameLaenge <4 || $nameLaenge >16 ){
    $hasError = true;
    $errorMessages[] = "Name muss zwischen 4 und 16 Zeichen haben";
  }

  // E-Mail korrekt?
  if( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) == false ){
    $hasError = true;
    $errorMessages[] = "Bitte eine gültige E-Mail angeben";
  }

  // Passwortregeln: 
  // testen auf Grossbuchstabe im Passwort
  if( strtolower($_POST['password']) == $_POST['password'] ){
    $hasError = true;
    $errorMessages[] = "Passwort muss mindestens einen Grossbuchstaben enthalten";
  }
  // testen auf Kleinbuchstabe im Passwort
  if( strtoupper($_POST['password']) == $_POST['password'] ){
    $hasError = true;
    $errorMessages[] = "Passwort muss mindestens einen Kleinbuchstaben enthalten";
  }

  // Sonderzeichen überprüfen: (testen: https://regex101.com/)
  $pattern = "#^(.*)([^a-zA-Z0-9])(.*)#";
  if( preg_match($pattern, $_POST['password']) == 0 ){
    $hasError = true;
    $errorMessages[] = "Passwort muss mindestens ein Sonderzeichen enthalten";
  }

  // Keine Leerzeichen
  if( strpos( $_POST['password'], " " ) !== false ){
    $hasError = true;
    $errorMessages[] = "Passwort darf keine Leerzeichen enthalten";
  }



  // Bereinigen der Werte, bevor sie weiterverwendet werden
  //echo 'Vorname vor der Bereinigung: '.$_POST['prename'];
  $prename = strip_tags( $_POST['prename'] );
  $surname = strip_tags( $_POST['surname'] );
  $salutation = strip_tags( $_POST['salutation'] );
  $zip = strip_tags( $_POST['zip'] );
  $city = strip_tags( $_POST['city'] );
  $email = strip_tags( $_POST['email'] );
  $message = strip_tags( $_POST['message'] );
  // echo 'Vorname nach Bereinigung: '.$vorname;

  $password = $_POST['password']; // KEINE veränderung, da sonst der User nicht mehr einloggen kann
  


  // wenn es keine Fehler gibt, nächster Schritt (versenden)
  if($hasError == false){
    echo 'ready zum verschicken des Emails';
  }

}
?>


<?php
// Fehlermeldungen ausgeben (array als string flatten), wenn vorhanden
if( count($errorMessages)>0 ){
  echo implode("<br>", $errorMessages);
}
?>
<form class="newsletter-form" action="" method="POST">
  <p>
    <select id="salutation" name="salutation">
      <option value="" selected>Anrede</option>
      <option value="Herr">Herr</option>
      <option value="Frau">Frau</option>
      <option value="Divers">Divers</option>
    </select>
</p>
  <p></p>
  <p><input id="prename" name="prename" type="text" placeholder="Vorname" /></p>
  <p><input id="surname" name="surname" type="text" placeholder="Nachname" /></p>
  <p class="form-full"><input id="address" name="address" type="text" placeholder="Adresse" /></p>
  <p><input id="zip"  name="zip" type="text" placeholder="Postleitzahl" /></p>
  <p><input id="city" name="city" type="text" placeholder="Ort" /></p>
  <p class="form-full"><input id="email" name="email" type="text" placeholder="E-Mail" /></p>
  <p class="form-full"><input id="password" name="password" type="password" placeholder="Passwort" /></p>
  <p class="form-full">
    <textarea id="message" name="message" name="" cols="30" rows="10" placeholder="Bemerkungen"></textarea>
  </p>
  <button class="btn-primary submit" type="submit">Absenden</button>
</form>