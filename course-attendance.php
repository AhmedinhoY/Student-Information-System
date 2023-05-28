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
      $sql_query= " select `studentInfo`.`studentID`, `studentInfo`.`fullName`, `major`.`majorName`
      FROM `studentInfo` 
            LEFT JOIN `major` ON `studentInfo`.`majorID` = `major`.`majorID`
      WHERE studentID = '$student_id' ";
      $rs= $db->query($sql_query);
      $row= $rs->fetch();

      $student_attendance_query_uth= "select
      studentClassroom.courseID,
      SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END) AS absent_times,
      SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END) AS excused_absent_times,
      SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END) + SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END) AS total_absent,
      ((SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END) + SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END)) / 48) * 100 AS `absence %`
    FROM
      studentClassroom
      LEFT JOIN course ON studentClassroom.courseID = course.courseID
      LEFT JOIN courseAttendance ON courseAttendance.courseID = course.courseID
      LEFT JOIN `courseTiming` ON `courseTiming`.`courseID` = `course`.`courseID`
    WHERE
      studentClassroom.studentID = '$student_id'
      AND courseTiming.lecturesDay = 'UTH'
      AND studentClassroom.year = 2023
      AND studentClassroom.semester = 2
    GROUP BY
      studentClassroom.courseID, course.courseName";

      $student_attendence_uth_rs= $db->query($student_attendance_query_uth);

      $student_attendance_query_mw= "select
      studentClassroom.courseID,
      SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END) AS absent_times,
      SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END) AS excused_absent_times,
      SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END) + SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END) AS total_absent,
      ((SUM(CASE STATUS WHEN 'absent' THEN 1 ELSE 0 END) + SUM(CASE STATUS WHEN 'absent with excuse' THEN 1 ELSE 0 END)) / 32) * 100 AS `absence %`
    FROM
      studentClassroom
      LEFT JOIN course ON studentClassroom.courseID = course.courseID
      LEFT JOIN courseAttendance ON courseAttendance.courseID = course.courseID
      LEFT JOIN `courseTiming` ON `courseTiming`.`courseID` = `course`.`courseID`
    WHERE
      studentClassroom.studentID = '$student_id'
      AND courseTiming.lecturesDay = 'MW'
      AND studentClassroom.year = 2023
      AND studentClassroom.semester = 2
    GROUP BY
      studentClassroom.courseID, course.courseName";
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
                        <h2 style="text-transform: uppercase;"><?php echo $row[1]?></h2>
                        <p style="">Student ID: <?php echo $row[0]?></p>
                        <p style="margin-top:-0.4rem "> <?php echo $row[2]?></p>
                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div">
                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col">Course Code</th>
                                                <!-- <th scope="col">Presence Count</th> -->
                                                <th scope="col">Absence No.</th>
                                                <th scope="col">Absence With Excuse No.</th>
                                                <th scope="col">Absence Times</th>
                                                <th scope="col">Absence %</th>
                                                <!-- <th scope="col">Warning No.</th> -->
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($student_attendence_uth_rs as $row1) { ?>
                                          <tr>
                                                <td><?php echo $row1[0] ?></td>
                                                <td><?php echo $row1[1] ?></td>
                                                <td><?php echo $row1[2] ?></td>
                                                <td><?php echo $row1[3] ?></td>
                                                <td><?php echo round($row1[4],1). "%" ?></td>
                                                <!-- <td>1.5%</td>
                                                <td>0%</td>
                                                <td>2</td> -->
                                                <!-- <td>0</td> -->
                                          </tr>
                                          <?php
                                          } ?>

                                          <?php foreach ($student_attendence_mw_rs as $row2) { ?>
                                          <tr>
                                                <td><?php echo $row2[0] ?></td>
                                                <td><?php echo $row2[1] ?></td>
                                                <td><?php echo $row2[2] ?></td>
                                                <td><?php echo $row2[3] ?></td>
                                                <td><?php echo round($row2[4],1). "%" ?></td>
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