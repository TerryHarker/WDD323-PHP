<?php
require_once( 'config.php' ); // Config werte laden
require_once( 'library/db.php' ); // DB Funktionen laden
require_once( 'library/session.php' ); // DB Funktionen laden

session_name( md5(SESSION_NAME) );
session_start();

$db = db_connect();

// user meldet sich ab
if( isset($_GET['action']) && $_GET['action']=='logout' ){
    delete_usersession();
}

// Login code
if( isset($_POST['username']) && isset($_POST['password']) ){
    
    // existiert die angegebene E-Mail? User daten holen
    $query = "SELECT * FROM `user` WHERE `email` = :username LIMIT 1";
    $statement = $db->prepare( $query );
    $statement->execute( array( 'username' => $_POST['username']) );
    $userdaten = $statement->fetch();
    var_dump( $userdaten );

    // wenn user gefunden, passwort vergleichen
    if($userdaten !== false){
        $passwordKorrekt = password_verify($_POST['password'], $userdaten['passwort']);
        // var_dump($passwordKorrekt);

        if($passwordKorrekt == true){
            create_usersession();
        }
    }
}

// print_r($_SESSION);

$isLoggedIn = check_usersession();
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
						<h2>Login</h2>
				</div>
				<div class="row mt-4">
                    <?php if($isLoggedIn == false){ ?>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit"  class="btn btn-primary" value="Login">
                        </div>
                    </form>
                    <?php }else{
                        echo 'Du bist schon eingeloggt';
                        echo ' <a href="login.php?action=logout">Abmelden</a>';
                    } ?>
                </div>
			</div>
		</section>
		
		<?php include("partials/footer.php"); ?>

	</body>
</html>