<?php

        $conn = mysql_connect("dbsrv2.cs.fsu.edu", "hapgood", "CEN4020SH");
        $mydb = mysql_select_db("hapgooddb");
/*
        $sql = "SELECT * FROM NamesAndTeams";
        $result = mysql_query($sql);
        while($data = mysql_fetch_assoc($result))
        {
                $addedteam = $data["TeamName"];
                $sql2 = "SELECT * FROM DETeamStats WHERE Teamname LIKE '%". $addedteam ."%'";
                $result2 = mysql_query($sql2);
                if(mysql_num_rows($result2) == 0)
                {
                        $sql3 = "INSERT INTO DETeamStats (Teamname) VALUES ('$addedteam')";
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
echo"shabooms";*/

        $LOSS = 0;
        $TT = 0;
        $IN = 0;
	$TD = 0;
        $sql = "SELECT * FROM DETeamStats";
        $result = mysql_query($sql);
        while($data = mysql_fetch_assoc($result))
        {
                $teamname = $data["Teamname"];
                $sql2 = "SELECT * FROM NamesAndTeams WHERE TeamName LIKE '%" .$teamname. "%' AND position LIKE 'DE'";
                $result2 = mysql_query($sql2);
                while($data2 = mysql_fetch_assoc($result2))
                {
                        $fname = $data2["FirstName"];
                        $lname = $data2["LastName"];
                        echo $fname;
                        echo $lname;
                        $sql3 = "SELECT * FROM Defense WHERE FirstName LIKE '%" .$fname. "%' AND LastName LIKE '%" .$lname. "%'";
                        $result3 = mysql_query($sql3);
                        while($data3 = mysql_fetch_assoc($result3))
                    	{
				$C = $data3["TFLYardsLoss"];
                                $LOSS = $LOSS + $C;
                                $D = $data3["touchdowns"];
                                $TD = $TD + $D;
                                $E = $data3["interceptions"];
                                $IN = $IN + $E;
				$F = $data3["totalTackles"];
				$TT = $TT + $F;
                                $sql4 =  "UPDATE DETeamStats SET TacklesForLoss = '$LOSS', Touchdowns = '$TD', Interceptions = '$IN', Tackles = '$TT' WHERE Teamname = '$teamname'";
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
	echo "shabooms";
/*
        $sql = "SELECT * FROM DETeamStats";
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
                $sql2 =  "UPDATE DETeamStats SET CompletionPercentage= '$CP', YardsPerAttempt = '$YPA' WHERE Teamname LIKE '%" .$teamname. "%'";
                if(mysql_query($sql2) === TRUE)
                {
                        echo "ADDED";
*/
?>

