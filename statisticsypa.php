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
        }</script>
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
                
   <h1>Passing Statistics: Yards Per Attempt</h1> 
        
    <?php
   class Quarterback
    {
        //create class for the quarterbacks
        private $passAttempts;
        private $passCompletions;
        private $completionPercentage;
        private $passingYards;
        private $yardsPerAttempt;
        private $interceptions;
        private $passerRating;
        private $touchdowns;
        private $firstName;
        private $lastName;
        
        //constructor that sets the quarterback objects
        public function __construct($passAttempts, $passCompletions, $completionPercentage, $passingYards, $yardsPerAttempt, $interceptions, $passerRating, $touchdowns, $firstName, $lastName)
        {
        $this->passAttempts = $passAttempts;
        $this->passCompletions = $passCompletions;
        $this->completionPercentage = $completionPercentage;
        $this->passingYards = $passingYards;
        $this->yardsPerAttempt = $yardsPerAttempt;
        $this->interceptions = $interceptions;
        $this->passerRating = $passerRating;
        $this->touchdowns = $touchdowns;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        }
        
        
        //get functions for the private variables
        public function getPassAttempts() {return $this->passAttempts;}
        public function getPassCompletions() {return $this->passCompletions;}
        public function getCompletionPercentage() {return $this->completionPercentage;}
        public function getPassingYards() {return $this->passingYards;}
        public function getYardsPerAttempt() {return $this->yardsPerAttempt;}
        public function getInterceptions() {return $this->interceptions;}
        public function getPasserRating() {return $this->passerRating;}
        public function getTouchdowns() {return $this->touchdowns;}
        public function getFirstName() {return $this->firstName;}
        public function getLastName() {return $this->lastName;}
    } //end of class Quarterback
    
                                        
    //create an array to hold the quarterback objects   
    $qbArray = array();    
        
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
                $query1 = "SELECT * FROM Quarterback";
                                            
        //Execute the SQL query
        $records = $conn->query($query1);
            
        //if there are more than zero rows from the query
          if($records->num_rows > 0){ 
              
                      //titles for the rows
            echo '<table class = "hovertable"><tr><th>Name</th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticspa.php">Pass Attempts</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticspc.php">Pass Completions</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticscp.php">Completion Percentage</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticspy.php">Passing Yards</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsypa.php">Yards Per Attempt</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticst.php">Touchdowns</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsi.php">Interceptions</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statistics.php">Passer Rating</a></th></tr>';
             
             
            
            //grab the needed data for the stats table
            while($row = $records->fetch_assoc()){
            $passAttempts = $row["attempts"];
            $passCompletions = $row["completions"];
            $completionPercentage = $row["completionPercentage"];
            $passingYards = $row["yards"];
            $yardsPerAttempt = $row["yardsPerAttempt"];
            $interceptions = $row["interceptions"];
            $passerRating = $row["passerRating"];
            $touchdowns = $row["touchdowns"];
            $firstName = $row["FirstName"];
            $lastName = $row["LastName"];
            
                       
            //creates new quarterback instance
            $quarterBack = new Quarterback($passAttempts, $passCompletions, $completionPercentage, $passingYards, $yardsPerAttempt, $interceptions, $passerRating, $touchdowns, $firstName, $lastName);
            
            
            $class_vars = get_class_vars(get_class($quarterBack));
            
                
            $qbArray[] = $quarterBack;
            
             
            }//end of while loop
            
            
           //bubble sort to get the order of pass completions in descending order
            for($i = 0; $i < count($qbArray); $i++){
                for($j = 0; $j < (count($qbArray) - $i -1); $j++){
                    if($qbArray[$j]->getYardsPerAttempt() < $qbArray[$j+1]->getYardsPerAttempt())
                    {
                        //switch the statistics around if one is bigger than the other
                        $temp1 = $qbArray[$j];
                        $qbArray[$j] = $qbArray[$j+1];
                        $qbArray[$j+1] = $temp1;
                    }
                }//end of nested for loop
            }//end of for loop
            
            
            $index = 0;
              
            while($index != count($qbArray)){ 
            $qbCheck = clone $qbArray[$index];
            
            $qbFN = $qbCheck->getFirstName();
            $qbLN = $qbCheck->getLastName();
            $qbPA = $qbCheck->getPassAttempts();
            $qbPC = $qbCheck->getPassCompletions();
            $qbCP = $qbCheck->getCompletionPercentage();
            $qbPY = $qbCheck->getPassingYards();
            $qbI = $qbCheck->getInterceptions();
            $qbYPA = $qbCheck->getYardsPerAttempt();
            $qbT = $qbCheck->getTouchdowns();
            $qbPR = $qbCheck->getPasserRating();
            
           
                
            echo "<tr><td>" ."$qbFN". " ". $qbLN ."</td><td>" .$qbPA."</td><td>" .$qbPC."</td><td>" .$qbCP."</td><td>" .$qbPY."</td><td>" .$qbYPA."</td><td>" .$qbT."</td><td>" .$qbI."</td><td>" .$qbPR."</td></tr>";
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