<?php
    $user_id = 1;
    include('includes/connector.php');
    include('includes/functions.php');
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
    <title>Register Employee | Rhino Leave Management System</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card leave-card">
                    <div class="card-body">
                        <h4 class="header-text">Please complete the form.</h4>
                        <form action="register_employee.php" method="POST">
                             <!-- Firstname, Lastname -->
                             <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="firstname" id="firstname" placeholder="Firstname" class="form-control app-input">
                                            <label for="firstname">Enter Firstname</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="lastname" id="lastname" placeholder="Lastname" class="form-control app-input">
                                            <label for="lastname">Enter Lastname</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select name="designation" id="designation" class="form-control app-input">
                                                <option value="" disabled selected>-- select Designation --</option>
                                                <option value="CEO" disabled>CEO</option>
                                                <option value="Branch Manager">Branch Manager</option>
                                                <option value="Finance Manager">Finance Manager</option>
                                                <option value="Business Development Officer">Business Development Officer</option>
                                                <option value="ICT Administrator">ICT Administrator</option>
                                                <option value="Accounts & Claims Manager">Accounts & Claims Manager</option>
                                                <option value="Senior Broking Officer">Senior Broking Officer</option>
                                                <option value="Claims Officer">Claims Officer</option>
                                                <option value="Underwriting Officer">Underwriting Officer</option>
                                                <option value="Secretary">Secretary</option>
                                                <option value="Administrative Assistant">Administrative Assistant</option>
                                                <option value=""></option>
                                            </select>
                                            <label for="designation">Select Designation</label>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>