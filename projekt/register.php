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
                    <form action="/login" method="post">
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