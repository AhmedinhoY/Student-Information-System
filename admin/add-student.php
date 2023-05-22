<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
try {
      require('../includes/connection.php');

      //college selection
      $college_sql= "select collegeID, collegeName from college";
      $college_rs= $db->query($college_sql);

      //major selection AJAX
      if (isset($_POST['selected'])) {
            $selectedValue = $_POST['selected'];
      // Retrieve options from the database based on the selected value
            $query = "select majorID, majorName FROM major WHERE collegeID = '$selectedValue'";
            $query_rs= $db->query($query);
      
      }

      //studentID id
      $next_id_query="select MAX(studentID) + 1 AS next_id FROM studentInfo;";
      $next_id_rs= $db->query($next_id_query);
      $row= $next_id_rs->fetch();

} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="form">
            <div class="form-element">
                  <div class="form-header">
                        <h2>Add Student</h2>
                  </div>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div>
                                          <div class="input-field" id="input-field">
                                                <label>Sudent ID</label>
                                                <input type="text" placeholder="<?php echo $row[0] ?>"
                                                      value="<?php echo $row[0] ?>" disable readonly>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Full Name</label>
                                                <input type="text" placeholder="Student's full name" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>CPR</label>
                                                <input type="text" placeholder="Student's CPR" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Gender</label>
                                                <select required>
                                                      <option disabled selected>Gender</option>
                                                      <option>Male</option>
                                                      <option>Female</option>
                                                </select>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>Email</label>
                                                <input type="text" placeholder="<?php echo $row[0] ?>@uob.stu.edu.bh"
                                                      value="<?php echo $row[0] ?>@uob.stu.edu.bh" disable readonly>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Mobile Number</label>
                                                <input type="text" placeholder="Student's Mobile Number" required>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>College</label>
                                                <select required id="college-select"
                                                      onchange="updateMajorSelection(this.value); updateAdvisorSelection(this.value)">
                                                      <option disabled selected>College</option>
                                                      <?php foreach ($college_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Major</label>
                                                <select required id="major-select">
                                                      <option disabled selected>Major</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Advisor</label>
                                                <select required id="advisor-select">
                                                      <option disabled selected>Student's Advisor</option>
                                                </select>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>Flat</label>
                                                <input type="text" placeholder="Flat" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Building</label>
                                                <input type="text" placeholder="Building" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Road</label>
                                                <input type="text" placeholder="Road" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Block</label>
                                                <input type="text" placeholder="Block" required>
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
</script>

<?php require('../includes/footer.php'); ?>