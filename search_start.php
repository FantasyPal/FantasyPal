<html>
 <head>
<style type="text/css">
table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
    text-align:center;
}
table.hovertable th {
	background-color:#c3dde0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#d4e3e5;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable {
    margin: 0px auto;            
}

</style>   
     
    <title>Fantasy P.A.L</title>

     
    <style>
        table, th, td{border: 1px solid black;}
    </style>

     
    </head>
    
    <body>

        <!--Menu to navigate the webpages WL-->

    <table class = "hovertable" width=" 100% border= '1'  cellpadding ='1' summary= 'Site Links'">
    <tbody>
      <tr>
      <td align="center"><a href="index.php">Home</a></td>
      <td align="center"><a href="statistics.php">Statistics</a></td>
      <td align="center"><a href="rankings.php">Rankings</a></td>
      <td align="center"><a href="userteam.php">Teams</a></td>
      <td align="center"><a href="search_start.php">Lineup Selection</a></td>
      </tr>
    </tbody>
    </table>
        
    <p>Choose the Position of Desired Player</p>
        
    <!--drop down menu to initiate a switch case to decide which position to enter searched player 
    goes to page search_start.php?go when submitted - WL -->
	<form method="post" action="search_start.php?go"  id="searchform">
	<select name="dropdown">
    <option value = 'none' selected>Select One</option>
	<option value="QB">Quarterback</option>
	<option value="RB">Running back</option>
	<option value="WR">Wide Receiver</option>
    <option value="TE">Tight End</option>
	</select>
	
        
    <p>Type the Players full name to enter them into the table</p> 
	    
        <!--input to enter in the name of the player - WL -->
	    <input  type="text" name="name">  
        
        <!--submit button to search for selected player/
        it all submits at he enter of this button - WL -->
        <input  type="submit" name="submit" value="Search"> 
        
        <!-- drop down menu to determine where to put selected player - WL-->
        <select name="dropdown2">
        <option value = 'none' selected>Select One</option>
	    <option value="play">Play</option>
        <option value="flex">Flex</option>
	    <option value="bench">Bench</option>
	    </select> 
        
        <p>Select the Opponent of your Selected Player for the Week</p> 
        <!-- drop down menu to determine wwhat team the selected player is playing against - WL-->
        <select name="dropdown3">
        <option value = 'none' selected>Select One</option>
            <option value = "ARI">Arizona Cardinals</option>
	    	<option value = "ATL">Atlanta Falcons</option>
		    <option value="BAL">Baltimore Ravens</option>
		    <option value = "BUF">Buffalo Bills</option>
            <option value="CAR">Carolina Panthers</option>
		    <option value = "CHI">Chicago Bears</option>
            <option value="CIN">Cincinnati Bengals</option>
		    <option value = "CLE">Cleveland Browns</option>
            <option value="DAL">Dallas Cowboys</option>
		    <option value = "DEN">Denver Broncos</option>
            <option value="DET">Detroit Lions</option>
		    <option value = "GB">Greenbay Packers</option>
            <option value="HOU">Houston Texans</option>
		    <option value = "IND">Indianapolis Colts</option>
            <option value="JAX">Jacksonville Jaguars</option>
		    <option value = "KC">Kansa City Chiefs</option>
            <option value="LA">Los Angeles Rams</option>
		    <option value = "LAC">Los Angeles Chargers</option>
            <option value="MIA">Miami Dolphins</option>
		    <option value = "MIN">Minnesota Vikings</option>
            <option value="NE">New England Patriots</option>
		    <option value = "NO">New Orleans Saints</option>
            <option value="NYG">New York Giants</option>
		    <option value = "NYJ">New York Jets</option>
            <option value="OAK">Oakland Raiders</option>
		    <option value = "PHI">Philadelphia Eagles</option>
            <option value="PIT">Pittsburgh Steelers</option>
		    <option value = "SEA">Seattle Seahawks</option>
            <option value="SF">San Francisco 49ers</option>
		    <option value = "TB">Tampa Bay Buccaneers</option>
            <option value="TEN">Tennessee Titans</option>
		    <option value = "WAS">Washington Redskins</option>
	    </select> 
	     
	</form>

</body>  
    
</html>




<?php
        include 'userlineupclass.php';       
 
      //connect  to the database - WL
	  $db=mysql_connect  ("dbsrv2.cs.fsu.edu", "hapgood",  "CEN4020SH") or die ('I cannot connect to the database  because: ' . mysql_error()); 

	  //-select  the database to use - WL
      $mydb=mysql_select_db("hapgooddb"); 

    //gets the "user" name through the cookies of the website - JC
    $id = $_COOKIE["user"];
    
    //creates an instance of an UserLineup object - WL
    $user = new UserLineup($id);

    //if the submit form and dropdown menus both have information entered- WL
    if(isset($_POST['submit']) && isset($_POST['dropdown'])){ 
            //if the $_GET array has a url to go to - WL
        if(isset($_GET['go'])){ 
            //if the entered string has letters - WL
	       if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
               
                $name=$_POST['name'];
               
                //split the string into first and last name - WL
                list($a, $b) = explode(' ', $name);
	           
               //gets the opponent of the player that is being submitted - WL
	            $op = ($_POST['dropdown3']);
               
	            //switch case to determine which database to search through - WL
                switch ($_POST['dropdown'])  { 
                            
                    case "QB":
                
                        //-query  the database table   
                        $sql="SELECT FirstName, LastName FROM Quarterback WHERE FirstName LIKE '%". $a .  "%' AND LastName LIKE '%" . $b ."%'"; 
                        break;
                    
                    case "RB":
                        
                        $sql="SELECT  FirstName, LastName FROM Runningback WHERE FirstName LIKE '%" . $a .  "%' AND LastName LIKE '%" . $b ."%'"; 
                        break;
                    
                    case "WR":
                       
                        $sql="SELECT  FirstName, LastName FROM Receiving WHERE FirstName LIKE '%" . $a .  "%' AND LastName LIKE '%" . $b ."%'"; 
                        break;
                    
                    case "TE":
                      
                        $sql="SELECT  FirstName, LastName FROM Receiving WHERE FirstName LIKE '%" . $a .  "%' AND LastName LIKE '%" . $b ."%'"; 
                        break;
                    
                    default:
                        echo "Input did not match with any case";
                }
                
               
               //-run  the query against the mysql query function - WL
	           $result=mysql_query($sql); 
               
	           //-create  while loop and loop through result set - WL
	           while($row=mysql_fetch_array($result)){ 
	               $FirstName  =$row['FirstName']; 
	               $LastName=$row['LastName']; 
	        
                   
                   //put the first and last names back together - WL
                   $playerName = $FirstName;
                   $playerName .= " ";
                   $playerName .= $LastName;
                   
                   //drop down to determine where to enter the players - WL
                   switch ($_POST['dropdown2'])  { 
                       
                       //players is set to play in game - WL
                       case "play":
                           
                           //drop down to determine which function to call - WL
                           switch ($_POST['dropdown'])  { 
                               case "QB":
                                   
                                   $user->setQB($playerName, $id, $op);    
                                   break;
                               case "RB":
                                   
                                   $user->setRB($playerName, $id, $op);
                                   break;
                               case "WR":
                                   
                                   $user->setWR($playerName, $id, $op);
                                   break;
                               case "TE":
                                   
                                   $user->setTE($playerName, $id, $op);
                                   break;
                               default:
                                   echo "Input did not match with any case";
                            }     
                        break;
                       
                       //player is set to the flex position - WL
                       case "flex":
                          
                           //drop down to determine which function to call - WL
                           switch ($_POST['dropdown'])  { 
                               case "RB":
                                   $pos = "RB";
                                   $user->setFLEX($playerName, $id, $op, $pos);
                                   break;
                               case "WR":
                                   $pos = "WR";
                                   $user->setFLEX($playerName, $id, $op, $pos);
                                   break;
                               case "TE":
                                  $pos = "TE";
                                   $user->setFLEX($playerName, $id, $op, $pos);
                                   break;
                               default:
                                   echo " This position can't be inputed at FLEX";
                           }
                        break;
                           
                        //player is set on the bench - WL   
                       case "bench":
                           
                           //drop down to determine positions
                           switch ($_POST['dropdown'])  { 
                               case "QB":
                                   $pos = "QB";
                                   $user->setBENCH($playerName, $id, $op, $pos);
                                   break;
                               case "RB":
                                   $pos = "RB";
                                   $user->setBENCH($playerName, $id, $op, $pos);
                                   break;
                               case "WR":
                                    $pos = "WR";
                                   $user->setBENCH($playerName, $id, $op, $pos);
                                   break;
                               case "TE":
                                   $pos = "TE";
                                   $user->setBENCH($playerName, $id, $op, $pos);
                                   break;
                               default:
                                   echo "Input did not match with any case";
                           }
                        break;
                   }
          }
	     } 
	     else{ 
	           echo  "<p>Please enter a search query</p>";
         } 
	  } 
	  }

    
	
        $id = $_COOKIE["user"];
        $team = "SELECT * FROM UserTeam WHERE userID LIKE '%" .$id ."%'";

        // Create connection to the server
        $conn = new mysqli("dbsrv2.cs.fsu.edu", "hapgood", "CEN4020SH", "hapgooddb");
        
        

        //check connection
        if ($conn->connect_error)
        {
                die("Connection Failed: " . $conn->connect_error);
        }

        $QBtable = $user->getQB($id);
        $RB1table = $user->getRB1($id);
        $RB2table = $user->getRB2($id);
        $WR1table = $user->getWR1($id);
        $WR2table = $user->getWR2($id);
        $FLEXtable = $user->getFLEX($id);
        $TEtable = $user->getTE($id);
        $BENCH1table = $user->getBENCH1($id);
        $BENCH2table = $user->getBENCH2($id);
        $BENCH3table = $user->getBENCH3($id);
        $BENCH4table = $user->getBENCH4($id);
        $BENCH5table = $user->getBENCH5($id);

        $QBop = $user->getOpponentQB($id);
        $RB1op = $user->getOpponentRB1($id);
        $RB2op = $user->getOpponentRB2($id);
        $WR1op = $user->getOpponentWR1($id);
        $WR2op = $user->getOpponentWR2($id);
        $TEop = $user->getOpponentTE($id);
        $FLEXop = $user->getOpponentFLEX($id);
        $BENCH1op = $user->getOpponentBENCH1($id);
        $BENCH2op = $user->getOpponentBENCH2($id);
        $BENCH3op = $user->getOpponentBENCH3($id);
        $BENCH4op = $user->getOpponentBENCH4($id);
        $BENCH5op = $user->getOpponentBENCH5($id);

       
        $PositionQB = "QB";
        $PositionRB1 = "RB1";
        $PositionRB2 = "RB2";
        $PositionWR1 = "WR1";
        $PositionWR2 = "WR2";
        $PositionTE = "TE";
        $PositionFLEX = "FLEX";
        $PositionBENCH = "BENCH";

        $QBteam = $user->getPlayerTeam($QBtable);
        $RB1team = $user->getPlayerTeam($RB1table);
        $RB2team = $user->getPlayerTeam($RB2table);
        $WR1team = $user->getPlayerTeam($WR1table);
        $WR2team = $user->getPlayerTeam($WR2table);
        $TEteam = $user->getPlayerTeam($TEtable);
        $FLEXteam = $user->getPlayerTeam($FLEXtable);
        $BENCH1team = $user->getPlayerTeam($BENCH1table);
        $BENCH2team = $user->getPlayerTeam($BENCH2table);
        $BENCH3team = $user->getPlayerTeam($BENCH3table);
        $BENCH4team = $user->getPlayerTeam($BENCH4table);
        $BENCH5team = $user->getPlayerTeam($BENCH5table);

        $opTeamQB = $user->getOpponentTeam($QBop);
        $opTeamRB1 = $user->getOpponentTeam($RB1op);
        $opTeamRB2 = $user->getOpponentTeam($RB2op);
        $opTeamWR1 = $user->getOpponentTeam($WR1op);
        $opTeamWR2 = $user->getOpponentTeam($WR2op);
        $opTeamTE = $user->getOpponentTeam($TEop);
        $opTeamFLEX = $user->getOpponentTeam($FLEXop);
        $opTeamBENCH1 = $user->getOpponentTeam($BENCH1op);
        $opTeamBENCH2 = $user->getOpponentTeam($BENCH2op);
        $opTeamBENCH3 = $user->getOpponentTeam($BENCH3op);
        $opTeamBENCH4 = $user->getOpponentTeam($BENCH4op);
        $opTeamBENCH5 = $user->getOpponentTeam($BENCH5op);

        //Execute the SQL query
        $records = $conn->query($team);

        echo "<h3> User: </h3> $id" ; 

       
        

        echo"<div></div>";

        echo "<br></br>";

        echo "<table><tr><th>Position</th><th>Player</th><th>Team<th>Opponent</th></tr>";

        
        echo "<tr><td>" .$PositionQB ."</td><td>" .$QBtable ."</td><td>" .$QBteam ."</td><td>" .$opTeamQB ."</td></tr>";
        echo "<tr><td>" .$PositionRB1 ."</td><td>" .$RB1table ."</td><td>" .$RB1team ."</td><td>" .$opTeamRB1 ."</td></tr>";
        echo "<tr><td>" .$PositionRB2 ."</td><td>" .$RB2table ."</td><td>" .$RB2team ."</td><td>" .$opTeamRB2 ."</td></tr>";
        echo "<tr><td>" .$PositionWR1 ."</td><td>" .$WR1table ."</td><td>" .$WR1team ."</td><td>" .$opTeamWR1 ."</td></tr>";
        echo "<tr><td>" .$PositionWR2 ."</td><td>" .$WR2table ."</td><td>" .$WR2team ."</td><td>" .$opTeamWR2 ."</td></tr>";
        echo "<tr><td>" .$PositionTE ."</td><td>" .$TEtable ."</td><td>" .$TEteam ."</td><td>" .$opTeamTE ."</td></tr>";
        echo "<tr><td>" .$PositionFLEX ."</td><td>" .$FLEXtable ."</td><td>" .$FLEXteam ."</td><td>" .$opTeamFLEX ."</td></tr>";
        echo "<tr><td>" .$PositionBENCH ."</td><td>" .$BENCH1table ."</td><td>" .$BENCH1team ."</td><td>" .$opTeamBENCH1 ."</td></tr>";
        echo "<tr><td>" .$PositionBENCH ."</td><td>" .$BENCH2table ."</td><td>" .$BENCH2team ."</td><td>" .$opTeamBENCH2 ."</td></tr>";
        echo "<tr><td>" .$PositionBENCH ."</td><td>" .$BENCH3table ."</td><td>" .$BENCH3team ."</td><td>" .$opTeamBENCH3 ."</td></tr>";
        echo "<tr><td>" .$PositionBENCH ."</td><td>" .$BENCH4table ."</td><td>" .$BENCH4team ."</td><td>" .$opTeamBENCH4 ."</td></tr>";
        echo "<tr><td>" .$PositionBENCH ."</td><td>" .$BENCH5table ."</td><td>" .$BENCH5team ."</td><td>" .$opTeamBENCH5 ."</td></tr>";

        echo '</table';
        
       
        
        $conn->close();
?>

