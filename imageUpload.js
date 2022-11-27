// JS for ImageUpload
const wrapperTag = document.querySelectorAll(".wrapper");
const image_input = document.querySelectorAll(".default-btn");
const uploadIconTag = document.querySelectorAll(".icon");
const uploadTextTag = document.querySelectorAll(".text-fileUpload");
const fileNameTag = document.querySelectorAll(".file-name");
const cancelBtnTag = document.querySelectorAll(".cancel-btn");
const imageTag = document.querySelectorAll(".image1");
const videoTag = document.querySelectorAll(".movieTrailer");
const uploadButtonTag = document.querySelectorAll(".upload-icon");
const submitMovieBtnTag = document.querySelector("#submitMovie");
const movieUploadFormTag = document.querySelector(".movieEntryForm");

let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

uploadButtonTag[0].addEventListener("click", () => {
  image_input[0].click();
});
uploadButtonTag[1].addEventListener("click", () => {
  image_input[1].click();
});
uploadButtonTag[2].addEventListener("click", () => {
  image_input[2].click();
});
uploadButtonTag[3].addEventListener("click", () => {
  image_input[3].click();
});

image_input[0].addEventListener("change", function () {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
    imageTag[0].src = uploaded_image;
    uploadIconTag[0].style.display = "none";
    uploadTextTag[0].style.display = "none";
    wrapperTag[0].classList.add("active");
  });
  reader.readAsDataURL(this.files[0]);
  cancelBtnTag[0].addEventListener("click", () => {
    imageTag[0].src =
      "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=";
    wrapperTag[0].classList.remove("active");
    uploadIconTag[0].style.display = "block";
    uploadTextTag[0].style.display = "block";
  });
  if (this.value) {
    let valueStore = this.value.match(regExp);
    fileNameTag[0].textContent = valueStore;
  }
});

image_input[1].addEventListener("change", function () {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
    imageTag[1].src = uploaded_image;
    uploadIconTag[1].style.display = "none";
    uploadTextTag[1].style.display = "none";
    wrapperTag[1].classList.add("active");
  });
  reader.readAsDataURL(this.files[0]);
  cancelBtnTag[1].addEventListener("click", () => {
    imageTag[1].src =
      "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=";
    wrapperTag[1].classList.remove("active");
    uploadIconTag[1].style.display = "block";
    uploadTextTag[1].style.display = "block";
  });
  if (this.value) {
    let valueStore = this.value.match(regExp);
    fileNameTag[1].textContent = valueStore;
  }
});

image_input[2].addEventListener("change", function () {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
    imageTag[2].src = uploaded_image;
    uploadIconTag[2].style.display = "none";
    uploadTextTag[2].style.display = "none";
    wrapperTag[2].classList.add("active");
  });
  reader.readAsDataURL(this.files[0]);
  cancelBtnTag[2].addEventListener("click", () => {
    imageTag[2].src =
      "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=";
    wrapperTag[2].classList.remove("active");
    uploadIconTag[2].style.display = "block";
    uploadTextTag[2].style.display = "block";
  });
  if (this.value) {
    let valueStore = this.value.match(regExp);
    fileNameTag[2].textContent = valueStore;
  }
});

image_input[3].addEventListener("change", function () {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_video = reader.result;
    videoTag[0].src = uploaded_video;
    uploadIconTag[3].style.display = "none";
    uploadTextTag[3].style.display = "none";
    wrapperTag[3].classList.add("active");
    videoTag[0].setAttribute("controls", "controls");
  });
  reader.readAsDataURL(this.files[0]);
  cancelBtnTag[3].addEventListener("click", () => {
    videoTag[0].src = "";
    wrapperTag[3].classList.remove("active");
    uploadIconTag[3].style.display = "block";
    uploadTextTag[3].style.display = "block";
    videoTag[0].removeAttribute("controls");
  });
});
