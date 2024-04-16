<?php

try {
    // PDO Objekt mit verbindung erstellen
    $db = new PDO('mysql:host=localhost;dbname=wdd323_demo', 'root', ''); // xampp leer, mampp 'root'
    // var_dump($db);
} catch ( Exception $exception ){
    // Abbruch, wenn die DB Verbindung nicht klappt
    die( 'MySQL Verbindungsfehler: '.$exception->getMessage() );
}

/*
Möglichke Aktionen durch URL Parameter abarbeiten
es ist wichtig, dass die Datenmanipulation (CUD) VOR dem READ gemacht werden
weil das READ sonst einen alten Datenstand repräsentiert.
*/
if( isset($_GET['action']) ){
    switch($_GET['action']){
        case 'delete':
            // löschbefehl via url erhalten - löschen!
            if( isset($_GET['postID']) ){
                // Lösch Abfrage erstellen und abschicken
                $query = "DELETE FROM `blogpost` WHERE `ID`=".$_GET['postID'];
                $statement = $db->query($query);
                
                // Liste noch mal ohne GET Params aufrufen:
                header('Location:liste.php?msg=wurde gelöscht');
            }
            break;
    }
}

/** READ - nachdem alle Manipulation erfolgt ist, lesen wir die Daten zur Anzeige aus */
// Abfrage erstellen und an die Datenbank schicken
$query = "SELECT * FROM `blogpost`";
$statement = $db->query($query);

// Daten abholen lassen
$daten = $statement->fetchAll( PDO::FETCH_ASSOC );

echo '<pre>';
// print_r($daten);
echo '</pre>';


/*
foreach( $daten as $blogpost ){
    echo '<p>'.$blogpost['post_title'].'</p>';
}
*/

if(isset($_GET['msg'])){
    echo '<div style="background:green">'.$_GET['msg'].'</div>';
}
?>
<a href="neu.php">[NEU]</a>
<table border="1">

    <tr>
        <th>ID</th>
        <th>Titel</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach( $daten as $blogpost ): ?>
    <tr>
        <td><?php echo $blogpost['ID']; ?></td> 
        <td><?php echo $blogpost['post_title']; ?></td>
        <td>
            <a href="editform.php?postID=<?php echo $blogpost['ID']; ?>">[EDIT]</a>
        </td>
        <td>
            <a href="liste.php?action=delete&postID=<?php echo $blogpost['ID']; ?>">[x]</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>