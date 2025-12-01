const loginBtn = document.getElementById("loginBtn");
const errorMsg = document.getElementById("errorMsg");

loginBtn.addEventListener("click", () => {
  let usr = document.getElementById("username").value.trim();
  let psw = document.getElementById("password").value.trim();

  if (usr === "brandon" && psw === "1234") {
    localStorage.setItem("loginName", usr);
    window.location.href = "index.php?page=main";
  } else {
    errorMsg.style.display = "block";
  }
});