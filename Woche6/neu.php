<?php
try {
    // PDO Objekt mit verbindung erstellen
    $db = new PDO('mysql:host=localhost;dbname=wdd323_demo', 'root', ''); // xampp leer, mampp 'root'
    // var_dump($db);
} catch ( Exception $exception ){
    // Abbruch, wenn die DB Verbindung nicht klappt
    die( 'MySQL Verbindungsfehler: '.$exception->getMessage() );
}

// Formular für neue Beiträge: keine ID
$post_title = '';
$post_shorttext = '';
$post_longtext = '';


if( isset($_POST['post_title']) && isset($_POST['post_shorttext']) && isset($_POST['post_longtext']) ){
    // validierung (wird hier weggelassen)

    // Bereinigung der Daten
    $post_title = strip_tags($_POST['post_title']);
    $post_shorttext = strip_tags($_POST['post_shorttext']);
    $post_longtext = strip_tags($_POST['post_longtext'], '<a><p><b><i>');

    // ready für das speichern - Update Statement zusammenbauen
    $insertQuery = "INSERT INTO blogpost (post_title, post_shorttext, post_longtext)
    VALUES ('$post_title', '$post_shorttext', '$post_longtext')";
    echo '<pre>'.$insertQuery.'</pre>';
    
    try{
        $statement = $db->query($insertQuery);
        header('location:liste.php?msg=wurde gespeichert');
    }catch( Exception $e){
        echo 'Die Daten konnten nicht gespeichert werden: ';
        echo $e->getMessage();
    }
}

?>
<form action="" method="POST">
    Name: <input type="text" name="post_title" value="<?php echo $post_title; ?>"><br>
    Short Text: <textarea name="post_shorttext"><?php echo $post_shorttext; ?></textarea><br>
    Long Text: <textarea name="post_longtext"><?php echo $post_longtext; ?></textarea><br>
    <input type="submit" value="Speichern">
</form>