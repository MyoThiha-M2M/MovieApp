<?php
include('config.php');
include('connect.php');
if (isset($_POST['btnSubmit'])) {
    $imgName = $_FILES['fileprofileImg']['name'];
    $tmpName = $_FILES['fileprofileImg']['tmp_name'];
    $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
    $imgExLc = strtolower($imgEx);
    $allowedExs = array('jpg', 'jpeg', 'png');
    if (in_array($imgExLc, $allowedExs)) {
        $newImgName = uniqid('IMG-', true) . '.' . $imgExLc;
        $imgUploadPath = 'customerProfileImg/' . $newImgName;
        move_uploaded_file($tmpName, $imgUploadPath);
    } else {
        echo "<script>alert('You cannot upload files of this type')</script>
        window.location.href = 'customerRegister.php'";
    }
    $fullName = $_POST['txtfullName'];
    $userName = $_POST['txtuserName'];
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
    $dateRegistered = date('Y-m-d');
    $lastLoginDate = date('Y-m-d');
    $selectUserName = "SELECT CustomerID FROM Customers WHERE Username = '$userName'";
    $query = mysqli_query($connect, $selectUserName);
    $row = mysqli_fetch_array($query);
    if (isset($row)) {
        echo "<script>alert('UserName Already Exists');
        window.location.href = 'customerRegister.php'</script>";
    } elseif ($userName === '' || $fullName === '' || $userName === '' || $email === '' || $password === '') {
        echo "<script>alert('Please Enter All The Required Information');
        window.location.href = 'customerRegister.php'</script>";
    } else {
        $insert = "INSERT INTO Customers (CustomerName, Username, Email, Password, DateRegistered, LastLoginDate, ProfileImage) VALUES ('$fullName', '$userName', '$email', '$password', '$dateRegistered', '$lastLoginDate', '$newImgName')
        ";
        $query = mysqli_query($connect, $insert);
        if (isset($query)) {
            echo "<script>alert('Registered Successfully');
                window.location.href = 'customerLogin.php';
            </script>";
        } else {
            echo "<script>alert('Error In Registration')</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" s />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video Streaming</title>
    <link rel="stylesheet" href="css/bootstrap.min.css?v=<?php echo $version ?>" />
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=<?php echo $version ?>" />
    <!-- i will provide this in description  -->
    <link rel="stylesheet" href="css/slick.css?v=<?php echo $version ?>" />
    <link rel="stylesheet" href="css/slick-theme.css?v=<?php echo $version ?>" />
    <link rel="stylesheet" href="css/owl.carousel.min.css?v=<?php echo $version ?>" />
    <link rel="stylesheet" href="css/animate.min.css?v=<?php echo $version ?>" />
    <link rel="stylesheet" href="css/magnific-popup.css?v=<?php echo $version ?>" />
    <link rel="stylesheet" href="css/select2.min.css?v=<?php echo $version ?>" />
    <link rel="stylesheet" href="css/select2-bootstrap4.min.css?v=<?php echo $version ?>" />

    <link rel="stylesheet" href="css/slick-animation.css?v=<?php echo $version ?>" />
    <link rel="stylesheet" href="style.css?v=<?php echo $version ?>" />
    <script src="https://kit.fontawesome.com/b59b4a7b62.js" crossorigin="anonymous"></script>
</head>

<body>
    <header id="main-header">
        <div class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <div class="navbar-toggler-icon" data-toggle="collapse">
                                    <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                                    <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                                    <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                                </div>
                            </a>
                            <a href="index.html" class="navbar-brand">
                                <img src="images/logo.png" class="img-fluid logo" alt="" />
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="menu-main-menu-container">
                                    <ul id="top-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item"><a href="index.php">Home</a></li>
                                        <li class="menu-item"><a href="movie.html">Movies</a></li>
                                        <li class="menu-item"><a href="theater.html">Theaters</a></li>
                                        <li class="menu-item"><a href="seat.php">Seats</a></li>
                                        <li class="menu-item">
                                            <a href="#">Contact Us</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item"><a href="#">About Us</a></li>
                                                <li class="menu-item"><a href="#">Contact</a></li>
                                                <li class="menu-item"><a href="#">FAQ</a></li>
                                                <li class="menu-item">
                                                    <a href="#">Privacy-Policy</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Pricing</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="#">Gold Membership</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Silver Membership</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Bronze Membership</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mobile-more-menu">
                                <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                                    data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </a>
                                <div class="more-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="navbar-right position-relative">
                                        <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                            <li>
                                                <a href="#" class="search-toggle">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                                <div class="search-box iq-search-bar">
                                                    <form action="index.php" class="searchbox">
                                                        <div class="form-group position-relative">
                                                            <input type="text" class="text search-input"
                                                                placeholder="Search Movies or Theatres" />
                                                            <i class="search-link fa fa-search"></i>
                                                        </div>
                                                    </form>
                                                </div>

                                            </li>
                                            <li class="nav-item nav-icon">
                                                <a href="#" class="search-toggle position-relative">
                                                    <i class="fa fa-bell"></i>
                                                    <span class="bg-danger dots"></span>
                                                </a>
                                                <div class="iq-sub-dropdown">
                                                    <div class="iq-card shadow-none m-0">
                                                        <div class="iq-card-body">
                                                            <a href="#" class="iq-sub-card">
                                                                <div class="media align-items-center">
                                                                    <img src="images/notify/thumb-1.jpg" alt=""
                                                                        class="img-fluid mr-3" />
                                                                    <div class="media-body">
                                                                        <h6 class="mb-0">Captain Marvel</h6>
                                                                        <small class="font-size-12">just now</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="iq-sub-card">
                                                                <div class="media align-items-center">
                                                                    <img src="images/notify/thumb-2.jpg" alt=""
                                                                        class="img-fluid mr-3" />
                                                                    <div class="media-body">
                                                                        <h6 class="mb-0">
                                                                            Dora and The Lost City of Gold
                                                                        </h6>
                                                                        <small class="font-size-12">25 mins ago</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="iq-sub-card">
                                                                <div class="media align-items-center">
                                                                    <img src="images/notify/thumb-3.jpg" alt=""
                                                                        class="img-fluid mr-3" />
                                                                    <div class="media-body">
                                                                        <h6 class="mb-0">Mulan</h6>
                                                                        <small class="font-size-12">1h 30 mins
                                                                            ago</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="iq-user-dropdown search-toggle d-flex align-items-center">
                                                    <img src="images/user/user.png"
                                                        class="img-fluid user-m rounded-circle" alt="" />
                                                </a>
                                                <div class="iq-sub-dropdown iq-user-dropdown">
                                                    <div class="iq-card shadow-none m-0">
                                                        <div class="iq-card-body p-0 pl-3 pr-3">
                                                            <a href="#" class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="fa fa-user text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Manage Profile</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="fa fa-cog text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Settings</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="fa fa-inr text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Pricing Plan</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="fa fa-sign-out text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Logout</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="navbar-right menu-right">
                                <ul class="d-flex align-items-center list-inline m-0">
                                    <li class="nav-item nav-icon">
                                        <a href="#" class="search-toggle device-search">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <div class="search-box iq-search-bar d-search">
                                            <form action="#" class="searchbox">
                                                <div class="form-group position-relative">
                                                    <input type="text" class="text search-input font-size-12"
                                                        placeholder="type here to searc" />
                                                    <i class="search-link fa fa-search"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                    <li class="nav-item nav-icon">
                                        <a href="#" class="search-toggle" data-toggle="search-toggle">
                                            <i class="fa fa-bell"></i>
                                            <span class="bg-danger dots"></span>
                                        </a>
                                        <div class="iq-sub-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="images/notify/thumb-1.jpg" alt=""
                                                                class="img-fluid mr-3" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0">Captain Marvel</h6>
                                                                <small class="font-size-12">just now</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="images/notify/thumb-2.jpg" alt=""
                                                                class="img-fluid mr-3" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0">
                                                                    Dora and The Lost City of Gold
                                                                </h6>
                                                                <small class="font-size-12">25 mins ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="images/notify/thumb-3.jpg" alt=""
                                                                class="img-fluid mr-3" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0">Mulan</h6>
                                                                <small class="font-size-12">1h 30 mins ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item nav-icon">
                                        <a href="#"
                                            class="iq-user-dropdown search-toggle d-flex align-items-center p-0">
                                            <img src="images/user/user.png" class="img-fluid user-m rounded-circle"
                                                alt="" />
                                        </a>
                                        <div class="iq-sub-dropdown iq-user-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body p-0 pl-3 pr-3">
                                                    <a href="#" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="fa fa-user text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0">Manage Profile</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="fa fa-cog text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0">Settings</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="fa fa-inr text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0">Pricing Plan</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="fa fa-sign-out text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0">Logout</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="nav-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main-content">

        <section id="parallex" class="register-parallax">

            <div class="container-fluid h-100">
                <div class="row align-items-center justify-content-center h-100 parallaxt-details">
                    <div class="col-lg-4 r-mb-23">
                        <div class="text-left">
                            <h1 class="parallax-heading" id="text-registration">Ready To Become <br> Our Member?</h1>
                            <div class="parallax-ratting d-flex align-items-center mt-3 mb-3">
                                <h3><b>Book Tickets Anywhere, AnyTime!</b></h3>
                            </div>
                            <!-- <div class="movie-time d-flex align-items-center mb-3">
                                <div class="badge badge-secondary p-1 mr-2">9+</div>
                                <span class="text-white">2h 42min</span>
                            </div>
                            <p>
                                A paraplegic Marine dispatched to the moon Pandora on a unique
                                mission becomes torn between following his orders and
                                protecting the world he feels is his home.
                            </p> -->

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="parallax-form">
                            <!-- <a href="#"><img src="images/parallax/avatar.jpg" alt="" class="img-fluid w-100" /></a> -->
                            <form action="customerRegister.php" class="registrationForm" method="POST"
                                enctype="multipart/form-data">
                                <div class="registerContainer">
                                    <div class="upload">
                                        <img src="Additional/noprofil.jpg" width=100 height=100 alt="" id="noProfile">
                                        <img src="" width=100 height=100 alt="" id="customerProfile">
                                        <div class="round">
                                            <input type="file" id="uploadProfile" name="fileprofileImg"
                                                accept="image/*">
                                            <i class="fa fa-camera" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="inputGroup customerNameCon">
                                        <input type="text" placeholder="Full Name" name="txtfullName"
                                            id="fullname-input" onkeyup="validateName()">
                                        <span id="name-error"></span>
                                    </div>
                                    <div class="inputGroup userNameCon">
                                        <input type="text" placeholder="User Name" name="txtuserName"
                                            id="username-input" onkeyup="validateUserName()">
                                        <span id="userName-error"></span>
                                    </div>
                                    <div class="inputGroup emailCon">
                                        <input type="email" placeholder="Email" name="txtemail" id="email-input"
                                            onkeyup="validateEmail()">
                                        <span id="email-error"></span>
                                    </div>
                                    <div class="inputGroup passwordCon">
                                        <input type="password" placeholder="Password" name="txtpassword"
                                            id="password-input" onkeyup="validatePassword()">
                                        <span id="password-error"></span>
                                    </div>
                                    <div class="inputGroup confirmPasswordCon">
                                        <input type="password" placeholder="Confirm Password" id="conPassword-input"
                                            onkeyup="validateConPassword()">
                                        <span id="confirmPassword-error"></span>
                                    </div>
                                    <button type="submit" class="btn btn-hover btnCreateAccount" name="btnSubmit">
                                        <div class="parallax-buttons">
                                            Sign Up
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>







    <!-- main content ends  -->


    <footer class="iq-bg-dark">
        <div class="footer-top">
            <div class="container-fluid">
                <div class="row footer-standard">
                    <div class="col-lg-5">
                        <div class="widget text-left">
                            <div>
                                <ul class="menu p-0">
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privacy-Policy</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Watch List</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget text-left">
                            <div class="textwidget">
                                <p><small>This is Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati,
                                        quo tempore. Quasi rem rerum est in nulla atque quibusdam illo. this is footer
                                        and simple tsesxij is writen jkd. fsek hello how are you. please like and
                                        subscribe. footer ends .</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <h6 class="footer-link-title">
                            Follow Us:
                        </h6>
                        <ul class="info-share">
                            <li>
                                <a href="#">
                                    <i>
                                        <fa class="fa fa-facebook"></fa>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i>
                                        <fa class="fa fa-youtube"></fa>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i>
                                        <fa class="fa fa-instagram"></fa>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="widget text-left">
                            <div class="textwidget">
                                <h6 class="footer-link-title">
                                    NetFlix App
                                </h6>
                                <div class="d-flex align-items-center">
                                    <a href="#"><img src="images/footer/01.jpg" alt=""></a>
                                    <br>
                                    <a href="#" class="ml-3"><img src="images/footer/02.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- js files  -->
    <script src="js/jquery-3.4.1.min.js?v=<?php echo $version ?>"></script>
    <script src="js/popper.min.js?v=<?php echo $version ?>"></script>
    <script src="js/bootstrap.min.js?v=<?php echo $version ?>"></script>
    <script src="js/slick.min.js?v=<?php echo $version ?>"></script>
    <script src="js/owl.carousel.min.js?v=<?php echo $version ?>"></script>
    <script src="js/select2.min.js?v=<?php echo $version ?>"></script>
    <script src="js/jquery.magnific-popup.min.js?v=<?php echo $version ?>"></script>
    <script src="js/slick-animation.min.js?v=<?php echo $version ?>"></script>
    <script src="main.js?v=<?php echo $version ?>"></script>
    <script src="imageUpload.js?v=<?php echo $version ?>"></script>
</body>

</html>