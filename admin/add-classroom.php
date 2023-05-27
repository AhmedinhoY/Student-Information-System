<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
try {
      require('../includes/connection.php');

      //college selection
      $college_sql= "select collegeID, collegeName from college";
      $college_rs= $db->query($college_sql);

      if (isset($_POST["add-classroom"])) {
            $campus=$_POST["campus"];
            $college= $_POST["college"];
            $capacity=$_POST["capacity"];
            $room=$_POST["room"];
            $type=$_POST["type"];
            
            $insertion_query= "insert into classroom (classroomID, campus, collegeID, room, capacity, type)
            values(null, '$campus', '$college', '$room', '$capacity', '$type')";
            $result = $db->exec($insertion_query);
      }

} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="form">
            <div class="form-element">
                  <div class="form-header">
                        <h2>Add Classroom</h2>
                  </div>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div style="width:100%">
                                          <div class="input-field" id="input-field">
                                                <label>College</label>
                                                <select required id="college-select" name="college"
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
                                                <select id="campus-select">
                                                      <option disabled selected>Campus</option>

                                                </select>
                                          </div>
                                    </div>
                                    <div style="width:100%">
                                          <div class="input-field" id="room-input">
                                                <label>Room</label>
                                                <input type="text" name="room" placeholder="Room" required>
                                          </div>

                                          <div class="input-field" id="input-field">
                                                <label>Capacity</label>
                                                <input type="number" name="capacity" placeholder="Capacity" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Type</label>
                                                <select name="type">
                                                      <option selected disabled>Room Type</option>
                                                      <option>Study classroom</option>
                                                </select>
                                          </div>
                                    </div>
                              </div>

                              <button type="submit" class="form-btn" name="add-classroom">Add Classroom</button>
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

if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
}
</script>

<?php require('../includes/footer.php'); ?>