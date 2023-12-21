<?php 
    header('Content-type: application/json');
    require ('../config/db_config.php');
    require ('../classes/leave_class.php');
    require ('../classes/session_class.php');

    $json_str = file_get_contents('php://input');
    $data =  json_decode($json_str,true);
    $leaveClass = new LeaveManager(DBConnection::connect());

    if($data){
        $leave_type = $data['leave_type'];
        $leave_requested_from = $data['leave_requested_from'];
        $leave_requested_to = $data['leave_requested_to']; 

        if($leave_type && $leave_requested_from && $leave_requested_to){
            Session::init();
            
            $leaveClass->email =  Session::get('session_email');
            $leaveClass->leaveType = $leave_type;
            $leaveClass->requested_from = $leave_requested_from;
            $leaveClass->requested_to = $leave_requested_to;

            try { 
                
                $leaveClass->requestLeave();

                $response = ["message"=>"Your leave request has been sent. You will receive communication in due course"];

                response(200,$response);

            } catch (Exception $e) {

                $response = ["message"=>$e->getMessage()];

                response(500,$response);
            }
        }else{
            $response = ["message"=>"All Fields are required"];

            response(400,$response);
        }
    }else{
        $response = ["message"=>"Cannot pass empty objects"];

        response(400,$response);
    }

    function response($status,$response){
        http_response_code($status);
        echo json_encode($response);
    }
?>