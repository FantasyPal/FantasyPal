<?php
class UserLineup
{
        //create class for the UserLineup - WL
        private $userID;
        private $QB1;
        private $RB1;
        private $RB2;
        private $WR1;
        private $WR2;
        private $FLEX;
        private $BENCH1;
        private $BENCH2;
        private $BENCH3;
        private $BENCH4;
        private $BENCH5;
        
        //default constructor that sets the UserLineup objects - WL
        //sets all private variables to null from the first instance - WL
        public function __construct($userID)
        {
	        $this->userID = $userID;
        	$this->QB1 = "";
       		$this->RB1 = "";
        	$this->RB1 = "";
        	$this->WR1 = "";
        	$this->WR2 = "";
        	$this->FLEX = "";
        	$this->TE = "";
        	$this->BENCH1 = "";
        	$this->BENCH2 = "";
        	$this->BENCH3 = "";
        	$this->BENCH4 = "";
        	$this->BENCH5 = "";
            
        }      
        
         //function to get the QB in first postion from the users table - WL
        public function getQB($cookie) 
	    {
            
            //query to search UserTeam database for QB - WL
            $sql="SELECT QB FROM UserTeam WHERE userID LIKE '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the QB variable - WL
            	$QB = $row["QB"];
                return $QB;
            }
    
        }
    
        
        //function to get the TE from the users table - WL
        public function getTE($cookie) 
	    {
    
            //query to search UserTeam database for Tight End - WL
            $sql="SELECT TE FROM UserTeam WHERE userID LIKE  '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the TE variable - WL
            	$TE = $row["TE"];
            	return $TE;
	        }
        }
    
        //function to get the RB in first postion from the users table - WL
        public function getRB1($cookie) 
	    {
           
            //query to search UserTeam database for RB1 - WL
            $sql="SELECT RB1 FROM UserTeam WHERE userID LIKE  '%$cookie%'"; 
           
            //result of query - WL
            $result = mysql_query($sql);
           
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the RB1 variable - WL
            	$RB1 = $row["RB1"];
                return $RB1;
            }
        }
    
    
        //function to get the RB in second postion from the users table - WL
        public function getRB2($cookie) 
	    {
            
            //query to search UserTeam database for RB2 - WL
            $sql="SELECT RB2 FROM UserTeam WHERE userID LIKE  '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the RB2 variable - WL
            	$RB2 = $row["RB2"];
                return $RB2;
            }
              
        }
    
    
        //function to get the WR in first postion from the users table - WL
        public function getWR1($cookie) 
	    {
            
            //query to search UserTeam database for WR1 - WL
            $sql="SELECT WR1 FROM UserTeam WHERE userID LIKE '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the WR1 variable - WL
            	$WR1 = $row["WR1"];
                return $WR1;
            }
    
        }
    
    
        //function to get the WR in second postion from the users table - WL
        public function getWR2($cookie) 
	    {
           
            //query to search UserTeam database for WR2 - WL
            $sql="SELECT WR2 FROM UserTeam WHERE userID LIKE  '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the WR2 variable - WL
            	$WR2 = $row["WR2"];
                return $WR2;
            }
        }
    
        //function to get the FLEX from the users table - WL    
        public function getFLEX($cookie) 
	    {
            
            //query to search UserTeam database for FLEX - WL
            $sql="SELECT FLEX FROM UserTeam WHERE userID LIKE  '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the FLEX variable - WL
           	    $FLEX = $row["FLEX"];
                return $FLEX;
            }
        }
    
        //function to get the Bench in position 1 from the users table - WL
        public function getBENCH1($cookie) 
	    {
           
            //query to search UserTeam database for BENCH1 - WL
            $sql="SELECT BENCH1 FROM UserTeam WHERE userID LIKE  '%$cookie%'"; 
            
            //result of query - WL
           $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH1 variable - WL
            	$BENCH1 = $row["BENCH1"];
	           return $BENCH1;
            }
        }
    
        //function to get the Bench in position 2 from the users table - WL
        public function getBENCH2($cookie) 
	    {
            
            //query to search UserTeam database for BENCH2 - WL
            $sql="SELECT BENCH2 FROM UserTeam WHERE userID LIKE  '%" .$cookie. "%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH2 variable - WL
            	$BENCH2 = $row["BENCH2"];
                return $BENCH2;
            }
        }
    
    
        //function to get the Bench in position 3 from the users table - WL
        public function getBENCH3($cookie) 
	    {
            
            //query to search UserTeam database for BENCH3 - WL
            $sql="SELECT BENCH3 FROM UserTeam WHERE userID LIKE  '%" .$cookie. "%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH3 variable - WL
            	$BENCH3 = $row["BENCH3"];
                return $BENCH3;
            }
        }
    
    
        //function to get the Bench in position 4 from the users table - WL
      public function getBENCH4($cookie) 
	    {
    
            //query to search UserTeam database for BENCH4 - WL
            $sql="SELECT BENCH4 FROM UserTeam WHERE userID LIKE  '%" .$cookie. "%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH4 variable - WL
           	$BENCH4 = $row["BENCH4"];
                return $BENCH4;
            }
        }
    
    
        //function to get the Bench in position 5 from the users table - WL
        public function getBENCH5($cookie) 
	    {
        
            //query to search UserTeam database for BENCH5 - WL
            $sql="SELECT BENCH5 FROM UserTeam WHERE userID LIKE  '%" .$cookie. "%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH5 variable - WL
            	$BENCH5 = $row["BENCH5"];
                return $BENCH5;
            }
        }
    
      //function to get the QB opponent from the users table - WL
        public function getOpponentQB($cookie) 
	    {
            
            //query to search UserTeam database for quarterback - WL
            $sql="SELECT opponentQB FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the QB variable - WL
            	$opp = $row["opponentQB"];
            	return $opp;
            }
        }
    
    //function to get the RB1 opponent from the users table - WL
        public function getOpponentRB1($cookie) 
	    {
            
            //query to search UserTeam database for RB1 opponent - WL
            $sql="SELECT opponentRB1 FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the RB1 variable - WL
            	$opp = $row["opponentRB1"];
            	return $opp;
            }
        }
    
    //function to get the RB2 opponent from the users table - WL
        public function getOpponentRB2($cookie) 
	    {
            
            //query to search UserTeam database for RB2 opponent - WL
            $sql="SELECT opponentRB2 FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the RB1 variable - WL
            	$opp = $row["opponentRB2"];
            	return $opp;
            }
        }
    
        //function to get the WR1 opponent from the users table - WL
        public function getOpponentWR1($cookie) 
	    {
            
            //query to search UserTeam database for WR1 opponent - WL
            $sql="SELECT opponentWR1 FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the WR1 variable - WL
            	$opp = $row["opponentWR1"];
            	return $opp;
            }
        }
    
        //function to get the WR2 opponent from the users table - WL
        public function getOpponentWR2($cookie) 
	    {
            
            //query to search UserTeam database for WR2 opponent - WL
            $sql="SELECT opponentWR2 FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the WR1 variable - WL
            	$opp = $row["opponentWR2"];
            	return $opp;
            }
        }
    
        //function to get the TE opponent from the users table - WL
        public function getOpponentTE($cookie) 
	    {
            
            //query to search UserTeam database for TE opponent - WL
            $sql="SELECT opponentTE FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the TE variable - WL
            	$opp = $row["opponentTE"];
            	return $opp;
            }
        }
        
        //function to get the FLEX opponent from the users table - WL
        public function getOpponentFLEX($cookie) 
	    {
            
            //query to search UserTeam database for FLEX opponent - WL
            $sql="SELECT opponentFLEX FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the FLEX variable - WL
            	$opp = $row["opponentFLEX"];
            	return $opp;
            }
        }
    
        //function to get the BENCH opponent from the users table - WL
        public function getOpponentBENCH1($cookie) 
	    {
            
            //query to search UserTeam database for BENCH opponent - WL
            $sql="SELECT opponentBENCH1 FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH1 variable - WL
            	$opp = $row["opponentBENCH1"];
            	return $opp;
            }
        }
    
        //function to get the BENCH opponent from the users table - WL
        public function getOpponentBENCH2($cookie) 
	    {
            
            //query to search UserTeam database for BENCH opponent - WL
            $sql="SELECT opponentBENCH2 FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH variable - WL
            	$opp = $row["opponentBENCH2"];
            	return $opp;
            }
        }
    
        //function to get the BENCH opponent from the users table - WL
        public function getOpponentBENCH3($cookie) 
	    {
            
            //query to search UserTeam database for BENCH opponent - WL
            $sql="SELECT opponentBENCH3 FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH1 variable - WL
            	$opp = $row["opponentBENCH3"];
            	return $opp;
            }
        }
    
        //function to get the BENCH opponent from the users table - WL
        public function getOpponentBENCH4($cookie) 
	    {
            
            //query to search UserTeam database for BENCH opponent - WL
            $sql="SELECT opponentBENCH4 FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH1 variable - WL
            	$opp = $row["opponentBENCH4"];
            	return $opp;
            }
        }
    
        //function to get the BENCH opponent from the users table - WL
        public function getOpponentBENCH5($cookie) 
	    {
            
            //query to search UserTeam database for BENCH opponent - WL
            $sql="SELECT opponentBENCH5 FROM UserTeam WHERE userID LIKE '%" .$cookie. "%'"; 
        
            //result of query - WL
            $result = mysql_query($sql);
        
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the BENCH1 variable - WL
            	$opp = $row["opponentBENCH5"];
            	return $opp;
            }
        }
    
         //function to get the postion from the users table - WL
        public function getPositionB1($cookie) 
	    {
            
            //query to search UserTeam database for position - WL
            $sql="SELECT positionBENCH1 FROM UserTeam WHERE userID LIKE '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
           while($row=mysql_fetch_array($result))
	        {
                //Store and return the  variable - WL
            	$B1 = $row["positionBENCH1"];
                return $B1;
            }
    
        }
    
         //function to get the postion from the users table - WL
        public function getPositionB2($cookie) 
	    {
            
            //query to search UserTeam database for position - WL
            $sql="SELECT positionBENCH2 FROM UserTeam WHERE userID LIKE '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the  variable - WL
            	$B2 = $row["positionBENCH2"];
                return $B2;
            }
    
        }
    
         //function to get the postion from the users table - WL
        public function getPositionB3($cookie) 
	    {
            
            //query to search UserTeam database for position - WL
            $sql="SELECT positionBENCH3 FROM UserTeam WHERE userID LIKE '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the  variable - WL
            	$B3 = $row["positionBENCH3"];
                return $B3;
            }
    
        }
    
         //function to get the postion from the users table - WL
        public function getPositionB4($cookie) 
	    {
            
            //query to search UserTeam database for position - WL
       $sql="SELECT positionBENCH4 FROM UserTeam WHERE userID LIKE '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the  variable - WL
            	$B4 = $row["positionBENCH4"];
                return $B4;
            }
    
        }
    
    
       //function to get the postion from the users table - WL
        public function getPositionB5($cookie) 
	    {
            
            //query to search UserTeam database for position - WL
            $sql="SELECT positionBENCH5 FROM UserTeam WHERE userID LIKE '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the  variable - WL
            	$B5 = $row["positionBENCH5"];
                return $B5;
            }
    
        }
    
          //function to get the postion from the users table - WL
        public function getPositionFLEX($cookie) 
	    {
            
            //query to search UserTeam database for position - WL
            $sql="SELECT positionFLEX FROM UserTeam WHERE userID LIKE '%$cookie%'"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the  variable - WL
            	$F = $row["positionFLEX"];
                return $F;
            }
    
        }
    
       
    
      
    
        //function to set the selected QB into the user table - WL
        public function setQB($QBvar, $cookie, $op) 
	    {
        
            
        //Query to UPDATE the databse with the new QB variable where the Username matches - WL
        $sql = "UPDATE UserTeam 
        SET QB = '$QBvar' 
        WHERE userID = '$cookie'";                                   //here
        
         $sql2 = "UPDATE UserTeam 
         SET opponentQB='$op' 
         WHERE userID='$cookie'";
			
        if (mysql_query($sql2) === TRUE) {
       
        }
        else {
        echo "Error: " . $sql2 . "<br>" . $db->error;
        }
            
        //Test to see if the usertable updates
		if (mysql_query($sql) === TRUE) {
            
        }
		else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

        }
    
    
        //function to set the selected TE into the user table - WL
        public function setTE($TEvar, $cookie, $op) 
        {
            
        //Query to UPDATE the databse with the new TE variable where the Username matches - WL
        $sql = "UPDATE UserTeam 
        SET TE ='$TEvar' 
        WHERE userID='$cookie'";
            
         $sql2 = "UPDATE UserTeam 
         SET opponentTE='$op' 
         WHERE userID='$cookie'";
			
        if (mysql_query($sql2) === TRUE) {
       
        }
        else {
        echo "Error: " . $sql2 . "<br>" . $db->error;
        }
        
        //Test to see if the usertable updates - WL
        if (mysql_query($sql) === TRUE) {
            
        } 
        else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

        }
    
    
        //function to set the selected RB into the user table - WL           
        public function setRB($RBvar, $cookie, $op) {
        
         //if there is nothing at RB1 then - WL
         if(strcmp($this->getRB1($cookie), "") == 0){
            
            
             
            //Query to UPDATE the databse with the new RB variable where the Username matches - WL 
            $sql = "UPDATE UserTeam 
            SET RB1='$RBvar' 
            WHERE userID='$cookie'";
             
            $sql5 = "UPDATE UserTeam 
            SET opponentRB1='$op' 
            WHERE userID='$cookie'";
			
            if (mysql_query($sql5) === TRUE) {
                
            }
                else {
                echo "Error: " . $sql5 . "<br>" . $db->error;
            } 

            //tests the query and sets the UPDATE into the table - WL
            if (mysql_query($sql) === TRUE) 
		    {
                
            }
            else 
		    {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        }
        //if RB1 is filled - WL
        else{
            
            //if RB2 is empty - WL
            if(strcmp($this->getRB2($cookie), "") == 0)
		    {
                
                $check = $this->getRB2($cookie);
                
                
                //Query to UPDATE the database with the new RB variable where the Username matches - WL
                $sql = "UPDATE UserTeam 
                SET RB2='$RBvar' 
                WHERE userID='$cookie'";
                
                $sql5 = "UPDATE UserTeam 
                SET opponentRB2='$op' 
                WHERE userID='$cookie'";
			
                if (mysql_query($sql5) === TRUE) {
               
                }
                else {
                echo "Error: " . $sql5 . "<br>" . $db->error;
                } 
                
	           //tests the query and sets the UPDATE into the table - WL
	            if (mysql_query($sql) === TRUE) 
			    {
                   
                }
                else 
			    {
        	        echo "Error: " . $sql . "<br>" . $db->error;
        	    }

            }
            //if RB1 and RB2 are already filled - WL
            else if( (strcmp($this->getRB2($cookie), "") != 0) && (strcmp($this->getRB1($cookie), "") != 0))
		    {
                
                
                    $RBnum;
                
                    //Query to Select from the database the insertRB num- WL
            	    $sql="SELECT * FROM UserTeam";
                    
                    
                    //result of query - WL
                    $result = mysql_query($sql);
                
                    //loops while there is still information in database - WL
                    while($row=mysql_fetch_array($result))
		            { 
                        $id = $row["userID"];
                    	$RBnum = $row["insertRB"];
                       
                        //if the user is found - WL
                        if(strcmp($id, $cookie) == 0)
			            {
                            //get the insertRB number to know where to enter player - WL
                            $RBinsert = $RBnum; 
                          
                        }
                        
                    }

                    //if the insert is saying to insert RB in spot 2 - WL
                    if($RBinsert == 2)
		            {
                        
                        //Query to UPDATE the database with the new RB variable where the Username matches - WL
                        $sql = "UPDATE UserTeam 
                        SET RB2='$RBvar' 
                        WHERE userID='$cookie'";
                        
                        $sql5 = "UPDATE UserTeam 
                        SET opponentRB2='$op' 
                        WHERE userID='$cookie'";
			
                        if (mysql_query($sql5) === TRUE) {
                        
                        }
                        else {
                        echo "Error: " . $sql5 . "<br>" . $db->error;
                        } 
                        
                        //updates tables and checks if it works - WL
                        if (mysql_query($sql) === TRUE) 
			            {
                          
                        } 
			             else 
			            {
                        	echo "Error: " . $sql . "<br>" . $db->error;
                        }
	   
                        //change the RBinsert to spot 1 - WL
                        $RBinsert = $RBinsert - 1;
                        
                        //sets the new RBinsert - WL
                        $sql2 = "UPDATE UserTeam 
                        SET insertRB='$RBinsert' 
                        WHERE userID='$cookie'";

                        //updates insertRB and checks if it works - WL
                        if (mysql_query($sql2) === TRUE) 
			            {
                          
                        }
                        else 
			            {
                        	echo "Error: " . $sql . "<br>" . $db->error;
                        }
                    }
                    //if the insert is saying to insert RB in spot 1 - WL
                    else if ($RBinsert == 1){
                 
                        
                        //Query to UPDATE the database with the new RB variable where the Username matches - WL
                        $sql = "UPDATE UserTeam 
                        SET RB1='$RBvar' 
                        WHERE userID='$cookie'";
                        
                         $sql5 = "UPDATE UserTeam 
                         SET opponentRB1='$op' 
                         WHERE userID='$cookie'";
			
                        if (mysql_query($sql5) === TRUE) {
                        
                        }
                        else {
                        echo "Error: " . $sql5 . "<br>" . $db->error;
                        } 
			
                        //updates tables and checks if it works - WL
                        if (mysql_query($sql) === TRUE) 
			            {
                            
                        }
                        else 
			            {
                	        echo "Error: " . $sql . "<br>" . $db->error;
                        }
			
                        //change the RBinsert to spot 2 - WL
                     
                        $RBinsert = 2;
                    
                        //sets the new RBinsert - WL
                        $sql2 = "UPDATE UserTeam 
                        SET insertRB='$RBinsert' 
                        WHERE userID='$cookie'";
			
                        //updates insertRB and checks if it works - WL
                        if (mysql_query($sql2) === TRUE) 
			            {
                           
                        }
                        else 
			            {
                       		echo "Error: " . $sql . "<br>" . $db->error;
                        }
                    }
                }
            } 
        }
    

        //function to set the selected WR into the user table - WL           
        public function setWR($WRvar, $cookie, $op) {
        
         //if there is nothing at WR1 then - WL
         if(strcmp($this->getWR1($cookie), "") == 0){
          
             
            //Query to UPDATE the databse with the new WR variable where the Username matches - WL 
            $sql = "UPDATE UserTeam 
            SET WR1='$WRvar' 
            WHERE userID='$cookie'";
             
            $sql5 = "UPDATE UserTeam 
            SET opponentWR1='$op' 
            WHERE userID='$cookie'";
			
            if (mysql_query($sql5) === TRUE) {
                
            }
                else {
                echo "Error: " . $sql5 . "<br>" . $db->error;
            } 

            //tests the query and sets the UPDATE into the table - WL
            if (mysql_query($sql) === TRUE) 
		    {
           
            }
            else 
		    {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        }
        //if WR1 is filled - WL
        else{
            
            //if WR2 is empty - WL
            if(strcmp($this->getWR2($cookie), "") == 0)
		    {
               
                $check = $this->getWR2($cookie);
              
                //Query to UPDATE the database with the new WR variable where the Username matches - WL
                $sql = "UPDATE UserTeam 
                SET WR2='$WRvar' 
                WHERE userID='$cookie'";
                
                $sql5 = "UPDATE UserTeam 
                SET opponentWR2='$op' 
                WHERE userID='$cookie'";
			
                if (mysql_query($sql5) === TRUE) {
                
                }
                else {
                echo "Error: " . $sql5 . "<br>" . $db->error;
                }
                
	           //tests the query and sets the UPDATE into the table - WL
	            if (mysql_query($sql) === TRUE) 
			    {
                  
                }
                else 
			    {
        	        echo "Error: " . $sql . "<br>" . $db->error;
        	    }

            }
            //if WR1 and WR2 are already filled - WL
            else if( (strcmp($this->getWR2($cookie), "") != 0) && (strcmp($this->getWR1($cookie), "") != 0))
		    {
                
                
                    $WRnum;
                
                    //Query to Select from the database the insertWR num- WL
            	    $sql="SELECT * FROM UserTeam";
                    
                    
                    //result of query - WL
                    $result = mysql_query($sql);
                
                    //loops while there is still information in database - WL
                    while($row=mysql_fetch_array($result))
		            { 
                        $id = $row["userID"];
                    	$WRnum = $row["insertWR"];
                        
                        //if the user is found - WL
                        if(strcmp($id, $cookie) == 0)
			            {
                            //get the insertWR number to know where to enter player - WL
                            $WRinsert = $WRnum; 
                           
                        }
                        
                    }

                    //if the insert is saying to insert WR in spot 2 - WL
                    if($WRinsert == 2)
		            {
                        
                        //Query to UPDATE the database with the new WR variable where the Username matches - WL
                        $sql = "UPDATE UserTeam 
                        SET WR2='$WRvar' 
                        WHERE userID='$cookie'";
                        
                        $sql5 = "UPDATE UserTeam 
                        SET opponentWR2='$op' 
                        WHERE userID='$cookie'";
			
                        if (mysql_query($sql5) === TRUE) {
                       
                        }
                        else {
                        echo "Error: " . $sql5 . "<br>" . $db->error;
                        } 
                        
                        //updates tables and checks if it works - WL
                        if (mysql_query($sql) === TRUE) 
			            {
                           
                        } 
			             else 
			            {
                        	echo "Error: " . $sql . "<br>" . $db->error;
                        }
	   
                        //change the WRinsert to spot 1 - WL
                        $WRinsert = $WRinsert - 1;
                        
                        //sets the new WRinsert - WL
                        $sql2 = "UPDATE UserTeam 
                        SET insertWR='$WRinsert' 
                        WHERE userID='$cookie'";

                        //updates insertWR and checks if it works - WL
                        if (mysql_query($sql2) === TRUE) 
			            {
               
                        }
                        else 
			            {
                        	echo "Error: " . $sql . "<br>" . $db->error;
                        }
                    }
                    //if the insert is saying to insert WR in spot 1 - WL
                    else if ($WRinsert == 1){
                        
                        
                        //Query to UPDATE the database with the new WR variable where the Username matches - WL
                        $sql = "UPDATE UserTeam 
                        SET WR1='$WRvar' 
                        WHERE userID='$cookie'";
                        
                        $sql5 = "UPDATE UserTeam 
                        SET opponentWR1='$op' 
                        WHERE userID='$cookie'";
			
                        if (mysql_query($sql5) === TRUE) {
             
                        }
                        else {
                        echo "Error: " . $sql5 . "<br>" . $db->error;
                        } 
			
                        //updates tables and checks if it works - WL
                        if (mysql_query($sql) === TRUE) 
			            {
                            
                        }
                        else 
			            {
                	        echo "Error: " . $sql . "<br>" . $db->error;
                        }
			
                        //change the WRinsert to spot 2 - WL
                        $WRinsert = 2;
                       
                        
                        //sets the new WRinsert - WL
                        $sql2 = "UPDATE UserTeam 
                        SET insertWR='$WRinsert' 
                        WHERE userID='$cookie'";
			
                        //updates insertWR and checks if it works - WL
                        if (mysql_query($sql2) === TRUE) 
			            {
                           
                        }
                        else 
			            {
                       		echo "Error: " . $sql . "<br>" . $db->error;
                        }
                    }
                }
            } 
        }
        
        
        //function to set the selected FLEX into the user table - WL
        public function setFLEX($FLEXvar, $cookie, $op, $pos) 
	    {	
        	
            
            //Query to UPDATE the databse with the new FLEX variable where the Username matches - WL
        	$sql = "UPDATE UserTeam 
        	SET FLEX='$FLEXvar' 
        	WHERE userID='$cookie'";
            
            $sql5 = "UPDATE UserTeam 
            SET opponentFLEX='$op' 
            WHERE userID='$cookie'";
            
            $sql6 = "UPDATE UserTeam 
            SET positionFLEX='$pos' 
            WHERE userID='$cookie'";
                
			
            if (mysql_query($sql6) === TRUE) {
            
            }      
            else {
               echo "Error: " . $sql6 . "<br>" . $db->error;
            } 
            
            
            if (mysql_query($sql5) === TRUE) {
               
            }
                else {
                echo "Error: " . $sql5 . "<br>" . $db->error;
            } 
		
            //Test to see if the usertable updates - WL
            if (mysql_query($sql) === TRUE) 
		    {
     
            }
		    else 
		    {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        }
        
    
        //function to set the selected BENCH into the user table - WL
        public function setBENCH($BENCHvar, $cookie, $op, $pos) 
	    {
            //if there is nothing at FLEX1 then - WL
            if(strcmp($this->getBENCH1($cookie), "") == 0)
            {

        	
                //Query to UPDATE the databse with the new BENCH variable where the Username matches - WL
                $sql = "UPDATE UserTeam 
        	    SET BENCH1='$BENCHvar' 
        	    WHERE userID='$cookie'";
                
                $sql5 = "UPDATE UserTeam 
                SET opponentBENCH1='$op' 
                WHERE userID='$cookie'";
                  
                $sql6 = "UPDATE UserTeam 
                SET positionBENCH1='$pos' 
                WHERE userID='$cookie'";
                
			
                if (mysql_query($sql6) === TRUE) {
              
                }
                else {
                echo "Error: " . $sql6 . "<br>" . $db->error;
                } 
			
                if (mysql_query($sql5) === TRUE) {
               
                }
                else {
                echo "Error: " . $sql5 . "<br>" . $db->error;
                } 
                
                //tests the query and sets the UPDATE into the table - WL
                if (mysql_query($sql) === TRUE) 
		        {
                    
                }
		        else 
                {
                    echo "Error: " . $sql . "<br>" . $db->error;
                }
            }
            //if BENCH1 is filled - WL
            else
            {
                //if BENCH2 is empty - WL
                if(strcmp($this->getBENCH2($cookie), "") == 0)
                {	
                	
                    
                    //Query to UPDATE the database with the new BECNH variable where the Username matches - WL
                    $sql = "UPDATE UserTeam 
                  	SET BENCH2='$BENCHvar' 
                  	WHERE userID='$cookie'";
                    
                    $sql5 = "UPDATE UserTeam 
                    SET opponentBENCH2='$op' 
                    WHERE userID='$cookie'";
                    
                    $sql6 = "UPDATE UserTeam 
                    SET positionBENCH2='$pos' 
                    WHERE userID='$cookie'";
                
			
                    if (mysql_query($sql6) === TRUE) {
                    
                    }
                    else {
                    echo "Error: " . $sql6 . "<br>" . $db->error;
                    } 
			
			
                    if (mysql_query($sql5) === TRUE) {
                   
                    }
                    else {
                    echo "Error: " . $sql5 . "<br>" . $db->error;
                    } 
	
                     //tests the query and sets the UPDATE into the table - WL
                	if (mysql_query($sql) === TRUE) {
               		    
                	}
                    else {
                    		echo "Error: " . $sql . "<br>" . $db->error;
                	}
		
                }
                //if BENCH2 is filled - WL
                else
		        {
                    //if BENCH3 is empty - WL
                	if(strcmp($this->getBENCH3($cookie), "") == 0)
                    {
                	
                	   
                        
                       //Query to UPDATE the database with the new BENCH variable where the Username matches - WL
                	   $sql = "UPDATE UserTeam 
                	   SET BENCH3='$BENCHvar' 
                	   WHERE userID='$cookie'";
                        
                        $sql5 = "UPDATE UserTeam 
                        SET opponentBENCH3='$op' 
                        WHERE userID='$cookie'";
                        
                        $sql6 = "UPDATE UserTeam 
                        SET positionBENCH3='$pos' 
                        WHERE userID='$cookie'";
                
			
                        if (mysql_query($sql6) === TRUE) {
                            
                        }
                        else {
                            echo "Error: " . $sql6 . "<br>" . $db->error;
                        } 
			
			
                        if (mysql_query($sql5) === TRUE) {
                       
                        }
                        else {
                        echo "Error: " . $sql5 . "<br>" . $db->error;
                        } 
			
                        //tests the query and sets the UPDATE into the table - WL
                	   if (mysql_query($sql) === TRUE) 
			             {
                	    
                        }
			            else 
			             {
                           echo "Error: " . $sql . "<br>" . $db->error;
                         }  
                    }
                    //if BENCH3 is filled - WL
                    else
		             {
                         //if BENCH4 is empty - WL
                         if(strcmp($this->getBENCH4($cookie), "") == 0)
			             {
                 		     
                             
                             //Query to UPDATE the database with the new BENCH variable where the Username matches - WL
                 		     $sql = "UPDATE UserTeam 
	                	     SET BENCH4='$BENCHvar' 
                  		     WHERE userID='$cookie'";
                             
                             $sql5 = "UPDATE UserTeam 
                             SET opponentBENCH4='$op' 
                             WHERE userID='$cookie'";
                             
                             $sql6 = "UPDATE UserTeam 
                             SET positionBENCH4='$pos' 
                             WHERE userID='$cookie'";
                
			
                             if (mysql_query($sql6) === TRUE) {
                                 
                             }
                             else {
                                 echo "Error: " . $sql6 . "<br>" . $db->error;
                             } 
			
			
                             if (mysql_query($sql5) === TRUE) {
                             
                             }
                             else {
                             echo "Error: " . $sql5 . "<br>" . $db->error;
                             } 
                             
                             //tests the query and sets the UPDATE into the table - WL
                             if (mysql_query($sql) === TRUE) {
                                 
                             }
                             else{
                                 echo "Error: " . $sql . "<br>" . $db->error;
                             }
                         }
                         //if BENCH5 is empty - WL
                         else if(strcmp($this->getBENCH5($cookie), "") == 0)
                         {
                             
                             //Query to UPDATE the database with the new BENCH variable where the Username matches - WL
                             $sql = "UPDATE UserTeam 
                             SET BENCH5= '$BENCHvar' 
                             WHERE userID='$cookie'";
                             
                             $sql5 = "UPDATE UserTeam 
                             SET opponentBENCH5='$op' 
                             WHERE userID='$cookie'";
                             
                             $sql6 = "UPDATE UserTeam 
                             SET positionBENCH5='$pos' 
                             WHERE userID='$cookie'";
                
			
                             if (mysql_query($sql6) === TRUE) {
                                 
                             }
                             else {
                                 echo "Error: " . $sql6 . "<br>" . $db->error;
                             } 
			
			
                             if (mysql_query($sql5) === TRUE) {
                             
                             }
                             else {
                             echo "Error: " . $sql5 . "<br>" . $db->error;
                             } 
                             
			                 //tests the query and sets the UPDATE into the table - WL
                             if (mysql_query($sql) === TRUE) {
                                 
                             } 
                             else {
                                 echo "Error: " . $sql . "<br>" . $db->error;
                             }
                         }
		
                        //if all BENCH spots are full
                         
if( (strcmp($this->getBENCH5($cookie), "") != 0) && (strcmp($this->getBENCH1($cookie), "") != 0) && (strcmp($this->getBENCH2($cookie), "") != 0) && (strcmp($this->getBENCH3($cookie), "") != 0) && (strcmp($this->getBENCH4($cookie), "") != 0))
		                {
                            
                            $BENCHinsert;
                            $a = 0;
                            
                            //Query to Select from the database the insertWR num- WL
                            $sql="SELECT * FROM UserTeam";
                            
                            //result of query - WL
                            $result = mysql_query($sql);
                            
                            //loops while there is still information in database - WL
                            while($row=mysql_fetch_array($result))
                            {
                                $id = $row["userID"];
                                $BENCHnum = $row["insertBENCH"];
                                
                                //if the user is found - WL
                                if(strcmp($id, $cookie) === 0){
                        	       $BENCHinsert = $BENCHnum; 
                        	       
                                }
                            }
               
                           
                            
                            //switch case to determine where to enter in the bench - WL
                            switch ($BENCHinsert)  { 
                                
                                //enter in BENCH1 - WL
                                case($BENCHinsert == 1):
                                   $sql2 = "UPDATE UserTeam 
                                   SET BENCH1 ='$BENCHvar' 
                                   WHERE userID='$cookie'";
                                    
                                   $sql5 = "UPDATE UserTeam 
                                    SET opponentBENCH1='$op' 
                                    WHERE userID='$cookie'";
                                    
                                    $sql6 = "UPDATE UserTeam 
                                    SET positionBENCH1='$pos' 
                                    WHERE userID='$cookie'";
                
			
                                    if (mysql_query($sql6) === TRUE) {
                                       
                                    }
                                    else {
                                        echo "Error: " . $sql6 . "<br>" . $db->error;
                                    } 
			
			
                                    if (mysql_query($sql5) === TRUE) {
                                        
                                    }
                                    else {
                                    echo "Error: " . $sql5 . "<br>" . $db->error;
                                    } 
                                    
                                    if (mysql_query($sql2) === TRUE){
                                      
                                    }	
                                    else {
                                        echo "Error: " . $sql . "<br>" . $db->error;
                                    }
			                         
                                    //increment and update the insertBench var - WL
                                    $BENCHinsert = $BENCHinsert + 1;
                                    
                                    $sql3 = "UPDATE UserTeam 
                                    SET insertBENCH='$BENCHinsert' 
                                    WHERE userID='$cookie'";

                                    if (mysql_query($sql3) === TRUE) {
                                      
                                    }
                                    else 
			                         {
                        	            echo "Error: " . $sql . "<br>" . $db->error;
                                     }
                                    break;
                                    
                                //enter in BENCH2 - WL
                                case($BENCHinsert == 2):
                            
                                    $sql = "UPDATE UserTeam 
                                    SET BENCH2='$BENCHvar' 
                                    WHERE userID='$cookie'";
                                    
                                    $sql5 = "UPDATE UserTeam 
                                    SET opponentBENCH2='$op' 
                                    WHERE userID='$cookie'";
                                    
                                    $sql6 = "UPDATE UserTeam 
                                    SET positionBENCH2='$pos' 
                                    WHERE userID='$cookie'";
                
			
                                    if (mysql_query($sql6) === TRUE) {
                                        
                                    }
                                    else {
                                        echo "Error: " . $sql6 . "<br>" . $db->error;
                                    } 
			
			
                                    if (mysql_query($sql5) === TRUE) {
                                   
                                    }
                                    else {
                                        echo "Error: " . $sql5 . "<br>" . $db->error;
                                    } 

                                    if (mysql_query($sql) === TRUE){
                                        
                                    }
                                    else {
                                        echo "Error: " . $sql . "<br>" . $db->error;
                                    }

                                    //increment and update the insertBench var - WL
                                    $BENCHinsert = $BENCHinsert + 1;
                                    
                                    $sql2 = "UPDATE UserTeam 
                                    SET insertBENCH='$BENCHinsert' 
                                    WHERE userID='$cookie'";
                                    
                                    if (mysql_query($sql2) === TRUE){
                                        
                                    }
			                         else 
			                         {
                        	           echo "Error: " . $sql . "<br>" . $db->error;
                                     } 
                                    break;
                                
                                //enter in BENCH3 - WL
                                case($BENCHinsert == 3):
                           
                                    $sql = "UPDATE UserTeam 
                                    SET BENCH3='$BENCHvar' 
                                    WHERE userID='$cookie'";
                                    
                                    $sql5 = "UPDATE UserTeam 
                                    SET opponentBENCH3='$op' 
                                    WHERE userID='$cookie'";
                                    
                                    $sql6 = "UPDATE UserTeam 
                                    SET positionBENCH3='$pos' 
                                    WHERE userID='$cookie'";
                
			
                                    if (mysql_query($sql6) === TRUE) {
                                     
                                    }
                                    else {
                                        echo "Error: " . $sql6 . "<br>" . $db->error;
                                    } 
			
			
                                    if (mysql_query($sql5) === TRUE) {
                                        
                                    }
                                    else {
                                        echo "Error: " . $sql5 . "<br>" . $db->error;
                                    } 
                                    
                                    if (mysql_query($sql) === TRUE){
                                       
                                    }
                                    else {
                        	            echo "Error: " . $sql . "<br>" . $db->error;
                                    }

                                    //increment and update the insertBench var - WL
                                    $BENCHinsert = $BENCHinsert + 1;
                                    
                                    $sql2 = "UPDATE UserTeam 
                                    SET insertBENCH='$BENCHinsert' 
                                    WHERE userID='$cookie'";
			
                                    if (mysql_query($sql2) === TRUE) {
                                    
                                    }
			                        else {
                        	            echo "Error: " . $sql . "<br>" . $db->error;
                                    }
                                    break;
                                    
                                //enter in BENCH4 - WL
                                case($BENCHinsert == 4):
                                    
                                    
                                    $sql = "UPDATE UserTeam 
                                    SET BENCH4='$BENCHvar' 
                                    WHERE userID='$cookie'";
                                    
                                    $sql5 = "UPDATE UserTeam 
                                    SET opponentBENCH4='$op' 
                                    WHERE userID='$cookie'";
                                    
                                    $sql6 = "UPDATE UserTeam 
                                    SET positionBENCH4='$pos' 
                                    WHERE userID='$cookie'";
                
			
                                    if (mysql_query($sql6) === TRUE) {
                                      
                                    }
                                    else {
                                        echo "Error: " . $sql6 . "<br>" . $db->error;
                                    } 
			
			
                                    if (mysql_query($sql5) === TRUE) {
                                       
                                    }
                                    else {
                                        echo "Error: " . $sql5 . "<br>" . $db->error;
                                    } 
			
                                    if (mysql_query($sql) === TRUE) {
                                       
                                    }
			                        else {
                        	           echo "Error: " . $sql . "<br>" . $db->error;
                                    }
                                    
                                    //increment and update the insertBench var - WL
                                    $BENCHinsert = 5;
                                    
                                    $sql2 = "UPDATE UserTeam 
                                    SET insertBENCH='$BENCHinsert' 
                                    WHERE userID='$cookie'";
			
                                    if (mysql_query($sql2) === TRUE) {
                                        
                                    }
			                         else {
                                    	echo "Error: " . $sql2 . "<br>" . $db->error;
                                    } 
                                    break;
                                
                                //enter in BENCH3 - WL
                                case($BENCHinsert == 5):
                
                                    $sql = "UPDATE UserTeam 
                                    SET BENCH5= '$BENCHvar' 
                                    WHERE userID='$cookie'";
                                    
                                    $sql5 = "UPDATE UserTeam 
                                    SET opponentBENCH5='$op' 
                                    WHERE userID='$cookie'";
                                    
                                    $sql6 = "UPDATE UserTeam 
                                    SET positionBENCH5='$pos' 
                                    WHERE userID='$cookie'";
                
			
                                    if (mysql_query($sql6) === TRUE) {
                                        
                                    }
                                    else {
                                        echo "Error: " . $sql6 . "<br>" . $db->error;
                                    } 
			
			
                                    if (mysql_query($sql5) === TRUE) {
                                        
                                    }
                                    else {
                                        echo "Error: " . $sql5 . "<br>" . $db->error;
                                    } 
			
                                    if (mysql_query($sql) === TRUE) {
                        	           
                                    }
			                         else {
                        	           echo "Error: " . $sql . "<br>" . $db->error;
                                    }
			             
                                    //increment and update the insertBench var - WL
                                    $BENCHinsert = 1;
                        
                                    $sql2 = "UPDATE UserTeam 
                                    SET insertBENCH='$BENCHinsert' 
                                    WHERE userID='$cookie'";
			
                                    if (mysql_query($sql2) === TRUE) {
                        	          
                                    }
                                    else {
                        	           echo "Error: " . $sql . "<br>" . $db->error;
                                    } 
                                    break;
                   }
 
                    
                    
                        }
                    }
                }
            } 
        }
    
        
        //function that displays the team the player entered is on - WL
        public function getPlayerTeam($player)
        {
            
            //split the string into first and last name - WL
            list($fName, $lName) = explode(' ', $player);
            
         
            //query to search NamesAndTeams database for Firstname of player - WL
            $sql="SELECT * FROM NamesAndTeams"; 
            
            //result of query - WL
            $result = mysql_query($sql);
            
            //loops while there is still information in database - WL
            while($row=mysql_fetch_array($result))
	        {
                //Store and return the team variable - WL
            	$team = $row["TeamName"];
                $first = $row["FirstName"];
                $last = $row["LastName"];
                
                if( (strcmp($fName, $first) == 0) && (strcmp($lName, $last) == 0) ){
                    $teamfinal = $team;
                }
            }
            
            return $teamfinal;
	           
        }
    
        //function that extends the shortened value of opponent team - WL
       public function getOpponentTeam($team)
        {
            //drop down to determine which function to call - WL
            switch ($team)  { 
                case "GB":   
                    $teamName = "Green Bay Packers";
                    return $teamName;
                    break;
                case "JAX":
                    $teamName = "Jacksonville Jaguars";
                    return $teamName;
                    break;
                case "KC":
                    $teamName = "Kansas City Chiefs";
                    return $teamName;
                    break;
                case "TB":
                    $teamName = "Tampa Bay Buccaneers";
                    return $teamName;
                    break;
                case "LA":
                    $teamName = "Los Angeles Rams";
                    return $teamName;
                    break;
                case "LAC":
                    $teamName = "Los Angeles Chargers";
                    return $teamName;
                    break;
                case "NE":
                    $teamName = "New England Patriots";
                    return $teamName;
                    break;
                case "NO":
                    $teamName = "New Orleans Saints";
                    return $teamName;
                    break;
                case "NYG":
                    $teamName = "New York Giants";
                    return $teamName;
                    break;
                case "NYJ":
                    $teamName = "New York Jets";
                    return $teamName;
                    break;
                case "SF":
                    $teamName = "San Francisco 49ers";
                    return $teamName;
                    break;
                case "CAR":
                    $teamName = "Carolina Panthers";
                    return $teamName;
                    break;
                case "CHI":
                    $teamName = "Chicago Bears";
                    return $teamName;
                    break;
                case "PHI":
                    $teamName = "Philadelphia Eagles";
                    return $teamName;
                    break;
                case "":
                    $teamName = "";
                    return $teamName;
                    break;
                default:
                    $sql="SELECT TeamName FROM NamesAndTeams WHERE TeamName LIKE '%" . $team .  "%'"; 
                    
            
                    //result of query - WL
                    $result = mysql_query($sql);
                    
                     while($row=mysql_fetch_array($result)){ 
                         $teamName = $row["TeamName"];
                     }
                    
                    return $teamName;
            }
            
       }
    
    //function that returns the player positions - WL
    public function getPlayerPo($id, $name)
    {
        
         $B1C = $this->getBENCH1($id);
          $B2C = $this->getBENCH2($id);
          $B3C = $this->getBENCH3($id);
          $B4C = $this->getBENCH4($id);
          $B5C = $this->getBENCH5($id);
          $FC = $this->getFLEX($id);
        
        
        if(strcmp($B1C, $name) == 0){
            $B1r = $this->getPositionB1($id);
            return $B1r;
        }
        if(strcmp($B2C, $name) == 0){
            $B2r = $this->getPositionB2($id);
            return $B2r;
        }
        if(strcmp($B3C, $name) == 0){
            $B3r = $this->getPositionB3($id);
            return $B3r;
        }
        if(strcmp($B4C, $name) == 0){
            $B4r = $this->getPositionB4($id);
            return $B4r;
        }
        if(strcmp($B5C, $name) == 0){
            $B5r = $this->getPositionB5($id);
            return $B5r;
        }
        if(strcmp($FC, $name) == 0){
            $Fr = $this->getPositionFLEX($id);
            return $Fr;
        }
       return "this sucks"; 
    }
    
}//end of class UserLineup - WL

?>