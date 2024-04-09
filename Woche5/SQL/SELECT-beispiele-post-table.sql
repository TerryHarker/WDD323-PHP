-- Hier findest du ein paar Beispiele für SELECT Statements:

-- Posts auslesen für die Blog-ÜBersicht: gefiltert nach status=1 (veröffentlicht) und sortiert nach Datum (neuester zuerst)
SELECT `post_shorttext`,`post_title`,`post_created`,`post_author`,`post_category`,`post_shorttext` 
FROM `blogpost` 
WHERE `post_state`=1
ORDER BY `post_created` DESC;

-- Posts durchsuchen nach dem Wort "PHP" in titel, short text und long text
-- LIKE ermöglicht suche IN einem String, % ist ein Platzhalter für möglichen weiteren Text (davor, danach oder beides)
SELECT * 
FROM `blogpost` 
WHERE `post_title` LIKE "%PHP%" 
WHERE `post_shorttext` LIKE "%PHP%" 
OR `post_longtext` LIKE "%PHP%"

-- Post mit der ID 3 auslesen (für die Detailansicht)
SELECT * 
FROM `blogpost` 
WHERE `ID` = 3