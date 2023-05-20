<?php
require('includes/student-header.php'); 
require('includes/sidebar.php');
require('includes/student-sessions.php');

try {
      require('includes/connection.php');
      //query to find student's information
      $sql_query= " select `studentInfo`.`studentID`, `college`.`collegeName`, `major`.`majorName`, `staff`.`fullName`, `studentInfo`.`passedCH`, `studentInfo`.`enrollmentStatus`, `studentInfo`.`academicStatus`, `studentInfo`.`CGPA`, `studentInfo`.`MCGPA`
      FROM `studentInfo` 
      LEFT JOIN `college` ON `studentInfo`.`collegeID` = `college`.`collegeID` 
      LEFT JOIN `major` ON `major`.`collegeID` = `college`.`collegeID` 
      LEFT JOIN `staff` ON `studentInfo`.`advisorID` = `staff`.`staffID`
      WHERE studentID = '$student_id' ";
      $rs= $db->query($sql_query);
      $row= $rs->fetch();

      // query to find registered CH
      $registeredCH_sql_query="select SUM(`course`.`credits`)
      FROM `studentClassroom` 
      LEFT JOIN `course` ON `studentClassroom`.`courseID` = `course`.`courseID`
      WHERE studentClassroom.studentID='$student_id' AND studentClassroom.year=2023 AND studentClassroom.semester=2";
      $rigstered_rs= $db->query($registeredCH_sql_query);
      $row_1= $rigstered_rs->fetch();

      //query to find attendance %
      $student_attendance_query_uth= "select studentClassroom.courseID,
      100-((SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END)+SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END))/48)*100 'absence %'
      FROM studentClassroom 
            LEFT JOIN course ON studentClassroom.courseID = course.courseID 
            LEFT JOIN courseAttendance ON courseAttendance.courseID = course.courseID
            LEFT JOIN `courseTiming` ON `courseTiming`.`courseID` = `course`.`courseID`
      WHERE studentClassroom.studentID = '$student_id' AND courseTiming.lecturesDay= 'uth' AND studentClassroom.year = 2023 AND studentClassroom.semester = 2";

      $student_attendence_uth_rs= $db->query($student_attendance_query_uth);

      $student_attendance_query_mw= "select studentClassroom.courseID, 
      100-((SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END)+SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END))/32)*100 'absence %'
      FROM studentClassroom 
            LEFT JOIN course ON studentClassroom.courseID = course.courseID 
            LEFT JOIN courseAttendance ON courseAttendance.courseID = course.courseID
            LEFT JOIN `courseTiming` ON `courseTiming`.`courseID` = `course`.`courseID`
      WHERE studentClassroom.studentID = '$student_id' AND courseTiming.lecturesDay= 'mw' AND studentClassroom.year = 2023 AND studentClassroom.semester = 2";

      $student_attendence_mw_rs= $db->query($student_attendance_query_mw);






}catch (PDOException $e){
      die("error: " . $e->getMessage());
}

?>

<div class="container">
      <div class="row">
            <!-- ----= Done by: Ahmed Yusuf =---- -->
            <div class="dashboard-container col-12" style="">
                  <h2>Welcome, <span style="text-transform: uppercase;"><?php 
                        echo $full_name; ?></span>
                  </h2>
                  <div class="dashboard-text-container">

                        <div class="dashboard-text">
                              <h3>Student ID:</h3> <?php 
                        echo $row['studentID']; ?>
                        </div>
                        <div class="dashboard-text">
                              <h3>College:</h3> <?php 
                        echo $row['collegeName']; ?>
                        </div>
                        <div class="dashboard-text">
                              <h3>Major:</h3> <?php 
                        echo $row['majorName']; ?>
                        </div>
                        <div class="dashboard-text">
                              <h3>Advisor:</h3> Dr.Ali Hassan Al-Safar
                        </div>
                        <div class="dashboard-text">
                              <h3>Registered CH:</h3> <?php 
                        echo $row_1[0]; ?>
                        </div>
                        <div class="dashboard-text">
                              <h3>Passed CH:</h3> <?php 
                        echo $row['passedCH']; ?>
                        </div>

                        <div class="dashboard-text">
                              <h3>Enrollment Status:</h3> <?php 
                        echo $row['enrollmentStatus']; ?>
                        </div>
                        <div class="dashboard-text">
                              <h3>Academic Status:</h3> <?php 
                        echo $row['academicStatus']; ?>
                        </div>
                        <div class="dashboard-text">
                              <h3>CGPA:</h3> <?php 
                        echo $row['CGPA']; ?>
                        </div>
                        <div class="dashboard-text">
                              <h3>MCGPA:</h3> <?php 
                        echo $row['MCGPA']; ?>
                        </div>
                  </div>
            </div>
      </div>
      <div class="row ">

            <div class="dashboard-container " style="width:68%; height: 30vh; margin-right:10px;">
                  <h2>Today's TimeTable</h2>

            </div>
            <div class="dashboard-container " style="width:30%; height: 30vh;">
                  <h2>Upcoming Events</h2>

            </div>
      </div>
      <div class="row">
            <!-- ----= Done by: Ahmed Yusuf =---- -->
            <div class="dashboard-container " style="width:100%; margin-right:10px;">
                  <h2>Attendence</h2>

                  <div class="circule-container-wrapper">

                        <?php foreach ($student_attendence_uth_rs as $row_2) { ?>
                        <div class="cirule-container">
                              <div class="circular-progress"
                                    style="  background: conic-gradient(var(--blue), calc(360deg * 0.<?php echo round($row_2[1]) ?>), #ededed 0deg);">
                                    <span class="progress-value"><?php echo round($row_2[1],1) ?>%</span>
                              </div>
                              <span class="circule-text">
                                    <h3><?php echo $row_2[0] ?></h3>
                              </span>
                        </div>
                        <?php } ?>
                        <?php foreach ($student_attendence_mw_rs as $row_3) { ?>
                        <div class="cirule-container">
                              <div class="circular-progress"
                                    style="  background: conic-gradient(var(--blue), calc(360deg * 0.<?php echo round($row_3[1]) ?>), #ededed 0deg);">
                                    >
                                    <span class="progress-value"><?php echo round($row_3[1],1) ?>%</span>
                              </div>
                              <span class="circule-text">
                                    <h3><?php echo $row_3[0] ?></h3>
                              </span>
                        </div>
                        <?php } ?>

                  </div>

            </div>
      </div>

</div>
<?php require('includes/footer.php'); ?>