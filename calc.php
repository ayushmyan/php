<html>
<body>

<?php

$num = $_REQUEST["num"];
$num1 = $_REQUEST["num1"];
$val = $_POST["calc"];

if ($val == "addition")
$result = $num + $num1;

if ($val == "subtraction")
$result = $num - $num1;

if ($val == "multiplication")
$result = $num * $num1;

if ($val == "division")
$result = $num / $num1;

if ($val == "modulus")
$result = $num % $num1;

echo " <h1> The result is " .number_format($result,2). "</h1>";
?>

<form action="calc.html">
<input type="submit" value = "GO BACK">
</form>
<form action="../index.html">
  <input type ="submit" value = "">
</form>

</body>
</html>

<?php
echo "<HR>";
highlight_file("calc.php"); ?>
