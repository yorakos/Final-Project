document.getElementById("signUp").addEventListener("click", () => {
  document.getElementById("container").classList.add("right-panel-active");
});

document.getElementById("signIn").addEventListener("click", () => {
  document.getElementById("container").classList.remove("right-panel-active");
});

function infoUser() {
  var firstName = document.getElementById("firstName").value;
  var LastName = document.getElementById("LastName").value;
  var Email = document.getElementById("Email").value;
  var Password = document.getElementById("password").value;
  console.log(firstName + " " + LastName + " " + Email + " " + Password);
}

var user = "";

function log_php(email, password) {
  $.ajax({
    url: "logIn.php",
    data: { Email: email, Password: password },
    success: function (result) {
      console.log(result);
      console.log("ЧЕЕ тааам");
      if (result == "LogIn!") {
        user = email;
        console.log("Вы вошли в систему!");
      } else alert("Wrong input");
    },
    error: function () {
      console.log("Login error!");
    },
  });
}

function reg_php(FirstName, LastName, Email, Password) {
  $.ajax({
    url: "register.php",
    type: "POST",
    data: {
      FirstName: FirstName,
      LastName: LastName,
      Email: Email,
      Password: Password,
    },
    success: function (result) {
      console.log(result);
      if (result == "Success!") alert("You registrated!");
      else alert("Wrong input");
    },
    error: function () {
      console.log("error");
    },
  });
}

var openBtn = document.getElementById("open-btn");
var modalContainer = document.getElementById("containers");
//var closeBtn = document.getElementById("close-btn");

openBtn.addEventListener("click", function () {
  modalContainer.style.display = "block";
});

closeBtn.addEventListener("click", function () {
  modalContainer.style.display = "none";
});

window.addEventListener("click", function (e) {
  if (e.target === modalContainer) {
    modalContainer.style.display = "none";
  }
});
