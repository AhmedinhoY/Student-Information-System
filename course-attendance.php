<?php require('includes/student-header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<?php require('includes/student-sessions.php'); ?>
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

      $student_attendance_query_uth= "select studentClassroom.courseID, course.courseName,
      SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END) 'absent_times' , 
      SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END) 'excused_absent_times' , 
      SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END)+SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END) 'total absent',
      ((SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END)+SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END))/48)*100 'absence %'
      FROM studentClassroom 
            LEFT JOIN course ON studentClassroom.courseID = course.courseID 
            LEFT JOIN courseAttendance ON courseAttendance.courseID = course.courseID
            LEFT JOIN `courseTiming` ON `courseTiming`.`courseID` = `course`.`courseID`
      WHERE studentClassroom.studentID = '$student_id' AND courseTiming.lecturesDay= 'uth' AND studentClassroom.year = 2023 AND studentClassroom.semester = 2";

      $student_attendence_uth_rs= $db->query($student_attendance_query_uth);

      $student_attendance_query_mw= "select studentClassroom.courseID, course.courseName,
      SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END) 'absent_times' , 
      SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END) 'excused_absent_times' , 
      SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END)+SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END) 'total absent',
      ((SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END)+SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END))/32)*100 'absence %'
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
<!-- SELECT studentClassroom.courseID, course.courseName
FROM studentClassroom 
	LEFT JOIN course ON studentClassroom.courseID = course.courseID
WHERE studentClassroom.studentID = 202003838 AND studentClassroom.year = 2023 AND studentClassroom.semester = 2; -->
<div class="container">
      <!-- ----= Done by: Ahmed Yusuf =---- -->
      <div class="outer-div">
            <div class="inner-div">
                  <div class="div-header">
                        <h2>Course Attendance</h2>
                  </div>
                  <div class="inner-inner-div">
                        <h2 style="text-transform: uppercase;">Ahmed Yusuf Ahmed Saleh</h2>
                        <p style="">Student ID: 202003838</p>
                        <p style="margin-top:-0.4rem ">B.Sc. in Computer Science</p>
                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div">
                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col">Course Code</th>
                                                <th scope="col">Course Name</th>
                                                <!-- <th scope="col">Presence Count</th> -->
                                                <th scope="col">Absence No.</th>
                                                <th scope="col">Absence With Excuse No.</th>
                                                <th scope="col">Absence Times</th>
                                                <th scope="col">Absence %</th>
                                                <!-- <th scope="col">Warning No.</th> -->
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($student_attendence_uth_rs as $row) { ?>
                                          <tr>
                                                <td><?php echo $row[0] ?></td>
                                                <td><?php echo $row[1] ?></td>
                                                <td><?php echo $row[2] ?></td>
                                                <td><?php echo $row[3] ?></td>
                                                <td><?php echo $row[4] ?></td>
                                                <td><?php echo round($row[5],1). "%" ?></td>
                                                <!-- <td>1.5%</td>
                                                <td>0%</td>
                                                <td>2</td> -->
                                                <!-- <td>0</td> -->
                                          </tr>
                                          <?php
                                          } ?>
                                          <?php foreach ($student_attendence_mw_rs as $row) { ?>
                                          <tr>
                                                <td><?php echo $row[0] ?></td>
                                                <td><?php echo $row[1] ?></td>
                                                <td><?php echo $row[2] ?></td>
                                                <td><?php echo $row[3] ?></td>
                                                <td><?php echo $row[4] ?></td>
                                                <td><?php echo round($row[5],1). "%" ?></td>
                                                <!-- <td>1.5%</td>
                                                <td>0%</td>
                                                <td>2</td> -->
                                                <!-- <td>0</td> -->
                                          </tr>
                                          <?php }
                                          ?>

                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>

</div>
<?php require('includes/footer.php'); ?>