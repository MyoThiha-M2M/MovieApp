<?php
include('config.php');
include('connect.php');
if (isset($_POST['btnRegister'])) {
    $imgName = $_FILES['fileprofileImg']['name'];
    $tmpName = $_FILES['fileprofileImg']['tmp_name'];
    $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
    $imgExLc = strtolower($imgEx);
    $allowedExs = array('jpg', 'jpeg', 'png');
    $fullName = $_POST['txtfullName'];
    $userName = $_POST['txtuserName'];
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
    $dateRegistered = date('Y-m-d');
    $lastLogin = date("Y-m-d h:i:sa");
    $selectUserName = "SELECT AdminID FROM Admins WHERE Username = '$userName'";
    $query = mysqli_query($connect, $selectUserName);
    $row = mysqli_fetch_array($query);
    if ($fullName === '' || $userName === '' || $email === '' || $password === '') {
        echo "<script>alert('Please Fill All The Required Information')</script>";
    } else {
        $selectUserName = "SELECT * FROM Admins WHERE Username = '$userName'";
        $query = mysqli_query($connect, $selectUserName);
        $count = mysqli_num_rows($query);
        if ($count > 0) {
            echo "<script>alert('UserName Already Exists')</script>";
        } else if (!in_array($imgExLc, $allowedExs)) {
            echo "<script>alert('You cannot upload files of this type')</script>";
        } else {
            $newImgName = uniqid('IMG-', true) . '.' . $imgExLc;
            $imgUploadPath = 'adminProfileImg/' . $newImgName;
            move_uploaded_file($tmpName, $imgUploadPath);
            $insert = "INSERT INTO Admins (AdminName, Username, Email, Password, DateRegistered, LastLoginDate, ProfileImage) VALUES ('$fullName', '$userName', '$email', '$password', '$dateRegistered', '$lastLogin', '$newImgName')
                ";
            $query = mysqli_query($connect, $insert);
            if (isset($query)) {
                echo "<script>alert('Successfully Registered!')</script>";
            } else {
                echo "<script>alert('Error In Registration')</script>";
            }
        }
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
                            <h3 class="card-title text-left mb-3">Register</h3>
                            <form action="register.php" method="POST" enctype="multipart/form-data">
                                <div class="upload">
                                    <img src="Additional/noprofil.jpg" width=100 height=100 alt="" id="noProfile">
                                    <img src="" width=100 height=100 alt="" id="customerProfile">
                                    <div class="round" style="background-color: #0078C1;">
                                        <input type="file" id="uploadProfile" name="fileprofileImg" accept="image/*">
                                        <i class="fa fa-camera" style="color: #fff;"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="txtfullName" class="form-control p_input"
                                        id="fullname-input" onkeyup="validateName()" required />
                                    <span id="name-error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="txtuserName" class="form-control p_input"
                                        id="username-input" onkeyup="validateUserName()" required />
                                    <span id="userName-error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="txtemail" class="form-control p_input" id="email-input"
                                        onkeyup="validateEmail()" required />
                                    <span id="email-error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="txtpassword" class="form-control p_input"
                                        id="password-input" onkeyup="validatePassword()" required />
                                    <span id="password-error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="txtConfirmPassword" class="form-control p_input"
                                        id="conPassword-input" onkeyup="validateConPassword()" required />
                                    <span id="confirmPassword-error" style="color:red"></span>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" />
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="btnRegister" value='Register' style="padding: 15px"
                                        class="btn btn-primary btn-block enter-btn" />
                                </div>
                                <!-- <div class="d-flex">
                    <button class="btn btn-facebook col mr-2">
                      <i class="mdi mdi-facebook"></i> Facebook
                    </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus
                    </button>
                  </div> -->
                                <p class="sign-up text-center">
                                    Already have an Account?<a href="#"> Log In</a>
                                </p>
                                <!-- <p class="terms">
                    By creating an account you are accepting our<a href="#">
                      Terms & Conditions</a
                    >
                  </p> -->
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
    <script src="main.js?v=<?php echo $version ?>"></script>
    <script src="imageUpload.js?v=<?php echo $version ?>"></script>
    <!-- endinject -->
</body>

</html>