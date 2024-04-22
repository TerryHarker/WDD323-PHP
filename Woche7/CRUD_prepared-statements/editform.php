<?php
 try {
    // PDO Objekt mit verbindung erstellen
    $db = new PDO('mysql:host=localhost;dbname=wdd323_demo', 'root', ''); // xampp leer, mampp 'root'
    // var_dump($db);
} catch ( Exception $exception ){
    // Abbruch, wenn die DB Verbindung nicht klappt
    die( 'MySQL Verbindungsfehler: '.$exception->getMessage() );
}
$ID = '';
$post_title = '';
$post_shorttext = '';
$post_longtext = '';

// Formular zum Bearbeiten eines Blogposts
if( isset($_GET['postID']) ){
    // $query = "SELECT * FROM `blogpost` WHERE `ID`=".$_GET['postID'];
    
    // User Input (ID von URL) - Prepared Statement!
    $query = "SELECT * FROM `blogpost` WHERE `ID`= :postID";
    
    // $statement = $db->query($query);
    $statement = $db->prepare($query); // Den DB Server vorbereiten: das ist der auszuführende Befehl
    $statement->execute( array('postID' => $_GET['postID']) );
    $datensatz = $statement->fetch( PDO::FETCH_ASSOC );

    /*
    echo '<pre>';
    print_r($datensatz);
    echo '</pre>';
    */

    if( $datensatz !== false ){
        $ID = $datensatz['ID'];
        $post_title = $datensatz['post_title'];
        $post_shorttext = $datensatz['post_shorttext'];
        $post_longtext = $datensatz['post_longtext'];
    }
}

if( isset($_POST['ID']) && isset($_POST['post_title']) && isset($_POST['post_shorttext']) && isset($_POST['post_longtext']) ){
    // validierung (wird hier weggelassen)

    // Bereinigung der Daten
    $ID = (int) $_POST['ID']; // Integer erzwingen
    $post_title = strip_tags($_POST['post_title']);
    $post_shorttext = strip_tags($_POST['post_shorttext']);
    $post_longtext = strip_tags($_POST['post_longtext'], '<a><p><b><i>');

    // ready für das speichern - Update Statement zusammenbauen
    /*
    $updateQuery = "UPDATE `blogpost` 
    SET `post_title`='$post_title', 
    `post_shorttext`='$post_shorttext',
    `post_longtext`='$post_longtext'
    WHERE `ID`=$ID";
    */

    // User Input -> prepared Statement!
    $updateQuery = "UPDATE `blogpost` 
    SET `post_title`=:post_title, 
    `post_shorttext`=:post_shorttext,
    `post_longtext`=:post_longtext
    WHERE `ID`=:id";

    // Werte als Array vorbereiten - Array Keys heissen so wie Platzhalter
    $values = array(
        'id' => $ID,
        'post_title' => $post_title,
        'post_shorttext' => $post_shorttext,
        'post_longtext' => $post_longtext
    );
    
    // echo '<pre>'.$updateQuery.'</pre>';
    try{
        // $statement = $db->query($updateQuery);
        
        // Zuerst NUR den Befehl schicken - prepare() statt query():
        $statement = $db->prepare( $updateQuery );
        
        // dann ausführen mit den Werten:
        $statement->execute( $values );
        header('Location: liste.php?msg=Gespeichert');

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
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
</form>