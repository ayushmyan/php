<?php
extract($_GET);
echo "<form>";
echo "<h1> Player: ".$name."</h1>";           //This displays player's name

if ($button == NULL || $button == "Start")    //game begins
{ 
   $a = rand(0,51);                           //rand function generates the first random card to show
   $b = rand(0,51);                           //rand function generates second random card to show
   $money = 50;                              //Credit money given to player at first
   $cards = buildDeck();                      //deck of cards is built
   echo "<img src=\"$cards[$a].jpg\">";
   echo "<img src=\"$cards[$b].jpg\">";
   echo "<br><br><br>";
   echo "Money Left: $".$money;
   echo "<br><br>";
   echo "Enter your bet: ";         //player enters amount that they want to bet and the minimum amount is set to 0$
   echo <<< HERE
   <input type="number" min=0 max=$money name="theBet"> 
   <br/>
   <input type="submit" name="button" value="Bet">
   <br><br><br><br>
   <input type="submit" name="button" value="View Code">
HERE;
}
else if($button == "View Code")
{
echo "<HR>";
highlight_file("cards.php");
}





else if ($button == "Next")
{
if ($money > 0)                 //checks if player has enough money to proceed
{
  $a = rand(0,51);              //new random cards are shown
  $b = rand(0,51);
  $cards = buildDeck();
   echo "<img src=\"$cards[$a].jpg\">";
   echo "<img src=\"$cards[$b].jpg\">";
   echo "<br><br><br>";
   echo "Money Left: $".$money;
   echo "<br><br>";
   echo "Enter your bet: ";
   echo <<< HERE
   <input type="number" min=0 max=$money name="theBet">
   <br/>
   <input type="submit" name="button" value="Bet">
   <br/>
   <input type="submit" name="button" value="View Code">
HERE;

}

else                             //if player does not have money, player can restart or exit out of the game
{
  echo "You lost all your money. Please click restart to play again";
  echo "<br><br>";
}

}
else if ($button=="Bet")
{
   echo "<img src=\"$cards[$a].jpg\">";
   echo "<img src=\"$cards[$b].jpg\">";
   echo "<br><br><br>";
   echo "YOUR CARD: <br>";
   $c = rand(0,51);                     //random function used to generate player's card
   echo "<img src=\"$cards[$c].jpg\">";
   echo "<br><br>";
   $first = simpleForm($a);            //fix numbers to check if card is in between
   $last = simpleForm($b);
   $between = simpleForm($c);
   echo "<br>";
   if (($first < $between && $last > $between) || ($first > $between && $last < $between))
   {
     $money += $theBet;               //bet money added to player's money if card is in between shown cards
     echo "Congratulations,You won the bet. Your card is in between the two cards. .";
   }
   else
   {   
      $money -= $theBet;            //bet is deducted from player's money 
      echo "Oouch!! Your card is not in between the two cards. The bet is deducted from you.";
   }
   echo "<br><br><br>";
   echo "Money Left: $".$money;
   echo "<br><br>";
   echo <<< HERE
   <input type="submit" name="button" value="Next">
   <br>
   <input type="submit" name="button" value="View Code">

HERE;
}
passData($cards,$cardNum,$a,$b,$money,$name);
echo "</form>";


// Functions

function passData($cards,$cardNum,$a,$b,$money,$name)
{
   echo "<input type=\"hidden\" name=\"cardNum\" value=\"$cardNum\">";
   echo "<input type=\"hidden\" name=\"a\" value=\"$a\">";
   echo "<input type=\"hidden\" name=\"b\" value=\"$b\">";
   echo "<input type=\"hidden\" name=\"money\" value=\"$money\">";
   echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";

   for ($i=0; $i<52; $i++)
      echo "<input type=\"hidden\" name=\"cards[$i]\" value=\"$cards[$i]\">";
}

function buildDeck()
{
   $suits = array("H","D","S","C");           //using array 
   $num=0;
   foreach ($suits as $suit)
   {
      for ($j=1; $j<=13; $j++)
         $cards[$num++] = "$suit$j";
   }
   return $cards;
}

function simpleForm($num)
{
   while ($num >= 13)
      $num -= 13;
   return $num;
}

?>
<form action="index.html">
<input type="submit" value = "Restart">
</form>

