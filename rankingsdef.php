<!DOCTYPE html>


<html>
    <head>
                       <!-- CSS goes in the document HEAD or added to your external stylesheet -->
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
h1 {text-align:center;}
</style>
        
    <title> NFL Player Fantasy Rankings </title>
    
    <style>
        table, th, td{border: 1px solid black;}
    </style>
        
    <script type ="text/javascript">
        function goToNewPage()
        {
            var url = document.getElementById('list').value;
            if(url != 'none') {
                window.location = url;
            }
        }
        
    </script>
    </head>
    <body>
    
    
    
    
     <!--Menu to navigate the webpages-->
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
             
        
        <!--Dynamic drop down menu to change the rankings-->
      <div class = "selection">
        <select name = "choice" id="list" accesskey="target">
            <option value = 'none' selected>Select One</option>
            <option value = "rankings.php" >Quarterbacks</option>
            <option value = "rankingsrush.php">Running Backs</option>
            <option value = "rankingswr.php">Wide Receivers</option>
            <option value = "rankingsdef.php">Defense</option>
        </select>
        <input type=button value="Go" onclick="goToNewPage()" />
        </div>
    
        <h1>Top Fantasy Defensive Players</h1>
    
    <?php
    
                                          
    //create an array to hold the defense fantasy points    
    $dpArray = array();
    
    $index = 0; //to help print the arrays to the table
                                            
    //create array to hold matching defense names                                        
    $dnArray = array();
    
    $checkArray = array();
                                            
    $servername = "dbsrv2.cs.fsu.edu";
    $dbname = "hapgooddb";
    $username = "hapgood";
    $password = "CEN4020SH";
                                            
    // Create connection to the server
    $conn = new mysqli($servername, $username, $password, $dbname);                                        
    
    //check connection                                        
   if ($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
    
    
    //select certain data from Defense table to query
    $query1 = "SELECT * FROM Defense";
                                            
    //Execute the SQL query
    $records = $conn->query($query1);

    //if there are more than zero rows from the query
    if($records->num_rows > 0){ 
        //titles for the rows
        echo '<table class = "hovertable"><tr><th>Rank</th><th>Name</th><th>Fantasy Points</th></tr>';
        //goes through each player statistics to determine fantasy points
       while($row = $records->fetch_assoc()){
            $interceptions = $row["interceptions"];
            $touchdowns = $row["touchdowns"];
           
            //math is done to determine the amount of fantasy points each passer has
           $points = ($touchdowns * 3) + ($interceptions * 2);
           $name = $row["FirstName"] . " " . $row["LastName"];
           
           if($points > 6){
               $dpArray[] = $points;
               $dnArray[] = $name;
           }
           
       }
        
        //bubble sort to get the order of fantasy points in descending order
        for($i = 0; $i < count($dpArray); $i++){
            for($j = 0; $j < (count($dpArray) - $i -1); $j++){
                if($dpArray[$j] < $dpArray[$j+1])
                {
                    //switch the points around if one is bigger than the other
                    $temp1 = $dpArray[$j];
                    $dpArray[$j] = $dpArray[$j+1];
                    $dpArray[$j+1] = $temp1;
                    
                    //have to switch the names too
                    $temp2 = $dnArray[$j];
                    $dnArray[$j] = $dnArray[$j+1];
                    $dnArray[$j+1] = $temp2;
                }
            }//end of nested for loop
        }//end of for loop
        while($index != count($dpArray)){
        echo "<tr><td>" .($index+1) ."</td><td>" .$dnArray[$index] ."</td><td>" .$dpArray[$index] ."</td></tr>";
        $index++;
        }
      echo '</table>';
    } 
    else{
       echo "0 results";
    }
   
                                            
    
    $conn->close();                                       
    ?>
                                       
                                            
    </body>
</html>