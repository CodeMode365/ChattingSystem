const searchBtn = document.querySelector(".users .search button");
const searchBar = document.querySelector(".users .search input");
const friendList = document.getElementById("friends-list");



//Class toggles when seach button is clicked
searchBtn.onclick = () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
};


//This function is called when uses enters some data in Search bar
function search(value) {
  let Data = value;

  //Active class is added to the Friend list showing box when user is typing
  if(Data != ""){
    friendList.classList.add("active");
  }else{
    friendList.classList.add("active");
  }


  //Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let responseData = xhr.response;

      //To show the requrested data
      friendList.innerHTML = responseData;
    }
  };

  //for POST requests form
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //send users search data as value of Search
  xhr.send("Search=" + Data);
}



//To load all the list of friends except current user
setInterval(() => {
  //Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/usersList.conf.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let data = xhr.response;

      //Data is inserted if the user isnot searching anything
      if(!friendList.classList.contains("active")){
        friendList.innerHTML = data;
      }else{
        console.log("New data not inserted");
      }
    }
  };
  xhr.send();
}, 500);
