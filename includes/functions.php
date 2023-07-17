
<?php
include("connector.php");
    function retrieveUserData($connect, $user_id) {
        $Query01 = mysqli_query($connect, "SELECT * FROM tbl_user_details WHERE user_id = $user_id");
            while($rows = mysqli_fetch_assoc($Query01)){
                $firstname = $rows['firstname'];
                $lastname = $rows['lastname'];
                $email = $rows['email'];
                $phone_number = $rows['phone_number'];
                $p_o_box = $rows['p_o_box'];
                $departmental_head = $rows['departmental_head'];
                $branch_manager = $rows['branch_manager'];
                $chief_executive_officer = $rows['chief_executive_officer'];
                $days_entitled = $rows['days_entitled'];
            }
    }
    
    function retrieveProfileLeaveHistory($connect, $user_id){
        $Query02 = mysqli_query($connect, "SELECT * FROM tbl_leave_records WHERE user_id = '$user_id'");
            while($rows = mysqli_fetch_assoc($Query02)){
                $balance_brought_forward = $rows['balance_brought_forward'];
                $leave_id = $rows['leave_id'];
                $requested_from = $rows['requested_from'];
                $requested_to = $rows['requested_to'];
                $status = $rows['status'];

                /** convert PHP Date to text */
                $final_start_date = date("j M Y", strtotime($requested_from));
                $final_end_date = date("j M Y", strtotime($requested_to));

                /** retrieve leave ID to appropriate text value */
                $Query03 = mysqli_query($connect, "SELECT leave_type FROM tbl_leave_types WHERE leave_id = '$leave_id'");
                $rows = mysqli_fetch_assoc($Query03);
                $leave_type = $rows['leave_type'];

                /** convert status int to meaningful text */ 
                switch ($status) {
                    case 1:
                        $leave_status = "Pending";
                        break;
                    
                    case 2:
                        $leave_status = "Approved";
                        break;

                    default:
                        $leave_status = "Declined";
                        break;
                }

                echo    "<tr class='mini-text'>
                            <td>".$leave_type."</td>
                            <td>".$final_start_date." - ".$final_end_date."</td>
                            <td>".$leave_status."</td>
                        </tr>";
            }
    }

    /*function convertLeaveID($connect, $leave_id){
        $Query03 = mysqli_query($connect, "SELECT leave_type FROM tbl_leave_types WHERE leave_id = '$leave_id'");
            $rows = mysqli_fetch_assoc($Query03);
            $leave_type = $rows['leave_type'];

            echo $leave_type;
    }*/
?>