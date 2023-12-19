<?php
    require ('classes/session_class.php');

    Session::init(); 
    if(Session::get('session_email')){ return header("Location: application.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("includes/head_include.php"); ?>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="style/style.css">
    <title>Login | Rhino Leave Management System</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card login-card">
                    <div class="card-body">
                        <h4 class="header-text text-center">Login</h4>
                        <p>Please login to continue</p>
                        <form action="index.php" method="post" class="form-group" id="login-form">
                            <input  name="email" id="email" class="form-control login-input" required>
                            <input type="password" name="password" id="password" class="form-control login-input" required>
                            <div class="d-grid gap-2">
                                <button class="btn btn-success login-input" name="login-btn" id="login-btn" type="submit">Log In</button>
                            </div>
                        </form>
                        <!-- <p class="sub-text">Don't have an account? <a href="">Request Now</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>