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
    $query = "SELECT * FROM `blogpost` WHERE `ID`=".$_GET['postID'];
    echo $query;

    $statement = $db->query($query);
    $datensatz = $statement->fetch( PDO::FETCH_ASSOC );

    print_r($datensatz);

    if( $datensatz !== false ){
        $ID = $datensatz['ID'];
        $post_title = $datensatz['post_title'];
        $post_shorttext = $datensatz['post_shorttext'];
        $post_longtext = $datensatz['post_longtext'];
    }
}

if( isset($_POST['ID']) && isset($_POST['post_title']) && isset($_POST['post_shorttext']) && isset($_POST['post_longtext']) ){
    // validierung (wird hier weggelassen)

    // ready für das speichern
} 

?>
<form action="" method="POST">
    Name: <input type="text" name="post_title" value="<?php echo $post_title; ?>"><br>
    Short Text: <textarea name="post_shorttext"><?php echo $post_shorttext; ?></textarea><br>
    Long Text: <textarea name="post_longtext"><?php echo $post_longtext; ?></textarea><br>
    <input type="submit" value="Speichern">
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
</form>