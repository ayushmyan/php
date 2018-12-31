<form>
<?php
extract($_REQUEST);
    
function namepage()
{
	echo <<< HERE
  <h1> Division Quiz </h1>
  <h2> Enter your name: <input type="text" name= "name" autocomplete="off"> </h2>
  	
  <br>
  <input type="submit" name="button" value="Start">  <br> <br>
  <a href="../index.html"> Main Page </a>
HERE;

}

function querypage($name,$rand,$rand1,$right,$num)
{

 echo <<< HERE
 <h1> Participant: $name </h1>
 <h2> $rand / $rand1 = <input type="text" name="answer" autocomplete="off"> </h2>
 <br>
 <input type="submit" name="button" value="Submit">
 <input type="submit" name="button" value="Restart">

 <br><br>
 Number of correct answers: $right <br>
 Number of problems attempted: $num <br>


HERE;
echo "<input type='hidden' name='name' value='$name'>";
echo "<input type='hidden' name='rand' value='$rand'>";
echo "<input type='hidden' name='rand1' value='$rand1'>";
echo "<input type='hidden' name='right' value='$right'>";
echo "<input type='hidden' name='num' value='$num'>";
}

function check($name,$answer,$rand,$rand1,&$right,&$num)
{
	if ($rand / $rand1 == $answer){
		$right++;
		$num++;
		
		echo <<< HERE
		<h3> CORRECT! </h3>
		$rand / $rand1 = $answer <br><br>
		<input type="submit" name="button" value="Next Problem"> <br><br>
      Number of correct answers: $right <br>
      Number of problems attempted: $num <br>
HERE;

	}
	
	else{
		$num++;
		echo <<< HERE
      <h1> INCORRECT!</h1>
      <input type="submit" name="button" value="Try Again"><br><br>
	  <input type="submit" name="button" value="Restart"><br><br>
      Number of correct answers: $right <br>
      Number of problems attempted: $num <br>
      
HERE;
	}
	
	echo "<input type='hidden' name='name' value='$name'>";
	echo "<input type='hidden' name='right' value='$right'>";
	echo "<input type='hidden' name='num' value='$num'>";
	echo "<input type='hidden' name='rand' value='$rand'>";
	echo "<input type='hidden' name='rand1' value='$rand1'>";
}


   
if ($button==NULL or $button =="Restart") {
namepage();}

else if ($button == "Start"){
		$rand = rand(1,9);
		$rand1 = rand(1,9);
		$right =0;
		$num =0;
    querypage($name,$rand,$rand1,$right,$num);}

else if ($button == "Next Problem"){
	$rand = rand(1,9);
	$rand1 = rand(1,9);
	querypage($name,$rand,$rand1,$right,$num);}
	
else if ($button == "Try Again"){
	querypage ($name,$rand,$rand1,$right,$num);}
	
else if ($button == "Submit"){
	check($name,$answer,$rand,$rand1,$right,$num);   
}

?>
</form>

 


<?php
echo "<HR>";
highlight_file("index.php"); ?>

