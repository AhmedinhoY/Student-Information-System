<?php
require('includes/functions.php');
require('user-profile.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <link rel="shortcut icon" href="img/UoB.png" />

      <title>University of Bahrain</title>
      <meta charset="UTF-8">
      <meta http-equcomv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- Boxicons cdn link -->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

      <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/style1.css">



      <!-- bootstrap -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
      </script>
</head>

<body>
      <!-- header section starts -->
      <header class="header-container">
            <div header class="header">
                  <img src="img/UoB.png" alt="University of Bahrain Logo">
                  <h5 class="logo">University of Bahrain SIS</h5>
            </div>

            <div class="icons">
                  <button style="background:none;">
                        <a href="index.php">
                              <div class="fa fa-home fa-lg" id="home-btn" style="color: white;">
                              </div>
                        </a>
                  </button>
                  <button style="background:none;">
                        <div class="fa fa-sign-out fa-lg" id="sign-out-btn" style="color: white;"></div>
                  </button>
                  <button style="background:none;" onclick="openForm()">
                        <div class="fa fa-user fa-lg" data-form-target="#form" id="user-btn" style="color: white;">
                        </div>
                  </button>
            </div>
      </header>

      <div class="sidebar">
            <!-- <li class="search-box">
                  <i class='fa fa-search icon'></i>
                  <input type="text" placeholder="Search...">
            </li> -->
            <ul class="nav-links">
                  <li>
                        <a href="index.php">
                              <i class='fa fa-th-large icon'></i>
                              <span class="link_name">Dashboard</span>
                        </a>
                  </li>
                  <li class=" " id="submenu-1">
                        <div class="iocn-link" onclick="toggleMenu1()">
                              <a href="#">
                                    <i class='fa fa-eye icon'></i>
                                    <span class="link_name">Viewing</span>
                              </a>
                              <i class="fa fa-angle-right arrow" aria-hidden="true"></i>
                        </div>
                        <ul class="sub-menu">
                              <li><a href="#">Academic Plan</a></li>
                              <li><a href="#">Contact Details</a></li>
                        </ul>
                  </li>
                  <li class=" " id="submenu-2">
                        <div class="iocn-link" onclick="toggleMenu2()">
                              <a href="#">
                                    <i class='fa fa-graduation-cap icon'></i>
                                    <span class="link_name">Academic Affairs</span>
                              </a>
                              <i class="fa fa-angle-right arrow" aria-hidden="true"></i>
                        </div>
                        <ul class="sub-menu">
                              <li><a href="#">Course Attendence</a></li>
                              <li><a href="#">Course Registration</a></li>
                        </ul>
                  </li>
                  <li class=" " id="submenu-3">
                        <div class="iocn-link" onclick="toggleMenu3()">
                              <a href="#">
                                    <i class="bx bx-laptop"></i>
                                    <span class="link_name">My E-services</span>
                              </a>
                              <i class="fa fa-angle-right arrow" aria-hidden="true"></i>
                        </div>
                        <ul class="sub-menu">
                              <li><a href="gpa-simulator.php">Course Evaluation</a></li>
                              <li><a href="gpa-simulator.php">GPA Simulator</a></li>
                              <li><a href="gpa-calculator.php">GPA Calculator</a></li>
                        </ul>
                  </li>
                  <li class=" " id="submenu-4">
                        <div class="iocn-link" onclick="toggleMenu4()">

                              <a href="#">
                                    <i class='fa fa-hand-pointer-o icon'></i>
                                    <span class="link_name">My Requests</span>
                              </a>
                              <i class="fa fa-angle-right arrow" aria-hidden="true"></i>
                        </div>
                        <ul class="sub-menu">
                              <li><a href="#">Course Withdrawal</a></li>
                              <li><a href="#">Official Withdrawal</a></li>
                        </ul>
                  </li>
                  <li class=" " id="submenu-5">
                        <div class="iocn-link" onclick="toggleMenu5()">
                              <a href="#">
                                    <i class='fa fa-file-text icon'></i>
                                    <span class="link_name">Reports</span>
                              </a>
                              <i class="fa fa-angle-right arrow" aria-hidden="true"></i>
                        </div>
                        <ul class="sub-menu">
                              <li><a href="#">Course Schecule</a></li>
                              <li><a href="#">Academic Transcript</a></li>
                        </ul>
                  </li>
            </ul>
      </div>

      <!-- header section ends -->