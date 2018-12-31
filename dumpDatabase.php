<html>
<head>
<title>DB Example</title>
</head>
<body>
<?php
$dbname = "thakuriay_people"; // replace with your database name
$username = "thakuriay";  // replace with your username
$password = "******";  // replace with your password, nobody can see it
extract($_POST);
echo <<< HERE
   <form method="POST"> 
   <h2>Database: $dbname</h2>
   <h2>View Table: 
         <input type="submit" name="button" value="people">
 
   </h2>
   </form>
   <form action="../index.html">  <!-- change the action to where you want to go -->
      <input type="submit" value="return to assignment index">
   </form>
HERE;
if ($button == "people" )
{
   echo <<< HERE
      <form method="POST"> 
      <input type="submit" name="button" value="clear">
      </form>
HERE;
   $table = $button;
   $conn = mysqli_connect("localhost",$username,$password,$dbname);
   $sql = "select * from $table";
   $result = mysqli_query($conn,$sql);
   
   // output the field names
   echo "<h3>Field Names in the $table table</h3>";
   while ($field = mysqli_fetch_field($result))
   {
      echo "$field->name<br>\n";
   }
   
   
   // output the records
   echo "<h3>Records in the $table table</h3>";
   echo "------------------<br>";
   while ($row = mysqli_fetch_assoc($result))
   {
      foreach ($row as $col=>$val)
      {
         echo "$col - $val<br>\n";
      }
      echo "------------------<br>";
   }
}


echo <<< HERE
<form method="POST">
		<h2>Add a field------------ <BR></h2>
		<h4>Name:  <input type="text" name="name"><BR></h4>
		<h4>Place: <input type="text" name="place"><BR></h4>
		<h4>Thing: <input type ="text" name ="thing"><BR></h4>
		<h4>sex (m or f):  <input type="text" name="sex"><BR></h4>
		<h4>Favorite Animal :  <input type="text" name=" animal"><BR></h4>
		<input type="submit" name="button" value="Add"><BR>
   </form>

HERE;

echo <<< HERE
<form method="POST">
		<h2>Drop a field----------- <BR></h2>
		<h4>Drop field by Name:	<input type="text" name="name"><BR></h4>
		<input type="submit" name="button" value="Drop"><BR>
		</form>	

HERE;

if ($button == "Drop")
{
		extract($_POST);
		$table = "people";
		$conn = mysqli_connect("localhost",$username,$password,$dbname);
		if (mysqli_connect_errno())
   		{
   		 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
   		}
		$sql = "DELETE FROM  people  WHERE name = '$name'" ;
		if ($conn->query($sql) === TRUE)
		{
				echo "Field for " . $name . " has been deleted successfully";
		}
		else
		{
				echo "Error: " . $sql . "<BR>" . $conn->error;
		}
		$conn->close();
}

if ($button == "Add")
{
		extract($_POST);
		$table = "people";
		$conn = mysqli_connect("localhost",$username,$password,$dbname);

		if (mysqli_connect_errno())
   		{
   		 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
   		}
		$sql = "INSERT INTO people (name, place, thing, sex, animal) VALUES (";
		$sql = $sql .  "'$name', '$place', '$thing', '$sex', '$animal')";

		if ($conn->query($sql) === TRUE)
	{
				echo " successfully created a new field.";
		}
		else
		{
				echo "Error: " . $sql . "<BR>" . $conn->error;
		}

		$conn->close();
}


?>

 
</body>
</html>
