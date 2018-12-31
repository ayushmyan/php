
<?php
/*
 * The goal is to use a combination of multiple loops, functions, and nested arrays (multidimensional arrays)
 * to output a form to let a user pick date information.
 *
 * In addition to doing this as it's own assignment
 * You'll want to modify this in order to use it in the next assignment.
 */

function selectArray($name,$theArray) {
	// Based slightly off of https://github.com/andrew-chen/csis311/blob/master/examples/selectArray.php

	echo "<select name=\"$name\">";
	/* loop through $theArray and have the following loop body work on every $key => $value) */ 
	foreach ($theArray as $key => $value){
	
		echo "<option value=\"$key\">$value</option>";
	};
	echo "</select>";
	
	
	
};

function selectNum($name,$first,$last) {
// Based slightly off of https://github.com/andrew-chen/csis311/blob/master/examples/selectNum.php
	echo "<select name=\"$name\">";
/* have $i go from $first to $last */
	for ($i=$first; $i<=$last; $i++){
	
		echo "<option>$i</option>";
	};
	echo "</select>";
};

function form($layout) {
	echo "<form>";
/* loop through $layout and have the following loop body work on every $key => $value) */ 
	foreach ($layout as $key =>$value){
		
		if (is_array($value)) {
		if ((count($value) == 2)&&(is_numeric($value[0]))&&(is_numeric($value[1]))) {
/* call selectNum with $key as the $name and with $value[0] as $first and with $value[1] as $last */
				selectNum($key,$value[0],$value[1]);
			} else {
/* call selectArray with $key as the $name and with $value as $theArray */
				selectArray($key,$value);
			};
		} else {
/* call selectNum with $key as the $name and with 1 as $first and with $value as $last */
			selectNum($key,1,$value);
		};
	};
	echo "<input type=\"submit\"></form>";
};

if (count($_REQUEST)) {
	print_r($_REQUEST);
} else {
	form(array("year"=>array(2010,2020),"month"=>array("January","February","March","April","May","June","July","August","September","October","November","December"),"day"=>31,"hour"=>24,"minute"=>60));
};
?>

<p><a href="../.">Back to main page.</a></p>
</body>
</html>
