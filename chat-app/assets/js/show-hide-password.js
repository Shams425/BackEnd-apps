const passField = document.querySelectorAll("input[type='password']");
const showPassBtn = document.querySelectorAll(".fa-eye");

showPassBtn.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    if (passField[index].value === "") return;
    showPassBtn[index].classList.toggle("active");
    passField[index].type === "password"
      ? (passField[index].type = "text")
      : (passField[index].type = "password");
  });
});
