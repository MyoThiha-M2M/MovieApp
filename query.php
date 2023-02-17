<?php
include('connect.php');
// $customers = "CREATE TABLE Customers(
//     CustomerID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
//     CustomerName varchar (50),
//     Username varchar (50),
//     Email varchar (50),
//     Password varchar (30),
//     DateRegistered varchar(100),
//     LastLoginDate date,
//     ProfileImage varchar(100)
// )";

// $query = mysqli_query($connect, $customers);
// if (isset($query)) {
//     echo "Customers Table is successful";
// }

// $admins = "CREATE TABLE Admins(
//     AdminID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     AdminName varchar (50),
//     Username varchar (50),
//     Email varchar (50),
//     Password varchar (30),
//     DateRegistered varchar(100),
//     LastLoginDate date,
//     ProfileImage varchar(100)
// )";

// $query = mysqli_query($connect, $admins);
// if (isset($query)) {
//     echo "Admins Table is successful";
// }

// $genres = "CREATE TABLE Genres(
//     GenreID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
//     GenreName varchar (30) 
// )";

// $query = mysqli_query($connect, $genres);
// if (isset($query)) {
//     echo "Genre Table is successful";
// }

// $formats = "CREATE TABLE Formats(
//     FormatID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
//     FormatName varchar(30)
// )";

// $query = mysqli_query($connect, $formats);
// if (isset($query)) {
//     echo "Format Table is successful";
// }

// $movies = "CREATE TABLE Movies(
//     MovieID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
//     MovieName varchar(150),
//     ReleaseDate date,
//     GenreID int,
//     FormatID int,
//     Duration time,
//     RatingPoint int,
//     Starring varchar(255),
//     OverView varchar(800),
//     Poster1 varchar(300),
//     Poster2 varchar(300),
//     Poster3 varchar(300),
//     Trailer varchar(300),
//     FOREIGN KEY (GenreID) REFERENCES Genres(GenreID),
//     FOREIGN KEY (FormatID) REFERENCES Formats(FormatID)
// )";

// $query = mysqli_query($connect, $movies);
// if (isset($query)) {
//     echo "Movie Table is successful";
// };


// $theaters = "CREATE TABLE Theaters(
//     TheaterID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     TheaterName varchar(30),
//     TheaterType varchar(30),
//     ContactNumber varchar(30),
//     Location varchar(200),
//     Description varchar(300),
//     Image varchar(300)
// )";

// $query = mysqli_query($connect, $theaters);
// if (isset($query)) {
//     echo "Theater Table is successfully created";
// }

// $shows = "CREATE TABLE Shows (
//     ShowID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     ShowDate date,
//     ShowTime varchar(30),
//     MovieID int NOT NULL,
//     TheaterID int NOT NULL,
//     FOREIGN KEY (MovieID) REFERENCES Movies(MovieID),
//     FOREIGN KEY (TheaterID) REFERENCES Theaters(TheaterID)
// )";

// $query = mysqli_query($connect, $shows);
// if (isset($query)) {
//     echo "Shows Table is successfully created";
// }

// $seats = "CREATE TABLE Seats(
//     SeatID varchar (10) NOT NULL,
//     SeatRowID varchar (10) NOT NULL,
//     TheaterID int NOT NULL,
//     Price int,
//     PRIMARY KEY (SeatID, TheaterID),
//     FOREIGN KEY (TheaterID) REFERENCES Theaters(TheaterID)
// )";

// $query = mysqli_query($connect, $seats);
// if (isset($query)) {
//     echo "Seats Table is successfully created";
// };

// $bookings = "CREATE TABLE Bookings(
//     BookingID varchar(30) NOT NULL PRIMARY KEY,
//     BookingDate date,
//     ShowID int NOT NULL,
//     CustomerID int,
//     TotalTickets int,
//     TotalPrice int,
//     PaymentMethod varchar (30),
//     PaymentDate date,
//     FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID),
//     FOREIGN KEY (ShowID) REFERENCES Shows(ShowID)
// )";

// $query = mysqli_query($connect, $bookings);
// if (isset($query)) {
//     echo "Bookings Table is successfully created";
// };



// $tickets = "CREATE TABLE Tickets(
//     TicketID varchar (30) NOT NULL PRIMARY KEY,
//     ShowID int NOT NULl, 
//     SeatID varchar(10),
//     Price int,
//     Status varchar (30),
//     BookingID varchar (30) NOT NULL, 
//     FOREIGN KEY (BookingID) REFERENCES Bookings(BookingID),
//     FOREIGN KEY (ShowID) REFERENCES Shows(ShowID),
//     FOREIGN KEY (SeatID) REFERENCES Seats(SeatID)
// )";

// $query = mysqli_query($connect, $tickets);
// if (isset($query)) {
//     echo "Tickets Table is successfully created";
// };