<?php
    header('Content-type: application/json');

    require ('../config/db_config.php');
    require ('../classes/session_class.php');
    require ('../classes/users_class.php');

    $json_str = file_get_contents('php://input');
    $data =  json_decode($json_str,true);
    $user = new Users(DBConnection::connect());

    if($data){
        $email = $data['email'];
        $password = $data['password'];
        if($email && $password){
            $user->email = $email;
            // $hashedPassword = md5($password);
            $user->password = $password;

            $response = $user->login();

            if($response->rowCount() == 1){
                $row = $response->fetch();
                $status = $row['status'];

                switch ($status) {
                    case 1: 
                        Session::init();
                        Session::set('valid',true);
                        Session::set('credential_id', $row['credential_id']);
                        Session::set('session_email', $row['email']); 

                        $response = ["message"=>"Login Successful"];

                        response(200,$response);
                        break; 
                    case 0:  
                        $response = ["message"=>"Login Failed. Please contact the System Administrator!"];

                        response(500,$response);
                        break;                
                    default:
                        $response = ["message"=>"Something went wrong"];

                        response(500,$response);
                        break;
                }
            }else{
                $response = ["message"=>"Wrong email and password combination"];

                response(400,$response);
            }
            
        }else{
            $response = ["message"=>"Wrong email and password combination"];

            response(400,$response);
        }
    }

    function response($status,$response){
        http_response_code($status);
        echo json_encode($response);
    }
     