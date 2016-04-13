<?php
    class Product {
        
        protected $title;
        protected $description;
        protected $price;
        
        public function getTitle() {
            return $this->title;
        }
        
        public function setTitle($title) {
            $this->title = $title;
        }
        
        public function getDescription() {
            return $this->description;
        }
        
        public function setDescription($description) {
            $this->description = $description;
        }
        
        public function getPrice() {
            return $this->price;
        }
        
        public function setPrice($price) {
            $this->price = $price;
        }
        
        //Insert values into database
        public function insertProduct() {
            require_once('connectvars.php');
            
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to MySQL server.');
            
            //Insert form values and created story into database    
            $queryInsert = "INSERT INTO product_info (title, description, price)" . 
                    "VALUES ('$this->title', '$this->description', '$this->price')";
            echo($this->getTitle());
            echo ($queryInsert);             
            mysqli_query ($dbc, $queryInsert)
                    or die('Error querying database.');
                        
            mysqli_close($dbc);
        }
            
    }
?>