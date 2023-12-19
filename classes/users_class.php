<?php  
    require ('../config/db_config.php');

    class Users extends DBConnection{
        private $db;
        public $email;
        public $password;


        public function __construct(){
           $this->db = parent::connect();
        }

        public function login(){
            $db = $this->db;

            $sql = "SELECT * FROM tbl_credentials WHERE email=:email AND password=:password LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':password',$this->password);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

            return $stmt;
        }

        public function getUserDetails($email){
            $sql = "SELECT user_id FROM tbl_user_details WHERE email=:email LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email',$email);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

            return $stmt;
        }
    }

?>