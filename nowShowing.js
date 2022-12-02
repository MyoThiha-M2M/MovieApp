// Select Box Interactive
const selectedTag = document.querySelectorAll(".selected");
const angleIconTag = document.querySelectorAll(".selected i");
const selectedGenreTag = document.querySelector(".selectedGenre");
const selectedFormatTag = document.querySelector(".selectedFormat");
const optionsContainerTag = document.querySelectorAll(".optionsContainer");
const genreOptionsTag = document.querySelectorAll(".genreOption");
const formatOptionsTag = document.querySelectorAll(".formatOption");
const genreSelectFormTag = document.querySelector(".genreSelectForm");
const formatSelectFormTag = document.querySelector(".formatSelectForm");
const inputForSelectedGenre = document.querySelector("#selectedGenreID");
const inputForSelectedFormat = document.querySelector("#selectedFormatID");

for (let i = 0; i < selectedTag.length; i++) {
  selectedTag[i].addEventListener("click", () => {
    if (!optionsContainerTag[i].classList.contains("active")) {
      optionsContainerTag[i].style.display = "block";
      optionsContainerTag[i].classList.add("active");
      angleIconTag[i].classList.add("active");
    } else {
      optionsContainerTag[i].style.display = "none";
      optionsContainerTag[i].classList.remove("active");
      angleIconTag[i].classList.remove("active");
    }
  });
}

for (let i = 0; i < genreOptionsTag.length; i++) {
  genreOptionsTag[i].addEventListener("click", () => {
    selectedGenreTag.textContent = genreOptionsTag[i].textContent;
    inputForSelectedGenre.value = genreOptionsTag[i].id;
    if (!optionsContainerTag[0].classList.contains("active")) {
      optionsContainerTag[0].style.display = "block";
      optionsContainerTag[0].classList.add("active");
    } else {
      optionsContainerTag[0].style.display = "none";
      optionsContainerTag[0].classList.remove("active");
    }
    setTimeout(() => {
      genreSelectFormTag.submit();
    }, 1000);
  });
}
for (let i = 0; i < formatOptionsTag.length; i++) {
  formatOptionsTag[i].addEventListener("click", () => {
    selectedFormatTag.textContent = formatOptionsTag[i].textContent;
    inputForSelectedFormat.value = formatOptionsTag[i].id;
    if (!optionsContainerTag[1].classList.contains("active")) {
      optionsContainerTag[1].style.display = "block";
      optionsContainerTag[1].classList.add("active");
    } else {
      optionsContainerTag[1].style.display = "none";
      optionsContainerTag[1].classList.remove("active");
    }
    setTimeout(() => {
      formatSelectFormTag.submit();
    }, 1000);
  });
}
