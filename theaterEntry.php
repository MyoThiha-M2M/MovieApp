<?php
include('config.php');
include('connect.php');
session_start();

if (isset($_SESSION['AdminID'])) {
    $adminID = $_SESSION['AdminID'];
    $select = "SELECT * FROM Admins WHERE AdminID = $adminID";
    $query = mysqli_query($connect, $select);
    $row = mysqli_fetch_array($query);
    if (isset($row)) {
        $adminProfile = $row['ProfileImage'];
    };
};


if (isset($_POST['btnSubmitTheater'])) {
    $imgName = $_FILES['theaterPhoto']['name'];
    $tmpName = $_FILES['theaterPhoto']['tmp_name'];
    $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
    $imgExLc = strtolower($imgEx);
    $allowedExs = array('jpg', 'jpeg', 'png');
    if (in_array($imgExLc, $allowedExs)) {
        $newTheaterImageName = uniqid('IMG-', true) . '.' . $imgExLc;
        $imgUploadPath = 'theaterImages/' . $newTheaterImageName;
        move_uploaded_file($tmpName, $imgUploadPath);
    } else {
        echo "<script>
                alert('You cannot upload files of this type')
            </script>";
    }
    $theaterName = $_POST['txtTheaterName'];
    $theaterType = $_POST['theaterType'];
    $contactNumber = $_POST['txtContactNumber'];
    $location = $_POST['txtLocation'];
    $description = $_POST['txtDescription'];
    $insert = "INSERT INTO Theaters (TheaterName, TheaterType, ContactNumber, Location, Description, Image)
    VALUES ('$theaterName', '$theaterType', '$contactNumber', '$location', '$description', '$newTheaterImageName')";
    $query = mysqli_query($connect, $insert);
    if (isset($query)) {
        echo "<script>alert('Successfully Added Theater')</script>";
        echo "<script>window.location = 'theaterEntry.php'</script>";
    } else {
        echo "<script>alert('Error in Theater')</script>";
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
        <div class="main-header adminDashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-light p-0">
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
                                            <img src="adminProfileImg/<?php echo $adminProfile ?>"
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

                    <div class="col-lg-8">
                        <div class="parallax-form">
                            <?php
                            if (!isset($_GET['clickedMovieID'])) {
                            ?>
                            <form action="theaterEntry.php" class="movieEntryForm" method="POST"
                                enctype="multipart/form-data">
                                <div class="movieEntryContainer">
                                    <div class="theaterPosterContainer">
                                        <div class="wrapper">
                                            <div class="image">
                                                <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    alt="" class="theaterImg">
                                            </div>
                                            <div class="uploadContent">
                                                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                                <div class="text-fileUpload text">Upload Theater Photo
                                                </div>
                                            </div>
                                            <div class="cancel-btn"><i class="fas fa-times"></i></div>
                                            <div class="file-name">File name here</div>
                                        </div>
                                        <input type="file" class="default-btn" name="theaterPhoto">
                                        <i class="fa-solid fa-upload upload-icon"></i>
                                    </div>
                                    <!-- Inputs for movieEntry -->
                                    <div class="movieDetailInputContainer">
                                        <div class="inputRow">
                                            <div class="inputGroup">
                                                <label for="theaterName">Enter Theater Name </label>
                                                <input type="text" class="input" name="txtTheaterName" required>
                                            </div>
                                            <div class="inputGroup">
                                                <label for="theaterType">Select Theater Type </label>
                                                <select name="theaterType" id="">
                                                    <option value="Imax">Imax</option>
                                                    <option value="ICE">ICE</option>
                                                    <option value="Premium">Premium</option>
                                                    <option value="Luxe">Luxe</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="inputRow">
                                            <div class="inputGroup">
                                                <label for="contactNumber">Enter Contact Number </label>
                                                <input type="text" class="input" name="txtContactNumber" required>
                                            </div>
                                            <div class="inputGroup">
                                                <label for="location">Enter Location </label>
                                                <input type="text" class="input" name="txtLocation" required>
                                            </div>
                                        </div>

                                        <div class="inputRow">
                                            <div class="descriptionContainer">
                                                <label for="description">Theater Description </label>
                                                <textarea name="txtDescription" id=""></textarea>
                                            </div>
                                        </div>

                                        <div class="inputRow">
                                            <button type="submit" class="btn btn-hover" id="submitTheater"
                                                name="btnSubmitTheater">Add
                                                Theater</button>
                                        </div>
                                    </div>
                            </form>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- main content ends  -->
    <footer class=" iq-bg-dark">
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
    <script src="theaterImageUpload.js?v=<?php echo $version ?>"></script>
</body>

</html>