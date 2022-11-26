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


if (isset($_POST['btnSubmitMovie'])) {
    $imgName1 = $_FILES['moviePoster1']['name'];
    $tmpName1 = $_FILES['moviePoster1']['tmp_name'];
    $imgEx1 = pathinfo($imgName1, PATHINFO_EXTENSION);
    $imgExLc1 = strtolower($imgEx1);
    $allowedExs1 = array('jpg', 'jpeg', 'png');
    if (in_array($imgExLc1, $allowedExs1)) {
        $newMoviePosterName1 = uniqid('IMG-', true) . '.' . $imgExLc1;
        $imgUploadPath = 'moviePosters/' . $newMoviePosterName1;
        move_uploaded_file($tmpName1, $imgUploadPath);
    } else {
        echo "<script>
alert('You cannot upload files of this type')
</script>";
    }
    $imgName2 = $_FILES['moviePoster2']['name'];
    $tmpName2 = $_FILES['moviePoster2']['tmp_name'];
    $imgEx2 = pathinfo($imgName2, PATHINFO_EXTENSION);
    $imgExLc2 = strtolower($imgEx2);
    $allowedExs2 = array('jpg', 'jpeg', 'png');
    if (in_array($imgExLc2, $allowedExs2)) {
        $newMoviePosterName2 = uniqid('IMG-', true) . '.' . $imgExLc2;
        $imgUploadPath = 'moviePosters/' . $newMoviePosterName2;
        move_uploaded_file($tmpName2, $imgUploadPath);
    } else {
        echo "<script>
alert('You cannot upload files of this type')
</script>";
    }
    $imgName3 = $_FILES['moviePoster3']['name'];
    $tmpName3 = $_FILES['moviePoster3']['tmp_name'];
    $imgEx3 = pathinfo($imgName3, PATHINFO_EXTENSION);
    $imgExLc3 = strtolower($imgEx3);
    $allowedExs3 = array('jpg', 'jpeg', 'png');
    if (in_array($imgExLc3, $allowedExs3)) {
        $newMoviePosterName3 = uniqid('IMG-', true) . '.' . $imgExLc3;
        $imgUploadPath = 'moviePosters/' . $newMoviePosterName3;
        move_uploaded_file($tmpName3, $imgUploadPath);
    } else {
        echo "<script>
alert('You cannot upload files of this type')
</script>";
    }
    $movieName = $_POST['txtMovieName'];
    $releaseDate = $_POST['txtReleaseDate'];
    $genreID = $_POST['movieGenre'];
    $formatID = $_POST['movieFormat'];
    $duration = $_POST['txtDuration'];
    $ratingPoint = $_POST['numRatingPoint'];
    $movieStarring = $_POST['txtStarring'];
    $movieOverView = $_POST['txtMovieOverView'];
    // Video Upload
    $videoName = $_FILES['movieTrailer']['name'];
    $tmpName = $_FILES['movieTrailer']['tmp_name'];
    $videoEx = pathinfo($videoName, PATHINFO_EXTENSION);
    $videoExLc = strtolower($videoEx);
    $allowedExs = array('mp4', 'webm', 'avi', 'flv');
    if (in_array($videoExLc, $allowedExs)) {
        $newMovieTrailerName = uniqid('video-', true) . '.' . $videoExLc;
        $videoUploadPath = 'movieTrailers/' . $newMovieTrailerName;
        move_uploaded_file($tmpName, $videoUploadPath);
    } else {
        echo "<script>
alert('You cannot upload files of this type')
</script>";
    }
    $insert = "INSERT INTO Movies(MovieName, ReleaseDate, GenreID, FormatID, Duration, RatingPoint, Starring, OverView,
Poster1, Poster2, Poster3, Trailer)
VALUES ('$movieName', '$releaseDate', $genreID, $formatID, '$duration', $ratingPoint, '$movieStarring',
'$movieOverView', '$newMoviePosterName1', '$newMoviePosterName2', '$newMoviePosterName3', '$newMovieTrailerName')";
    $query = mysqli_query($connect, $insert);
    if (isset($query)) {
        echo "<script>
alert('Your Entry is successful')
</script>";
        echo "<script>
window.location = 'movieEntry.php'
</script>";
    } else {
        echo "<script>
alert('Error')
</script>";
        echo "<script>
window.location = 'movieEntry.php'
</script>";
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
                            <!-- <a href="#"><img src="images/parallax/avatar.jpg" alt="" class="img-fluid w-100" /></a> -->
                            <?php
                            if (isset($_GET['clickedMovieID'])) {
                                $clickedMovieID = $_GET['clickedMovieID'];
                                $select = "SELECT * FROM Movies WHERE MovieID = '$clickedMovieID' ORDER BY MovieID";
                                $query = mysqli_query($connect, $select);
                                $count = mysqli_num_rows($query);
                                if ($count > 0) {
                                    $row = mysqli_fetch_array($query);
                                    $poster1 = $row['Poster1'];
                                    $poster2 = $row['Poster2'];
                                    $poster3 = $row['Poster3'];
                                    $movieName = $row['MovieName'];
                                    $releaseDate = $row['ReleaseDate'];
                                    $genreID = $row['GenreID'];
                                    $genreName = $_GET['genreName']; // Clicked Movie GenreName
                                    $formatID = $row['FormatID'];
                                    $formatName = $_GET['formatName']; // Clicked Movie FormatName
                                    $duration = $row['Duration'];
                                    $ratingPoint = $row['RatingPoint'];
                                    $starring = $row['Starring'];
                                    $movieOverView = $row['OverView'];
                                    $trailer = $row['Trailer'];
                            ?>
                            <form action="movieEntry.php" class="movieEntryForm" method="POST"
                                enctype="multipart/form-data">
                                <div class="movieEntryContainer">
                                    <div class="movieUploadRow">
                                        <div class="moviePosterContainer">
                                            <div class="wrapper">
                                                <div class="image">
                                                    <img src="moviePosters/<?php echo $poster1 ?>" alt=""
                                                        class="image1">
                                                </div>
                                                <!-- <div class="uploadContent">
                                                    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                                    <div class="text-fileUpload text">Poster1 Hasn't Chosen Yet
                                                    </div>
                                                </div> -->
                                                <div class="cancel-btn"><i class="fas fa-times"></i></div>
                                                <div class="file-name">File name here</div>
                                            </div>
                                            <input type="file" class="default-btn" name="moviePoster1">
                                            <i class="fa-solid fa-upload upload-icon"></i>
                                        </div>
                                    </div>
                                    <!-- Inputs for movieEntry -->
                                    <div class="movieDetailInputContainer">
                                        <div class="inputRow">
                                            <div class="inputGroup">
                                                <label for="movieName">Enter Movie Name </label>
                                                <input type="text" class="input movieName" name="txtMovieName"
                                                    value="<?php echo $movieName ?>" required>
                                            </div>

                                            <div class="inputGroup">
                                                <label for="releaseDate">Select Release Dates</label>
                                                <input type="date" class="input releaseDate" name="txtReleaseDate"
                                                    value="<?php echo $releaseDate ?>" required>
                                            </div>
                                        </div>
                                        <div class="inputRow">
                                            <div class="inputGroup">
                                                <label for="movieGenre">Select Movie Genre </label>
                                                <select name="movieGenre" id="">
                                                    <option value="" selected><?php echo $genreName ?></option>
                                                    </option>
                                                    <?php
                                                            $select = "SELECT * FROM Genres ORDER BY GenreID";
                                                            $query = mysqli_query($connect, $select);
                                                            $count = mysqli_num_rows($query);
                                                            if ($count > 0) {
                                                                for ($i = 0; $i < $count; $i++) {
                                                                    $row = mysqli_fetch_array($query);
                                                                    $genreID = $row['GenreID'];
                                                                    $genreName = $row['GenreName'];
                                                            ?>
                                                    <option value="<?php echo $genreID ?>"><?php echo $genreName ?>
                                                    </option>
                                                    <?php
                                                                }
                                                            }
                                                            ?>

                                                </select>
                                            </div>

                                            <div class="inputGroup">
                                                <label for="movieFormat">Select Movie Format </label>
                                                <select name="movieFormat" id="">
                                                    <option value="" selected><?php echo $formatName ?></option>
                                                    </option>
                                                    <?php
                                                            $select = "SELECT * FROM Formats ORDER BY FormatID";
                                                            $query = mysqli_query($connect, $select);
                                                            $count = mysqli_num_rows($query);
                                                            if ($count > 0) {
                                                                for ($i = 0; $i < $count; $i++) {
                                                                    $row = mysqli_fetch_array($query);
                                                                    $formatID = $row['FormatID'];
                                                                    $formatName = $row['FormatName'];
                                                            ?>
                                                    <option value="<?php echo $formatID ?>"><?php echo $formatName ?>
                                                    </option>
                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="inputRow">
                                            <div class="inputGroup">
                                                <label for="movieDuration">Enter Movie Duration <br>
                                                    <small>(hours:minutes)</small>
                                                </label>
                                                <input type="text" class="input movieDuration" placeholder="00:00"
                                                    name="txtDuration" value="<?php echo $duration ?>" required>
                                            </div>

                                            <div class="inputGroup">
                                                <label for="movieRatingPoint">Enter Movie Rating Point <br> <small>(from
                                                        0 to 5)</small> </label>
                                                <input type="number" min='0' max='5' name="numRatingPoint"
                                                    value="<?php echo $ratingPoint ?>" class="input ratingPoint">
                                            </div>
                                        </div>
                                        <div class="inputRow">
                                            <div class="starringContainer">
                                                <label for="movieStarring">Enter Movie Starring </label>
                                                <textarea name="txtStarring" id=""><?php echo $starring ?></textarea>
                                            </div>
                                            <div class="movieOverViewContainer">
                                                <label for="movieOverView">Enter Movie Overview </label>
                                                <textarea
                                                    name="txtMovieOverView"><?php echo $movieOverView ?></textarea>
                                            </div>
                                        </div>
                                        <div class="movieTrailerContainer">
                                            <div class="wrapper">
                                                <div class="video">
                                                    <!-- <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                        alt="" class="image1"> -->
                                                    <video src="movieTrailers/<?php echo $trailer ?>"
                                                        class="movieTrailer" width="100%" height="100%"
                                                        controls></video>
                                                </div>
                                                <!-- <div class="uploadContent">
                                                    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                                    <div class="text-fileUpload text">Upload Movie Trailer Here
                                                    </div>
                                                </div> -->
                                                <div class="cancel-btn"><i class="fas fa-times"></i></div>
                                                <div class="file-name">File name here</div>
                                            </div>
                                            <input type="file" class="default-btn" name="movieTrailer">
                                            <i class="fa-solid fa-upload upload-icon"></i>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-hover" id="submitMovie"
                                                name="btnSubmitMovie">Add
                                                Movie</button>
                                        </div>
                                    </div>
                            </form>
                            <?php
                                }
                            }
                            ?>
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
                                                    alt="" class="image">
                                            </div>
                                            <div class="uploadContent">
                                                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                                <div class="text-fileUpload text">Upload Theater Photo
                                                </div>
                                            </div>
                                            <div class="cancel-btn"><i class="fas fa-times"></i></div>
                                            <div class="file-name">File name here</div>
                                        </div>
                                        <input type="file" class="default-btn" name="moviePoster3">
                                        <i class="fa-solid fa-upload upload-icon"></i>
                                    </div>
                                    <!-- Inputs for movieEntry -->
                                    <div class="movieDetailInputContainer">
                                        <div class="inputRow">
                                            <div class="inputGroup">
                                                <label for="theaterName">Enter Theater Name </label>
                                                <input type="text" class="input movieName" name="txtMovieName" required>
                                            </div>
                                            <div class="inputGroup">
                                                <label for="theaterType">Select Theater Type </label>
                                                <select name="theaterType" id="">
                                                    <option value="1">Imax</option>
                                                    <option value="1">4Dx</option>
                                                    <option value="1">Play House</option>
                                                    <option value="1">P[XL]</option>
                                                    <option value="1">Premium</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="inputRow">
                                            <div class="inputGroup">
                                                <label for="contactNumber">Enter Contact Number </label>
                                                <input type="text" class="input movieName" name="txtContactNumber"
                                                    required>
                                            </div>
                                            <div class="inputGroup">
                                                <label for="location">Enter Location </label>
                                                <input type="text" class="input movieName" name="txtLocation" required>
                                            </div>
                                        </div>

                                        <div class="inputRow">
                                            <div class="descriptionContainer">
                                                <label for="description">Theater Description </label>
                                                <textarea name="txtDescription" id=""></textarea>
                                            </div>
                                        </div>

                                        <div class="inputRow">
                                            <button type="submit" class="btn btn-hover" id="submitMovie"
                                                name="btnSubmitMovie">Add
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
    <script src="imageUpload.js?v=<?php echo $version ?>"></script>
</body>

</html>