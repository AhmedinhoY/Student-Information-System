<?php require('includes/student-header.php');?>
<?php require('includes/sidebar.php'); ?>
<?php

require('includes/student-sessions.php');

try {
      require('includes/connection.php');
      $sql_query= " select * from studentInfo where studentID = '$student_id' ";
      $rs= $db->query($sql_query);
      $row= $rs->fetch();

      $sections_query= "select courseTiming.courseID, staff.fullName, courseTiming.section, classroom.room,
      courseTiming.lecturesDay, courseTiming.lecturesTime, courseTiming.examDate, courseTiming.examTime
      FROM courseTiming 
        LEFT JOIN staff ON courseTiming.instructorID = staff.staffID 
        LEFT JOIN classroom ON courseTiming.classroomID = classroom.classroomID;";
      $sections_rs= $db->query($sections_query);



} catch (PDOException $e) {
  die("error: " . $e->getMessage());
}

?>

<div class="container">

      <div class="outer-div">
            <div class="inner-div">
                  <div class="div-header">
                        <h2>Course Registration</h2>
                        <!-- <button class="close-button" onclick="closeForm()">&times;</button> -->
                  </div>
                  <div class="divs-wrapper" style="display: flex; margin:auto;">
                        <div class="inner-inner-div" style="width: 30%; overflow-y: auto; margin-right:15px">

                              <form method="post" action="">

                                    <h2>Offered Courses</h2>

                                    <button class="form-btn2" onclick="showSections()"> ITCS489</button>
                                    <button class="form-btn2" onclick="showSections()"> ITCS333</button>
                                    <button class="form-btn2" onclick="showSections()"> ITCS321</button>

                        </div>
                        <div class="inner-inner-div" style="width: 40%; overflow-y: auto; margin-right:15px;">

                              <form method="post" action="">

                                    <h2>Sections</h2>
                                    <div class="sections" style="">
                                          <?php foreach ($sections_rs as $row) { ?>
                                          <button class="inner-inner-div"
                                                style="display: flex; flex-direction:column; margin: 15px 0; background: #efefef; box-shadow:none; ">
                                                <h2 style="margin-bottom:5px;">Section No. <?php echo $row[2]; ?></h2>
                                                <!-- <h3>Course Code: <?php echo $row[0]; ?></h3> -->
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left">
                                                      <span style="color:var(--blue);">Instructor: </span> </br>
                                                      <?php echo $row[1]; ?>
                                                </h3>
                                                <!-- <h3>Room: <?php echo $row[3]; ?></h3> -->
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left;">
                                                      <span style="color:var(--blue);">Lectures
                                                            Days: </span> </br>
                                                      <?php echo $row[4]; ?>
                                                </h3>
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left;">
                                                      <span style="color:var(--blue);">Lectures
                                                            Time: </span> </br>
                                                      <?php echo $row[5]; ?>
                                                </h3>
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left;">
                                                      <span style="color:var(--blue);"> Exam Time: </br> </span>
                                                      <?php echo $row[6].", ".$row[7]; ?>
                                                </h3>
                                          </button> <?php } ?>

                                    </div>
                        </div>
                        <div class="inner-inner-div" style="width: 30%; overflow-y: auto;">

                              <form method="post" action="">

                                    <h2>Section Details</h2>
                                    <div class="sections" style="">
                                          <button class="inner-inner-div"
                                                style="display: flex; flex-direction:column; margin: 15px 0; background: #efefef; box-shadow:none; ">
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left">
                                                      <span style="color:var(--blue);">Course Code: </span> </br>
                                                      <?php echo $row[0]; ?>
                                                </h3>
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left">
                                                      <span style="color:var(--blue);">Section: </span> </br>
                                                      <?php echo $row[2]; ?>
                                                </h3>
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left">
                                                      <span style="color:var(--blue);">Available Seats: </span> </br>
                                                      40
                                                </h3>
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left">
                                                      <span style="color:var(--blue);">Instructor: </span> </br>
                                                      <?php echo $row[1]; ?>
                                                </h3>

                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left;">
                                                      <span style="color:var(--blue);">Room: </span> </br>
                                                      <?php echo $row[3]; ?>
                                                </h3>
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left;">
                                                      <span style="color:var(--blue);">Lectures
                                                            Days: </span> </br>
                                                      <?php echo $row[4]; ?>
                                                </h3>
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left;">
                                                      <span style="color:var(--blue);">Lectures
                                                            Time: </span> </br>
                                                      <?php echo $row[5]; ?>
                                                </h3>
                                                <h3 style="margin-bottom:3px; font-weight:400; text-align:left;">
                                                      <span style="color:var(--blue);"> Exam Time: </br> </span>
                                                      <?php echo $row[6].", ".$row[7]; ?>
                                                </h3>
                                                <button class="form-btn2">Add Seat</button>
                                          </button>

                                    </div>
                        </div>

                  </div>

            </div>




      </div>

      </form>
</div>
</div>
</div>



<!-- <br>



                            <label for="section">section: </label>
                            <select name="section" id="section">
                                  <option value="section 01">section 01</option>
                                  <option value="section 02">section 02</option>
                                  <option value="section 03">section 03</option>
                            </select>
                            <br>


                            <div class="section-details">

                                  <table>
                                        <tr>
                                              <th>Slot</th>
                                              <th>Section</th>
                                              <th>Instructor</th>
                                              <th>Exam Time</th>
                                              <th>Room</th>
                                        </tr>

                                        <tr>
                                              <td>[Days: U,T,H]-- [Time: 9:00 - 9:30 ,14:00 -15:40]</td>
                                              <td>1</td>
                                              <td>Dr. Taher</td>
                                              <td>2023-01-07 11:30 - 13:30</td>
                                              <td>S40-1001</td>
                                        </tr>


                                  </table> 
                  <div class="box2">
                        <button type="submit" name="rs">Register</button>
                        <button type="submit" name="cancel">cancel</button>
                  </div> -->
</div>
<!--add-newCourse-->
</div>
<!--end of stu-registeration-->

<!-- 
                  <div class="registeredCourses">

                        <form method="post" action="">

                              <div class="box1">
                                    <p>20197180</p>
                                    <p>ALI SHAIKH HUSAIN</p>
                                    <p>B.Sc. in Computer Science - 2016</p>
                                    <p>Academic Status: Excellence</p>
                                    <p>Academic Load: (12.0 CH To 21.0 CH)</p>
                                    <p>Remain CH: 109.00</p>
                                    <p>Registered CH: 5.0</p>
                              </div>

                              <div class="box2">
                                    <table>
                                          <tr>
                                                <th>Course Code</th>
                                                <th>Section</th>
                                                <th>Course Title</th>
                                                <th>CH</th>
                                                <th>Slot</th>
                                                <th>Rooms</th>
                                                <th>Instructor</th>
                                                <th>Fees</th>
                                                <th>Paid</th>
                                                <th> </th>
                                                <th> </th>
                                          </tr>

                                          <tr>
                                                <td>ITCS 489</td>
                                                <td>01</td>
                                                <td>SOFTWARE ENGINEERING 2</td>
                                                <td>3.0</td>
                                                <td>[Days: U,T,H]-- [Time: 9:00 - 9:30 ,14:00 -15:40]</td>
                                                <td> S40 - 1067</td>
                                                <td>Dr.Taher</td>
                                                <td>24.00</td>
                                                <td style="color:red;">No</td>
                                                <td> <button type='submit' name='replace'> <i
                                                                  class="fa-solid fa-arrows-spin"></i>
                                                      </button> </td>
                                                <td> <button type='submit' name='delete'> <i
                                                                  class="fa-solid fa-trash"></i>
                                                      </button> </td>
                                          </tr>
                                    </table>
                              </div>

                              <div class="box3">
                                    <button type='submit' name='pay'> Pay </button>
                              </div>
                        </form>

                  </div> -->
</div>
</div>





</div>
<!--end of container-->
<?php require('includes/footer.php'); ?>