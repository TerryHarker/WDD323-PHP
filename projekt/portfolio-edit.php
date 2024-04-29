<?php
$isLoggedIn = false;

if($isLoggedIn !== true){
    header('Location: login.php');
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
						<h2>Login</h2>
				</div>
				<div class="row mt-4">
                    <?php if($isLoggedIn == false){ ?>
                    <form action="/login" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login">
                        </div>
                    </form>
                    <?php } ?>
                </div>
			</div>
		</section>
		
		<?php include("partials/footer.php"); ?>

	</body>
</html>