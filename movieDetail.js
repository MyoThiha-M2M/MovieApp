// Movie Detail Animation

const openShowDateTag = document.querySelectorAll("[data-show-date-open]");
const openShowTimeTag = document.querySelectorAll("[data-show-time-open]");

openShowDateTag.forEach((clickedTheater) => {
  clickedTheater.addEventListener("click", () => {
    const showDateContainerTag = document.querySelector(
      clickedTheater.dataset.showDateOpen
    );
    showDateContainerTag.classList.add("active");
  });
});

openShowTimeTag.forEach((clickedShowDate) => {
  clickedShowDate.addEventListener("click", () => {
    const showTimeTag = document.querySelector(
      clickedShowDate.dataset.showTimeOpen
    );
    showTimeTag.classList.toggle("active");
  });
});
