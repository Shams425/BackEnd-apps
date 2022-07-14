const usersList = document.querySelector(".users .usersList");
const searchBar = document.querySelector(".search input");

searchBar.onkeyup = (e) => {
  let searchTerm = searchBar.value;

  searchTerm != ""
    ? usersList.classList.add("active")
    : usersList.classList.remove("active");

  // Ajax request for the search term
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../assets/php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    } else {
      console.log("something went wrong");
    }
  };
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm); //spaces not allowed between equal signs and searchTerms
};

setInterval(() => {
  // Ajax request for showing the usersList
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../assets/php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!usersList.classList.contains("active")) {
          usersList.innerHTML = data;
        }
      } else {
        console.log("something went wrong");
      }
    }
  };
  xhr.send();
}, 500);
