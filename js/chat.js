const sendBtn = TypingArea.querySelector("#send");
const form = document.getElementById("messenger");
const message = document.getElementById("message");

form.onsubmit =(e)=>{
  e.preventDefault(); //preventing default feature of the form submission
}

sendBtn.onclick = () => {


  //sending message though AJax

    //Create XHR object
    const xhr = new XMLHttpRequest();

    //Operation to perform when the data is received
    xhr.onload = () => {

      //operation if all is well
        if(xhr.status === 200 && xhr.readyState === 4){
      const data = xhr.response;
      console.log(data);

      // chatBox.insertAdjacentHTML("beforeend", data); 

        }
    };
    xhr.open("POST", "./php/outMessage.php", true);
    
    //creating object for form data and passing through Ajax
    let formData = new FormData(form);
    xhr.send(formData);



};
