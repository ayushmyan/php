<?php
//extract
   extract($_REQUEST);

//********************************
// Functions 

function displayform()
{

  echo "<form>"; 
echo <<< HERE
    <h3> Select Entrance Date: </h3>
HERE;
   $today = time();
   $thisYr = date("Y", $today);
   $thisMn = date("n", $today);
   $thisda = date("j", $today);
   $thisHr = date("G",$today);
   $thisMi = date("i",$today);
   
  echo "Year: ";  selectNum("year1", 2013, 2023, $thisYr);

  echo "Month: "; selectNum("month1", 1, 12, $thisMn);

  echo "Day: "; selectNum("day1", 1 , 31, $thisda);

  echo "Hour: ";  selectNum("hour1",0,23,$thisHr);

  echo "Minute: ";  selectNum("minute1",0,59,$thisMi);

echo <<< HERE
    <h3> Select Exit Date: </h3>
HERE;

  echo "Year: ";  selectNum("year2", 2013, 2023,$thisYr);

  echo "Month: ";selectNum("month2", 1, 12,$thisMn);

  echo "Day: ";selectNum("day2", 1 , 31,$thisda);

  echo "Hour: " ; selectNum("hour2",0,23,$thisHr);

  echo "Minute: ";  selectNum("minute2",0,59,$thisMi);
 
echo <<< HERE
	<br>
	<br>
	<br>
    <h3> Select Service: </h3>
HERE;
 echo <<< HERE

 
  <input type="radio" name="type" value="short" checked >Short-term parking <br/>
  <input type="radio" name="type" value="long"> Long-term parking <br/>
  <input type="radio" name="type" value="economy"> Economy parking <br/><br/>
  <input type="submit" name=button value="Calculate"><br/>

HERE;
  echo "</form>";
}

function selectNum($name,$first,$last,$def)
{
   echo "<select name=\"$name\">";
   for ($i=$first; $i<=$last; $i++)
   {
      if ($i == $def)
          echo "<option selected>$i</option>";
      else
          echo "<option>$i</option>";
  }
   echo "</select>";
   
}

function back2form()
{
   echo <<< HERE
   <br><br>
   <form>
      <input type="submit" name="$button" value="Go Back">
   </form>
HERE;
}

function back2home()
{
	
echo <<< HERE
<form action="../index.html">
  <input type ="submit" value = "Back to Main Page">
</form>
HERE;
}

//main function for display 

if ($button == NULL)
{
displayform();
back2home();
}
else if ($button == "Calculate")
{
	
if (checkdate($month1, $day1, $year1) && checkdate($month2, $day2, $year2)){
$date1 = mktime($hour1, $minute1, 0, $month1, $day1, $year1);
$date2 = mktime($hour2, $minute2, 0, $month2, $day2, $year2);
$mins = ($date2 - $date1)/60;
$tot = 0;

if ($type=="short")
{
$days = (int)($mins/1440);

$tot += 18*$days;

$rem = $mins%1440;

$ext = (int)($rem/30);

$tot += $ext;

echo "Total Airport Short-term Parking Fee : $" . $tot;
back2form(); 
}


else if ($type=="long")
{

$days = (int)($mins/1440);
$weeks = (int)($days/7);
$remDays = $days - ($weeks*7);
$tot += 48*$weeks;
$tot += 8*$remDays;
$rem = $mins%1440;
$ext = (int)($rem/30);
$tot += $ext;

echo "Total Airport Long-term Parking Fee : $" . $tot;
back2form();
}

else if ($type=="economy")
{

$days = (int)($mins/1440);
$weeks = (int)($days/7);
$remDays = $days - ($weeks*7);
$tot += 36*$weeks;
$tot += 6*$remDays;
$rem = $mins%1440;
$ext = (int)($rem/30);
$tot += $ext;

echo "Total Airport Economy Parking Fee : $" . $tot;
back2form();

}}
else
{
  echo "Incorrect dates. Please go back and input a correct date!";
  back2form();}
}

echo "<HR>";
highlight_file("index.php");
?>
