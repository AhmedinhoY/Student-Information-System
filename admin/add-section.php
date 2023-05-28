<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
try {
      require('../includes/connection.php');

      //college selection
      $college_sql= "select collegeID, collegeName from college";
      $college_rs= $db->query($college_sql);

      //room selection
      $room_sql= "select classroomID,room from classroom";
      $room_rs= $db->query($room_sql);

      //course selection
      $course_sql= "select courseID from course";
      $course_rs= $db->query($course_sql);

      if (isset($_POST["add-section"])) {
            $course= $_POST["course"];
            $instructor= $_POST["instructor"];
            $section= $_POST["section"];
            $room= $_POST["room"];
            $lec_days= $_POST["lec-days"];
            $lec_times= $_POST["lec-times"];
            $year= $_POST["year"];
            $semester= $_POST["semester"];
            $ex_date= $_POST["ex-date"];
            $ex_time= $_POST["ex-time"];
            $ex_place= $_POST["ex-place"];


            $insertion_query= "insert into courseTiming values('$course','$instrutor)";

      }



} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="form">
            <div class="form-element">
                  <div class="form-header">
                        <h2>Add Section</h2>
                  </div>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div style="width:100%">
                                          <div class="input-field" id="input-field">
                                                <label>College</label>
                                                <select name="college" id="college-select"
                                                      onchange="updateCourseSelection(this.value); updateInstructorSelection(this.value);"
                                                      required>
                                                      <option disabled selected>College</option>
                                                      <?php foreach ($college_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Course Code</label>
                                                <select name="course" id="course-select"
                                                      onchange="updateSectionSelection(this.value);" required>
                                                      <option disabled selected>Course Code</option>

                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Instructor</label>
                                                <select required id="instructor-select" name="instructor">
                                                      <option disabled selected>Instructor</option>
                                                      <?php foreach ($instrucor_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                    </div>
                                    <div style="width:100%">
                                          <div class="input-field" id="section-select">
                                                <label>Section</label>
                                                <input type="number" placeholder="Section Number" name="section"
                                                      required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Room</label>
                                                <select name="room" id="" required>
                                                      <option selected disabled>Room</option>
                                                      <?php foreach ($room_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Lectures Days</label>
                                                <select name="lec-days">
                                                      <option selected disabled>Lectures Days</option>
                                                      <option value="UTH">UTH</option>
                                                      <option value="MW">MW</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Lectures Times</label>
                                                <select name="lec-times">
                                                      <option selected disabled>Lectures Times</option>
                                                      <optgroup label="UTH">
                                                            <option value="8:00-8:50">8:00-8:50</option>
                                                            <option value="9:00-9:50">9:00-9:50</option>
                                                            <option value="10:00-10:50">10:00-10:50</option>
                                                            <option value="11:00-11:50">11:00-11:50</option>
                                                            <option value="12:00-12:50">12:00-12:50</option>
                                                            <option value="13:00-13:50">13:00-13:50</option>
                                                            <option value="14:00-14:50">14:00-14:50</option>
                                                            <option value="15:00-15:50">15:00-15:50</option>
                                                            <option value="16:00-16:50">16:00-16:50</option>
                                                            <option value="17:00-17:50">17:00-17:50</option>
                                                      </optgroup>
                                                      <optgroup label="MW">
                                                            <option value="8:00-9:15">8:00-9:15</option>
                                                            <option value="9:30-10:45">9:30-10:45</option>
                                                            <option value="11:00-12:15">11:00-12:15</option>
                                                            <option value="12:30-13:45">12:30-13:45</option>
                                                            <option value="14:00-15:15">14:00-15:15</option>
                                                            <option value="15:30-16:45">15:30-16:45</option>
                                                      </optgroup>
                                                </select>
                                          </div>
                                    </div>
                                    <div style="width:100%">
                                          <div class="input-field" id="input-field">
                                                <label>Year</label>
                                                <input type="number" placeholder="Year" name="year" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Semester</label>
                                                <select name="semester">
                                                      <option selected disabled>Semester</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Exam Date</label>
                                                <input type="date" name="ex-date">
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Exam Time</label>
                                                <select name="ex-time">
                                                      <option selected disabled>Exam Time</option>
                                                      <option value="8:30-10:30">8:30-10:30</option>
                                                      <option value="11:30-13:30">11:30-13:30</option>
                                                      <option value="14:30-16:30">14:30-16:30</option>
                                                      <option value="17:30-19:30">17:30-19:30</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Exam Place</label>
                                                <input type="text" value="TBA" placeholder="TBA" name="ex-place"
                                                      disabled readonly>
                                          </div>

                                    </div>

                              </div>


                              <button type="submit" class="form-btn" name="add-section">Add Section</button>
                        </form>
                  </div>
            </div>
      </div>
</div>

<script>
window.addEventListener('DOMContentLoaded', function() {
      var inputFields = document.querySelectorAll('.input-field input[type="text"]');
      inputFields.forEach(function(inputField) {
            inputField.style.width = (inputField.placeholder.length + 3) + 'ch';
      });
});
window.addEventListener('DOMContentLoaded', function() {
      var inputFields = document.querySelectorAll('.input-field input[type="number"]');
      inputFields.forEach(function(inputField) {
            inputField.style.width = (inputField.placeholder.length + 5) + 'ch';
      });
});

// ====== AJAX for section number =======
function updateSectionSelection(selectedValue) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "section-input.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                  document.getElementById("section-select").innerHTML = xhr.responseText;
            }
      };
      xhr.send("selected=" + encodeURIComponent(selectedValue));
}
</script>

<?php require('../includes/footer.php'); ?>