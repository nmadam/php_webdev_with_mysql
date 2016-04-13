<?php
    require_once('Product.php');
    
    class Electronics extends Product {
        
        protected $recyclable;
    
    
        public function getRecyclable() {
            return $this->recyclable;
        }
        
        public function setRecyclable($recyclable) {
            $this->recyclable = $recyclable;
        }
        
        //Insert values into database
        public function insertElectronic() {
            require_once('connectvars.php');
            
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to MySQL server.');
            
            //Insert form values and created story into database    
            $queryInsert = "INSERT INTO product_info (recyclable)" . 
                    "VALUES ('$this->recyclable')";
            //echo ($queryInsert);             
            mysqli_query ($dbc, $queryInsert)
                    or die('Error querying database.');
                        
            mysqli_close($dbc);
        }
        
    }
?>