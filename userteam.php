
<html>
 <head>
    <title> NFL Player Statistics </title>

     
    <style>
        table, th, td{border: 1px solid black;}
    </style>

     
     
    </head>
    
    <body>
 
	      <!--Menu to navigate the webpages-->

    <table width=" 100% border= '1'  cellpadding ='1' summary= 'Site Links'">
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
        	

</body>  
    
</html>



<?php

function swap(&$x,&$y) 
	{
    		$tmp=$x;
    		$x=$y;
    		$y=$tmp;
	}

        include 'userlineupclass.php';       
 
      //connect  to the database - WL
	  $db=mysql_connect  ("dbsrv2.cs.fsu.edu", "hapgood",  "CEN4020SH") or die ('I cannot connect to the database  because: ' . mysql_error()); 

	  //-select  the database to use - WL
      $mydb=mysql_select_db("hapgooddb"); 

    //gets the "user" name through the cookies of the website - JC
    $id = $_COOKIE["user"];
    
    //creates an instance of an UserLineup object - WL
    $user = new UserLineup($id);

    
	
        $id = $_COOKIE["user"];
        $team = "SELECT * FROM UserTeam WHERE userID LIKE '%" .$id ."%'";

        // Create connection to the server
        $conn = new mysqli("dbsrv2.cs.fsu.edu", "hapgood", "CEN4020SH", "hapgooddb");
        
        

        //check connection
        if ($conn->connect_error)
        {
                die("Connection Failed: " . $conn->connect_error);
        }


function standard_deviation($aValues, $bSample = false)
{
      $fMean = array_sum($aValues) / count($aValues);
      $fVariance = 0.0;
      foreach ($aValues as $i)
      {
           $fVariance += pow($i - $fMean, 2);
      }

      $fVariance /= ( $bSample ? count($aValues) - 1 : count($aValues) );
      return (float) sqrt($fVariance);
}



function standevplayer($POS, $STAT)
{
	$stat = array();
        if($POS === "QB")
        {
                $sql = "SELECT * FROM Quarterback";
        }

        if($POS === "RB")
        {
                $sql = "SELECT * FROM Runningback";
        }

        if($POS === "WR")
        {
                $sql = "SELECT * FROM Receiving";
        }

        switch($STAT){
                        case 'completions':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['completions']);
                            }
                            break;
                         case 'yards':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['yards']);
                            }
                            break;
                         case 'touchdowns':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['touchdowns']);
                            }
                            break;
                         case 'completionPercentage':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat, $data['averageYards']);
                            }
                            break;
                         case 'yardsPerAttempt':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat, $data['yardsPerGame']);
                            }
                            break;
                    case 'attempts':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat, $data['completions']);
                            }
                            break;
                         case 'firstDowns':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['firstDowns']);
                            }
                            break;
                         case 'averageYardsPerCarry':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['averageYardsPerCarry']);
                            }
                case 'receptions':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['receptions']);
                            }
                            break;
                         case 'targets':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['targets']);
                            }
                            break;
                         case 'yardsAfterCatch':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['yardsAfterCatch']);
                            }
                            break;
                         case 'averageYards':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['averageYards']);
                            }
                            break;
                         case 'yardsPerGame':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['yardsPerGame']);
                            }
                            break;
                case 'tackles':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['tackles']);
                            }
                            break;
                        case 'TFLYardsLoss':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                array_push($stat,$data['TFLYardsLoss']);
                            }
                            break;
                        
                }
    
    
	$SD = standard_deviation($stat);
	return $SD;
}

function standevteam($STAT, $POS)
{
        $stat = array();
        $sql;
        if($POS === "DE")
        {
                $sql = "SELECT * FROM DETeamStats";
        }

        if($POS === "QB")
        {
                $sql = "SELECT * FROM QBTeamStats";
        }

        if($POS === "RB")
        {
                $sql = "SELECT * FROM RBTeamStats";
        }

        if($POS === "WR")
        {
                $sql = "SELECT * FROM WRTeamStats";
        }


        $result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result))
        {
           array_push($stat, $row['$STAT']);
	}

        $SD = standard_deviation($stat);
        return $SD;

}

function mean($STAT, $POS)
{
	$pop = array();
        $sql;
        if($POS === "DE")
        {
                $sql = "SELECT * FROM DETeamStats";
        }

        if($POS === "QB")
        {
                $sql = "SELECT * FROM QBTeamStats";
        }

        if($POS === "RB")
        {
                $sql = "SELECT * FROM RBTeamStats";
        }

        if($POS === "WR")
        {
                $sql = "SELECT * FROM WRTeamStats";
        }

	$result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result))
        {
                array_push($pop, $row['$STAT']);
        }



	$xbar = array_sum($pop) / count($pop);
	return $xbar;
}

function weightplayer($STAT, $POS, $name)
{
        $SD = standevplayer($STAT, $POS);
        
        $MEAN = mean($STAT, $POS);
   
	$fname;
	$lname;
	list($fname, $lname)= explode('',$name);

        if($POS === "QB")
        {
                $sql = "SELECT * FROM Quarterback WHERE FisrtName LIKE '%" .$fname. "%' AND LastName LIKE '%" .$lname. "%'";
            
            switch($STAT){
                        case 'completions':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['completions'];
                            }
                            break;
                         case 'yards':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['yards'];
                            }
                            break;
                         case 'touchdowns':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['touchdowns'];
                            }
                            break;
                         case 'completionPercentage':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['averageYards'];
                            }
                            break;
                         case 'yardsPerAttempt':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['yardsPerGame'];
                            }
                            break;
                        
                }
        }

        if($POS === "RB")
        {
                $sql = "SELECT * FROM Runningback WHERE FirstName LIKE '%" .$fname. "%' AND LastName LIKE '%" .$lname. "%'";
            
            switch($STAT){
                        case 'attempts':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['completions'];
                            }
                            break;
                         case 'yards':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['yards'];
                            }
                            break;
                         case 'touchdowns':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['touchdowns'];
                            }
                            break;
                         case 'firstDowns':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['firstDowns'];
                            }
                            break;
                         case 'averageYardsPerCarry':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['averageYardsPerCarry'];
                            }
                            break;
                        
                }
            
            
        }

        if($POS === "WR")
        {
                $sql = "SELECT * FROM Receiving WHERE FirstName LIKE '%" .$fname. "%' AND LastName LIKE '%" .$lname. "%'";
            
                switch($STAT){
                        case 'receptions':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['receptions'];
                            }
                            break;
                         case 'targets':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['targets'];
                            }
                            break;
                         case 'yardsAfterCatch':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['yardsAfterCatch'];
                            }
                            break;
                         case 'averageYards':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['averageYards'];
                            }
                            break;
                         case 'yardsPerGame':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['yardsPerGame'];
                            }
                            break;
                         case 'touchdowns':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['touchdowns'];
                            }
                            break;      
                        
                }
        }

	$playerstat;
       

        $weight;
        if($teamstat > $MEAN)
        {
                $teamstat = $teamstat - $SD;
                $weight = 5;
                if($teamstat <= $MEAN)
                {
                        return $weight;
                }

                else
                {
                        $weight = 6;
                        $teamstat = $teamstat - $SD;
                        if($teamstat < $MEAN)
                        {
                                return $weight;
                        }

                        else
                        {
                                $weight = 7;
                                return $weight;
                        }
                }
        }

        if($teamstat = $MEAN)
        {
                $weight = 4;
                return $weight;
        }


        else
        {
                $weight = 3;
                $teamstat = $teamstat + $SD;
                if($teamstat >= $MEAN)
                {
                        return $weight;
                }

                else
                {
                        $weight = 2;
                        $teamstat = $teamstat + $SD;
                        if ($teamstat >= $MEAN)
                        {
                                return $weight;
			}

                        else
                        {
                                $weight = 1;
                                return $weight;
                        }
                }



        }

}




function weightteam($STAT, $POS, $TEAM)
{
	$SD = standevteam($STAT, $POS);
	$MEAN = mean($STAT, $POS);
	
	
    $sql = "SELECT * FROM DETeamStats WHERE Teamname LIKE '%" .$TEAM. "%'";
    
                
     switch($STAT){
                          case 'tackles':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['tackles'];
                            }
                            break;
                        case 'TFLYardsLoss':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['TFLYardsLoss'];
                            }
                            break;
                         case 'interceptions':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['interceptions'];
                            }
                            break;
                         case 'completionPercentage':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['completionPercentage'];
                            }
                            break;
                         case 'yardsPerAttempt':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['yardsPerAttempt'];
                            }
                            break;
                         case 'yardsAfterCatch':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['yardsAfterCatch'];
                            }
                            break;
                         case 'touchdowns':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['touchdowns'];
                            }
                            break;      
                        case 'avgYardsPerCarry':
                         $result = mysql_query($sql);
                            while($data = mysql_fetch_assoc($result))
                            {
                                $playerstat = $data['avgYardsPerCarry'];
                            }
                            break;      
                        
                }
     

	$teamstat;
	$result = mysql_query($sql);
	
	$weight;
	if($teamstat > $MEAN)
	{
		$teamstat = $teamstat - $SD;
		$weight = 5;
		if($teamstat <= $MEAN)
		{
			return $weight;
		}

		else
		{
			$weight = 6;
			$teamstat = $teamstat - $SD;
			if($teamstat < $MEAN)
			{
				return $weight;
			}

			else
			{
				$weight = 7;
				return $weight; 
			}
		}
	}

	if($teamstat = $MEAN)
	{ 
		$weight = 4;
		return $weight;
	}
	

	else
	{ 
		$weight = 3;
		$teamstat = $teamstat + $SD;
		if($teamstat >= $MEAN)
		{
			return $weight;
		}

		else
		{
			$weight = 2;
			$teamstat = $teamstat + $SD;
			if ($teamstat >= $MEAN)
			{
				return $weight;
			}

			else
			{
				$weight = 1;
				return $weight;
			}
		}
		
		

	}

}



	$QBarray = array();
	$RBarray = array();
	$WRarray = array();

        $QBtable = $user->getQB($id);
	array_push($QBarray, $QBtable);
        $RB1table = $user->getRB1($id);
	array_push($RBarray, $RB1table);
        $RB2table = $user->getRB2($id);
	array_push($RBarray, $RB2table);
        $WR1table = $user->getWR1($id);
	array_push($WRarray, $WR1table);
        $WR2table = $user->getWR2($id);
	array_push ($WRarray, $WR2table);
        $TEtable = $user->getTE($id);
	
	$BandFarray = array();
        $FLEXtable = $user->getFLEX($id);
	array_push($BandFarray, $FLEXtable);       
        $BENCH1table = $user->getBENCH1($id);
	array_push($BandFarray, $BBENCH1table);     
	$BENCH2table = $user->getBENCH2($id);
	array_push($BandFarray, $BENCH2table);
        $BENCH3table = $user->getBENCH3($id);
	array_push($BandFarray, $BENCH3table);
        $BENCH4table = $user->getBENCH4($id);
	array_push($BandFarray, $BENCH4table);
        $BENCH5table = $user->getBENCH5($id);
	array_push($BandFarray, $BENCH5table);

	$PoFLEX = $user->getPlayerPo($id, $FLEXtable);
	$PoB1 = $user->getPlayerPo($id, $BENCH1table);
	$PoB2 = $user->getPlayerPo($id, $BENCH2table);
	$PoB3 = $user->getPlayerPo($id, $BENCH3table);
	$PoB4 = $user->getPlayerPo($id, $BENCH4table);
	$PoB5 = $user->getPlayerPo($id, $BENCH5table);

	$QBoparray = array();
	$RBoparray = array();
	$WRoparray = array();
	$DEoparray = array();
        $QBop = $user->getOpponentQB($id);
	array_push($QBoparray, $QBop);
        $RB1op = $user->getOpponentRB1($id);
	array_push($RBoparray, $RB1op);
        $RB2op = $user->getOpponentRB2($id);
	array_push($RBoparray, $RB2op);
        $WR1op = $user->getOpponentWR1($id);
	array_push($WRoparray, $WR1op);
        $WR2op = $user->getOpponentWR2($id);
	array_push($WRoparray, $WR2op);
        $TEop = $user->getOpponentTE($id);
	
	$BandFoparray = array();
        $FLEXop = $user->getOpponentFLEX($id);
	array_push($BandFoparray, $FLEXop);
        $BENCH1op = $user->getOpponentBENCH1($id);
	array_push($BandFoparray, $BENCH1op);
        $BENCH2op = $user->getOpponentBENCH2($id);
	array_push($BandFoparray, $BENCH2op);
        $BENCH3op = $user->getOpponentBENCH3($id);
	array_push($BandFoparray, $BENCH3op);
        $BENCH4op = $user->getOpponentBENCH4($id);
	array_push($BandFoparray, $BENCH4op);
        $BENCH5op = $user->getOpponentBENCH5($id);
	array_push($BandFoparray, $BENCH5op);

	$Poarray = array();
        array_push($Poarray, $PoFLEX);
	array_push($Poarray, $PoB1);
        array_push($Poarray, $PoB2);
        array_push($Poarray, $PoB3);
        array_push($Poarray, $PoB4);
        array_push($Poarray, $PoB5);
	
	
	$i = 0;
	$Rosterisfull = TRUE;
   

	while($i < count($BandFarray))
	{
		$QB = "QB";
		$RB = "RB";
		$WR = "WR";
		
		if(strcmp($Poarray[$i], $QB) === 0)
		{
			array_push($QBarray, $BandFarray[$i]);
			array_push($QBoparray, $BandFoparray[$i]);
		}

		if(strcmp($Poarray[$i], $RB) === 0)
		{
			array_push($RBarray, $BandFarray[$i]);
			array_push($RBoparray, $BandFoparray[$i]);
		}

		if(strcmp($Poarray[$i], $WR) === 0)
		{
			array_push($WRarray, $BandFarray[$i]);
			array_push($WRoparray, $BandFoparray[$i]);
		}

		if(strcmp($Poarray[$i], $WR) !== 0 && (strcmp($Poarray[$i], $RB) !== 0) && (strcmp($Poarray[$i], $QB) !== 0))
		{
			$Rosterisfull = FALSE;
			echo " worng! ";
		}
		$i++;
	}

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

        echo "<h3> User: </h3> $id"; 

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

      
	if($Rosterisfull)
	{
        
	

	//all QBs on roster are in QBarray;
	//all QB opponents are in the same order in QBoparray	
		$QBweights = array();
		$i = 0;
		$temparr = array();
       
		while($i < count($QBarray))
		{	
           
			$temparr[0] = weightplayer('completions', $QBarray[$i],"QB");
			$temparr[1] = weightplayer("yards", $QBarray[$i],"QB");
			$temparr[2] = weightplayer("touchdowns", $QBarray[$i],"QB");
			$temparr[3] = weightplayer("touchdowns", $QBarray[$i],"QB");
			$temparr[4] = weightplayer("completionPercentage", $QBarray[$i],"QB");
			$temparr[5] = weightplayer("yardsPerAttempt", $QBarray[$i],"QB");
			$temp = array_sum($temparr) / count($temparr);
            
            
			array_push($QBweights, $temp);
		$i++;
		}

		$i = 0;
        $j = 0;
		while($i < count($QBarray))
		{
			
			while($j < count($QBweights) - 1)
			{
				if($QBweights[$j] > $QBweight[$j+1])
				{
                    
					swap (&$QBweights[$j], &$QBweights[$j+1]);
					swap (&$QBarray[$j], &$QBarray[$j+1]);
					swap (&$QBoparray[$j], &$QBoparray[$j+1]);
                  
				}
			$j++;
			}
		$i++;
		}
                $RBweights = array();
               
                $i = 0;
                $temparr = array();
               
                while($i < count($RBarray))
                {   
                        
                        $temparr[0] = weightplayer("attempts", $RBarray[$i],"RB");
                        $temparr[1] = weightplayer("yards", $RBarray[$i],"RB");
                        $temparr[2] = weightplayer("touchdowns", $RBarray[$i],"RB");
                        $temparr[3] = weightplayer("touchdowns", $RBarray[$i],"RB");
                        $temparr[4] = weightplayer("firstDowns", $RBarray[$i], "RB");
                        $temparr[5] = weightplayer("averageYardsPerCarry", $RBarray[i], "RB");
                        $temp = array_sum($temparr) / count($temparr);
                   
                        array_push($RBweights, $temp);
                        
                $i++;
                }

		
               $i = 0;
        $j = 0;
		while($i < count($RBarray))
		{
			
			while($j < count($RBweights) - 1)
			{
				if($RBweights[$j] > $RBweight[$j+1])
				{
                   
					swap (&$RBweights[$j], &$RBweights[$j+1]);
					swap (&$RBarray[$j], &$RBarray[$j+1]);
					swap (&$RBoparray[$j], &$RBoparray[$j+1]);
                   
				}
			$j++;
			}
		$i++;
		}
            $temp = 0;
            $i = 0;
            $WRweights = array();
	        $temparr = array();
           
                while($i < count($WRarray))
                {
                    
                        $temparr[0] = weightplayer("receptions", $WRarray[$i],"WR");
                        $temparr[1] = weightplayer("targets", $WRarray[$i],"WR");
                        $temparr[2] = weightplayer("averageYards", $WRarray[$i],"WR");
                        $temparr[3] = weightplayer("touchdowns", $WRarray[$i],"WR");
                        $temparr[4] = weightplayer("yardsPerGame", $WRarray[$i], "WR");
                        $temparr[5] = weightplayer("yardsAfterCatch", $WRarray[$i], "WR");
                        $temp = array_sum($temparr) / count($temparr);
                      
                        array_push($WRweights, $temp);
                   
                $i++;
                }

                
                      $i = 0;
        $k = 0;
   
        $j = 0;
		while($i < count($WRarray))
		{
			
			while($j < count($WRweights) - 1)
			{
				if($WRweights[$j] > $WRweight[$j+1])
				{
               
					swap (&$WRweights[$j], &$WRweights[$j+1]);
					swap (&$WRarray[$j], &$WRarray[$j+1]);
					swap (&$WRoparray[$j], &$WRoparray[$j+1]);
                   
                    $k++;
				}
			$j++;
			}
		$i++;
		}


		// player arrays are orginized by weight of their stats
		// $QBarray sorted worst to best
		// $QBweights sorted worst to best
		// if the players differ by less than 2 in weight
		// run them through team stat checks


		//now the arrays WRarray, RBarray and QBarray have been sorted from worst to greatest
		
        
        echo "<table><tr><th>Position</th><th>Player</th></tr>";

        
        echo "<tr><td>" .$PositionQB ."</td><td>" .$QBarray[1] ."</td></tr>";
        echo "<tr><td>" .$PositionRB1 ."</td><td>" .$RBarray[0] ."</td></tr>";
        echo "<tr><td>" .$PositionRB2 ."</td><td>" .$RBarray[1] ."</td></tr>";
        echo "<tr><td>" .$PositionWR1 ."</td><td>" .$WRarray[0] ."</td></tr>";
        echo "<tr><td>" .$PositionWR2 ."</td><td>" .$WRarray[1] ."</td></tr>";
        echo "<tr><td>" .$PositionTE ."</td><td>" .$TEtable ."</td></tr>";
        echo "<tr><td>" .$PositionFLEX ."</td><td>" .$WRarray[2] ."</td></tr>";
 

	}
	else{echo "bruhhh";}

        

     echo "<h2>Suggested Line Up</h2>";
        
        echo "<br></br>";

        $conn->close();

?>
