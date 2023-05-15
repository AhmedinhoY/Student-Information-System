const form = document.getElementById("form");
const overlay = document.getElementById("overlay");
const student_login = document.getElementById("student-login-form");
const staff_login = document.getElementById("staff-login-form");
const admin_login = document.getElementById("admin-login-form");

function studentLogin() {
  student_login.classList.add("login-form-element-active");
  staff_login.classList.remove("login-form-element-active");
  admin_login.classList.remove("login-form-element-active");
}

function staffLogin() {
  student_login.classList.remove("login-form-element-active");
  staff_login.classList.add("login-form-element-active");
  admin_login.classList.remove("login-form-element-active");
}

function adminLogin() {
  student_login.classList.remove("login-form-element-active");
  staff_login.classList.remove("login-form-element-active");
  admin_login.classList.add("login-form-element-active");
}

let subMenu1 = document.getElementById("submenu-1");

function toggleMenu1() {
  subMenu1.classList.toggle("showMenu");
}

let subMenu2 = document.getElementById("submenu-2");

function toggleMenu2() {
  subMenu2.classList.toggle("showMenu");
}

let subMenu3 = document.getElementById("submenu-3");

function toggleMenu3() {
  subMenu3.classList.toggle("showMenu");
}

let subMenu4 = document.getElementById("submenu-4");

function toggleMenu4() {
  subMenu4.classList.toggle("showMenu");
}

let subMenu5 = document.getElementById("submenu-5");

function toggleMenu5() {
  subMenu5.classList.toggle("showMenu");
}
