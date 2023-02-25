<?php
include('config.php');
include('connect.php');
session_start();
if (isset($_POST['btnLogin'])) {
    $userName = $_POST['txtuserName'];
    $password = $_POST['txtpassword'];
    date_default_timezone_set('Asia/Yangon');
    $lastLogin = date("Y-m-d h:i:sa");
    $select = "SELECT * FROM Admins WHERE Username = '$userName' AND Password = '$password'";
    $query = mysqli_query($connect, $select);
    $row = mysqli_fetch_array($query);
    if (isset($row)) {
        $adminID = $row['AdminID'];
        $update = "UPDATE Admins SET LastLoginDate = '$lastLogin' WHERE AdminID = $adminID";
        $query = mysqli_query($connect, $update);
        echo "<script>alert('Login is successful')</script>";
        echo "<script>window.location = 'adminPanel.php'</script>";
        $_SESSION['AdminID'] = $row['AdminID'];
    } else {
        echo "<script>alert('Please Enter Correct UserName And Password')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>INFINITY Admin</title>
    <link rel="stylesheet" href="style.css?v=<?php echo $version ?>" />
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <script src="https://kit.fontawesome.com/b59b4a7b62.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Login</h3>
                            <form action="login.php" method="POST">
                                <div class="form-group">
                                    <label>Username *</label>
                                    <input type="text" name="txtuserName" class="form-control p_input" />
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" name="txtpassword" class="form-control p_input" />
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" />
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#" class="forgot-pass">Forgot password</a>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="btnLogin" value='Login' style="padding: 15px" class="btn btn-primary btn-block enter-btn" />
                                </div>
                                <!-- <div class="d-flex">
                                    <button class="btn btn-facebook mr-2 col">
                                        <i class="mdi mdi-facebook"></i> Facebook
                                    </button>
                                    <button class="btn btn-google col">
                                        <i class="mdi mdi-google-plus"></i> Google plus
                                    </button>
                                </div> -->
                                <p class="sign-up">
                                    Don't have an Account?<a href="#"> Sign Up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>