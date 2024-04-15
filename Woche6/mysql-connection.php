<?php

try {
    // PDO Objekt mit verbindung erstellen
    $db = new PDO('mysql:host=localhost;dbname=wdd323_demo', 'root', ''); // xampp leer, mampp 'root'
    // var_dump($db);
} catch ( Exception $exception ){
    // Abbruch, wenn die DB Verbindung nicht klappt
    die( 'MySQL Verbindungsfehler: '.$exception->getMessage() );
}

$query = "SELECT * FROM `blogpost`";
$statement = $db->query($query);
$daten = $statement->fetchAll( PDO::FETCH_ASSOC );

echo '<pre>';
// print_r($daten);
echo '</pre>';


/*
foreach( $daten as $blogpost ){
    echo '<p>'.$blogpost['post_title'].'</p>';
}
*/

?>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Titel</th>
        <th></th>
    </tr>

    <?php foreach( $daten as $blogpost ): ?>
    <tr>
        <td><?php echo $blogpost['ID']; ?></td> 
        <td><?php echo $blogpost['post_title']; ?></td>
        <td>
            <a href="editform.php?postID=<?php echo $blogpost['ID']; ?>">[EDIT]</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>