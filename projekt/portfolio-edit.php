<?php
require_once( 'config.php' ); // Config werte laden
require_once( 'library/db.php' ); // DB Funktionen laden
require_once( 'library/session.php' ); // DB Funktionen laden

session_name( md5(SESSION_NAME) );
session_start();


$isLoggedIn = check_usersession(); // Loginstatus ermitteln
// var_dump($isLoggedIn);

if($isLoggedIn !== true){
    header('Location: login.php');
}

// diese Seite ist komplett login-geschützt, alles andere kommt deswegen nach dem login-check

$id = isset($_GET['id']) ? $_GET['id']:0; // id aus GET, und wenn nicht vorhanden, 0

// Anhan der ID können wir herausfinden, ob ein neuer Beitrag erstellt werden soll, oder ein existierender bearbeitet
if($id > 0){
	$titel = 'Bearbeiten';
}else{
	$titel = 'Erstellen';
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
					<h2><?php echo $titel; ?></h2>
				</div>
				<div class="row mt-4">
                   <div>Formular wäre hier...</div>
                </div>
			</div>
		</section>
		
		<?php include("partials/footer.php"); ?>

	</body>
</html>