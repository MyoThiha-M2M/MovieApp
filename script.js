const container = document.querySelector(".seatContainer");
const seats = document.querySelectorAll(".row .seat:not(.occupied");
const count = document.getElementById("count");
const total = document.getElementById("total");
const movieSelect = document.getElementById("movie");
const btnTag = document.getElementsByClassName("booking")[0];

populateBookedSeatsUI();

// let ticketPrice = +movieSelect.value;
let ticketPrice;
let totalTicketPrice;

// Save selected movie index and price
function setMovieData(movieIndex, moviePrice) {
  localStorage.setItem("selectedMovieIndex", movieIndex);
  // localStorage.setItem("selectedMoviePrice", moviePrice);
}

const updateBookedSeats = () => {
  const selectedSeats = document.querySelectorAll(".row .seat.occupied");

  const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat)); // Can't understand

  localStorage.setItem("bookedSeats", JSON.stringify(seatsIndex));
};

// update total and count
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll(".row .seat.selected");

  const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat)); // Can't understand

  localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

  //copy selected seats into arr
  // map through array
  //return new array of indexes

  const selectedSeatsCount = selectedSeats.length;
  if (selectedSeats.length < 1) {
    total.innerText = 0;
  } else {
    totalTicketPrice = totalTicketPrice || 0;
    totalTicketPrice = totalTicketPrice + ticketPrice;
    count.innerText = selectedSeatsCount;
    total.innerText = totalTicketPrice;
  }
}

updateUnselectedCount = (rePrice) => {
  const selectedSeats = document.querySelectorAll(".row .seat.selected");

  const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

  localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

  //copy selected seats into arr
  // map through array
  //return new array of indexes

  const selectedSeatsCount = selectedSeats.length;
  count.innerText = selectedSeatsCount;
  totalTicketPrice = totalTicketPrice || 0;
  totalTicketPrice = totalTicketPrice - rePrice;
  total.innerText = totalTicketPrice;
};

// get data from localstorage and populate ui
function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add("selected");
      }
    });
  }
}

function populateBookedSeatsUI() {
  const localStorageBookedSeats = JSON.parse(
    localStorage.getItem("bookedSeats")
  );
  if (localStorageBookedSeats !== null && localStorageBookedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (localStorageBookedSeats.indexOf(index) > -1) {
        seat.classList.add("occupied");
      }
    });
  }
}

// Movie select event
// movieSelect.addEventListener("change", (e) => {
//   ticketPrice = +e.target.value;
//   setMovieData(e.target.selectedIndex, e.target.value);
//   updateSelectedCount();
// });

// Seat click event
container.addEventListener("click", (e) => {
  if (
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("occupied") &&
    e.target.classList.contains("selected")
  ) {
    e.target.classList.toggle("selected");
    let reducePrice = parseInt(e.target.dataset.value);
    updateUnselectedCount(reducePrice);
  } else if (
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("occupied")
  ) {
    e.target.classList.toggle("selected");
    ticketPrice = parseInt(e.target.dataset.value);

    setMovieData(e.target.selectedIndex, ticketPrice);
    updateSelectedCount();
  } else {
    return;
  }
});

window.addEventListener("load", () => {
  localStorage.removeItem("selectedSeats");
});

btnTag.addEventListener("click", () => {
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add("occupied");
        seat.classList.remove("selected");
        localStorage.removeItem("selectedSeats");
        count.innerText = 0;
        total.innerText = 0;
        totalTicketPrice = 0;
      }
    });
    window.alert("Booking is Successful");
    updateBookedSeats();
  } else {
    window.alert("Please Select Your Seats");
  }
});

// intial count and total
