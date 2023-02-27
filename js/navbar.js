document.querySelector(".fa-times").style.display = "none";

const menuBtn = document.querySelector(".btn-menu");
const Sibebar = document.querySelector(".sidebar");

menuBtn.onclick = function () {
  if (Sibebar.style.right == "-250px") {
    Sibebar.style.right = "0";
    document.querySelector(".fa-times").style.display = "";
    document.querySelector(".fa-bars").style.display = "none";
  } else {
    Sibebar.style.right = "-250px";
    document.querySelector(".fa-times").style.display = "none";
    document.querySelector(".fa-bars").style.display = "";
  }
};