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