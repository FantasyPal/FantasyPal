<?php

        $conn = mysql_connect("dbsrv2.cs.fsu.edu", "hapgood", "CEN4020SH");
        $mydb = mysql_select_db("hapgooddb");
/*
        $sql = "SELECT * FROM NamesAndTeams";
        $result = mysql_query($sql);
        while($data = mysql_fetch_assoc($result))
        {
                $addedteam = $data["TeamName"];
                $sql2 = "SELECT * FROM RBTeamStats WHERE Teamname LIKE '%". $addedteam ."%'";
                $result2 = mysql_query($sql2);
                if(mysql_num_rows($result2) == 0)
                {
                        $sql3 = "INSERT INTO RBTeamStats (Teamname) VALUES ('$addedteam')";
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
/*
        $RA = 0;
        $RY = 0;
        $TD = 0;
        $sql = "SELECT * FROM RBTeamStats";
        $result = mysql_query($sql);
        while($data = mysql_fetch_assoc($result))
        {
                $teamname = $data["Teamname"];
                echo $teamname;
                $sql2 = "SELECT * FROM NamesAndTeams WHERE TeamName LIKE '%" .$teamname. "%' AND position LIKE 'RB'";
                $result2 = mysql_query($sql2);
                while($data2 = mysql_fetch_assoc($result2))
                {

                        $fname = $data2["FirstName"];
                        $lname = $data2["LastName"];
                        echo $fname;
                        echo $lname;
                  	$sql3 = "SELECT * FROM Runningback WHERE FirstName LIKE '%" .$fname. "%' AND LastName LIKE '%" .$lname. "%'";
                        $result3 = mysql_query($sql3);
                        while($data3 = mysql_fetch_assoc($result3))
                        {
                                $A =  $data3["attempts"];
                                $RA = $RA + $A;
				$C = $data3["yards"];
                                $RY = $RY + $C;
                                $D = $data3["touchdowns"];
                                $TD = $TD + $D;
                                $sql4 =  "UPDATE RBTeamStats SET RushAttempts = '$RA', Touchdowns = '$TD', RushingYards = '$RY' WHERE Teamname = '$teamname'";
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

        $sql = "SELECT * FROM RBTeamStats";
        $result = mysql_query($sql);
        while ($data = mysql_fetch_assoc($result))
        {
                $teamname = $data["Teamname"];
                $RA = $data["RushAttempts"];
                $RY = $data["RushingYards"];
                $AVC = $RA / $RY;
                $sql2 =  "UPDATE RBTeamStats SET AverageYardsPerCarry= '$AVC' WHERE Teamname LIKE '%" .$teamname. "%'";
                if(mysql_query($sql2) === TRUE)
                {
                        echo "ADDED";
                }
        }


echo "shabooms";


?>

