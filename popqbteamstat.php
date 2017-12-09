<?php

	$conn = mysql_connect("dbsrv2.cs.fsu.edu", "hapgood", "CEN4020SH");
	$mydb = mysql_select_db("hapgooddb");
/*
	$sql = "SELECT * FROM NamesAndTeams";
	$result = mysql_query($sql);
	while($data = mysql_fetch_assoc($result))
	{
		$addedteam = $data["TeamName"];
		$sql2 = "SELECT * FROM QBTeamStats WHERE Teamname LIKE '%". $addedteam ."%'";
		$result2 = mysql_query($sql2);
		if(mysql_num_rows($result2) == 0)
		{	
			echo "6";
			$sql3 = "INSERT INTO QBTeamStats (Teamname) VALUES ('$addedteam')";
			if(mysql_query($sql3) === TRUE)
			{
				echo "ADDED";
			}

			else
			{
				echo "Failuer";
			}
		}

	}
echo"shabooms"

	$PAtt = 0;
	$Comp = 0;
	$PYards = 0;
	$TD = 0;
	$IN = 0; 
	$sql = "SELECT * FROM QBTeamStats";
	$result = mysql_query($sql);
	while($data = mysql_fetch_assoc($result))
	{	
		$teamname = $data["Teamname"];
		echo $teamname;
		$sql2 = "SELECT * FROM NamesAndTeams WHERE TeamName LIKE '%" .$teamname. "%' AND position LIKE 'QB'";
		$result2 = mysql_query($sql2);
		while($data2 = mysql_fetch_assoc($result2))
		{
			
			$fname = $data2["FirstName"];
			$lname = $data2["LastName"];
			echo $fname;
			echo $lname;
			$sql3 = "SELECT * FROM Quarterback WHERE FirstName LIKE '%" .$fname. "%' AND LastName LIKE '%" .$lname. "%'";
			$result3 = mysql_query($sql3);
			while($data3 = mysql_fetch_assoc($result3))
			{
				$A =  $data3["attempts"];
				$PAtt = $PAtt + $A;
				$B = $data3["completions"];
			        $Comp = $Comp + $B;
				$C = $data3["yards"];
			        $PYards = $PYards + $C;
				$D = $data3["touchdowns"];
			        $TD = $TD + $D;
				$E = $data3["interceptions"];
			        $IN = $IN + $E;
				$sql4 =  "UPDATE QBTeamStats SET PassAttempts = '$PAtt', PassCompletions = '$Comp', PassingYards = '$PYards', Touchdowns = '$TD', Interceptions = '$IN' WHERE Teamname = '$teamname'";
         		        if (mysql_query($sql4))
        	       		{
        	                	echo "ADDED";
        	        	}

        	        	else
        	        	{
        	        	        echo "WRONG";
	                	}

			}
		}
		
	}
echo "shabooms";*/

	$sql = "SELECT * FROM QBTeamStats";
	$result = mysql_query($sql);
	while ($data = mysql_fetch_assoc($result))
	{
		$teamname = $data["Teamname"];
		$PA = $data["PassAttempts"];
		$PC = $data["PassCompletions"];
		$PY = $data["PassingYards"];
		$CP = $PC / $PA;
		$YPA = $PY / $PA;
		echo $CP;
		$sql2 =  "UPDATE QBTeamStats SET CompletionPercentage= '$CP', YardsPerAttempt = '$YPA' WHERE Teamname LIKE '%" .$teamname. "%'";
		if(mysql_query($sql2) === TRUE)
		{
			echo "ADDED";
		}
	}


echo "shabooms";
?>


