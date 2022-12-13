const openPopUpEntryBtn = document.querySelectorAll("[data-modal-target]");
const closePopUpEntryBtn = document.querySelectorAll("[data-modal-close]");
const overlayTag = document.getElementById("overlay");
const successfulPopUp = document.getElementById("successfulMsg");
const formSubmitBtn = document.querySelectorAll("[data-form-submit]");

openPopUpEntryBtn.forEach((button) => {
  button.addEventListener("click", () => {
    const entryTag = document.querySelector(button.dataset.modalTarget);
    openEntryTag(entryTag);
  });
});

closePopUpEntryBtn.forEach((button) => {
  button.addEventListener("click", () => {
    const entryTag = button.closest(".popUpEntry");
    closeEntryTag(entryTag);
  });
});

const openEntryTag = (entryTag) => {
  if (entryTag === null) {
    return;
  }
  entryTag.classList.add("active");
  overlayTag.classList.add("active");
};

const closeEntryTag = (entryTag) => {
  if (entryTag === null) {
    return;
  }
  entryTag.classList.remove("active");
  overlayTag.classList.remove("active");
};

formSubmitBtn.forEach((button) => {
  button.addEventListener("click", () => {
    const entryFormTag = document.querySelector(button.dataset.formSubmit);
    entryFormTag.submit();
    alert("Entry is successful");
  });
});

// addGenreBtn.addEventListener("click", () => {
//   genreEntryFormTag.submit();
//   successfulPopUp.classList.add("active");
//   setTimeout(() => {
//     successfulPopUp.classList.remove("active");
//   }, 3000);
// });

// addFormatBtn.addEventListener("click", () => {
//   formatEntryFormTag.submit();
// });

// addShowBtn.addEventListener("click", () => {
//   showEntryFormTag.submit();
// });
