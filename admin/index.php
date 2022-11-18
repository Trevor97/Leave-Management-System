<?php
    include("../includes/connector.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Super User | Rhino Leave Management System</title>
</head>
<body>
    <div class="container admin-container">
        <div class="row">
            <div class="col-md-4">
                <div class="card admin-left-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="header-text">Leave Requests</h5>
                            </div>
                            <div class="col-12">
                                <hr class="hr">
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                $Query01 = mysqli_query($connect, "SELECT tbl_leave_records.user_id, `firstname`, `lastname`, `designation`, `branch`, `leave_type`, `requested_from`, `requested_to`, `days_taken` FROM `tbl_user_details` INNER JOIN `tbl_leave_records` ON tbl_user_details.user_id = tbl_leave_records.user_id");
                                    if(!$Query01){
                                        echo "".mysqli_error($connect);
                                    }    
                                while($rows = mysqli_fetch_assoc($Query01)){
                                        $user_id = $rows['user_id'];
                                        $firstname = $rows['firstname'];
                                        $lastname = $rows['lastname'];
                                        $designation = $rows['designation'];
                                        $branch = $rows['branch'];
                                        $leave_type = $rows['leave_type'];
                                        $requested_from = $rows['requested_from'];
                                        $requested_to = $rows['requested_to'];
                                        $days_taken = $rows['days_taken'];

                                        echo '
                                            <div class="container">
                                                <div class="card request-card app-input shadow bg-white">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <span class="card-h1">'.$firstname.' '.$lastname.'</span><br>
                                                                <span class="card-h2">'.$designation.' - '.$branch.'</span><br>
                                                                <span class="card-h2">'.$requested_from.' to '.$requested_to.'</span>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="row days-taken-margin">
                                                                    <div class="col-12 text-center">
                                                                        <span class="card-h0">'.$days_taken.'</span><br><span class="grey-text">Days</span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="row">
                                                                    <div class="col-12 text-center">
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-success"><i class="bi bi-check-circle-fill"></i></button>
                                                                            <button type="button" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                                    }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>