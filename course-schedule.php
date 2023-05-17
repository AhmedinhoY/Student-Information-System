<?php require('includes/header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<?php 

$active_user= $_SESSION['active_user'];
$student_id= $_SESSION['student_data']['student_ID'];
$full_name= $_SESSION['student_data']['full_name'];
$email= $_SESSION['student_data']['email'];

try {
      require('includes/connection.php');
      $sql_query= " select * from studentInfo where studentID = '$student_id' ";
      $rs= $db->query($sql_query);
      $row= $rs->fetch();

      $schedule_query= " SELECT studentClassroom.courseID, courseTiming.section, staff.fullName, courseTiming.lecturesDay,
      courseTiming.lecturesTime, classroom.campus, classroom.section, course.credits, 
      courseTiming.examDate, courseTiming.examTime, courseTiming.examPlace
      FROM studentClassroom
      LEFT JOIN staff ON studentClassroom.instructorID = staff.staffID
      LEFT JOIN courseTiming ON courseTiming.instructorID = staff.staffID
      LEFT JOIN classroom ON courseTiming.classroomID = classroom.classroomID
      LEFT JOIN course ON courseTiming.courseID = course.courseID
      WHERE studentClassroom.studentID= '$student_id' ";

      $schedule_rs= $db->query("$schedule_query");

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}

?>

<div class="container">
      <!-- ----= Done by: Ahmed Yusuf =---- -->
      <div class="outer-div">
            <div class="inner-div">
                  <div class="div-header">
                        <h2>Course Schedule</h2>
                  </div>
                  <div class="inner-inner-div">
                        <h2 style="text-transform: uppercase;"><?php echo $row['fullName']; ?></h2>
                        <p style="">Student ID: <?php echo $row['studentID']; ?></p>
                        <p style="margin-top:-0.4rem "><?php echo $row['major']; ?></p>
                        <div class="dashboard-text-container">
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
                                    <h3>Registered CH:</h3> not calculated yet
                              </div>
                        </div>
                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div">
                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col">Course Code</th>
                                                <th scope="col">instructor</th>
                                                <th scope="col">Day</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Campus</th>
                                                <th scope="col">Room</th>
                                                <th scope="col">CH</th>
                                                <th scope="col">Exam Date</th>
                                                <th scope="col">Exam Place</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                          foreach ($schedule_rs as $schedule_row) { ?>
                                          <tr>
                                                <td><?php echo $schedule_row[0]. "-" . $schedule_row[1]; ?></td>
                                                <td><?php echo $schedule_row[2]; ?></td>
                                                <td><?php echo $schedule_row[3]; ?></td>
                                                <td><?php echo $schedule_row[4]; ?></td>
                                                <td><?php echo $schedule_row[5]; ?></td>
                                                <td><?php echo $schedule_row[6]; ?></td>
                                                <td><?php echo $schedule_row[7]; ?></td>
                                                <td><?php echo $schedule_row[8]. "<br/>". $schedule_row[9]; ?></td>
                                                <td><?php echo $schedule_row[10]; ?></td>
                                          </tr>
                                          <?php } ?>

                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>

</div>
<?php require('includes/footer.php'); ?>