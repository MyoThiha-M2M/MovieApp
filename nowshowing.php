<?php
include('config.php');
include('connect.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
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
    <script src="https://kit.fontawesome.com/b59b4a7b62.js?v=<?php echo $version ?>" crossorigin="anonymous"></script>
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
                                                        placeholder="Search Movies or Theatres" />
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

    <!-- slider starts  -->
    <section id="home" class="iq-main-slider p-0">
        <div id="home-slider" class="slider m-0 p-0">
            <div class="slide slide-bg"
                style="background-image: url(https://originserver-static1-uat.pvrcinemas.com/pvrcms/banner/Macmerisepilot_1587.jpg);">
            </div>
            <div class="slide slide-bg"
                style="background-image: url(https://originserver-static1-uat.pvrcinemas.com/pvrcms/banner/ICE_1714.jpg);">
            </div>
            <div class="slide slide-bg"
                style="background-image: url(https://originserver-static1-uat.pvrcinemas.com/pvrcms/banner/Weekday_Offers__2530.jpg);">
            </div>
            <?php
            $select = "SELECT m.*, g.GenreName, f.FormatName FROM Movies m, Genres g, Formats f WHERE 
                            g.GenreID = m.GenreID AND 
                            f.FormatID = m.FormatID ORDER BY m.MovieID";
            $query = mysqli_query($connect, $select);
            $count = mysqli_num_rows($query);
            if ($count > 0) {
                for ($i = 0; $i < 3; $i++) {
                    $row = mysqli_fetch_array($query);
                    $movieID = $row['MovieID'];
                    $movieName = $row['MovieName'];
                    $moviePoster2 = $row['Poster2'];
                    $genreID = $row['GenreID'];
                    $formatID = $row['FormatID'];
                    $genreName = $row['GenreName'];
                    $formatName = $row['FormatName'];
                    $duration = $row['Duration'];
                    $starring = $row['Starring'];
                    $rating = $row['RatingPoint'];
                    $overView = $row['OverView'];
                    $movieTrailer = $row['Trailer'];
            ?>
            <div class="slide slick-bg" style="background-image: url(moviePosters/<?php echo $moviePoster2 ?>);">
                <div class="container-fluid position-relative h-100">
                    <div class="slider-inner h-100">
                        <div class="row align-items-center h--100">
                            <div class="col-xl-6 col-lg-12 col-md-12">
                                <a href="javascript:void(0)">
                                    <div class="channel-logo" data-animation-in="fadeInLeft" data-delay-in="0.5">
                                        <img src="images/logo.png" class="c-logo" alt="" />
                                    </div>
                                </a>
                                <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft"
                                    data-delay-in="0.6">
                                    <?php echo $movieName ?>
                                </h1>
                                <div class="d-flex flex-wrap align-items-center fadeInLeft animated"
                                    data-animation-in="fadeInLeft" style="opacity: 1">
                                    <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3">
                                        <ul
                                            class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="text-white ml-2"><?php echo $rating ?>(imbd)</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2 mt-md-3">
                                        <span class="badge badge-secondary p-2">16+</span>
                                        <span class="ml-3"><?php echo $duration ?></span>
                                    </div>
                                </div>
                                <p data-animation-in="fadeInUp">
                                    <?php echo $overView ?>
                                </p>
                                <div class="trending-list" data-animation-in="fadeInUp" data-delay-in="1.2">
                                    <div class="text-primary title starring">
                                        Starring :
                                        <span class="text-body"><?php echo $starring ?></span>
                                    </div>
                                    <div class="text-primary title genres">
                                        Genre : <span class="text-body"><?php echo $genreName ?></span>
                                    </div>
                                    <div class="text-primary title tag">
                                        Format :
                                        <span class="text-body"><?php echo $formatName ?></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center r-mb-23 mt-4" data-animation-in="fadeInUp"
                                    data-delay-in="1.2">
                                    <a href="#" class="btn btn-hover iq-button" style="margin-right: 40px;"><i
                                            class="fa fa-play mr-3"></i>Play
                                        Now</a>
                                    <a href="movieTrailers/<?php echo $movieTrailer ?>" class="video-open playbtn">
                                        <span class="w-trailor">Watch Trailer</span>
                                        <img src="images/play.png" class="play" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
    <!-- slider ends -->

    <!-- main content starts  -->
    <div class="main-content">
        <!-- Now Showing Section Starts -->
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="favorite-contens">
                            <div class="iq-main-header d-flex justify-content-between">
                                <h4 class="main-title">Now Showing</h4>
                                <div class="selBox-flex">
                                    <form action="nowshowing.php" class="SelectedForm" method="GET">
                                        <div class="SelectBoxContainer">

                                            <input type="text" name="txtSelectedGenre" id="selectedGenreID" value="0"
                                                hidden>
                                            <div class="selected">
                                                <div class="selectedGenre">Genre</div>
                                                <div><i class="fa-solid fa-angle-up"></i></div>
                                            </div>
                                            <div class="optionsContainer">
                                                <div class="option genreOption" id="0">All Genre</div>
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
                                                <div class="option genreOption" id="<?php echo $genreID ?>">
                                                    <?php echo $genreName ?></div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>

                                        </div>
                                        <div class="SelectBoxContainer">
                                            <input type="text" name="txtSelectedFormat" id="selectedFormatID" value="0"
                                                hidden>
                                            <div class="selected">
                                                <div class="selectedFormat">Format</div>
                                                <div><i class="fa-solid fa-angle-up"></i></div>
                                            </div>
                                            <div class="optionsContainer">
                                                <div class="option formatOption" id="0">All Format</div>
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
                                                <div class="option formatOption" id="<?php echo $formatID ?>">
                                                    <?php echo $formatName ?></div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                <!-- Genre Selected Section Starts -->
                                <?php
                                if (isset($_GET['txtSelectedGenre']) || isset($_GET['txtSelectedFormat'])) {
                                    $selectedGenreID = $_GET['txtSelectedGenre'];
                                    $selectedFormatID = $_GET['txtSelectedFormat'];
                                    if ($selectedGenreID === '0' && $selectedFormatID === '0') {
                                        $select = "SELECT m.*, g.GenreName, f.FormatName FROM Movies m, Genres g, Formats f WHERE 
                                    g.GenreID = m.GenreID AND 
                                    f.FormatID = m.FormatID ORDER BY m.MovieID";
                                        $query = mysqli_query($connect, $select);
                                        $count = mysqli_num_rows($query);
                                        if ($count > 0) {
                                            for ($i = 0; $i < $count; $i++) {
                                                $row = mysqli_fetch_array($query);
                                                $movieID = $row['MovieID'];
                                                $movieName = $row['MovieName'];
                                                $moviePoster1 = $row['Poster1'];
                                                $genreID = $row['GenreID'];
                                                $formatID = $row['FormatID'];
                                                $genreName = $row['GenreName'];
                                                $formatName = $row['FormatName'];
                                                $duration = $row['Duration'];
                                                $hour = substr($duration, 1, 1) . 'hr';
                                                $minute = substr($duration, 3, 2) . 'min';
                                                $durationText = $hour . " " . $minute;
                                                $starring = $row['Starring'];
                                                $rating = $row['RatingPoint'];
                                                $overView = $row['OverView'];
                                                $movieTrailer = $row['Trailer'];
                                ?>
                                <li class="slide-item">
                                    <div class="block-images position-relative">
                                        <div class="img-box">
                                            <img src="moviePosters/<?php echo $moviePoster1 ?>" class="img-fluid"
                                                alt="" />
                                        </div>
                                        <div class="block-description">
                                            <h6 class="iq-title">
                                                <a href="#"> <?php echo $movieName ?> </a>
                                            </h6>
                                            <div class="movie-time d-flex align-items-center my-2">
                                                <div class="badge badge-secondary p-1 mr-2"><?php echo $genreName ?>
                                                </div>
                                                <span class="text-white"><?php echo $durationText ?></span>
                                            </div>
                                            <div class="hover-buttons">
                                                <span class="btn btn-hover iq-button">
                                                    Book Tickets
                                                </span>
                                            </div>
                                        </div>
                                        <div class="block-social-info">
                                            <ul class="list-inline p-0 m-0 music-play-lists">
                                                <li class="share">
                                                    <span><i class="fa fa-share-alt"></i></span>
                                                    <div class="share-box">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-share-alt"></i></a>
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-youtube"></i></a>
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-instagram"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-heart"></i></span>
                                                    <span class="count-box">19+</span>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-plus"></i></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                            }
                                        }
                                    } elseif ($selectedGenreID > 0) {
                                        $select = "SELECT m.*, g.GenreName, f.FormatName FROM Movies m, Genres g, Formats f
                                    WHERE
                                    m.GenreID = '$selectedGenreID' AND
                                    g.GenreID = m.GenreID AND f.FormatID = m.FormatID ORDER BY m.MovieID";
                                        $query = mysqli_query($connect, $select);
                                        $count = mysqli_num_rows($query);
                                        if ($count > 0) {
                                            for ($i = 0; $i < $count; $i++) {
                                                $row = mysqli_fetch_array($query);
                                                $movieID = $row['MovieID'];
                                                $movieName = $row['MovieName'];
                                                $moviePoster1 = $row['Poster1'];
                                                $genreID = $row['GenreID'];
                                                $formatID = $row['FormatID'];
                                                $genreName = $row['GenreName'];
                                                $formatName = $row['FormatName'];
                                                $duration = $row['Duration'];
                                                $hour = substr($duration, 1, 1) . 'hr';
                                                $minute = substr($duration, 3, 2) . 'min';
                                                $durationText = $hour . " " . $minute;
                                                $starring = $row['Starring'];
                                                $rating = $row['RatingPoint'];
                                                $overView = $row['OverView'];
                                                $movieTrailer = $row['Trailer']; ?>
                                <li class="slide-item">
                                    <div class="block-images position-relative">
                                        <div class="img-box">
                                            <img src="moviePosters/<?php echo $moviePoster1 ?>" class="img-fluid"
                                                alt="" />
                                        </div>
                                        <div class="block-description">
                                            <h6 class="iq-title">
                                                <a href="#"> <?php echo $movieName ?> </a>
                                            </h6>
                                            <div class="movie-time d-flex align-items-center my-2">
                                                <div class="badge badge-secondary p-1 mr-2"><?php echo $genreName ?>
                                                </div>
                                                <span class="text-white"><?php echo $durationText ?></span>
                                            </div>
                                            <div class="hover-buttons">
                                                <a href="movieDetail.php" class="btn btn-hover">Book Tickets</a>
                                            </div>
                                        </div>
                                        <div class="block-social-info">
                                            <ul class="list-inline p-0 m-0 music-play-lists">
                                                <li class="share">
                                                    <span><i class="fa fa-share-alt"></i></span>
                                                    <div class="share-box">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-share-alt"></i></a>
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-youtube"></i></a>
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-instagram"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-heart"></i></span>
                                                    <span class="count-box">19+</span>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-plus"></i></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                            }
                                        }
                                    } elseif ($selectedFormatID > 0) {
                                        $select = "SELECT m.*, g.GenreName, f.FormatName FROM Movies m, Genres g, Formats f
                                        WHERE
                                        f.FormatID = '$selectedFormatID' AND
                                        g.GenreID = m.GenreID AND f.FormatID = m.FormatID ORDER BY m.MovieID";
                                        $query = mysqli_query($connect, $select);
                                        $count = mysqli_num_rows($query);
                                        if ($count > 0) {
                                            for ($i = 0; $i < $count; $i++) {
                                                $row = mysqli_fetch_array($query);
                                                $movieID = $row['MovieID'];
                                                $movieName = $row['MovieName'];
                                                $moviePoster1 = $row['Poster1'];
                                                $genreID = $row['GenreID'];
                                                $formatID = $row['FormatID'];
                                                $genreName = $row['GenreName'];
                                                $formatName = $row['FormatName'];
                                                $duration = $row['Duration'];
                                                $hour = substr($duration, 1, 1) . 'hr';
                                                $minute = substr($duration, 3, 2) . 'min';
                                                $durationText = $hour . " " . $minute;
                                                $starring = $row['Starring'];
                                                $rating = $row['RatingPoint'];
                                                $overView = $row['OverView'];
                                                $movieTrailer = $row['Trailer']; ?>
                                <li class="slide-item">
                                    <div class="block-images position-relative">
                                        <div class="img-box">
                                            <img src="moviePosters/<?php echo $moviePoster1 ?>" class="img-fluid"
                                                alt="" />
                                        </div>
                                        <div class="block-description">
                                            <h6 class="iq-title">
                                                <a href="#"> <?php echo $movieName ?> </a>
                                            </h6>
                                            <div class="movie-time d-flex align-items-center my-2">
                                                <div class="badge badge-secondary p-1 mr-2"><?php echo $genreName ?>
                                                </div>
                                                <span class="text-white"><?php echo $durationText ?></span>
                                            </div>
                                            <div class="hover-buttons">
                                                <span class="btn btn-hover iq-button">
                                                    Book Tickets
                                                </span>
                                            </div>
                                        </div>
                                        <div class="block-social-info">
                                            <ul class="list-inline p-0 m-0 music-play-lists">
                                                <li class="share">
                                                    <span><i class="fa fa-share-alt"></i></span>
                                                    <div class="share-box">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-share-alt"></i></a>
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-youtube"></i></a>
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-instagram"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-heart"></i></span>
                                                    <span class="count-box">19+</span>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-plus"></i></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                            }
                                        }
                                    }
                                } else {
                                    $select = "SELECT m.*, g.GenreName, f.FormatName FROM Movies m, Genres g, Formats f WHERE 
                                    g.GenreID = m.GenreID AND 
                                    f.FormatID = m.FormatID ORDER BY m.MovieID";
                                    $query = mysqli_query($connect, $select);
                                    $count = mysqli_num_rows($query);
                                    if ($count > 0) {
                                        for ($i = 0; $i < $count; $i++) {
                                            $row = mysqli_fetch_array($query);
                                            $movieID = $row['MovieID'];
                                            $movieName = $row['MovieName'];
                                            $moviePoster1 = $row['Poster1'];
                                            $genreID = $row['GenreID'];
                                            $formatID = $row['FormatID'];
                                            $genreName = $row['GenreName'];
                                            $formatName = $row['FormatName'];
                                            $duration = $row['Duration'];
                                            $hour = substr($duration, 1, 1) . 'hr';
                                            $minute = substr($duration, 3, 2) . 'min';
                                            $durationText = $hour . " " . $minute;
                                            $starring = $row['Starring'];
                                            $rating = $row['RatingPoint'];
                                            $overView = $row['OverView'];
                                            $movieTrailer = $row['Trailer'];
                                            ?>
                                <li class="slide-item">
                                    <div class="block-images position-relative">
                                        <div class="img-box">
                                            <img src="moviePosters/<?php echo $moviePoster1 ?>" class="img-fluid"
                                                alt="" />
                                        </div>
                                        <div class="block-description">
                                            <h6 class="iq-title">
                                                <a href="#"> <?php echo $movieName ?> </a>
                                            </h6>
                                            <div class="movie-time d-flex align-items-center my-2">
                                                <div class="badge badge-secondary p-1 mr-2"><?php echo $genreName ?>
                                                </div>
                                                <span class="text-white"><?php echo $durationText ?></span>
                                            </div>
                                            <div class="hover-buttons">
                                                <span class="btn btn-hover iq-button">
                                                    Book Tickets
                                                </span>
                                            </div>
                                        </div>
                                        <div class="block-social-info">
                                            <ul class="list-inline p-0 m-0 music-play-lists">
                                                <li class="share">
                                                    <span><i class="fa fa-share-alt"></i></span>
                                                    <div class="share-box">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-share-alt"></i></a>
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-youtube"></i></a>
                                                            <a href="#" class="share-ico"><i
                                                                    class="fa fa-instagram"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-heart"></i></span>
                                                    <span class="count-box">19+</span>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-plus"></i></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                <!-- Genre Selected Section Ends -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Now Showing section ends -->
    </div>

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
    <script src="nowShowing.js?v=<?php echo $version ?>"></script>
</body>

</html>