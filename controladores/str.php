<?php
/*
$str1 = "el mundo es hermoso    ";

echo "a".$str1."b";

echo "<br>";

echo "a".trim($str1, " ")."b";

echo "<br>";

$pos=stripos($str1, " ");

echo " y existe en la posición ".$pos;

echo "<br>";

$haystack = 'FRANCISCO JAVIER';

$needle   = " ";

$pos = strripos($haystack, $needle);

$rest = substr($haystack, $pos+1); // devuelve "d"

$haystack = substr($haystack, 0, $pos);

echo "<br>";

echo "materno: " . $rest;

echo "<br>";

echo $haystack;

$pos = strripos($haystack, $needle);

$rest = substr($haystack, $pos); // devuelve "d"

$haystack = substr($haystack, 0, $pos);

echo "<br>";

echo "paterno: ".$rest;

$rest = substr($haystack, $pos); // devuelve "d"

if($rest){
    echo "paterno: ".$rest;
}
echo "<br>";

echo $haystack;
*/

echo "<br>";

$haystack = 'francisco.vasquezjr@alumnos.udg.mx |';

$needle   = "@";

$pos = strripos($haystack, $needle);

$rest = substr($haystack, $pos+1); // devuelve "d"

$haystack = substr($haystack, 0, $pos);

echo "dominio: ".$rest;

?>    