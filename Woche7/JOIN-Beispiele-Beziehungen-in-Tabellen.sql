/** 
Beispiele für JOINs über mehrere Tabellen (1:N und N:M Bezieheungen)
 - JOIN ... ON ... ermöglicht anhand der Fremdschlüssel und Hilfstabellen die Verbindung herzustellen beim Abfragen
 - Aliase (mit AS ...) ermöglichen eine flexiblere Benennung der Spalten im Resultat, das ist jedoch optional und muss nicht genutzt werden
*/

-- 1:N Beziehung: 1 Join anhand des Fremdschlüssels user_ID:
SELECT * FROM `projekt` 
JOIN `user` ON `projekt`.`user_ID`=`user`.`ID`;


-- 1:N Beziehung: 1 Join mit Aliasname für die Spalte username - der username wird hier als "Author" zurückgegeben
SELECT `projekt`.*, `user`.`username` AS `author`
FROM `projekt` 
JOIN `user` ON `projekt`.`user_ID`=`user`.`ID`;


-- N:M Beziehung: 2 Joins von Tabelle A > Hilfstabelle > Tabelle B
SELECT * FROM `projekt` 
JOIN `projekt_has_kategorie` ON projekt.ID = projekt_has_kategorie.projekt_ID 
JOIN `kategorie` ON projekt_has_kategorie.kategorie_ID = kategorie.ID;


-- N:M Beziehung: 2 Joins mit Aliasnamen für die Bezeichnungen (so wird der Befehl kürzer und - vielleicht - überseichtlicher)
SELECT * FROM `projekt` AS p
JOIN `projekt_has_kategorie` AS pk ON p.ID = pk.projekt_ID 
JOIN `kategorie` AS k ON pk.kategorie_ID = k.ID;
