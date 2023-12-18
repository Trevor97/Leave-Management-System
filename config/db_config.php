<?php 
    require ('config.php');

    class DBConnection{ 
        
        public static function connect(){
            try{
                $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASENAME, USERNAME, PASSWORD);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conn;
            }catch (PDOException $e){
                echo "Connection failed: ". $e->getMessage(); // get the error message
                return null; 
            }
        }
    }

?>