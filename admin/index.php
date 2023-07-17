<?php
    include("../includes/connector.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once "../includes/head_include.php"; ?>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <title>Super User | Rhino Leave Management System</title>
</head>
<body>
    <div class="container admin-container">
        <div class="row">
            <nav class="navbar navbar-expand-sm bg-light navbar-light">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    </ul>
                </div>
            </nav>
        </div>
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
                                $Query01 = mysqli_query($connect, "SELECT tbl_leave_records.user_id, `firstname`, `lastname`, `designation`, `branch`, `leave_type`, `requested_from`, `requested_to`, `days_taken` FROM `tbl_user_details` 
                                INNER JOIN `tbl_leave_records` ON tbl_user_details.user_id = tbl_leave_records.user_id
                                INNER JOIN `tbl_leave_types` ON tbl_leave_types.leave_id = tbl_leave_records.leave_id");
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
                                                                <span class="card-h3">'.$leave_type.'</span><br>
                                                                <span class="card-h2"><strong>From: </strong>'.$requested_from.'</span><br>
                                                                <span class="card-h2-custom"><strong>To: </strong>'.$requested_to.'</span>
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
                                                        <div class="row">
                                                            <div class="btn-group" role="group">
                                                                <a href="" class="btn btn-warning">Approve</a>
                                                                <a href="" class="btn btn-secondary">Decline</a>
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
            <div class="col-md-7 offset-md-1">
                <div class="card admin-right-card">
                    <div class="card-body">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                        
                        <?php
                            $Query01 = mysqli_query($connect, "SELECT firstname FROM tbl_user_details INNER JOIN tbl_leave_records WHERE tbl_leave_records.user_id = tbl_user_details.user_id");
                                while($result = mysqli_fetch_assoc($Query01)){
                                    $hey[] = $result;
                                }
                        ?>
                        <script>
                            const ctx = document.getElementById('myChart');

                            new Chart(ctx, {
                                type: 'line',
                                data: {
                                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"], /** echo employee names here */
                                datasets: [{
                                    label: 'Balance (Days)',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 2
                                }]
                                },
                                options: {
                                scales: {
                                    y: {
                                    beginAtZero: false
                                    }
                                }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>