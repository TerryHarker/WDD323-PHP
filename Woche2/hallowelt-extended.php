<?php
// Das erste Script... (und dies ist ein einzeiliger Kommentar)
$begruessung =  "Hallo <b>Welt!...</b>"; // Variable definieren
define("GREETING", "Welcome to W3Schools.com!"); // Konstante definieren
// define("GREETING", "Test!"); // Konstanten können nicht überschrieben werden// 

// Aktuelle Stunde ermitteln:
$stunde = date("H");
echo "wert von date: ".$stunde; // Zusammenfügen von Strings und Variablen mit Punkt

// je nach Wert von $stunde stellen wir CSS Werte auf tages oder nachtmodus
if( $stunde < 18 ){
    $background = "#FFFFFF";
    $fontcolor = "#000000";
}else{
    $background = "#000000";
    $fontcolor = "#FFFFFF";
}
?>
<html>
<head>
	<style>
		body {
			text-align:center;
			margin-top:10vh;
            background-color: <?= $background; // Kurzschreibweise ?>;
            color:<?php echo $fontcolor; ?>;
		}
		.primary-color {
			color:#77bf54;
		}
	</style>
</head>
<body>
	<h1><?php echo $begruessung; // Variable ausgeben ?></h1>
    <?php echo GREETING; // ausgabe der Konstante ?>
</body>
</html>
