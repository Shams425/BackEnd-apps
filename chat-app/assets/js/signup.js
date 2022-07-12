const form = document.querySelector(".sign-up form");
const continueBtn = form.querySelector(".button input");
const errorMessage = form.querySelector(".alert");
const successMessage = form.querySelector(".alert-info");

form.onsubmit = (e) => e.preventDefault();

continueBtn.onclick = () => {
  //Ajax request
  let xhr = new XMLHttpRequest(); //Request
  xhr.open("POST", "assets/php/signup.php", true); //the open method takes many parameters but we only want (method, url, async)

  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log("hello world");
        console.log(errorMessage);
        let data = xhr.response;
        console.log(data.toString());
        if (data === "success") {
          successMessage.textContent = data;
          successMessage.style.display = "block";
        } else {
          errorMessage.textContent = data;
          errorMessage.style.display = "block";
        }
      }
    }
  };

  //sending through Ajax to signup.php
  let formData = new FormData(form);
  xhr.send(formData);
};
