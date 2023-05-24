<?php
try {
      require('includes/connection.php');
      if (isset($_POST['selected'])) {

      $selected_course= $_POST['selected'];
      $selected_section= $_POST['courseID']; 

      $sections_query= "select courseTiming.courseID, staff.fullName, courseTiming.section, classroom.room,
      courseTiming.lecturesDay, courseTiming.lecturesTime, courseTiming.examDate, courseTiming.examTime
      FROM courseTiming 
            LEFT JOIN staff ON courseTiming.instructorID = staff.staffID 
            LEFT JOIN classroom ON courseTiming.classroomID = classroom.classroomID
      WHERE courseTiming.courseID= '$selected_course' AND courseTiming.section=$selected_section AND courseTiming.year = 2023 AND courseTiming.semester= 2";
      
      $sections_rs= $db->query($sections_query);
      $row= $sections_rs->fetch();
      }



} catch (PDOException $e) {
  die("error: " . $e->getMessage());
}
?>
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