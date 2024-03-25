<?php
// https://www.php.net/manual/de/ref.array.php

$studenten = array( "Kim", "Leonie", "Robin", "Mario" );
// $studenten = [];

echo "<pre>";
print_r( $studenten );
echo "</pre>";

// echo $studenten[1];

for( $i=0; $i<count($studenten); $i++ ){
    echo $studenten[ $i ] ;
}
?>