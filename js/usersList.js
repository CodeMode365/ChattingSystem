let friends =document.getElementById("friends-list")

setInterval(()=>{
    //Ajax 
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./php/usersList.conf.php", true);
    xhr.onload=()=>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let data = xhr.response;
            
            friends.innerHTML=data;
        }
    }
    xhr.send();
}, 500);