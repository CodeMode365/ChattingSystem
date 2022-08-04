const form = document.getElementById("messenger");
const message = document.getElementById("message");
const sendBtn = document.querySelector("#send");
const chat = document.getElementById("chat-box");

form.onsubmit = (e) => {
  e.preventDefault(); //preventing default feature of the form submission
};

//Put default scroll bar to bottom if there are alot message
function scrollToBottom() {
  chat.scrollTop = chat.scrollHeight;
}

chat.onmouseenter =()=>{
  chat.classList.add("active");
  console.log("active")
}
chat.onmouseleave=()=>{
  console.log("active")
  chat.classList.remove("not active");
}

sendBtn.addEventListener("click", () => {
  console.log("clicked");

  //sending message though AJax

  //Create XHR object
  const xhr = new XMLHttpRequest();

  //Operation to perform when the data is received
  xhr.onload = () => {
    //operation if all is well
    if (xhr.status === 200 && xhr.readyState === 4) {
      const data = xhr.response;
      message.value = ""; //lear the message box when it is sent
      scrollToBottom();


      // chatBox.insertAdjacentHTML("beforeend", data);
    }
  };
  xhr.open("POST", "./php/outMessage.php", true);

  //creating object for form data and passing through Ajax
  let formData = new FormData(form);
  xhr.send(formData);
});

//to render the page continuosly for new message
setInterval(() => {
  //Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/renderMessage.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let data = xhr.response;
      if(!chat.classList.contains("active")){//if chatbox isn't active scroll to bottom
        // scrollToBottom();
      }
      // scrollToBottom();
      chat.innerHTML = data;
      // scrollToBottom();
    }
  };
  //creating object for form data and passing through Ajax
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);

