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
    // Theater Image
    $imgName = $_FILES['theaterPhoto']['name'];
    $tmpName = $_FILES['theaterPhoto']['tmp_name'];
    $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
    $imgExLc = strtolower($imgEx);
    $allowedExs = array('jpg', 'jpeg', 'png');
    $theaterName = $_POST['txtTheaterName'];
    $theaterType = $_POST['theaterType'];
    $contactNumber = $_POST['txtContactNumber'];
    $location = $_POST['txtLocation'];
    $description = $_POST['txtDescription'];
    if ($theaterName === '' || $theaterType === '' || $contactNumber === '' || $location === '') {
        echo "<script>alert('Please Fill All The Required Information')</script>";
    } else {
        $selectTheaterName = "SELECT * FROM Theaters WHERE TheaterName = '$theaterName'";
        $query = mysqli_query($connect, $selectTheaterName);
        $count = mysqli_num_rows($query);
        if ($count > 0) {
            echo "<script>alert('Theater Name Already Exists')</script>";
        } else if (!in_array($imgExLc, $allowedExs)) {
            echo "<script>alert('You cannot upload files of this type')</script>";
        } else {
            $newTheaterImageName = uniqid('IMG-', true) . '.' . $imgExLc;
            $imgUploadPath = 'theaterImages/' . $newTheaterImageName;
            move_uploaded_file($tmpName, $imgUploadPath);
            $insert = "INSERT INTO Theaters (TheaterName, TheaterType, ContactNumber, Location, Description, Image)
            VALUES ('$theaterName', '$theaterType', '$contactNumber', '$location', '$description', '$newTheaterImageName')";
            $query = mysqli_query($connect, $insert);
            if (isset($query)) {
                echo "<script>alert('New Theater has been Successfully Registered')</script>";
                echo "<script>window.location = 'theaterManagement.php'</script>";
            } else {
                echo "<script>alert('Theater Registration Failed!')</script>";
                echo "<script>window.location = 'theaterEntry.php'</script>";
            }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=<?php echo $version ?>" />
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
    <div class="main-content">
        <section id="parallex" class="register-parallax">
            <div class="container-fluid h-100">
                <div class="row align-items-center justify-content-center h-100 parallaxt-details">

                    <div class="col-lg-8">
                        <div class="parallax-form">
                            <?php
                            if (!isset($_GET['clickedMovieID'])) {
                            ?>
                                <form action="theaterEntry.php" class="movieEntryForm" method="POST" enctype="multipart/form-data">
                                    <div class="movieEntryContainer">
                                        <div class="theaterPosterContainer">
                                            <div class="wrapper">
                                                <div class="image">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="" class="theaterImg">
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
                                                <button type="submit" class="btn btn-hover" id="submitTheater" name="btnSubmitTheater">Add
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