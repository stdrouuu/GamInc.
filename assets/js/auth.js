const loginBtn = document.getElementById("loginBtn");
const googleBtn = document.getElementById("googleBtn");
const errorMsg = document.getElementById("errorMsg");

loginBtn.addEventListener("click", () => {
  let u = document.getElementById("username").value.trim();
  let p = document.getElementById("password").value.trim();

  if (u === "brandon" && p === "1234") {
    localStorage.setItem("loginName", u);
    window.location.href = "index.php?page=main";
  } else {
    errorMsg.style.display = "block";
  }
});