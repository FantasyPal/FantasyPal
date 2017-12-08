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
        
    <title> NFL Player Statistics </title>
    
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
             
                                            
                     <!--drop down menu to view the different statistics-->                                                                 
    <div class = "selection">
        <select name = "choice" id="list" accesskey="target">
            <option value = 'none' selected>Select One</option>
            <option value = "statistics.php" >Passing</option>
            <option value = "statisticsrush.php">Rushing</option>
            <option value = "statisticswr.php">Receiving</option>
            <option value = "statisticsdef.php">Defense</option>
        </select>
        <input type=button value="Go" onclick="goToNewPage()" />
        </div>
                
   
        <h1>Rushing Statistics: Touchdowns</h1> 
        
    <?php
   class Runningback
    {
        //create class for the runningbacks
        private $rushAttempts;
        private $rushingYards;
        private $longestGain;
        private $touchdowns;
        private $averageYardsPerCarry;
        private $firstName;
        private $lastName;
        
        //constructor that sets the runningback objects
        public function __construct($rushAttempts, $rushingYards, $longestGain, $touchdowns, $averageYardsPerCarry, $firstName, $lastName)
        {
        $this->rushAttempts = $rushAttempts;
        $this->rushingYards = $rushingYards;
        $this->longestGain = $longestGain;
        $this->touchdowns = $touchdowns;
        $this->averageYardsPerCarry = $averageYardsPerCarry;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        }
        
        
        //get functions for the private variables
        public function getRushAttempts() {return $this->rushAttempts;}
        public function getRushingYards() {return $this->rushingYards;}
        public function getLongestGain() {return $this->longestGain;}
        public function getAverageYardsPerCarry() {return $this->averageYardsPerCarry;}
        public function getTouchdowns() {return $this->touchdowns;}
        public function getFirstName() {return $this->firstName;}
        public function getLastName() {return $this->lastName;}
    } //end of class Runningback
    
                                        
    //create an array to hold the quarterback objects   
    $rbArray = array();    
        
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
    
                                
                                            
        
        //select certain data from Runningback table to query
                $query1 = "SELECT * FROM Runningback";
                                            
        //Execute the SQL query
        $records = $conn->query($query1);
            
        //if there are more than zero rows from the query
          if($records->num_rows > 0){ 
              
             //titles for the rows
            echo '<table class = "hovertable"><tr><th>Name</th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsrushra.php">Rush Attempts</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsrushry.php">Rushing Yards</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsrush.php">Average Yards Per Carry</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsrushlg.php">Longest Gain</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsrusht.php">Touchdowns</a></th></tr>';
             
             
            
            //grab the needed data for the stats table
            while($row = $records->fetch_assoc()){
            $rushAttempts = $row["attempts"];
            $rushingYards = $row["yards"];
            $longestGain = $row["longestGain"];
            $averageYardsPerCarry = $row["avgYardsPerCarry"];
            $touchdowns = $row["touchdowns"];
            $firstName = $row["FirstName"];
            $lastName = $row["LastName"];
            
                       
            //creates new runningback instance
            $runningBack = new Runningback($rushAttempts, $rushingYards, $longestGain, $averageYardsPerCarry, $touchdowns, $firstName, $lastName);
            
            
            //$class_vars = get_class_vars(get_class($runningBack));
            
                
            $rbArray[] = $runningBack;
            
             
            }//end of while loop
            
            
           //bubble sort to get the order of pass completions in descending order
            for($i = 0; $i < count($rbArray); $i++){
                for($j = 0; $j < (count($rbArray) - $i -1); $j++){
                    if($rbArray[$j]->getTouchdowns() < $rbArray[$j+1]->getTouchdowns())
                    {
                        //switch the statistics around if one is bigger than the other
                        $temp1 = $rbArray[$j];
                        $rbArray[$j] = $rbArray[$j+1];
                        $rbArray[$j+1] = $temp1;
                    }
                }//end of nested for loop
            }//end of for loop
            
            
            $index = 0;
              
            while($index != count($rbArray)){ 
            $rbCheck = clone $rbArray[$index];
            
            $rbFN = $rbCheck->getFirstName();
            $rbLN = $rbCheck->getLastName();
            $rbRA = $rbCheck->getRushAttempts();
            $rbRY = $rbCheck->getRushingYards();
            $rbYPC = $rbCheck->getAverageYardsPerCarry();
            $rbLG = $rbCheck->getLongestGain();
            $rbT = $rbCheck->getTouchdowns();
           
            
           
                
            echo "<tr><td>" ."$rbFN". " ". $rbLN ."</td><td>" .$rbRA."</td><td>" .$rbRY."</td><td>" .$rbYPC."</td><td>" .$rbLG."</td><td>" .$rbT."</td></tr>";
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