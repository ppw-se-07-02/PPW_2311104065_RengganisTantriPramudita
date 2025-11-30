<?php
$celcius = 30;
$fahrenheit = 86;

// Celcius ke Fahrenheit
$cf = ($celcius * 9/5) + 32;

// Fahrenheit ke Celcius
$fc = ($fahrenheit - 32) * 5/9;

// Celcius ke Kelvin
$ck = $celcius + 273.15;

echo "Celcius ke Fahrenheit: " . number_format($cf, 2) . "<br>";
echo "Fahrenheit ke Celcius: " . number_format($fc, 2) . "<br>";
echo "Celcius ke Kelvin: " . number_format($ck, 2) . "<br>";
?>
