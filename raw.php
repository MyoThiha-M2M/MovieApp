<div class="showTheaterWrapper">
    <?php
    $select = "SELECT s.*, t.TheaterName, t.Location FROM Shows s, Theaters t WHERE s.MovieID = s.$movieID
                                     AND s.TheaterID = t.TheaterID";
    $query = mysqli_query($connect, $select);
    $count = mysqli_num_rows($query);
    echo $count;
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $row = mysqli_fetch_array($query);
            $theaterID = $_row['TheaterID'];
            $theaterName = $row['TheaterName'];
            $location = $row['Location']
    ?>
    <div class="showTheaterContainer" data-show-date-open='#showdate-timeContainer<?php echo $i ?>'>
        <div class="theaterDetailContainer">
            <div><?php echo $theaterName ?></div>
            <div><i class="fa-solid fa-location-dot"></i>
                &nbsp<?php echo $location ?></div>
        </div>
    </div>
    <?php }
    } ?>
</div>

<div class="showDateContainer">
    <?php
    $select2 = "SELECT * FROM Shows WHERE MovieID = $movieID AND TheaterID = 2";
    $query2 = mysqli_query($connect, $select2);
    $count2 = mysqli_num_rows($query2);
    if ($count2 > 0) {
        for ($i = 0; $i < $count2; $i++) {
            $row2 = mysqli_fetch_array($query2);
            $showDate = $row2['ShowDate'];
    ?>
    <div><?php echo $showDate ?></div>
    <?php
        }
    }
    ?>
</div>

<div class="showTheaterWrapper">
    <?php
    $select = "SELECT s.*, t.TheaterName, t.Location FROM Shows s, Theaters t WHERE s.MovieID = s.$movieID
                                     AND s.TheaterID = t.TheaterID";
    $query = mysqli_query($connect, $select);
    $count = mysqli_num_rows($query);
    echo $count;
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $row = mysqli_fetch_array($query);
            $theaterName = $row['TheaterName'];
            $location = $row['Location']
    ?>
    <div class="showTheaterContainer" data-show-date-open='#showdate-timeContainer<?php echo $i ?>'>
        <div class="theaterDetailContainer">
            <div><?php echo $theaterName ?></div>
            <div><i class="fa-solid fa-location-dot"></i>
                &nbsp<?php echo $location ?></div>
        </div>
        <div class="showDate-timeContainer" id="showdate-timeContainer<?php echo $i ?>">
            <?php
                    $select = "SELECT s.*, t.TheaterName FROM Shows s, Theaters t WHERE MovieID = $movieID
                                AND s.TheaterID = t.TheaterID";
                    $query = mysqli_query($connect, $select);
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                        for ($i = 0; $i < $count; $i++) {
                            $row = mysqli_fetch_array($query);
                            $showID = $row['ShowID'];
                            $showDate = $row['ShowDate'];
                            $convertedShowDate = date('d-M-Y', strtotime($showDate));
                            $showTime = $row['ShowTime'];
                            $hour = substr($showTime, 0, 2);
                            $showMinute = substr($showTime, 3, 2);
                            if ($hour > 12) {
                                $showHour = $hour - 12;
                                if ($showHour < 10) {
                                    $convertedShowTime = '0' . $showHour . ':' . $showMinute . ' pm';
                                } else {
                                    $convertedShowTime = ' ' . $showHour . ':' . $showMinute . ' pm';
                                }
                            } else {
                                $showHour = $hour;
                                if ($showHour < 10) {
                                    $convertedShowTime = '0' . $showHour . ':' . $showMinute . ' am';
                                } else {
                                    $convertedShowTime = ' ' . $showHour . ':' . $showMinute . ' am';
                                }
                            }
                            $theaterID = $row['TheaterID'];
                            // $_SESSION['selectedShowID'] = $showID;
                            // $_SESSION['selectedTheaterID'] = $theaterID;
                    ?>
            <div class="flexContainer">
                <div class="showDateContainer">
                    <div class="showDate" data-show-time-open='#showTimeContainer<?php echo $i ?>'>
                        <?php echo $convertedShowDate ?>
                    </div>
                </div>
                <div class="showTimeContainer" id="showTimeContainer<?php echo $i ?>">
                    <form action="seat.php" method="GET">
                        <input type="num" name="selectedShowID" value="<?php echo $showID ?>" hidden>
                        <input type="num" name="selectedTheaterID" value="<?php echo $theaterID ?>" hidden>
                        <?php
                                        $occupiedSeatArr = array();
                                        $select = "SELECT * FROM Tickets WHERE ShowID = $showID ORDER BY TicketID";
                                        $query = mysqli_query($connect, $select);
                                        $count = mysqli_num_rows($query);
                                        if ($count > 0) {
                                            for ($i = 0; $i < $count; $i++) {
                                                $row = mysqli_fetch_array($query);
                                                $occupiedSeatID = $row['SeatID'];
                                                $occupiedSeatArr[$i] = $occupiedSeatID;
                                            }
                                        ?>
                        <input type="text" name="occupiedSeats" value="<?php echo implode(' ', $occupiedSeatArr) ?>"
                            hidden>
                        <?php
                                        } else {
                                        ?>
                        <input type="text" name="occupiedSeats" value="" hidden>
                        <?php
                                        }
                                        ?>
                        <button type="submit">
                            <div class="showTime"><?php echo $convertedShowTime ?></div>
                        </button>
                    </form>
                </div>
            </div>
            <?php
                        }
                    }
                    ?>

        </div>

    </div>
    <?php
        }
    }
    ?>
</div>