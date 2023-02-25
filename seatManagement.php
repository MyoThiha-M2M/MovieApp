<?php
include('connect.php');
include('config.php');
session_start();
if (isset($_SESSION['AdminID'])) {
    $adminID = $_SESSION['AdminID'];
    $select = "SELECT * FROM Admins WHERE AdminID = $adminID";
    $query = mysqli_query($connect, $select);
    $row = mysqli_fetch_array($query);
    if (isset($row)) {
        $adminProfile = $row['ProfileImage'];
        $adminUsername = $row['Username'];
    };
};

if (isset($_POST['txtSeatID'])) {
    $seatID = $_POST['txtSeatID'];
    $seatRowID = $_POST['seatRowID'];
    $theaterID = $_POST['theaterID'];
    $price = $_POST['txtSeatPrice'];
    if ($seatID === '' || $seatRowID === '' || $theaterID === '' || $price === '') {
        echo "<script>alert('Please Fill All The Required Information')</script>";
    } else {
        $selectSeatID = "SELECT * FROM Seats WHERE SeatID = '$seatID'";
        $query = mysqli_query($connect, $selectSeatID);
        $count = mysqli_num_rows($query);
        if ($count > 0) {
            echo "<script>alert('SeatID Already Exists')</script>";
        } else {
            $insert = "INSERT INTO Seats (SeatID, SeatRowID, TheaterID, Price) VALUES ('$seatID', '$seatRowID', '$theaterID', $price)";
            $query = mysqli_query($connect, $insert);
            if (isset($query)) {
                echo "<script>alert('New Seat has been Successfully Registered')</script>";
                echo "<script>window.location = 'seatManagement.php'</script>";
            } else {
                echo "<script>alert('Seat Registration Failed!')</script>";
                echo "<script>window.location = 'seatManagement.php'</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>M2M Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css?v=<?php echo $version ?>">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css?v=<?php echo $version ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css?v=<?php echo $version ?>">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css?v=<?php echo $version ?>">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css?v=<?php echo $version ?>">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css?v=<?php echo $version ?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo $version ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="adminPanelStyle.css?v=<?php echo $version ?>">
    <script src="https://kit.fontawesome.com/b59b4a7b62.js?v=<?php echo $version ?>" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a href="index.php" class="navbar-brand brand-logo" style="color: red;font-size: 30px; font-weight:600; position:relative">
                    INFINITY <span style="position:absolute; font-size: 20px; top:0px">&#8734;</span>
                </a>
                <a href="index.php" class="sidebar-brand brand-logo-mini" style="color: red;font-size: 30px; font-weight:600; position:relative">
                    I <span style="position:absolute; font-size: 20px; top:-14px">&#8734;</span>
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="adminProfileImg/<?php echo $adminProfile ?>" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal"><?php echo $adminUsername ?></h5>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-onepassword  text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar-today text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="adminPanel.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="fa-solid fa-grip"></i>
                        </span>
                        <span class="menu-title">Genres And Formats</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="genreManagement.php">Movie
                                    Genres</a></li>
                            <li class="nav-item"> <a class="nav-link" href="formatManagement.php">Movie
                                    Formats</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="movieManagement.php">
                        <span class="menu-icon">
                            <i class="fa-solid fa-film"></i>
                        </span>
                        <span class="menu-title">Movies</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="theaterManagement.php">
                        <span class="menu-icon">
                            <i class="fa-solid fa-masks-theater"></i>
                        </span>
                        <span class="menu-title">Theaters</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="seatManagement.php">
                        <span class="menu-icon">
                            <i class="fa-solid fa-couch"></i>
                        </span>
                        <span class="menu-title">Seats</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="scheduleManagement.php">
                        <span class="menu-icon">
                            <i class="fa-solid fa-clapperboard"></i>
                        </span>
                        <span class="menu-title">Schedules</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="userManagement.php">
                        <span class="menu-icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="menu-title">Users</span>
                    </a>
                    <!-- <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <span class="menu-icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="menu-title">Users</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a>
                            </li>
                        </ul>
                    </div> -->
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="bookingManagement.php">
                        <span class="menu-icon">
                            <i class="fa-solid fa-ticket"></i>
                        </span>
                        <span class="menu-title">Booking</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/miniLogo.png" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <!-- <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Search products">
                            </form>
                        </li>
                    </ul> -->
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown d-none d-lg-block">
                            <div class="currentDate"><?php echo date('d-M-Y') ?></div>
                        </li>
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-email"></i>
                                <span class="count bg-success"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0">Messages</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                                        <p class="text-muted mb-0"> 1 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                                        <p class="text-muted mb-0"> 15 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                                        <p class="text-muted mb-0"> 18 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">4 new messages</p>
                            </div>
                        </li>
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <span class="count bg-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Event today</p>
                                        <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event
                                            today </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                        <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-link-variant text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Launch Admin</p>
                                        <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">See all notifications</p>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="adminProfileImg/<?php echo $adminProfile ?>" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $adminUsername ?>
                                    </p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Advanced settings</p>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <!-- Seat Entry Pop Up Form -->
            <div class="successfulPopUp" id="successfulMsg">
                <div>Entry is successful</div>
            </div>
            <div class="popUpEntry seatEntryPopUp" id="seatEntryPopUp">
                <form action="seatManagement.php" method="POST" id="seatEntryForm">
                    <i class="fas fa-times" data-modal-close></i>
                    <div class="inputRow">
                        <div class="inputGroup">
                            <label for="seatID">Enter Seat ID</label>
                            <input type="text" name="txtSeatID" placeholder="e.g, A1">
                        </div>
                        <div class="inputGroup">
                            <label for="seatRowID">Select Seat Row</label>
                            <select name="seatRowID" id="">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="S">S</option>
                            </select>
                        </div>
                    </div>
                    <div class="inputRow">
                        <div class="inputGroup">
                            <label for="theaterID">Select Theater</label>
                            <select name="theaterID" id="">
                                <?php
                                $select = "SELECT * FROM Theaters ORDER BY TheaterID";
                                $query = mysqli_query($connect, $select);
                                $count = mysqli_num_rows($query);
                                if ($count > 0) {
                                    for ($i = 0; $i < $count; $i++) {
                                        $row = mysqli_fetch_array($query);
                                        $theaterID = $row['TheaterID'];
                                        $theaterName = $row['TheaterName'];
                                ?>
                                        <option value="<?php echo $theaterID ?>"><?php echo $theaterName ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="inputGroup">
                            <label for="seatPrice">Enter Seat Price ($)</label>
                            <input type="text" name="txtSeatPrice" placeholder="e.g, 10">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-hover" id="btnAddseat" data-form-submit='#seatEntryForm' name="submitSeat">Add</button>
                </form>
            </div>
            <div id="overlay"></div>
            <!-- Movie Management Section -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2>Manage Seats</h2>
                                <button class="btn btn-hover" data-modal-target='#seatEntryPopUp'>Add Seat</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="movieListHeadingContainer">
                                    <div>
                                        <h4 class="card-title">Seat List</h4>
                                    </div>
                                    <div class="searchMovieContainer">
                                        <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <input type="text" class="form-control" id="search-input" placeholder="Search Seats">
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Seat ID</th>
                                                <th>Row ID</th>
                                                <th>Theater ID</th>
                                                <th>Price ($)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = "SELECT * FROM Seats ORDER BY SeatID";
                                            $query = mysqli_query($connect, $select);
                                            $count = mysqli_num_rows($query);
                                            if ($count > 0) {

                                                for ($i = 0; $i < $count; $i++) {
                                                    $row = mysqli_fetch_array($query);
                                                    $seatID = $row['SeatID'];
                                                    $seatRowID = $row['SeatRowID'];
                                                    $theaterID = $row['TheaterID'];
                                                    $price = $row['Price']
                                            ?>
                                                    <tr>
                                                        <td><?php echo $seatID ?></td>
                                                        <td><?php echo $seatRowID ?></td>
                                                        <td><?php echo $theaterID ?></td>
                                                        <td><?php echo $price ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<p style='color: red;'>There is no record for Seat!</p>";
                                            };
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            bootstrapdash.com 2020</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script src="popUp.js?v=<?php echo $version ?>"></script>
</body>

</html>