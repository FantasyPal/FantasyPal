//finds stats of teams by searching for players on the team roster
<?php

        $conn = mysql_connect("dbsrv2.cs.fsu.edu", "hapgood", "CEN4020SH");
        $mydb = mysql_select_db("hapgooddb");

        $sql = "SELECT * FROM NamesAndTeams";
        $result = mysql_query($sql);
        while($data = mysql_fetch_assoc($result))
        {
                $addedteam = $data["TeamName"];
                $sql2 = "SELECT * FROM WRTeamStats WHERE Teamname LIKE '%". $addedteam ."%'";
                $result2 = mysql_query($sql2);
                if(mysql_num_rows($result2) == 0)
                {
                        $sql3 = "INSERT INTO WRTeamStats (Teamname) VALUES ('$addedteam')";
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

        $RE = 0;
        $TAR = 0;
        $YAC = 0;
        $TD = 0;
        $sql = "SELECT * FROM WRTeamStats";
        $result = mysql_query($sql);
        while($data = mysql_fetch_assoc($result))
        {
                $teamname = $data["Teamname"];
                echo $teamname;
                $sql2 = "SELECT * FROM NamesAndTeams WHERE TeamName LIKE '%" .$teamname. "%' AND position LIKE 'WR'";
                $result2 = mysql_query($sql2);
                while($data2 = mysql_fetch_assoc($result2))
                {

                        $fname = $data2["FirstName"];
                        $lname = $data2["LastName"];
                        echo $fname;
                        echo $lname;
                        $sql3 = "SELECT * FROM Receiving WHERE FirstName LIKE '%" .$fname. "%' AND LastName LIKE '%" .$lname. "%'";
                        $result3 = mysql_query($sql3);
                        while($data3 = mysql_fetch_assoc($result3))
                        {			    
                                $A =  $data3["receptions"];
                                $RE = $RE + $A;
                                $B = $data3["touchdowns"];
                                $TD = $TD + $B;
                                $C = $data3["targets"];
                                $TAR = $TAR + $C;
                                $D = $data3["yardsAfterCatch"];
                                $YAC = $YAC + $D;
                           	$sql4 =  "UPDATE WRTeamStats SET Receptions = '$RE', Targets = '$TAR', YardsAfterCatch = '$YAC', Touchdowns = '$TD' WHERE Teamname LIKE '%" .$teamname. "%'";
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


?>

