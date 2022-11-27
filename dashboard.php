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

if (isset($_POST['txtGenreName'])) {
    $genreName = $_POST['txtGenreName'];
    $insert = "INSERT INTO Genres(GenreName) VALUES ('$genreName')";
    $query = mysqli_query($connect, $insert);
    if (isset($query)) {
        echo "<script>window.location = 'dashboard.php'</script>";
    }
}
if (isset($_POST['txtFormatName'])) {
    $formatName = $_POST['txtFormatName'];
    $insert = "INSERT INTO Formats(FormatName) VALUES ('$formatName')";
    $query = mysqli_query($connect, $insert);
    if (isset($query)) {
        echo "<script>window.location = 'dashboard.php'</script>";
    }
}

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
    <section class="sideMenu">
        <div class="sideMenuContainer">
            <ul>
                <li class="sideMenuItem"><i class="fa-solid fa-house"></i><span>Dashboard</span></li>
                <li class="sideMenuItem"><i class="fa-solid fa-grip"></i><span>&nbspGenres And Formats</span></li>
                <li class="sideMenuItem"><i class="fa-solid fa-film"></i><span>&nbspMovies</span></li>
                <!-- <li class="sideMenuItem"><i class="fa-regular fa-calendar"></i><span>&nbspSchedules</span></li> -->
                <li class="sideMenuItem"><i class="fa-solid fa-masks-theater"></i><span>Theaters</span></li>
                <li class="sideMenuItem"><i class="fa-solid fa-couch"></i><span>Seats</span></li>
                <li class="sideMenuItem"><i class="fa-solid fa-clapperboard"></i><span>&nbspShows</span></li>
                <li class="sideMenuItem"><i class="fa-solid fa-users"></i><span>Users</span></li>
                <li class="sideMenuItem"><i class="fa-solid fa-ticket"></i><span>&nbspBookings</span></li>
            </ul>
        </div>
    </section>
    <!-- Pop Up Section -->

    <div class="EntryPopUp" id="successfulEntryPopUp">
    </div>
    <form action="dashboard.php" method="POST" class="entryPopUpForm">
        <div class="EntryPopUp" id="genreEntryPopUp">
            <i class="fas fa-times"></i>
            <div class="inputGroup">
                <label for="genreName">Enter New Genre: </label>
                <input type="text" class="input popUpInput" name="txtGenreName" required>
            </div>
            <button type="submit" class="btn btn-hover" id="btnAddGenre" name="submitGenre">Add</button>
        </div>
    </form>
    <form action="dashboard.php" method="POST" class="entryPopUpForm">
        <div class="EntryPopUp" id="formatEntryPopUp">
            <i class="fas fa-times"></i>
            <div class="inputGroup">
                <label for="formatName">Enter New Format: </label>
                <input type="text" class="input popUpInput" name="txtFormatName" required>
            </div>
            <button type="submit" class="btn btn-hover" id="btnAddFormat" name="btnAddFormat">Add</button>
        </div>
    </form>
    <!-- Management Section  -->
    <section class="managementContent">
        <div class="managementAdminPanelContainer">
            <div>
                <h2>Admin Panel</h2>
            </div>
            <div class="totalNumbersContainer">
                <div class="totalNumbersRow1">
                    <div class="blocksContainer">
                        <div class="dbIconContainer"><i class="fa-solid fa-clapperboard"></i></div>
                        <div class="dbSpanContainer">
                            <span class="span1">Now Showing Movies</span> <br>
                            <span class="span2">6</span>
                        </div>
                    </div>
                    <div class="blocksContainer">
                        <div class="dbIconContainer"><i class="fa-solid fa-video"></i></div>
                        <div class="dbSpanContainer">
                            <span class="span1">Upcoming Movies</span> <br>
                            <span class="span2">6</span>
                        </div>
                    </div>
                    <div class="blocksContainer">
                        <div class="dbIconContainer"><i class="fa-solid fa-box-archive"></i></div>
                        <div class="dbSpanContainer">
                            <span class="span1">Genres</span> <br>
                            <span class="span2">6</span>
                        </div>
                    </div>
                    <div class="blocksContainer">
                        <div class="dbIconContainer"><i class="fa-solid fa-list"></i></div>
                        <div class="dbSpanContainer">
                            <span class="span1">Formats</span> <br>
                            <span class="span2">6</span>
                        </div>
                    </div>
                </div>
                <div class="totalNumbersRow2">
                    <div class="blocksContainer">
                        <div class="dbIconContainer"><i class="fa-solid fa-masks-theater"></i></div>
                        <div class="dbSpanContainer">
                            <span class="span1">Theaters</span> <br>
                            <span class="span2">6</span>
                        </div>
                    </div>
                    <div class="blocksContainer">
                        <div class="dbIconContainer"><i class="fa-solid fa-ticket"></i></div>
                        <div class="dbSpanContainer">
                            <span class="span1">Today Bookings</span> <br>
                            <span class="span2">6</span>
                        </div>
                    </div>
                    <div class="blocksContainer">
                        <div class="dbIconContainer"><i class="fa-solid fa-couch"></i></div>
                        <div class="dbSpanContainer">
                            <span class="span1">Available Seats</span> <br>
                            <span class="span2">6</span>
                        </div>
                    </div>
                    <div class="blocksContainer">
                        <div class="dbIconContainer"><i class="fa-solid fa-users"></i></div>
                        <div class="dbSpanContainer">
                            <span class="span1">Total Users</span> <br>
                            <span class="span2">6</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tablesContainer">
                <div class="row">
                    <div class="table-heading">
                        <p>Most Popular Movies</p>
                    </div>
                    <div class="table-heading">
                        <p>Most Popular Movies</p>
                    </div>
                </div>
                <div class="row">
                    <div class="column">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Movie Name</th>
                                    <th>Release Date</th>
                                    <th>Total Booking</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                <tr>
                                    <td><?php echo $genreID ?></td>
                                    <td><?php echo $genreName ?></td>
                                    <td><?php echo $genreID ?></td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<p style='color: red;'>There is no record for Genre!</p>";
                                };
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="column">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Movie Name</th>
                                    <th>Release Date</th>
                                    <th>Total Booking</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                <tr>
                                    <td><?php echo $genreID ?></td>
                                    <td><?php echo $genreName ?></td>
                                    <td><?php echo $genreID ?></td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<p style='color: red;'>There is no record for Genre!</p>";
                                };
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="table-heading">
                        <p>Most Popular Movies</p>
                    </div>
                    <div class="table-heading">
                        <p>Most Popular Movies</p>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Movie Name</th>
                                    <th>Release Date</th>
                                    <th>Total Booking</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                <tr>
                                    <td><?php echo $genreID ?></td>
                                    <td><?php echo $genreName ?></td>
                                    <td><?php echo $genreID ?></td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<p style='color: red;'>There is no record for Genre!</p>";
                                };
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="column">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Movie Name</th>
                                    <th>Release Date</th>
                                    <th>Total Booking</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                <tr>
                                    <td><?php echo $genreID ?></td>
                                    <td><?php echo $genreName ?></td>
                                    <td><?php echo $genreID ?></td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<p style='color: red;'>There is no record for Genre!</p>";
                                };
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="managementContent" style="display: none;">
        <div class="managementG-FContainer">
            <div class="genreandFormatContainer">
                <div class="movieListHeadingContainer">
                    <div>
                        <h4>Genre Lists</h4>
                    </div>
                    <!-- <div class="searchMovieContainer">
                        <button class="btn btn-hover"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" placeholder="Search Movies">
                    </div> -->
                </div>
                <div class="tableContainer">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Genre ID</th>
                                <th>Genre Name</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            <tr>
                                <td><?php echo $genreID ?></td>
                                <td><?php echo $genreName ?></td>
                            </tr>
                            <?php
                                }
                            } else {
                                echo "<p style='color: red;'>There is no record for Genre!</p>";
                            };
                            ?>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-hover" id="addGenreBtn">Add Genre</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="genreandFormatContainer">
                <div class="movieListHeadingContainer">
                    <div>
                        <h4>Format Lists</h4>
                    </div>
                    <!-- <div class="searchMovieContainer">
                        <button class="btn btn-hover"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" placeholder="Search Movies">
                    </div> -->
                </div>
                <div class="tableContainer">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Format ID</th>
                                <th>Format Name</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            <tr>
                                <td><?php echo $formatID ?></td>
                                <td><?php echo $formatName ?></td>
                            </tr>
                            <?php
                                }
                            } else {
                                echo "<p style='color: red;'>There is no record for Format!</p>";
                            }
                            ?>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-hover" id="addFormatBtn">Add Format</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="managementContent" style="display: none;">
        <div class="dashboardContainer">
            <div class="dashboardHeadingContainer">
                <h4 id="dashboardHeading">Manage Movies</h4>
                <a href="movieEntry.php" class="btn btn-hover">Add Movies</a>
            </div>
            <div class="dashboardBodyContainer">
                <div class="movieListHeadingContainer">
                    <div>
                        <h4>Movie Lists</h4>
                    </div>
                    <div class="searchMovieContainer">
                        <button class="btn btn-hover"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" placeholder="Search Movies">
                    </div>
                </div>
                <div class="tableContainer">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Movie ID</th>
                                <th>Movie Name</th>
                                <th>Movie Poster</th>
                                <th>Genre</th>
                                <th>Format</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                            ?>
                            <tr>
                                <td><?php echo $movieID ?></td>
                                <td><?php echo $movieName ?></td>
                                <td><img src="moviePosters/<?php echo $moviePoster1 ?>" alt="" width="130px"
                                        height="70px"></td>
                                <td><?php echo $genreName ?></td>
                                <td><?php echo $formatName ?></td>
                                <td><?php echo $duration ?></td>
                                <td><a href="movieEntry.php?clickedMovieID=<?php echo $movieID ?>&genreName=<?php echo $genreName ?>&formatName=<?php echo $formatName ?>"
                                        class="btn btn-hover">Edit</a>
                                    <!-- <a href="movieEntry.php?clickedMovieID='<?php echo $movieID ?>'"
                                        class="btn btn-hover">Delete</a> -->
                                </td>

                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="managementContent" style="display: none;">
    </section> this is schedule -->

    <!-- Management For Theaters -->
    <section class="managementContent" style="display: none;">
        <div class="dashboardContainer">
            <div class="dashboardHeadingContainer">
                <h4 id="dashboardHeading">Manage Theaters</h4>
                <a href="theaterEntry.php" class="btn btn-hover">Add Theaters</a>
            </div>
            <div class="dashboardBodyContainer">
                <div class="movieListHeadingContainer">
                    <div>
                        <h4>Theater Lists</h4>
                    </div>
                    <div class="searchMovieContainer">
                        <button class="btn btn-hover"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" placeholder="Search Theaters">
                    </div>
                </div>
                <div class="tableContainer">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Theater ID</th>
                                <th>Theater Name</th>
                                <th>Theater Type</th>
                                <th>Location</th>
                                <th>Theater Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Cinema 01</td>
                                <td>Imax</td>
                                <td>Kamayut TownShip</td>
                                <td><img src="https://www.mdn.gov.mm/sites/default/files/inline-images/2_40.JPG" alt=""
                                        width="130px" height="70px"></td>
                                </td>
                                <td><a href="" class="btn btn-hover">Edit</a>
                                    <a href="" class="btn btn-hover">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Cinema 01</td>
                                <td>Imax</td>
                                <td>Kamayut TownShip</td>
                                <td><img src="https://www.mdn.gov.mm/sites/default/files/inline-images/2_40.JPG" alt=""
                                        width="130px" height="70px"></td>
                                </td>
                                <td><a href="" class="btn btn-hover">Edit</a>
                                    <a href="" class="btn btn-hover">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Cinema 01</td>
                                <td>Imax</td>
                                <td>Kamayut TownShip</td>
                                <td><img src="https://www.mdn.gov.mm/sites/default/files/inline-images/2_40.JPG" alt=""
                                        width="130px" height="70px"></td>
                                </td>
                                <td><a href="" class="btn btn-hover">Edit</a>
                                    <a href="" class="btn btn-hover">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Cinema 01</td>
                                <td>Imax</td>
                                <td>Kamayut TownShip</td>
                                <td><img src="https://www.mdn.gov.mm/sites/default/files/inline-images/2_40.JPG" alt=""
                                        width="130px" height="70px"></td>
                                </td>
                                <td><a href="" class="btn btn-hover">Edit</a>
                                    <a href="" class="btn btn-hover">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Cinema 01</td>
                                <td>Imax</td>
                                <td>Kamayut TownShip</td>
                                <td><img src="https://www.mdn.gov.mm/sites/default/files/inline-images/2_40.JPG" alt=""
                                        width="130px" height="70px"></td>
                                </td>
                                <td><a href="" class="btn btn-hover">Edit</a>
                                    <a href="" class="btn btn-hover">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Management for seats -->
    <section class="managementContent" style="display: none;">
        <div>This is Seat</div>
    </section>

    <!-- Management for shows -->
    <section class="managementContent" style="display: none;">
        <div class="dashboardContainer">
            <div class="dashboardHeadingContainer">
                <h4 id="dashboardHeading">Manage Movies</h4>
                <a href="movieEntry.php" class="btn btn-hover">Add Movies</a>
            </div>
            <div class="dashboardBodyContainer">
                <div class="movieListHeadingContainer">
                    <div>
                        <h4>Movie Lists</h4>
                    </div>
                    <div class="searchMovieContainer">
                        <button class="btn btn-hover"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" placeholder="Search Movies">
                    </div>
                </div>
                <div class="tableContainer">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Schedule ID</th>
                                <th>Schedule Date</th>
                                <th>Schedule Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>11/27/2022</td>
                                <td>3:00 to 4:30pm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Management For Users -->
    <section class="managementContent" style="display: none;">
        <div>This is user</div>
    </section>

    <!-- Management For Bookings -->
    <section class="managementContent" style="display: none;">
        <div>This is booking</div>
    </section>
    <script src="js/jquery-3.4.1.min.js?v=<?php echo $version ?>"></script>
    <script src="js/popper.min.js?v=<?php echo $version ?>"></script>
    <script src="js/bootstrap.min.js?v=<?php echo $version ?>"></script>
    <script src="js/slick.min.js?v=<?php echo $version ?>"></script>
    <script src="js/owl.carousel.min.js?v=<?php echo $version ?>"></script>
    <script src="js/select2.min.js?v=<?php echo $version ?>"></script>
    <script src="js/jquery.magnific-popup.min.js?v=<?php echo $version ?>"></script>
    <script src="js/slick-animation.min.js?v=<?php echo $version ?>"></script>

    <script src="main.js?v=<?php echo $version ?>"></script>
    <script src='dashBoard.js?v=<?php echo $version ?>'></script>
</body>

</html>