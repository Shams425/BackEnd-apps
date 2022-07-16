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
        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  //sending through Ajax to insert.php
  let formData = new FormData(form);
  xhr.send(formData);
};

setInterval(() => {
  // Ajax request for showing the messages
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../assets/php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  //sending through Ajax to insert.php
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);

//add class to chat-box in order to start/stop scroll to bottom
chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
};
chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
