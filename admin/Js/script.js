// ===== Log in =====
const form = document.getElementById("login-form");
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

// ====== GPA Calaculator =====
const table = document.getElementById("GPA-calculator");

function addRow() {
  var rows = table.getElementsByTagName("tr");
  var newRow = table.insertRow(rows.length - 2);

  var cell1 = newRow.insertCell(0);
  var cell2 = newRow.insertCell(1);
  var cell3 = newRow.insertCell(2);
  var cell4 = newRow.insertCell(3);

  cell1.innerHTML =
    '<input type="text" name="cCode" placeholder="Course Name">';
  cell2.innerHTML = '<input type="text" name="cHours" placeholder="Credits">';
  cell3.innerHTML =
    '<select name="grade"><option selected>Select a grade</option><option value="A">A (90-100)</option><option value="A-">A- (87-89)</option><option value="B+">B+ (84-86)</option><option value="B">B (80-83)</option><option value="B-">B- (77-79)</option><option value="C">C+ (74-76)</option><option value="C">C (70-73)</option><option value="C-">C- (67-69)</option><option value="D">D+ (64-66)</option><option value="D">D (60-63)</option><option value="F">F (0-60)</option></select> ';
  cell4.innerHTML =
    '<button type="button" onclick="deleteRow(this)" style="background: inherit;"> <i class="fa fa-times" aria-hidden="true"> </i> </button>';
}

function deleteRow(btn) {
  var rows = table.getElementsByTagName("tr");
  for (let i = 0; i < rows.length - 5; i++) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
}

// AJAX for major
function updateMajorSelection(selectedValue) {
  // Send an AJAX request to fetch the options for the second select tag
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "major-select.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Update the options in the second select tag
      document.getElementById("major-select").innerHTML = xhr.responseText;
    }
  };
  xhr.send("selected=" + encodeURIComponent(selectedValue));
}

function updateAdvisorSelection(selectedValue) {
  // Send an AJAX request to fetch the options for the second select tag
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "advisor-select.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Update the options in the third select tag
      document.getElementById("advisor-select").innerHTML = xhr.responseText;
    }
  };
  xhr.send("selected=" + encodeURIComponent(selectedValue));
}

function generateEmail(name) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "generate-email.php?q=" + name, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Update the options in the third select tag
      document.getElementById("email").innerHTML = xhr.responseText;
    }
  };
  xhr.send("selected=" + encodeURIComponent(name));
}
