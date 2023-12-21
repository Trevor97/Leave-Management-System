<?php  
    require ('users_class.php');

    class LeaveManager {
        private $db;
        public $email;
        public $leaveType;
        public $requested_from;
        public $requested_to;
        public $user_id;
        
        public function __construct(PDO $db){
            $this->db = $db;
        }

        public function requestLeave(){
            $db = $this->db;
            $requested_from = $this->requested_from;
            $requested_to = $this->requested_to;
            $leave_type = $this->leaveType; 
            $user_id = $this->user_id; 

            $userClass = new Users($db);

            $response = $userClass->getUserDetails($this->email);
            $userDetails = $response->fetch(); 
            
            $user_id = $userDetails['user_id'];

            $leave_id = $this->getLeaveType($leave_type);

            $start_date = new DateTime($requested_from);
            $end_date = new DateTime($requested_to);
            $interval = $start_date->diff($end_date);

            $days_taken = $interval->days;
            $balance_brought_forward = 0;
            $previously_taken = 1;

            $sql = "INSERT INTO `tbl_leave_records`(`user_id`, `balance_brought_forward`, `leave_id`, `requested_from`, `requested_to`, `days_taken`, `previously_taken`) VALUES (:user_id, :balance_brought_forward, :leave_id, :requested_from, :requested_to, :days_taken, :previously_taken)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':user_id',$user_id);
            $stmt->bindParam(':balance_brought_forward',$balance_brought_forward);
            $stmt->bindParam(':leave_id',$leave_id);
            $stmt->bindParam(':requested_from',$requested_from);
            $stmt->bindParam(':requested_to',$requested_to);
            $stmt->bindParam(':days_taken',$days_taken);
            $stmt->bindParam(':previously_taken',$previously_taken);
            $stmt->execute();
            
        }

        private function getLeaveType($leaveType){
            $db = $this->db;
             //retrieve leave id from leave type 
            $sql = "SELECT leave_id FROM tbl_leave_types WHERE leave_type = :leave_type";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':leave_type',$leaveType);
            $stmt->execute();


            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if($result){

                $rows = $stmt->fetch(); 
                $leave_id = $rows['leave_id'];

                return $leave_id;
            }
        }
    }

?>