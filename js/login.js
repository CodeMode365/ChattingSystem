const form = document.querySelector(".signup form");
const submitBtn = document.querySelector("#submit");
const errorText = form.querySelector(".form form .error-txt");
// console.log(errorText);
console.log(form);
console.log(submitBtn);

form.onsubmit = (e) => {
  e.preventDefault(); //preventing form from submitting
};

submitBtn.onclick = () => {
  // ajax here
  let xhr = new XMLHttpRequest(); //creating xml object
  xhr.open("POST", "./php/loginConf.php", true);
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.response;

      if (data == "success") {
        window.location = "users.php";
      } else {
        errorText.style.background = "#f8d7da";
        errorText.style.color = "#721c24";
        errorText.textContent = data;
        errorText.style.display = "block";
      }
    }
  };

  //sendind data from form using ajax
  let formData = new FormData(form); //from object
  xhr.send(formData);
};