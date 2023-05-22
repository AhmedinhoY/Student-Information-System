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
                        <h2>Add Section</h2>
                  </div>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div style="width:100%">
                                          <div class="input-field" id="input-field">
                                                <label>College</label>
                                                <select required id="college-select"
                                                      onchange="updateCampusInput(this.value); updateRoomName(this.value)">
                                                      <option disabled selected>College</option>
                                                      <?php foreach ($college_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="campus-input">
                                                <label>Campus</label>
                                                <input type="name" placeholder="Campus" value="" required disabled
                                                      id="campus-select">

                                                </input>
                                          </div>
                                    </div>
                                    <div style="width:100%">
                                          <div class="input-field" id="room-input">
                                                <label>Room</label>
                                                <input type="text" placeholder="Room" required>
                                          </div>

                                          <div class="input-field" id="input-field">
                                                <label>Capacity</label>
                                                <input type="number" placeholder="Capacity" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Type</label>
                                                <select>
                                                      <option selected disabled>Room Type</option>
                                                      <option>Study classroom</option>
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

<script>
window.addEventListener('DOMContentLoaded', function() {
      var inputFields = document.querySelectorAll('.input-field input[type="text"]');
      inputFields.forEach(function(inputField) {
            inputField.style.width = (inputField.placeholder.length + 10) + 'ch';
      });
});
window.addEventListener('DOMContentLoaded', function() {
      var inputFields = document.querySelectorAll('.input-field input[type="number"]');
      inputFields.forEach(function(inputField) {
            inputField.style.width = (inputField.placeholder.length + 5) + 'ch';
      });
});
</script>

<?php require('../includes/footer.php'); ?>