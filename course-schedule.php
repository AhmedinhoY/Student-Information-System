<?php require('includes/student-header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<?php 

require('includes/student-sessions.php');


try {
      require('includes/connection.php');
      $sql_query= " select `studentInfo`.`studentID`, `college`.`collegeName`, `major`.`majorName`, `staff`.`fullName`, `studentInfo`.`passedCH`, `studentInfo`.`enrollmentStatus`, `studentInfo`.`academicStatus`, `studentInfo`.`CGPA`, `studentInfo`.`MCGPA`
      FROM `studentInfo` 
      LEFT JOIN `college` ON `studentInfo`.`collegeID` = `college`.`collegeID` 
      LEFT JOIN `major` ON `major`.`collegeID` = `college`.`collegeID` 
      LEFT JOIN `staff` ON `studentInfo`.`advisorID` = `staff`.`staffID`
      WHERE studentID = '$student_id' ";
      $rs= $db->query($sql_query);
      $row= $rs->fetch();

      $schedule_query= " select `studentClassroom`.`courseID`, `studentClassroom`.`section`, `staff`.`fullName`, `courseTiming`.`lecturesDay`, `courseTiming`.`lecturesTime`, `classroom`.`room`, `course`.`credits`, `courseTiming`.`examDate`, `courseTiming`.`examTime`, `courseTiming`.`examPlace`
      FROM `studentClassroom` 
            LEFT JOIN `staff` ON `studentClassroom`.`instructorID` = `staff`.`staffID` 
            LEFT JOIN `courseTiming` ON `courseTiming`.`instructorID` = `staff`.`staffID` AND courseTiming.section = studentClassroom.section
            LEFT JOIN `classroom` ON `courseTiming`.`classroomID` = `classroom`.`classroomID` 
            LEFT JOIN `course` ON `courseTiming`.`courseID` = `course`.`courseID`
      WHERE studentClassroom.studentID= '$student_id' AND studentClassroom.year= 2023 AND studentClassroom.semester=2";

      $schedule_rs= $db->query($schedule_query);

      // query to find registered CH
      $registeredCH_sql_query="select SUM(`course`.`credits`)
      FROM `studentClassroom` 
      LEFT JOIN `course` ON `studentClassroom`.`courseID` = `course`.`courseID`
      WHERE studentClassroom.studentID='$student_id' AND studentClassroom.year=2023 AND studentClassroom.semester=2";
      $rigstered_rs= $db->query($registeredCH_sql_query);
      $row_1= $rigstered_rs->fetch();

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
                        <h2 style="text-transform: uppercase;"><?php echo $full_name; ?></h2>
                        <p style="">Student ID: <?php echo $row['studentID']; ?></p>
                        <p style="margin-top:-0.4rem "><?php echo $row['majorName']; ?></p>
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
                                    <h3>Registered CH:</h3> <?php echo $row_1[0]; ?>
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
                                                <td><?php echo $schedule_row[7]. "<br/>". $schedule_row[8]; ?></td>
                                                <td><?php echo $schedule_row[9]; ?></td>
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