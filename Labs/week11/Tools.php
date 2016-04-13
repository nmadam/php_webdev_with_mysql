<?php
    require_once('Product.php');
    
    class Tools extends Product {
        protected $shipper;//UPS, FedEx,
        protected $weight;
        
        public function getShipper() {
            return $this->shipper;
        }
        
        public function setUPS($UPS) {
            $this->UPS = $UPS;
        }
        
        public function getWeight() {
            return $this->weight;
        }
        
        public function setWeight($weight) {
            $this->weight = $weight;
        }
        
        //Insert values into database
        public function insertTool() {
            require_once('connectvars.php');
            
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to MySQL server.');
            
            //Insert form values and created story into database    
            $queryInsert = "INSERT INTO product_info (shipper, weight)" . 
                    "VALUES ('$this->shipper', '$this->weight')";
            //echo ($queryInsert);             
            mysqli_query ($dbc, $queryInsert)
                    or die('Error querying database.');
                        
            mysqli_close($dbc);
        }
        
    }
?>