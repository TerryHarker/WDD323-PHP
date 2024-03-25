<?php
// Bilder aus Medienordner auslesen:
$bilderordner = "media";
$dateien = scandir( $bilderordner ); // gibt ein Array mit Inhalten des Ordners zurück
echo '<pre>';
print_r( $dateien );
echo '</pre>';

// echo filetype( $bilderordner."/".$dateien[3] );
$letzterPunkt = strrpos($dateien[3], ".");
$dateiendung = substr( $dateien[3], $letzterPunkt );
echo "Die Dateiendung ist: ".$dateiendung;

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
						<h2>Aktuelle Projekte</h2>
				</div>
				<div class="row mt-4">

				<?php foreach($dateien as $datei ){ 
					
					$letzterPunkt = strrpos($datei, ".");
					$dateiendung = substr( $datei, $letzterPunkt );
					// echo "Die Dateiendung ist: ".$dateiendung;

					if( $dateiendung == '.jpg' || $dateiendung == '.png' ){
					?>

					<div class="col-12 col-sm-6 col-md-3">
						<img src="media/<?php echo $datei; ?>">
					</div>

					<?php 
					}
				}
				?>

				</div>
				<div>
					<em class="text-muted">image credit: webflow.io</em>
				</div>
			</div>
		</section>
		
		<?php include("partials/footer.php"); ?>

	</body>
</html>