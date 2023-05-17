<?php
require('includes/header.php');
require('includes/functions.php');
// username regular expression and session should be replaced and edited..
$lgERRmsg = "";
// student login
if (isset($_POST['stu-sb'])) {
      //Include functions
    try {
            require('includes/connection.php'); 

            $lg_stuUsername = test_input($_POST['stu-un']);
            $login_sql = "select * from studentInfo where studentID='$lg_stuUsername'";
            $lg_result = $db->query($login_sql);
            
            if (!preg_match("/^((201)\d)|((202)[0-4])\d\d\d\d\d$/", $lg_stuUsername)) {
                $lgERRmsg = "Invalid username format, please enter a valid username (your academic ID number)";
            } else {    
                  if ($row = $lg_result->fetch()) {
                      if (password_verify($_POST['stu-ps'], $row[5])) {
                  
                             $_SESSION['active_user'] = $row[0];
                             $_SESSION['student_data'] = array(
                              'student_ID' => $row['studentID'],
                              'full_name' => $row['fullName'],
                              'email' => $row['email']
                              );
                              header("Location: index.php");
                      } 
                      else {
                          $lgERRmsg= "*Wrong username or password";
                      }
                  }   
              
            }

        $db = null;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }


} 


//staff login
if (isset($_POST['sta-sb'])) {
      //Include functions
      try {
          require('includes/connection.php');
          
          $lg_staUsername = test_input($_POST['sta-username']);
          $login_sql = "select * from staff where email='$lg_staUsername'";
          $lg_result = $db->query($login_sql);

          if (!preg_match("/^(\w+)@uob.edu.bh$/", $lg_staUsername)) {
              $lgERRmsg = "Invalid username format, please enter a valid username";
          } else {       
            if ($row = $lg_result->fetch()) {
            if (password_verify($_POST['sta-ps'], $row[5])) {
    
                $_SESSION['active_user'] = $lg_staUsername;
                $_SESSION['staff_data'] = array(
                    'staff_ID' => $row[0],
                    'full_name' => $row[1],
                    'email' => $row['email']
                );
            } 
            header('Location: staff-index.php');
            } 
            else {
              $lgERRmsg= "*Wrong username or password";
            }
          }
          
          $db = null;
      } catch (PDOException $e) {
          die("Error: " . $e->getMessage());
      }


  
  } 

  
// admin login
if (isset($_POST['adm-sb'])) {
      //Include functions
      try {
          require('includes/connection.php');
          
          $lg_admUsername = test_input($_POST['adm-username']);
          $login_sql = "select * from admin where email='$lg_admUsername'";
          $lg_result = $db->query($login_sql);

          if (!preg_match("/^(\w+)@uob.edu.bh$/", $lg_admUsername)) {
              $lgERRmsg = "Invalid username format, please enter a valid username";
          }
          else {
            if ($row = $lg_result->fetch()) {
                  if (password_verify($_POST['adm-ps'], $row[5])) {
          
                      $_SESSION['active_user'] = $lg_admUsername;
                      $_SESSION['admin_data'] = array(
                          'admin_ID' => $row['adminId'],
                          'fullName' => $row['fullName'],
                          'email' => $row['email']
                      //     'user_type' => $row['user_type']
                      );
                      header('Location: admin-index.php');
                  } else {
                    $lgERRmsg= "*Wrong username or password";
                }
            }

          }
          
          
          $db = null;
      } catch (PDOException $e) {
          die("Error: " . $e->getMessage());
      }

} 
?>

<!DOCTYPE html>
<html lang="en" style="overflow-y:hidden;">

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

<body style="overflow-y:hidden;">
      <!-- header section starts -->
      <div class="header-container">
            <div header class="header">
                  <img src="img/UoB.png" alt="University of Bahrain Logo">
                  <h5 class="logo">University of Bahrain</h5>
            </div>
      </div>

      <!-- header section ends -->

      <div class="container" style="margin-left:0; max-width:100%; height:100vh;">
            <div class="form" id="login-form">
                  <div class="form-element" id="control-form-element">
                        <div class="log-in-control">
                              <div class="control-container">
                                    <h2 style="text-transform:uppercase;">welcome to the University of Bahrain</h2>
                                    <p>The road to excellence starts at UOB. Apply now to obtain a world class
                                          education.
                                    </p>
                                    <div class="button-container">
                                          <br /><a class="form-btn" onclick="studentLogin()">Login as a Student</a>
                                          <br /><a class="form-btn" onclick="staffLogin()">Login as a Staff</a>
                                          <br /><a class="form-btn" onclick="adminLogin()">Login as an Admin</a>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="seperator"></div>

                  <!-- student login form -->
                  <div class="form-element login-form-element login-form-element-active" id="student-login-form">

                        <div class="form-header">
                              <h2>Student Login</h2>
                        </div>
                        <div class="form-body">
                              <form action="" method="post" id="log-in">
                                    <span style="color:red; text-transform:lowercase; font-size:1.45rem">
                                          <?php echo $lgERRmsg; ?>
                                    </span> <br />
                                    <label>Username</label></br>
                                    <input type="text" name="stu-un"
                                          placeholder="Enter your username (Student ID)"><br />
                                    <label>Password</label></br>
                                    <input type="password" name="stu-ps" placeholder="Enter your password"><br />
                                    <button type="submit" name="stu-sb" class="form-btn">Log in</button>
                              </form>
                        </div>
                  </div>

                  <!-- staff login form -->
                  <div class="form-element login-form-element" id="staff-login-form">

                        <div class="form-header">
                              <h2>Staff Login</h2>
                        </div>
                        <div class="form-body">
                              <form action="" method="post" id="log-in">
                                    <span style="color:red; text-transform:lowercase; font-size:1.45rem">
                                          <?php echo $lgERRmsg; ?>
                                    </span> <br />
                                    <label>Username</label></br>
                                    <input type="text" name="sta-username" placeholder="Enter your username"><br />
                                    <label>Password</label></br>
                                    <input type="password" name="sta-ps" placeholder="Enter your password"><br />
                                    <button type="submit" name="sta-sb" class="form-btn">Log in</button>

                              </form>
                        </div>
                  </div>

                  <!-- admin login form -->
                  <div class="form-element login-form-element" id="admin-login-form">

                        <div class="form-header">
                              <h2>Admin Login</h2>
                        </div>
                        <div class="form-body">
                              <form action="" method="post" id="log-in">
                                    <span style="color:red; text-transform:lowercase; font-size:1.45rem">
                                          <?php echo $lgERRmsg; ?>
                                    </span> <br />
                                    <label>Username</label></br>
                                    <input type="text" name="adm-username" placeholder="Enter your username"><br />
                                    <label>Password</label></br>
                                    <input type="password" name="adm-ps" placeholder="Enter your password"><br />
                                    <button type="submit" name="adm-sb" class="form-btn">Log in</button>

                              </form>
                        </div>
                  </div>
            </div>
      </div>

      <!-- footer section starts -->
      <?php

?>
      <div class="footer" style="margin-left:0; position:fixed;">
            <div class="bottom-footer">
                  <p>Copyright © 2023, University of Bahrain | All rights reserved
                        <!-- </br>
                  This website is developed by Ahmed
                  Yusuf, Ahmed Alzakri,
                  , Ali Shaik Hussain, Hussain Barakat -->
                  </p>
            </div>
      </div>
      <!-- footer section ends -->


      <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
      <!-- custom js file link  -->
      <script src="js/script.js"></script>

</body>

</html>