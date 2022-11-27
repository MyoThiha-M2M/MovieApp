const uploadButtonTag = document.querySelectorAll(".upload-icon");
const image_input = document.querySelectorAll(".default-btn");
const wrapperTag = document.querySelectorAll(".wrapper");
const uploadIconTag = document.querySelectorAll(".icon");
const uploadTextTag = document.querySelectorAll(".text-fileUpload");
const fileNameTag = document.querySelectorAll(".file-name");
const cancelBtnTag = document.querySelectorAll(".cancel-btn");
const imageTag = document.querySelectorAll(".theaterImg");
const sumbitTheaterBtnTag = document.querySelector("#submitTheater");
let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

uploadButtonTag[0].addEventListener("click", () => {
  image_input[0].click();
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
