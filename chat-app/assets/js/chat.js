const form = document.querySelector(".sendingForm"),
  messageFiled = form.querySelector(".msg"),
  sendBtn = form.querySelector("button"),
  chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();
};

sendBtn.onclick = () => {
  console.log(messageFiled);
  //Ajax request for sending a message
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../assets/php/insert-chat.php", true); //the open method takes many parameters but we only want (method, url, async)

  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        messageFiled.value = "";
      }
    }
  };
  //sending through Ajax to insert.php
  let formData = new FormData(form);
  xhr.send(formData);
};

window.onload = () => {
  // Ajax request for showing the messages
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../assets/php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
      }
    }
  };
  //sending through Ajax to insert.php
  let formData = new FormData(form);
  xhr.send(formData);
};
