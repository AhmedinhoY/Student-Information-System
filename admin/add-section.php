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
                                                <select required id="college-select"
                                                      onchange="updateCourseSelection(this.value); updateInstructorSelection(this.value);">
                                                      <option disabled selected>College</option>
                                                      <?php foreach ($college_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Course Code</label>
                                                <select required id="course-select"
                                                      onchange="updateSectionSelection(this.value);">
                                                      <option disabled selected>Course Code</option>

                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Instructor</label>
                                                <select required id="instructor-select">
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
                                                <input type="number" placeholder="Section Number" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Room</label>
                                                <select name="" id="" required>
                                                      <option selected disabled>Room</option>
                                                      <?php foreach ($room_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Lectures Days</label>
                                                <select>
                                                      <option selected disabled>Lectures Days</option>
                                                      <option>UTH</option>
                                                      <option>MW</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Lectures Times</label>
                                                <select>
                                                      <option selected disabled>Lectures Days</option>
                                                      <option>UTH</option>
                                                      <option>MW</option>
                                                </select>
                                          </div>
                                    </div>
                                    <div style="width:100%">
                                          <div class="input-field" id="input-field">
                                                <label>Year</label>
                                                <input type="number" placeholder="Year" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Semester</label>
                                                <select>
                                                      <option selected disabled>Semester</option>
                                                      <option>1</option>
                                                      <option>2</option>
                                                      <option>3</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Exam Date</label>
                                                <input type="date">
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Exam Time</label>
                                                <select>
                                                      <option selected disabled>Exam Time</option>
                                                      <option>8:30-10:30</option>
                                                      <option>11:30-13:30</option>
                                                      <option>14:30-16:30</option>
                                                      <option>17:30-19:30</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Exam Place</label>
                                                <input type="text" value="TBA" placeholder="TBA" disabled readonly>
                                          </div>

                                    </div>

                              </div>


                              <button type="submit" class="form-btn">Submit</button>
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