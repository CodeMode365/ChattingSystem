const searchBtn = document.querySelector(".users .search button");
const searchBar = document.querySelector(".users .search input");

//Class toggles when seach button is clicked
searchBtn.onclick = () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
};


//This function is called when uses enters some data in Search bar
function search(value){
  let Data = value;
    //Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/usersList.conf.php", true);
    xhr.onload = () => {
      if (xhr.readyState == 4 && xhr.status == 200) {
        let responseData = xhr.response;

      }
    };

    //for POST requests form 
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    //send users search data as value of Search
    xhr.send("Search" + Data);
  }
