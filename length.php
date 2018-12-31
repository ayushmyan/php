<html>
<body>

<?php

$value = $_REQUEST["val"];
$unit1 = $_REQUEST["units"];
$unit2 = $_REQUEST["button"];



if ($unit1 == $unit2)
$result = $value;

if ($unit1 == "Inches" && $unit2 == "Feet")
$result = $value * 0.83;
if ($unit1 == "Inches" && $unit2 == "Miles")
$result = $value * 0.0000157828;
if ($unit1 == "Inches" && $unit2 == "Centimeters")
$result = $value * 2.54;
if ($unit1 == "Inches" && $unit2 == "Meters")
$result = $value * 0.0254;
if ($unit1 == "Inches" && $unit2 == "Kilometers")
$result = $value * 0.0000254;


if ($unit1 == "Feet" && $unit2 == "Inches")
$result = $value * 12;
if ($unit1 == "Feet" && $unit2 == "Miles")
$result = $value * 0.000189394;
if ($unit1 == "Feet" && $unit2 == "Centimeters")
$result = $value * 30.48;
if ($unit1 == "Feet" && $unit2 == "Meters")
$result = $value * 0.3048;
if ($unit1 == "Feet" && $unit2 == "Kilometers")
$result = $value * 0.000305;


if ($unit1 == "Miles" && $unit2 == "Inches")
$result = $value * 63360;
if ($unit1 == "Miles" && $unit2 == "Feet")
$result = $value * 5280;
if ($unit1 == "Miles" && $unit2 == "Centimeters")
$result = $value * 160934.4;
if ($unit1 == "Miles" && $unit2 == "Meters")
$result = $value * 1609.344;
if ($unit1 == "Miles" && $unit2 == "Kilometers")
$result = $value * 1.609;


if ($unit1 == "Centimeters" && $unit2 == "Inches")
$result = $value * 0.394;
if ($unit1 == "Centimeters" && $unit2 == "Feet")
$result = $value * 0.0328084;
if ($unit1 == "Centimeters" && $unit2 == "Miles")
$result = $value * 0.00000621371;
if ($unit1 == "Centimeters" && $unit2 == "Meters")
$result = $value * 0.01;
if ($unit1 == "Centimeters" && $unit2 == "Kilometers")
$result = $value * 0.00001;


if ($unit1 == "Meters" && $unit2 == "Inches")
$result = $value * 39.3701;
if ($unit1 == "Meters" && $unit2 == "Feet")
$result = $value * 3.28084;
if ($unit1 == "Meters" && $unit2 == "Miles")
$result = $value * 0.000621371;
if ($unit1 == "Meters" && $unit2 == "Centimeters")
$result = $value * 100;
if ($unit1 == "Meters" && $unit2 == "Kilometers")
$result = $value * 0.001;

if ($unit1 == "Kilometers" && $unit2 == "Inches")
$result = $value * 39370.1;
if ($unit1 == "Kilometers" && $unit2 == "Feet")
$result = $value * 3280.84;
if ($unit1 == "Kilometers" && $unit2 == "Miles")
$result = $value * 0.621371;
if ($unit1 == "Kilometers" && $unit2 == "Centimeters")
$result = $value * 100000;
if ($unit1 == "Kilometers" && $unit2 == "Meters")
$result = $value * 1000;


echo "<h1> The result is " .$result . $unit2. "</h1>";



?>

<form action="length.html">
<input type="submit" value = "GO BACK">
</form>
<form action="../index.html">
  <input type ="submit" value = "MAIN PAGE">
</form>

</body>
</html>

<?php
echo "<HR>";
highlight_file("length.php"); ?>
