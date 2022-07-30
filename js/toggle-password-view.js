const pass_field = document.querySelector(
  ".form .field input[type='password']"
);
const toggleButton = document.querySelector(".form .field i");

toggleButton.addEventListener("click", () => {
  if (pass_field.type == "password") {
    pass_field.type = "text";
    toggleButton.classList.add("active");
  } else {
    pass_field.type = "password";
  toggleButton.classList.remove("active");

  }
});
