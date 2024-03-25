<form class="newsletter-form" action="verarbeitung.php" method="GET">
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
  <p class="form-full">
    <textarea id="message" name="message" name="" cols="30" rows="10" placeholder="Bemerkungen"></textarea>
  </p>
  <button class="btn-primary submit" type="submit">Absenden</button>
</form>