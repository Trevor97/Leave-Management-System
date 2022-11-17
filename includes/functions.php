
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
?>