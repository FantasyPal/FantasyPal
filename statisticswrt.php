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
                
   
        <h1>Receiving Statistics: Touchdowns</h1>
        
    <?php
   class WideReceiver
    {
        //create class for the quarterbacks
        private $receptions;
        private $targets;
        private $yards;
        private $yAC;
        private $yardsPerGame;
        private $longestGain;
        private $touchdowns;
        private $firstName;
        private $lastName;
        
        //constructor that sets the wide receiver objects
        public function __construct($receptions, $targets, $yards, $yAC, $yardsPerGame, $longestGain, $touchdowns, $firstName, $lastName)
        {
        $this->receptions = $receptions;
        $this->targets = $targets;
        $this->yards = $yards;
        $this->yAC = $yAC;
        $this->yardsPerGame = $yardsPerGame;
        $this->longestGain = $longestGain;
        $this->touchdowns = $touchdowns;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        }
        
        
        //get functions for the private variables
        public function getReceptions() {return $this->receptions;}
        public function getTargets() {return $this->targets;}
        public function getYards() {return $this->yards;}
        public function getYAC() {return $this->yAC;}
        public function getYardsPerGame() {return $this->yardsPerGame;}
        public function getLongestGain() {return $this->longestGain;}
        public function getTouchdowns() {return $this->touchdowns;}
        public function getFirstName() {return $this->firstName;}
        public function getLastName() {return $this->lastName;}
    } //end of class WideReceiver
    
                                        
    //create an array to hold the quarterback objects   
    $wrArray = array();    
        
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
    
                                
                                            
        
        //select certain data from quarterback table to query
                $query1 = "SELECT * FROM Receiving";
                                            
        //Execute the SQL query
        $records = $conn->query($query1);
            
        //if there are more than zero rows from the query
          if($records->num_rows > 0){ 
              
            //titles for the rows
            echo '<table class = "hovertable"><tr><th>Name</th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticswrr.php">Receptions</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticswrta.php">Targets</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticswry.php">Total Yards</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticswrypg.php">Yards Per Game</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticswryac.php">Yards After Catch (YAC)</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticswrlg.php">Longest Gain</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticswrt.php">Touchdowns</a></th></tr>';
             
             
             
            
            //grab the needed data for the stats table
            while($row = $records->fetch_assoc()){
            $receptions = $row["receptions"];
            $targets = $row["targets"];
            $yAC = $row["yardsAfterCatch"];
            $yards = $row["averageYards"];
            $yardsPerGame = $row["yardsPerGame"];
            $longestGain = $row["longestGain"];
            $touchdowns = $row["touchdowns"];
            $firstName = $row["FirstName"];
            $lastName = $row["LastName"];
            
                       
            //creates new quarterback instance
            $wideReceiver = new WideReceiver($receptions, $targets, $yards, $yAC, $yardsPerGame, $longestGain, $touchdowns, $firstName, $lastName);
            
            
                
            $wrArray[] = $wideReceiver;
            
             
            }//end of while loop
            
            
           //bubble sort to get the order of receptions in descending order
            for($i = 0; $i < count($wrArray); $i++){
                for($j = 0; $j < (count($wrArray) - $i -1); $j++){
                    if($wrArray[$j]->getTouchdowns() < $wrArray[$j+1]->getTouchdowns())
                    {
                        //switch the statistics around if one is bigger than the other
                        $temp1 = $wrArray[$j];
                        $wrArray[$j] = $wrArray[$j+1];
                        $wrArray[$j+1] = $temp1;
                    }
                }//end of nested for loop
            }//end of for loop
            
            
            $index = 0;
              
            while($index != count($wrArray)){ 
            $wrCheck = clone $wrArray[$index];
            
            $wrFN = $wrCheck->getFirstName();
            $wrLN = $wrCheck->getLastName();
            $wrR = $wrCheck->getReceptions();
            $wrTA = $wrCheck->getTargets();
            $wrY = $wrCheck->getYards();
            $wrYAC = $wrCheck->getYAC();
            $wrYPG = $wrCheck->getYardsPerGame();
            $wrLG = $wrCheck->getLongestGain();
            $wrT = $wrCheck->getTouchdowns();
            
            
           
                
            echo "<tr><td>" ."$wrFN". " ". $wrLN ."</td><td>" .$wrR."</td><td>" .$wrTA."</td><td>" .$wrY."</td><td>" .$wrYPG."</td><td>" .$wrYAC."</td><td>" .$wrLG."</td><td>" .$wrT."</td></tr>";
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