// C - einen Blog Post erstellen
INSERT INTO `blogpost` (`post_title`, `post_shorttext`, `post_longtext`) 
VALUES ("Ein Post direkt aus dem SQL Befehl", "Wir üben DB Statements", "Das ist zwar nicht so schwierig aber man muss trotzdem gut aufpassen.");

// R - diesen Blog Post auslesen (ID zuerst herausfinden)
SELECT * FROM `blogpost` WHERE `ID`=27;

// U - diesen Blog Post bearbeiten (Titel anpassen)
UPDATE `blogpost` SET `post_title`="Neuer Titel" WHERE `ID`=27;

// D - diesen Blog Post löschen
DELETE FROM `blogpost` WHERE `ID`=27;