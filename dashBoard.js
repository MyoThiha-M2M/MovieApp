const genrePopUpTag = document.querySelector("#genreEntryPopUp");
const successfulPopUpTag = document.querySelector("#successfulEntryPopUp");
const formatPopUpTag = document.querySelector("#formatEntryPopUp");
const showPopUpTag = document.querySelector("#showEntryPopUp");
const addGenreBtnTag = document.querySelector("#addGenreBtn");
const addFormatBtnTag = document.querySelector("#addFormatBtn");
const addShowBtnTag = document.querySelector("#addShowBtn");
const managementSectionTag = document.querySelectorAll(".managementContent");
const entryFormTag = document.querySelectorAll(".entryPopUpForm");
const submitGenreTag = document.querySelector("#btnAddGenre");
const submitFormatTag = document.querySelector("#btnAddFormat");
const submitShowTag = document.querySelector("#btnAddShow");
const sideMenuItemTag = document.querySelectorAll(".sideMenuItem");
const popUpInputTag = document.querySelectorAll(".popUpInput");
const popUpCloseBtnTag = document.querySelectorAll(".popUpCloseBtn");

let currentlyClickedSection = 0;

const navigateSideMenu = (menuIndex) => {
  sideMenuItemTag[0].classList.add("currentlyClicked");
  sideMenuItemTag[menuIndex].addEventListener("click", () => {
    managementSectionTag[currentlyClickedSection].style.display = "none";
    managementSectionTag[menuIndex].style.display = "block";
    currentlyClickedSection = menuIndex;
    clickedMenuItem = document.querySelectorAll(".currentlyClicked");
    for (let i = 0; i < clickedMenuItem.length; i++) {
      clickedMenuItem[i].classList.remove("currentlyClicked");
    }
    sideMenuItemTag[currentlyClickedSection].classList.add("currentlyClicked");
  });
};

for (let i = 0; i < sideMenuItemTag.length; i++) {
  navigateSideMenu(i);
}

addGenreBtnTag.addEventListener("click", () => {
  genrePopUpTag.style.display = "block";
  managementSectionTag[currentlyClickedSection].style.opacity = 0.4;
  popUpCloseBtnTag[0].addEventListener("click", () => {
    genrePopUpTag.style.display = "none";
    managementSectionTag[currentlyClickedSection].style.opacity = 1;
  });
});
addFormatBtnTag.addEventListener("click", () => {
  formatPopUpTag.style.display = "block";
  managementSectionTag[currentlyClickedSection].style.opacity = 0.4;
  popUpCloseBtnTag[1].addEventListener("click", () => {
    formatPopUpTag.style.display = "none";
    managementSectionTag[currentlyClickedSection].style.opacity = 1;
  });
});
addShowBtnTag.addEventListener("click", () => {
  showPopUpTag.style.display = "block";
  managementSectionTag[currentlyClickedSection].style.opacity = 0.4;
  popUpCloseBtnTag[2].addEventListener("click", () => {
    showPopUpTag.style.display = "none";
    managementSectionTag[currentlyClickedSection].style.opacity = 1;
  });
});

submitGenreTag.addEventListener("click", () => {
  genrePopUpTag.style.display = "none";
  successfulPopUpTag.style.display = "block";
  const h2Tag = document.createElement("h2");
  h2Tag.textContent = "Successfully added new Genre";
  successfulPopUpTag.append(h2Tag);
  managementSectionTag[currentlyClickedSection].style.opacity = 0.4;
  setTimeout(() => {
    entryFormTag[0].submit();
  }, 4000);
});

submitFormatTag.addEventListener("click", () => {
  formatPopUpTag.style.display = "none";
  successfulPopUpTag.style.display = "block";
  const h2Tag = document.createElement("h2");
  h2Tag.textContent = "Successfully added new Format";
  successfulPopUpTag.append(h2Tag);
  managementSectionTag[currentlyClickedSection].style.opacity = 0.4;
  setTimeout(() => {
    entryFormTag[1].submit();
  }, 4000);
});

submitShowTag.addEventListener("click", () => {
  showPopUpTag.style.display = "none";
  successfulPopUpTag.style.display = "block";
  const h2Tag = document.createElement("h2");
  h2Tag.textContent = "Successfully added new Show";
  successfulPopUpTag.append(h2Tag);
  managementSectionTag[currentlyClickedSection].style.opacity = 0.4;
  setTimeout(() => {
    entryFormTag[2].submit();
  }, 4000);
});
