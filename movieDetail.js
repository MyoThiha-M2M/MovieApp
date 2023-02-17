// Movie Detail Animation

const openShowsTag = document.querySelector(".showBtn");
const showWrapperTag = document.querySelector(".showWrapper");
const showContainerTag = document.querySelector(".showDate-timeContainer");

openShowsTag.addEventListener("click", () => {
  showContainerTag.classList.toggle("active");
  showWrapperTag.classList.toggle("active");
});
