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
                
   <h1>Defensive Statistics: Tackles</h1>
        
    <?php
   class Defense
    {
        //create class for the defense
        private $tackles;
        private $tFL;
        private $interceptions;
        private $touchdowns;
        private $firstName;
        private $lastName;
        
        //constructor that sets the defense objects
        public function __construct($tackles, $tFL, $interceptions, $touchdowns, $firstName, $lastName)
        {
        $this->tackles = $tackles;
        $this->tFL = $tFL;
        $this->interceptions = $interceptions;
        $this->touchdowns = $touchdowns;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        }
        
        
        //get functions for the private variables
        public function getTackles() {return $this->tackles;}
        public function getTFL() {return $this->tFL;}
        public function getInterceptions() {return $this->interceptions;}
        public function getTouchdowns() {return $this->touchdowns;}
        public function getFirstName() {return $this->firstName;}
        public function getLastName() {return $this->lastName;}
    } //end of class Defense
    
                                        
    //create an array to hold the defense objects   
    $defArray = array();    
        
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
    
                                
                                            
        
        //select certain data from defense table to query
                $query1 = "SELECT * FROM Defense";
                                            
        //Execute the SQL query
        $records = $conn->query($query1);
            
        //if there are more than zero rows from the query
          if($records->num_rows > 0){ 
              
                      //titles for the rows
             echo '<table class = "hovertable"><tr><th>Name</th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsdeft.php">Tackles</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsdeftfl.php">Tackles For Loss (Yards)</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsdefi.php">Interceptions</a></th><th><a href="http://ww2.cs.fsu.edu/~hapgood/statisticsdef.php">Touchdowns</a></th></tr>';
             
             
             
            
            //grab the needed data for the stats table
            while($row = $records->fetch_assoc()){
            $tackles = $row["totalTackles"];
            $tFL = $row["TFLYardsLoss"];
            $interceptions = $row["interceptions"];
            $touchdowns = $row["touchdowns"];
            $firstName = $row["FirstName"];
            $lastName = $row["LastName"];
            
                       
            //creates new defense instance
            $defense = new Defense($tackles, $tFL, $interceptions, $touchdowns, $firstName, $lastName);
            
            
                
            $defArray[] = $defense;
            
             
            }//end of while loop
            
            
           //bubble sort to get the order of tackles in descending order
            for($i = 0; $i < count($defArray); $i++){
                for($j = 0; $j < (count($defArray) - $i -1); $j++){
                    if($defArray[$j]->getTackles() < $defArray[$j+1]->getTackles())
                    {
                        //switch the statistics around if one is bigger than the other
                        $temp1 = $defArray[$j];
                        $defArray[$j] = $defArray[$j+1];
                        $defArray[$j+1] = $temp1;
                    }
                }//end of nested for loop
            }//end of for loop
            
            
            $index = 0;
              
            while($index != count($defArray)){ 
            $defCheck = clone $defArray[$index];
            
            $defFN = $defCheck->getFirstName();
            $defLN = $defCheck->getLastName();
            $defTA = $defCheck->getTackles();
            $defTFL = $defCheck->getTFL();
            $defI = $defCheck->getInterceptions();
            $defT = $defCheck->getTouchdowns();
            
           
                
            echo "<tr><td>" ."$defFN". " ". $defLN ."</td><td>" .$defTA."</td><td>" .$defTFL."</td><td>" .$defI."</td><td>" .$defT."</td></tr>";
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