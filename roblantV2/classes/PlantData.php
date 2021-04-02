<?php
   include_once(__DIR__ . "/Db.php");


    class PlantData{
        // declares the variables for the parameters
        private $Temperatuur;
        private $light;
        private $moisture;

        /* ====== Getters and setters for all the variables ====== */

        /**
         * Get the value of celcius
         */ 
        public function getTemperatuur()
        {
                return $this->Temperatuur;
        }

        /**
         * Set the value of celcius
         *
         * @return  self
         */ 
        public function setTemperatuur($Temperatuur)
        {
                $this->Temperatuur = $Temperatuur;

                return $this;
        }

        
        /**
         * Get the value of light
         */ 
        public function getLight()
        {
                return $this->light;
        }

        /**
         * Set the value of light
         *
         * @return  self
         */ 
        public function setLight($light)
        {
                $this->light = $light;

                return $this;
        }

        /**
         * Get the value of moisture
         */ 
        public function getMoisture()
        {
                return $this->moisture;
        }

        /**
         * Set the value of moisture
         *
         * @return  self
         */ 
        public function setMoisture($moisture)
        {
                $this->moisture = $moisture;

                return $this;
        }

        public function addData(){ // Inserts the data into the database
            // Create a connection with the database using class Db
            $conn = Db::getConnection();

            // The SQL statement for insertion
            $statement = $conn->prepare("insert into tbldata (Temperatuur, watered, light, moisture) values (:Temperatuur, :watered, :light, :moisture)");

            // Defines the variables using getters
            $Temperatuur = $this->getTemperatuur();
            $light = $this->getLight();
            $moisture = $this-> getMoisture();

            // Bind values to prevent SQL injection, this isn't really necessary, it's just good practice
            $statement->bindValue(":Temperatuur", $Temperatuur);
            $statement->bindValue(":watered", $watered);
            $statement->bindValue(":light", $light);
            $statement->bindValue(":moisture", $moisture);

            // Execute the preapred statement
            $result = $statement->execute();

            // Return the result
            return $result;
        }

        public static function retrieveData(){ // Retrieves the data from the database
            // Create a connection with the database using class Db
            $conn = Db::getConnection();

            // Prepare the SQL statement for retrieval
            $statement = $conn->prepare("SELECT * FROM `tbldata` ORDER by id DESC");
            
            // Execute
            $statement->execute();

            // Returns an array with the column names as the keys
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Return the result
            return $result;
        }
    }