<?php
    require ('classes/session_class.php');
    Session::init();
    if(!Session::get('session_email')){ return header("Location: index.php");}
    include('includes/connector.php');
    include('includes/functions.php');

    $session_email = $_SESSION['session_email'];
    
    $Query01 = mysqli_query($connect, "SELECT * FROM tbl_user_details WHERE email = '$session_email'");
    while($rows = mysqli_fetch_assoc($Query01)){
        $firstname = $rows['firstname'];
        $lastname = $rows['lastname'];
        $designation = $rows['designation'];
        $email = $rows['email'];
        $phone_number = $rows['phone_number'];
        $p_o_box = $rows['p_o_box'];
        $days_entitled = $rows['days_entitled'];

        $Query04= mysqli_query($connect, "SELECT user_id FROM tbl_user_details WHERE email = '$email'");
            $rows = mysqli_fetch_assoc($Query04);
            $user_id = $rows['user_id'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("includes/head_include.php"); ?>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="style/style.css">
    <title>Apply for Leave | Rhino Leave Management System</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 d-flex justify-content-center">
                <ul class="nav custom-nav-item">
                    <li class="nav-link">
                        <a href="#" id="hide-dashboard" class="custom-nav-link">Fill a Leave Form</a>
                    </li>
                    
                    <li class="nav-link">
                        <span class="custom-nav-link">  |   </span>
                    </li>
                    
                    <li class="nav-link">
                        <a href="#" id="hide-leave-form" class="custom-nav-link">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card main-card" id="leave-form">
                    <div class="card-body">
                        <!-- <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Overview</h4>
                            <span>You do not have any pending leave requests.</span>
                            <hr>
                            <span class="mb-0">Having trouble with the system? Contact the <a href=""> System developer</a></span>
                        </div> -->
                        <span>
                            <h4 class="header-text">Please complete the form.</h4>
                                <form action="application.php" method="POST">
                                    <!-- Firstname, Lastname -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="firstname" value="<?php echo $firstname?>" id="firstname" placeholder="Firstname" class="form-control app-input">
                                                <label for="firstname">Enter Firstname</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="lastname" value="<?php echo $lastname?>" id="lastname" placeholder="Lastname" class="form-control app-input">
                                                <label for="lastname">Enter Lastname</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Designation -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" name="designation" id="designation" value="<?php echo $designation?>" placeholder="Designation" class="form-control app-input">
                                                <label for="designation">Designation</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Leave Types -->
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="radio" name="leave_type" id="annual" value="Annual Leave">
                                                <label class="form-check-label sub-text" for="annual">
                                                    Annual Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="radio" name="leave_type" id="sick" value="Sick Leave">
                                                <label class="form-check-label sub-text" for="sick">
                                                    Sick Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="radio" name="leave_type" id="study" value="Study Leave">
                                                <label class="form-check-label sub-text" for="study">
                                                    Study Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="radio" name="leave_type" id="compassionate" value="Compassionate Leave">
                                                <label class="form-check-label sub-text" for="compassionate">
                                                    Compassionate Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="radio" name="leave_type" id="maternity" value="Maternity Leave">
                                                <label class="form-check-label sub-text" for="maternity">
                                                    Maternity Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="radio" name="leave_type" id="unpaid" value="Unpaid Leave">
                                                <label class="form-check-label sub-text" for="unpaid">
                                                    Unpaid Leave
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Days Entitled, Balance Brought Forward, Total Leave Days to date -->
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-floating">
                                                <input type="number" name="days_entitled" value="<?php echo $days_entitled?>" id="days_entitled" placeholder="Days Entitled" class="form-control app-input" autocomplete="off" disabled>
                                                <label for="days_entitled">Total Days Entitled</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-floating">
                                                <input type="number" name="balance_brought_forward" id="balance_brought_forward" placeholder="Balance Brought Forward" class="form-control app-input" autocomplete="off">
                                                <label for="balance_brought_forward">Balance brought forward</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-floating">
                                                <input type="number" name="total_days_todate" id="total_days_todate" placeholder="Total leave days to date" class="form-control app-input" autocomplete="off" >
                                                <label for="total_days_todate">Total leave days to date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Requested From, To, Days taken -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-floating">
                                                <input type="date" name="leave_requested_from" id="leave_requested_from" placeholder="From" class="form-control app-input" autocomplete="off" onchange="calculateDateDifference()">
                                                <label for="leave_requested_from">Leave Days Requested From</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-floating">
                                                <input type="date" name="leave_requested_to" id="leave_requested_to" placeholder="To" class="form-control app-input" autocomplete="off" onchange="calculateDateDifference()">
                                                <label for="leave_requested_to">Leave Days Requested To</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-floating">
                                                <input type="text" name="days_taken" id="days_taken" placeholder="Days Taken" class="form-control app-input" value=" " disabled>
                                                <label for="days_taken">Days Taken</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Leave Types 
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="checkbox" id="check_annual" value="Annual Leave">
                                                <label class="form-check-label sub-text" for="annual">
                                                    Annual Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="checkbox" id="check_sick" value="Sick Leave">
                                                <label class="form-check-label sub-text" for="sick">
                                                    Sick Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="checkbox" id="check_study" value="Study Leave">
                                                <label class="form-check-label sub-text" for="study">
                                                    Study Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="checkbox" id="check_compassionate" value="Compassionate Leave">
                                                <label class="form-check-label sub-text" for="compassionate">
                                                    Compassionate Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="checkbox" id="check_maternity" value="Maternity Leave">
                                                <label class="form-check-label sub-text" for="maternity">
                                                    Maternity Leave
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input app-input" type="checkbox" id="check_unpaid" value="Unpaid Leave">
                                                <label class="form-check-label sub-text" for="unpaid">
                                                    Unpaid Leave
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- Contact Address, Contact Number -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <textarea name="contact_address" id="contact_address" placeholder="Contact Address" class="form-control app-input" autocomplete="off"><?php echo $p_o_box?></textarea>
                                                <label for="contact_address">Enter Contact Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" value="<?php echo $phone_number?>" class="form-control app-input" autocomplete="off"/>
                                                <label for="contact_number">Enter Contact Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Request Leave Button -->
                                    <div class="row">
                                        <div class="col-md-4 offset-md-4">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-success app-btn" name="submit-leave" type="submit">Request Leave</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <div class="row">
                                <h6 class="text-center footer-text">Note: All Annual Leave Requests to be filled in 30 days prior to the start date of the leave requested.</h6>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="card main-card" id="dashboard">
                    <div class="card-body">
                        <span>
                            <h4 class="header-text">Dashboard.</h4>
                               
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <!-- Profile Item -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="mini-text-bold">Name</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <span class="mini-text"><?php echo $firstname." ".$lastname; ?></span>
                                                                </div>
                                                            </div>

                                                            <!-- Profile Item -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="mini-text-bold">Designation</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <span class="mini-text"><?php echo $designation?></span>
                                                                </div>
                                                            </div>

                                                            <!-- Profile Item -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="mini-text-bold">Email</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <span class="mini-text"><?php echo $email?></span>
                                                                </div>
                                                            </div>

                                                            <!-- Profile Item -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="mini-text-bold">Phone Number</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <span class="mini-text"><?php echo $phone_number?></span>
                                                                </div>
                                                            </div>

                                                            <!-- Profile Item -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="mini-text-bold">Address</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <span class="mini-text"><?php echo $p_o_box?></span>
                                                                </div>
                                                            </div>

                                                            <!-- Profile Item -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="mini-text-bold">Days Entitled</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <span class="mini-text"><?php echo $days_entitled?></span>
                                                                </div>
                                                            </div>

                                                            <!-- Profile Item -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="mini-text-bold">Balance Brought Forward</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <span class="mini-text"><?php echo "N/A"; ?></span>
                                                                </div>
                                                            </div>

                                                            <!-- Profile Item -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="mini-text-bold">Total Leave Days To-Date</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <span class="mini-text"><?php echo "N/A"; ?></span>
                                                                </div>
                                                            </div>

                                                            <!-- Request Edit -->
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="d-grid gap-2">
                                                                        <button class="btn btn-outline-success app-btn" name="request-change" type="submit">Request Changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="card leave-history-card">
                                                <div class="card-body">
                                                    <h6 class="header-text">Leave History.</h6>
                                                    <table class="table table-hover table-responsive">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col" class="th">Leave Type</th>
                                                            <th scope="col" class="th">Duration</th>
                                                            <th scope="col" class="th">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php retrieveProfileLeaveHistory($connect, $user_id)?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="card leave-summary-card">
                                                <div class="card-body">
                                                    <h6 class="header-text">Leave Summary.</h6>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h2>1</h2>
                                                            <span class="mini-text">Days Taken</span>
                                                        </div>
                                                        <div class="col">
                                                            <h2>1</h2>
                                                            <span class="mini-text">Days Remaining</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="text-center footer-text">Note: All Annual Leave Requests to be filled in 30 days prior to the start date of the leave requested.</h6>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('hide-leave-form').addEventListener('click', function() {
            document.getElementById('leave-form').style.display = 'none';
            document.getElementById('dashboard').style.display = 'block';
        });

        document.getElementById('hide-dashboard').addEventListener('click', function() {
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('leave-form').style.display = 'block';
        });

        // Function to calculate the difference between two dates
        function calculateDateDifference() {
            var leave_from = new Date(document.getElementById('leave_requested_from').value);
            var leave_to = new Date(document.getElementById('leave_requested_to').value);
            var difference = leave_to - leave_from;
            var differenceInDays = Math.floor(difference / (1000 * 60 * 60 * 24));
            document.getElementById('days_taken').value = differenceInDays;
        }
    </script>
</body>
</html>

<?php
    if(isset($_POST['submit-leave'])){
        //$email = $_POST['']; replaced with session email
        //retrieve user id using email
        $Query01 = mysqli_query($connect, "SELECT user_id FROM tbl_user_details WHERE email = '$session_email'");
            $rows = mysqli_fetch_assoc($Query01);
        
        $user_id = $rows['user_id'];
        $leave_type = $_POST['leave_type'];

        //retrieve leave id from leave type
        $Query02 = mysqli_query($connect, "SELECT leave_id FROM  tbl_leave_types WHERE leave_type = '$leave_type'");
            $rows = mysqli_fetch_assoc($Query02);

        $leave_id = $rows['leave_id'];
        $requested_from = $_POST['leave_requested_from'];
        $requested_to = $_POST['leave_requested_to'];

        $start_date = new DateTime($requested_from);
        $end_date = new DateTime($requested_to);
        $interval = $start_date->diff($end_date);

        $days_taken = $interval->days;
        $balance_brought_forward = 0;
        $previously_taken = 1;

        $Query03 = mysqli_query($connect, "INSERT INTO `tbl_leave_records`(`user_id`, `balance_brought_forward`, `leave_id`, `requested_from`, `requested_to`, `days_taken`, `previously_taken`) VALUES ($user_id,$balance_brought_forward, $leave_id, '$requested_from', '$requested_to', $days_taken, $previously_taken)");

        if(!$Query03){
            echo "failed: ".mysqli_error($connect);
            echo "<br><br>Values:<br> User ID ".$user_id.""."<br>Leave ID ".$leave_id."<br>Requested From ". $requested_from."<br> Requested To ". $requested_to."<br>Days Taken ". $days_taken."<br>Previously Taken ".$previously_taken;
        
        }else{
            echo "
                <script>
                    Swal.fire({
                    title: 'Request Sent!',
                    text: 'Your leave request has been sent. You will receive communication in due course',
                    icon: 'success',
                    timer: 6000
                    })
                </script>
                    ";
        }
    }
?>