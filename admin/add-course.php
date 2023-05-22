<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
try {
      require('../includes/connection.php');

      //college selection
      $college_sql= "select collegeID, collegeName from college";
      $college_rs= $db->query($college_sql);



} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="form">
            <div class="form-element">
                  <div class="form-header">
                        <h2>Add Course</h2>
                  </div>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div style="width:100%">
                                          <div class="input-field" id="input-field">
                                                <label>Course Code</label>
                                                <input type="text" placeholder="Course Code">
                                          </div>
                                          <div class="input-field" id="input-field" style="width:40%">
                                                <label>Course Name</label>
                                                <input type="text" style="width:100%" placeholder="Course Name"
                                                      required>
                                          </div>
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

                                    </div>
                                    <div style="width:100%">
                                          <div class="input-field" style="width:60%" id="input-field">
                                                <label>Course Description</label>
                                                <input type="text" style="width:100%" placeholder="Course Description"
                                                      required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Pre-Requisite</label>
                                                <input type="text" placeholder="Pre-Requisite" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Credits</label>
                                                <select>
                                                      <option selected disabled>Credits</option>
                                                      <option>1</option>
                                                      <option>2</option>
                                                      <option>3</option>
                                                      <option>4</option>
                                                </select>
                                          </div>

                                    </div>

                              </div>


                              <button type="submit" class="form-btn">Submit</button>
                        </form>
                  </div>
            </div>
      </div>
</div>

<!-- <script>
window.addEventListener('DOMContentLoaded', function() {
      var inputFields = document.querySelectorAll('.input-field input[type="text"]');
      inputFields.forEach(function(inputField) {
            inputField.style.width = (inputField.placeholder.length + 3) + 'ch';
      });
});
</script> -->

<?php require('../includes/footer.php'); ?>