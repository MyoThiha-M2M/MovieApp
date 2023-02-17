<?php
session_start();
include('config.php');
include('connect.php');
include('AutoID_Functions.php');

$customerID = $_SESSION['CustomerID'];
$select = "SELECT * FROM Customers WHERE CustomerID = $customerID";
$query = mysqli_query($connect, $select);
if (isset($query)) {
    $row = mysqli_fetch_array($query);
    $customerProfile = $row['ProfileImage'];
}


if (isset($_GET['txtTotalSeat']) && isset($_GET['txtTotalPrice'])) {
    if ($_GET['txtTotalSeat'] > 0 && $_GET['txtTotalPrice'] > 0) {
        $bookingID = AutoID('Bookings', 'BookingID', 'Bk-', 6);
        $_SESSION['bookingID'] = $bookingID;
        $bookingDate = date("Y-m-d");
        $showID = $_GET['txtSelectedShowID'];
        $_SESSION['selectedShowID'] = $showID;
        $totalTickets = $_GET['txtTotalSeat'];
        $totalPrice = $_GET['txtTotalPrice'];
        $payment = $_GET['rdoPaymentMethod'];
        $paymentDate = date("Y-m-d");
        $insert = "INSERT INTO Bookings VALUES ('$bookingID', '$bookingDate', $showID, $customerID, $totalTickets, $totalPrice,
'$payment', '$paymentDate' )";
        $query = mysqli_query($connect, $insert);
        if (isset($query)) {
            echo "
<script>
const bookedSeatIDArr = JSON.parse(localStorage.getItem('selectedSeatID'));
const bookedSeatPriceArr = JSON.parse(localStorage.getItem('selectedSeatPrice'));
let src = 'payment.php?bookedSeatID=' + bookedSeatIDArr + '&bookedSeatPrice=' + bookedSeatPriceArr;
window.location.href = src
</script>";
        }
    } else {
        echo "Error";
    }
}


$selectedShowID = $_GET['selectedShowID'];
$bookedSeatsArr = array();
$select = "SELECT * FROM Tickets WHERE ShowID = $selectedShowID ORDER BY TicketID";
$query = mysqli_query($connect, $select);
$count = mysqli_num_rows($query);
if ($count > 0) {
    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($query);
        $occupiedSeatID = $row['SeatID'];
        $bookedSeatsArr[$i] = $occupiedSeatID;
    }
} else {
}

$occupiedSeatsStr = implode(' ', $bookedSeatsArr);
$occupiedSeatsArr = explode(' ', $occupiedSeatsStr);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video Streaming</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- i will provide this in description  -->
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/slick-theme.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/select2.min.css" />
    <link rel="stylesheet" href="css/select2-bootstrap4.min.css" />

    <link rel="stylesheet" href="css/slick-animation.css" />
    <link rel="stylesheet" href="style.css?version=<?php echo $version ?>" />
    <link rel="stylesheet" href="seatStyle.css?version=<?php echo $version ?>" />
    <script src="https://kit.fontawesome.com/b59b4a7b62.js?v=<?php echo $version ?>" crossorigin="anonymous"></script>
    <title>Movie Seat Booking</title>
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
                                        <li class="menu-item">
                                            <a href="theater.html">Theaters</a>
                                        </li>
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
                                                    <form action="#" class="searchbox">
                                                        <div class="form-group position-relative">
                                                            <input type="text" class="text search-input font-size-12"
                                                                placeholder="type here to search..." />
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
                                                    <img src="customerProfileImg/<?php echo $customerProfile ?>"
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
                                                        placeholder="type here to search..." />
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
                                            <img src="customerProfileImg/<?php echo $customerProfile ?>"
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

    <form action="seat.php" method="GET" id="seatBookingForm">
        <!-- Payment Section PopUp Starts-->
        <div class="popUpEntry paymentEntryPopUp" id="paymentEntryPopUp">
            <i class="fas fa-times" data-modal-close></i>
            <h3 class="title">payment</h3>
            <div class="flex-middle">
                <img src="payment/card_img.png" alt="">
            </div>
            <div class="inputRow">
                <div class="inputBox">
                    <label>Choose Payment Type</label>
                    <input type="radio" name="rdoPaymentMethod" value="PayPal" id=""><span>&nbsp; PayPal</span> <br>
                    <input type="radio" name="rdoPaymentMethod" value="MasterCard" id=""><span>&nbsp; MasterCard</span>
                    <br>
                    <input type="radio" name="rdoPaymentMethod" value="AmericanExpress" id=""><span>&nbsp; American
                        Express</span> <br>
                    <input type="radio" name="rdoPaymentMethod" value="VisaCard" id=""><span>&nbsp; VisaCard</span> <br>
                </div>
                <div class="inputBox">
                    <label>name on card :</label>
                    <input type="text" placeholder="Mr. John Deo">
                </div>
            </div>
            <div class="inputRow">
                <div class="inputBox">
                    <label>credit card number :</label>
                    <input type="text" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <label>exp month :</label>
                    <input type="text" placeholder="january">
                </div>
            </div>

            <div class="inputRow">
                <div class="inputBox">
                    <label>exp year :</label>
                    <input type="number" placeholder="2022">
                </div>
                <div class="inputBox">
                    <label>CVV :</label>
                    <input type="text" placeholder="1234">
                </div>
            </div>
            <div class="flex-middle">
                <button type="submit" class="btn btn-hover booking" id="btnPayment" name="submitSeat">Confirm
                    Booking</button>
            </div>
        </div>
        <div id="overlay"></div>
        <!-- Payment Section PopUp Ends -->
        <div class="seatBookingContainer">
            <ul class="showcase">
                <li>
                    <div class="seat"></div>
                    <small>N/A</small>
                </li>

                <li>
                    <div class="seat selected"></div>
                    <small>Selected</small>
                </li>

                <li>
                    <div class="seat occupied"></div>
                    <small>Occupied</small>
                </li>
            </ul>
            <div class="priceContainer">
                <span class="A mrRight">A = $10</span>
                <span class="B mrRight">B = $13</span>
                <span class="C mrRight">C = $15</span>
                <span class="D mrRight">D = $16</span>
                <span class="S mrRight">S = $20</span>
            </div>
            <div class="seatContainer">
                <div class="screen"></div>
                <div class="seatsDiv">
                    <?php
                    $selectedShowID = $_GET['selectedShowID'];
                    $selectedTheaterID = $_GET['selectedTheaterID'];
                    $select = "SELECT * FROM Seats WHERE SeatRowID = 'A' AND TheaterID = $selectedTheaterID Order By SeatID";
                    $query = mysqli_query($connect, $select);
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                    ?>
                    <div class="row">
                        <?php
                            for ($i = 0; $i < $count; $i++) {
                                $row = mysqli_fetch_array($query);
                                $seatID = $row['SeatID'];
                                $seatRowID = $row['SeatRowID'];
                                $theaterID = $row['TheaterID'];
                                $price = $row['Price'];
                            ?>
                        <div class="seat seatA" data-seat data-value="<?php echo $price ?>"><?php echo $seatID ?></div>

                        <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    $selectedShowID = $_GET['selectedShowID'];
                    $selectedTheaterID = $_GET['selectedTheaterID'];
                    $select = "SELECT * FROM Seats WHERE SeatRowID = 'B' AND TheaterID = $selectedTheaterID Order By SeatID";
                    $query = mysqli_query($connect, $select);
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                    ?>
                    <div class="row">
                        <?php
                            for ($i = 0; $i < $count; $i++) {
                                $row = mysqli_fetch_array($query);
                                $seatID = $row['SeatID'];
                                $seatRowID = $row['SeatRowID'];
                                $theaterID = $row['TheaterID'];
                                $price = $row['Price'];
                            ?>
                        <div class="seat seatB" data-seat data-value="<?php echo $price ?>"><?php echo $seatID ?>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    $selectedShowID = $_GET['selectedShowID'];
                    $selectedTheaterID = $_GET['selectedTheaterID'];
                    $select = "SELECT * FROM Seats WHERE SeatRowID = 'C' AND TheaterID = $selectedTheaterID Order By SeatID";
                    $query = mysqli_query($connect, $select);
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                    ?>
                    <div class="row">
                        <?php
                            for ($i = 0; $i < $count; $i++) {
                                $row = mysqli_fetch_array($query);
                                $seatID = $row['SeatID'];
                                $seatRowID = $row['SeatRowID'];
                                $theaterID = $row['TheaterID'];
                                $price = $row['Price'];
                            ?>
                        <div class="seat seatC" data-seat data-value="<?php echo $price ?>"><?php echo $seatID ?>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    $selectedShowID = $_GET['selectedShowID'];
                    $selectedTheaterID = $_GET['selectedTheaterID'];
                    $select = "SELECT * FROM Seats WHERE SeatRowID = 'D' AND TheaterID = $selectedTheaterID Order By SeatID";
                    $query = mysqli_query($connect, $select);
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                    ?>
                    <div class="row">
                        <?php
                            for ($i = 0; $i < $count; $i++) {
                                $row = mysqli_fetch_array($query);
                                $seatID = $row['SeatID'];
                                $seatRowID = $row['SeatRowID'];
                                $theaterID = $row['TheaterID'];
                                $price = $row['Price'];
                            ?>
                        <div class="seat seatD" data-seat data-value="<?php echo $price ?>"><?php echo $seatID ?>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="toastFeed">
            <div class="seatBookingDetailContainer">
                <div class="seatInfoContainer">
                    <div class="seatInfo">
                        Selected Seats -
                    </div>
                    <div class="totalPrice">Total Price: $<span id="total">0</span></div>
                </div>
                <p class="text">
                    <span hidden id="count">0</span> <span hidden id="total">0</span>
                    <input type="num" name="txtTotalSeat" id="countInput" hidden readonly>
                    <input type="num" name="txtTotalPrice" id="totalInput" hidden readonly>
                    <input type="num" name="txtSelectedShowID" id="selectedShowID"
                        value="<?php echo $_GET['selectedShowID'] ?>" hidden readonly>
                </p>
                <!-- <button class="btn btn-hover iq-button booking">Confirm Booking</button> -->
                <div class="btn btn-hover" data-modal-target='#paymentEntryPopUp'>Proceed To Payment</div>
            </div>
        </div>
    </form>
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
    <script src="script.js?v=<?php echo $version ?>"></script>
    <script>
    const allSeats = document.querySelectorAll('[data-seat]');
    const allSeatsArr = Array.prototype.slice.call(allSeats);
    const occupiedSeats = '<?php echo $occupiedSeatsStr ?>'
    const occupiedSeatsArr = occupiedSeats.split(' ');
    let checkOccupied = (s) => {
        for (let i = 0; i < occupiedSeatsArr.length; i++) {
            if (s.innerText === occupiedSeatsArr[i]) {
                s.classList.add('occupied');
            }
        }
    }
    for (let i = 0; i < allSeatsArr.length; i++) {
        checkOccupied(allSeatsArr[i]);
    }
    </script>
    <script src="popUp.js?v=<?php echo $version ?>"></script>
</body>

</html>