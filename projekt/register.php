<?php
require_once( 'config.php' ); // Config werte laden
require_once( 'library/db.php' ); // DB Funktionen laden

$db = db_connect();

if( isset($_POST['email']) ){

    // abfragen ob User existiert
    // existiert die angegebene E-Mail? User daten holen
    $query = "SELECT * FROM `user` WHERE `email` = :email";
    $statement = $db->prepare( $query );
    $statement->execute( array( 'email' => $_POST['email']) );
    $userCount = $statement->rowCount();

    echo '<br>Anzahl User mit dieser E-Mail in DB gefunden: ';
    var_dump( $userCount );

    // wenn nicht, user eintragens
    $passwort = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // INSERT INTO
}

?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
	<head>	
		<?php include("partials/htmlhead.php"); ?>
	</head>
	<body>
		<?php include("partials/navbar.php"); ?>
	
		<section class="main-section">
			<div class="container">
				
				<div class="mt-5">
					<h2>Registrieren</h2>
				</div>
				<div class="row mt-4">
                    <form action="register.php" method="post">
                        <div class="mb-3">  
                            <label for="username">Dein Name:</label><br>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="mb-3">  
                            <label for="username">E-Mail:</label><br>
                            <input type="text" id="email" name="email" required>
                        </div>
                        <div class="mb-3">  
                            <label for="password">Passwort:</label><br>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="mb-3">  
                            <input type="submit" class="btn btn-primary" value="Registrieren">
                        </div>
                    </form>
                </div>
			</div>
		</section>
		
		<?php include("partials/footer.php"); ?>

	</body>
</html>