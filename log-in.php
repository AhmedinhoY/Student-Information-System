<?php
// username regular expression and session should be replaced and edited..
$lgERRmsg = "";
if (isset($_POST['sb'])) {
    session_start();
    //Include functions
    try {
        require('includes/connection.php');
        
        $lgUsername = test_input($_POST['username']);
        if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $lgUsername)) {
            $lgERRmsg = "Invalid username format, please enter a valid username (your academic ID number)";
        }
        $login_sql = "select * from studentInfo where studentID='$lgUername'";
        $lg_result = $db->query($login_sql);
        $db = null;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    if ($row = $lg_result->fetch()) {
        if (password_verify($_POST['ps'], $row[5])) {

            $_SESSION['activeUser'] = $lgUsername;
            $_SESSION['user_data'] = array(
                'studerntID' => $row['studentId'],
                'fullName' => $row['fullName'],
                'email' => $row['email']
            //     'user_type' => $row['user_type']
            );
        } 
      }

        } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <link rel="shortcut icon" href="img/UoB.png" />

      <title>University of Bahrain SIS</title>
      <meta charset="UTF-8">
      <meta http-equcomv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style.css">

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
      <div class="header-container">
            <div header class="header">
                  <img src="img/UoB.png" alt="University of Bahrain Logo">
                  <h5 class="logo">University of Bahrain SIS</h5>
            </div>

            <!-- <div class="icons">
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
            </div> -->
      </div>
      <!-- header section ends -->


      <div class="form" id="form">
            <div class="form-element" id="login-form">

                  <div class="form-header">
                        <h2>Log in</h2>
                        <!-- <button class="close-button" onclick="closeForm()">&times;</button> -->
                  </div>
                  <div class="form-body">
                        <form action="" method="post" id="log-in">
                              <span style="color:red">
                                    <?php echo $lgERRmsg; ?>
                              </span> <br />
                              <label>Username</label></br>
                              <input type="text" name="username" placeholder="Enter your username (Student ID)"><br />
                              <label>Password</label></br>
                              <input type="password" name="ps" placeholder="Enter your password"><br />
                              <button type="submit" name="sb" class="form-btn">Log in</button>
                              <!-- <p>Don't have account? <a onclick="hideLogin()">Register</a></p> -->

                        </form>
                  </div>
            </div>
      </div>

      <?php require('includes/footer.php'); ?>