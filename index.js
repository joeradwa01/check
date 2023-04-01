// agree on terms check box
function myFunction() {
 
    var x = document.getElementById("myCheck").required;
document.getElementById("demo").innerHTML = x;
}


// remember me chexkbox
const rmCheck = document.getElementById("customCheck1"),
    emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}

 
const express = require('express');
const app = express();

const multer  = require('multer')
const upload = multer({ dest: 'uploads/' })

app.post('/upload', upload.single('picture'), (req, res) => {
  res.send('File uploaded!');
});

 