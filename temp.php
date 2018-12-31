<html>
<body>

<?php

$button = $_REQUEST['button'];
$value = $_REQUEST["temp"];

if ($button == "Fahrenheit to Celsius")
{
    $Celsius=($value-32)*(5/9);
    echo "<h1> The Fahrenheit value of ". ($value) ." in degree Celsius is ".number_format($Celsius,2)."</h1> ";
}

if ($button == "Celsius to Fahrenheit")
{
    $Fahrenheit=$value * (9/5) + 32;
    echo "<h2> The Celsius value of ". ($value) ." in degree Fahrenheit is ".number_format($Fahrenheit,2)."</h2> ";
}
?>

<form action="temp.html">
<form>
  <input type="button" value="Go back!" onclick="history.back()">
</form>   
	
</body>
</html>

<?php
echo "<HR>";
highlight_file("temp.php"); ?>
