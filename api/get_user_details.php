<?php
    header('Content-type: application/json');

    require ('../config/db_config.php');
    require ('../classes/session_class.php');
    require ('../classes/users_class.php');

    $json_str = file_get_contents('php://input');
    $data =  json_decode($json_str,true);
    $user = new Users(DBConnection::connect());
    Session::init();

    $isLoggedIn = Session::get('valid');

    if($isLoggedIn){
        $email = Session::get('session_email');
        $userDetails = $user->getUserDetails($email)->fetch();
        
        if($userDetails){
            $details = [
                "user_id" => $userDetails["user_id"],
                "email" => $userDetails["email"],
                "firstname" => $userDetails["firstname"],
                "lastname" => $userDetails["lastname"],
                "designation" => $userDetails["designation"],
                "phone_number" => $userDetails["phone_number"],
                "p_o_box" => $userDetails["p_o_box"],
                "days_entitled"=>$userDetails["days_entitled"],
                "branch" => $userDetails["branch"]
            ]; 

            $response = ["user"=>$userDetails];

            response(200,$response);
        }else{
            $response = ["message"=>"No such user exists"];

            response(500,$response);
        }
    }else{
        $response = ["message"=>"Not Authorized"];

        response(401,$response);
    }

    function response($status,$response){
        http_response_code($status);
        echo json_encode($response);
    }

?>