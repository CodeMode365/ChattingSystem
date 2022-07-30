const TypingArea = document.querySelector(".typing-area");
const sendBtn = TypingArea.querySelector("#send");
const TypeBox = document.getElementById("type-box");
const chatBox = document.getElementById("chat-box");

sendBtn.onclick = () => {

//     console.log("hello")
//  var message = TypeBox.value();

//   setInterval(() => {


    //Create XHR object
    const xhr = new XMLHttpRequest();

    //Operation to perform when the data is received
    xhr.onload = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
      const data = xhr.response;
      console.log(data);

      TypeBox.value = "";
      chatBox.insertAdjacentHTML("beforeend", data); 

        }
    };
    xhr.open("POST", "./php/outMessage.php", true);

    xhr.send(TypeBox.value);
    
    //creating object for form data and passing through Ajax
    let formData = new FormData(form);
    xhr.send(formData);


//   }, 500)


};
