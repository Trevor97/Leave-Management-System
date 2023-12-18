<?php
    include_once "includes/connector.php";
    session_start();
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
<?php
    if(isset($_POST['login-btn'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $Query01 = mysqli_query($connect, "SELECT * FROM tbl_credentials WHERE email = '$email' AND password = '$password'");
            $ret = mysqli_num_rows($Query01);

            if($ret > 0){
                while($rows = mysqli_fetch_assoc($Query01)){
                    $status = $rows['status'];

                    switch ($status) {
                        case 0:
                            echo "
                            <script>
                                Swal.fire({
                                text: 'Login Failed. Please contact the System Administrator!',
                                icon: 'question',
                                timer: 2500
                                })
                            </script>
                                ";
                            break;
                        
                        case 1:
                            $_SESSION['valid'] = true;
                            $_SESSION['session_email'] = $email;
                            echo "
                            <script>
                                Swal.fire({
                                text: 'Login Successful',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2500
                                }).then(function() {
                                    window.location = 'application.php';
                                });
                            </script>
                                ";
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                }
            }else{
                echo "
                    <script>
                        Swal.fire({
                        text: 'Invalid Credentials',
                        icon: 'error',
                        timer: 2500
                        })
                    </script>
                    ";
            }
    }
?>