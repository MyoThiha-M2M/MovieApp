const sideMenuItemTag = document.querySelectorAll(".sideMenuItem");
const managementSectionTag = document.querySelectorAll(".managementContent");

let currentlyClickedSection = 0;

const navigateSideMenu = (menuIndex) => {
  sideMenuItemTag[menuIndex].addEventListener("click", () => {
    managementSectionTag[currentlyClickedSection].style.display = "none";
    managementSectionTag[menuIndex].style.display = "block";
    currentlyClickedSection = menuIndex;
  });
};

for (let i = 0; i < sideMenuItemTag.length; i++) {
  navigateSideMenu(i);
}

// sideMenuItemTag[1].addEventListener("click", () => {
//   managementSectionTag[currentlyClickedSection].style.display = "none";
//   managementSectionTag[1].style.display = "block";
//   currentlyClickedSection = 1;
// });
// sideMenuItemTag[2].addEventListener("click", () => {
//   managementSectionTag[currentlyClickedSection].style.display = "none";
//   managementSectionTag[2].style.display = "block";
//   currentlyClickedSection = 2;
// });
