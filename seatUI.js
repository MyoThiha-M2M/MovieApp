const container = document.querySelector(".seatContainer");
const seats = document.querySelectorAll(".row .seat:not(.occupied");
const count = document.getElementById("count");
const total = document.getElementById("total");
const movieSelect = document.getElementById("movie");
const showSelected = document.querySelector("[data-selected-show-id]");
const btnTag = document.getElementsByClassName("booking")[0];
const allseats = document.querySelectorAll(".seat[data-value]");

const seatArray = [];
const selectedSeatArray = [];
const bookedSeatArray = [];
let i = 0;
for (let i = 0; i < allseats.length; i++) {
  seatArray[i] = {
    seatId: allseats[i].textContent,
    seatPrice: allseats[i].dataset.value,
    selectedShowID: showSelected.dataset.selectedShowId,
  };
}

allseats.forEach((seat) => {
  seat.addEventListener("click", () => {
    seat.classList.toggle("selected");
    if (seat.classList.contains("selected")) {
      selectedSeatArray[i] = {
        seatID: seat.textContent,
        seatPrice: seat.dataset.value,
        selectedShowID: showSelected.dataset.selectedShowId,
      };
      i++;
      localStorage.setItem("selectedSeats", JSON.stringify(selectedSeatArray));
    } else {
    }
  });
});

btnTag.addEventListener("click", () => {});
