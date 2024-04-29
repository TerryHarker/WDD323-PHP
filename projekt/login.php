<?php
$isLoggedIn = false;
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
                    <?php } ?>
                </div>
			</div>
		</section>
		
		<?php include("partials/footer.php"); ?>

	</body>
</html>