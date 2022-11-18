<?php
    $user_id = 1;
    include('includes/connector.php');
    include('includes/functions.php');
    
    
    $Query01 = mysqli_query($connect, "SELECT * FROM tbl_user_details WHERE user_id = $user_id");
    while($rows = mysqli_fetch_assoc($Query01)){
        $firstname = $rows['firstname'];
        $lastname = $rows['lastname'];
        $designation = $rows['designation'];
        $email = $rows['email'];
        $phone_number = $rows['phone_number'];
        $p_o_box = $rows['p_o_box'];
        $days_entitled = $rows['days_entitled'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>Apply for Leave | Rhino Leave Management System</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card leave-card">
                    <div class="card-body">
                        <!-- <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Overview</h4>
                            <span>You do not have any pending leave requests.</span>
                            <hr>
                            <span class="mb-0">Having trouble with the system? Contact the <a href=""> System developer</a></span>
                        </div> -->
                        <h4 class="header-text">Please complete the form.</h4>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" name="designation" id="designation" value="<?php echo $designation?>" placeholder="Designation" class="form-control app-input">
                                    <label for="designation">Designation</label>
                                </div>
                            </div>
                        </div>
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" name="days_entitled" value="<?php echo $days_entitled?>" id="days_entitled" placeholder="Days Entitled" class="form-control app-input" autocomplete="off" disabled>
                                    <label for="days_entitled">Total Days Entitled</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="number" name="balance_brought_forward" id="balance_brought_forward" placeholder="Balance Brought Forward" class="form-control app-input" autocomplete="off">
                                    <label for="balance_brought_forward">Balance brought forward</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="number" name="total_days_todate" id="total_days_todate" placeholder="Total leave days to date" class="form-control app-input" autocomplete="off" >
                                    <label for="total_days_todate">Total leave days to date</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="date" name="leave_requested_from" id="leave_requested_from" placeholder="From" class="form-control app-input" autocomplete="off">
                                    <label for="leave_requested_from">Leave Days Requested From</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="date" name="leave_requested_to" id="leave_requested_to" placeholder="To" class="form-control app-input" autocomplete="off">
                                    <label for="leave_requested_to">Leave Days Requested To</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="text" name="days_taken" id="days_taken" placeholder="Days Taken" class="form-control app-input" value="5" disabled>
                                    <label for="days_taken">Days Taken</label>
                                </div>
                            </div>
                        </div>
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
                        </div>
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
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success app-btn" type="submit">Request Leave</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h6 class="text-center footer-text">Note: All Annual Leave Requests to be filled in 30 days prior to the start date of the leave requested.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>