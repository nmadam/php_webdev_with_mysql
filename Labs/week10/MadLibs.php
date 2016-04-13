<?php
    class MadLibs {
        private $noun;
        private $verb;
        private $adjective;
        private $adverb;
        private $story;
        
        //Getters
        public function getNoun() {
            return $this->noun;
        }
        
        public function getVerb() {
            return $this->verb;
        }
        
        public function getAdjective() {
            return $this->adjective;
        }
        
        public function getAdverb() {
            return $this->adverb;
        }
        
        public function getStory() {
            return $this->story;
        }
        
        //Setters
        public function setNoun($noun) {
            $this->noun = $noun;
        }
        
        public function setVerb($verb) {
            $this->verb = $verb;
        }
        
        public function setAdjective($adjective) {
            $this->adjective = $adjective;
        }
        
        public function setAdverb($adverb) {
            $this->adverb = $adverb;
        }
        
        public function setStory($story) {
            $this->story = $story;
        }
        
        //Insert values into database
        public function addComponents() {
            require_once('connectvars.php');
            
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to MySQL server.');
            
            //Insert form values and created story into database    
            $queryInsert = "INSERT INTO mad_lib_data (noun, verb, adjective, adverb, story)" . 
                    "VALUES ('$this->noun', '$this->verb', '$this->adjective', '$this->adverb', '$this->story')";
            //echo($this->getAdverb());
            //echo ($queryInsert);             
            mysqli_query ($dbc, $queryInsert)
                    or die('Error querying database.');
                        
            mysqli_close($dbc);
        }
        
        //Retrieve user stories from database
        public function userStories() {
            require_once('connectvars.php');
        
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to MySQL server.');
            
            //Retrieve user stories   
            $querySelect = "SELECT * FROM mad_lib_data ORDER BY story_id desc";
            
            $result = mysqli_query($dbc, $querySelect)
                    or die('Error querying database.');
            
            return $result;
                    
            mysqli_close($dbc);
    	}
    	
    	//Display user stories
    	public function displayStory($result) {
            echo "<table><tr><th>Story #</th><th>Your Story</th></tr>";
            
            while($row = mysqli_fetch_array($result)) {
                echo "<tr><td>" . $row['story_id'] . "</td>" . "<td>" . 
                        $row['story'] . "</td></tr>";
    	    }
    	    echo "</table>";
    	}
    }
?>