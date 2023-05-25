<?php
session_start();

if (!isset($_SESSION['active_user'])) {
      header('Location: ../log-in.php');
}

if(isset($_POST['log-out'])){
      session_unset();
      session_destroy();
      header("Location: ../log-in.php");
}


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
      <link rel="stylesheet" href="CSS/style.css">
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

      <!-- jquery -->
      <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
      <!-- header section starts -->
      <header class="header-container">
            <!-- ----= Done by: Ahmed Yusuf =---- -->

            <div header class="header">
                  <img src="img/UoB.png" alt="University of Bahrain Logo">
                  <h5 class="logo">University of Bahrain</h5>
            </div>

            <div class="icons">
                  <button class="button" style="background:none;">
                        <a href="index.php">
                              <div class="fa fa-home fa-lg" id="home-btn" style="color: white;">
                              </div>
                        </a>
                  </button>
                  <form method="post">
                        <button class="button" style="background:none;" type="submit" name="log-out">
                              <div class="fa fa-sign-out fa-lg" id="sign-out-btn" style="color: white;"></div>
                        </button>
                  </form>
                  <button class="button" style="background:none;" onclick="openForm()">
                        <div class="fa fa-user fa-lg" data-form-target="#form" id="user-btn" style="color: white;">
                        </div>
                  </button>
            </div>
      </header>



      <!-- header section ends -->