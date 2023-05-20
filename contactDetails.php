<?php

  require('includes/header.php');
  require('includes/sidebar.php');
  require('includes/student-sessions.php');


try {
      require('includes/connection.php');
      $sql_query= " select * from studentInfo where studentID = '$student_id' ";
      $rs= $db->query($sql_query);
      $row= $rs->fetch();

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}


?>


<!--the Eric Meyer's Reset sheet-->
<!-- <link rel="stylesheet" href="styles/css-reset.css"> -->
<!-- <link rel="stylesheet" href="CSS/style.css"> -->
<!-- <link rel="stylesheet" href="CSS/contactDetails.css"> -->


<!--font Awesome-->
<!-- <script src="https://kit.fontawesome.com/58aa1d359e.js" crossorigin="anonymous"></script>  -->




<div class="container">

      <div class="outer-div">
            <div class="inner-div">
                  <!-- <div class="div-header">
                        <h2>Contact Details</h2>
                  </div> -->
                  <div class="inner-inner-div">
                        <h2 style="text-transform: uppercase;"><?php echo $row['fullName']; ?></h2>
                        <p style="">Student ID: <?php echo $row['studentID']; ?></p>
                        <p style="margin-top:-0.4rem "><?php echo $row['major']; ?></p>
                        <div class="dashboard-text-container">

                              <div class="dashboard-text">
                                    <h3>Enrollment Status:</h3> <?php echo $row['enrollmentStatus']; ?>
                              </div>
                              <div class="dashboard-text">
                                    <h3>Academic Status:</h3> <?php echo $row['academicStatus']; ?>
                              </div>
                              <div class="dashboard-text">
                                    <h3>CGPA:</h3> <?php echo $row['CGPA']; ?>
                              </div>
                              <div class="dashboard-text">
                                    <h3>MCGPA:</h3> <?php echo $row['MCGPA']; ?>
                              </div>
                              <div class="dashboard-text">
                                    <h3>Passed CH:</h3> <?php echo $row['passedCH']; ?>
                              </div>
                              <div class="dashboard-text">
                                    <h3>Remaining CH:</h3> 57.00 (43.2%)
                              </div>
                        </div>
                  </div>
            </div>

            <div class="inner-div">
                  <div class="div-header">
                        <h2>Student Details</h2>
                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div">

                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col" style="width:7%">Block</th>
                                                <th scope="col" style="width:7%">Road</th>
                                                <th scope="col" style="width:7%">Buliding</th>
                                                <th scope="col" style="width:7%">Flat</th>
                                                <th scope="col" style="width:24%">Mobile Number</th>
                                                <th scope="col" style="width:24%">Emergency Mobile number</th>
                                                <th scope="col" style="width:24%">Email</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                                <td> 603 </td>
                                                <td> 341 </td>
                                                <td> 2329 </td>
                                                <td> -- </td>
                                                <td>33992900</td>
                                                <td>39338895</td>
                                                <td>alis3348s@gmail.com</td>
                                          </tr>
                                    </tbody>

                              </table>
                        </div>
                  </div>
                  <div class="Edit-btn" style="display:flex;">
                        <button class="form-btn2" onclick="TableDisplay()"
                              style="width:calc(100%/3.1); margin: 5px;">Edit</button>
                        <button class="form-btn2 hide-btn" id="hide-btn" onclick="TableHide()"
                              style="width:calc(100%/3.1); margin: 5px;">Hide</button>
                        <button onclick="editRow()" class="form-btn2 hide-btn" id="update-btn"
                              style="width:calc(100%/3.1); margin: 5px;">Update</button>
                  </div>

                  <div class="form-body">
                        <form>
                              <!-- <div class="update-container">
                                <div class="bb1">
                                      <p>Block: </p> <input type="text" name='block' id='block'>
                                </div>
                                <div class="bb1">
                                      <p>Road: </p> <input type="text" name='Road' id='Road'>
                                </div>
                                <div class="bb1">
                                      <p>Building: </p> <input type="text" name='Building' id='Building'>
                                </div>
                                <div class="bb1">
                                      <p>Flat: </p> <input type="text" name='Flat' id='Flat'>
                                </div>
                                <div class="bb1">
                                      <p>Mobile Phone: </p> <input type="text" name='Mobile' id='Mobile'>
                                </div>
                                <div class="bb1">
                                      <p>Email: </p> <input type="text" name='Email' id='Email'>
                                </div>
                                <div class="bb1">
                                      <p>Emergency Mobile #: </p> <input type="text" name='Emergency' id='Emergency'>
                                </div>
  
  
                                <div class="Edit-btn">
  
                                </div>
  
                          </div> -->
                              <div class="div-body hide-btn" id="update-container">
                                    <div class="inner-inner-div" style="margin: 10px 0">
                                          <table class="table" id="">
                                                <thead>
                                                      <tr>
                                                            <th scope="col" style="width:7%;">Block</th>
                                                            <th scope="col" style="width:7%;">Road</th>
                                                            <th scope="col" style="width:7%;">Buliding</th>
                                                            <th scope="col" style="width:7%;">Flat</th>
                                                            <th scope="col" style="width:24%; white-space:nowrap;">
                                                                  Mobile
                                                                  Number
                                                            </th>
                                                            <th scope="col" style="width:24%; white-space:nowrap;">
                                                                  Emergency Mobile
                                                                  number</th>
                                                            <th scope="col" style="width:24%;">Email</th>
                                                      </tr>

                                                </thead>
                                                <tbody>
                                                      <tr>
                                                            <td><input type="text" name="" class="table-input"></td>
                                                            <td><input type="text" name="" class="table-input"></td>
                                                            <td><input type="text" name="" class="table-input"></td>
                                                            <td><input type="text" name="" class="table-input">
                                                            </td> </br>
                                                            <td><input type="text" name="" class="table-input">
                                                            </td>
                                                            <td><input type="text" name="" class="table-input">
                                                            </td>
                                                            <td><input type="text" name="" class="table-input">
                                                            </td>

                                                      </tr>
                                                </tbody>
                                          </table>
                                    </div>
                              </div>


                        </form>
                  </div>

            </div>
      </div>

</div>



<!--end of the bottom part in box2-->

<!-- end of contact-info it makes controll what is in the container and separate things away from the container -->

<!-- end of container -->


<!-- <script src="Js/contactDetails.js"> </script> -->

<?php

  require 'includes/footer.php';

?>