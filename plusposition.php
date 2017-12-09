<?php

	function findpos($firstname, $lastname)
	{

		$conn = mysql_connect("dbsrv2.cs.fsu.edu", "hapgood", "CEN4020SH");
		$mydb = mysql_select_db("hapgooddb");

		//searches name in quarterback table
		$sqlcommand = "SELECT FirstName, LastName FROM Quarterback WHERE FirstName LIKE '%" .$firstname. "%' AND LastName LIKE '%" .$lastname. "%'"; 
		$result = mysql_query($sqlcommand);

		while($data = mysql_fetch_assoc($result))
		{

			if(!is_null($data["FirstName"]))
			{
				$pos = "QB";
				return $pos;
			}

		}

		//searches name in runningback table
		$sqlcommand = "SELECT FirstName, LastName FROM Runningback WHERE FirstName LIKE '%" .$firstname. "%' AND LastName LIKE '%" .$lastname. "%'";
                $result = mysql_query($sqlcommand);
            
                while($data = mysql_fetch_assoc($result))
                {

                        if(!is_null($data["FirstName"]))
                        {
                                $pos = "RB";
		                return $pos;
                        }
                }
		
		//search for player name in Receiving table
		$sqlcommand = "SELECT FirstName, LastName FROM Receiving WHERE FirstName LIKE '%" .$firstname. "%' AND LastName LIKE '%" .$lastname. "%'";
                $result = mysql_query($sqlcommand);

                while($data = mysql_fetch_assoc($result))
                {

                        if(!is_null($data["FirstName"]))
                        {
                                $pos = "WR";
		                return $pos;
                        }
                }
		
		//search for player name in defense table
		$sqlcommand = "SELECT FirstName, LastName FROM Defense WHERE FirstName LIKE '%" .$firstname. "%' AND LastName LIKE '%" .$lastname. "%'";
                $result = mysql_query($sqlcommand);

                while($data = mysql_fetch_assoc($result))
                {

                        if(!is_null($data["FirstName"]))
                        {
                                $pos = "DE";
                                return $pos;
                        }
                }
		$nothere = "X";
		return $nothere;
	}
	
	findpos("hghgh", "hghg");
	$namesandteams = "SELECT * FROM NamesAndTeams";
	$nameresult = mysql_query($namesandteams);
	while($row = mysql_fetch_assoc($nameresult))
	{
		$index = 0;
		$fname = $row["FistName"];
		$lname = $row["LastName"];
		$posi = findpos($fname, $lname);
		$sqlc = "UPDATE NamesAndTeams SET position ='$posi' WHERE FirstName LIKE '%" .$fname. "%' AND LastName LIKE '%" .$lname. "%'";
 		if(mysql_query($sqlc) === TRUE)
		{
			$index++;
			echo $index;
			echo "GOOD       "; 
		}
		else
		{
			$index++;
			echo $index;
			echo "BAD        ";
		}

	}

	
		
        //Execute the SQL query
  

//	$conn->close();
        echo "shabooms";
?>
