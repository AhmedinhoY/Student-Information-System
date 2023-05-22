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
                        <h2>Add Staff</h2>
                  </div>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>Prefix</label>
                                                <select required>
                                                      <option disabled selected value="">Prefix</option>
                                                      <option value="Dr.">Dr.</option>
                                                      <option value="Mr.">Mr.</option>
                                                      <option value="Ms.">Ms.</option>
                                                      <option value="Mrs.">Mrs.</option>
                                                      <option value="Emp.">Emp.</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Full Name</label>
                                                <input type="text" onkeyup="generateEmail(this.value)"
                                                      placeholder="Staff's full name" value="" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>CPR</label>
                                                <input type="text" placeholder="Staff's CPR" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Job Title</label>
                                                <input type="text" placeholder="Staff's Job Title" required>
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

                                          <div class="input-field" id="email" style="">
                                                <label>Email</label>
                                                <input type="text" placeholder="Staff's Email" value="" disable
                                                      readonly>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Mobile Number</label>
                                                <input type="text" placeholder="Staff's Mobile Number" required>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>College</label>
                                                <select required>
                                                      <option disabled selected>College</option>
                                                      <?php foreach ($college_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Office Number</label>
                                                <input type="text" placeholder="Office Number" required>
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