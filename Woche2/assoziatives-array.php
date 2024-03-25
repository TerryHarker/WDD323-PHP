<?php
$student = array(
    "vorname" => "Lilly",
    "nachname" => "Müller",
    "email" => "lillym@gmail.com"
);

echo "<pre>";
print_r( $student );
echo "</pre>";

// echo $student["vorname"];

foreach( $student as $irgendwas ){
    echo $irgendwas;
}
?>