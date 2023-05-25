<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
try {
      require('../includes/connection.php');

      //college selection
      $college_sql= "select collegeID, collegeName from college";
      $college_rs= $db->query($college_sql);

      if (isset($_POST["add-staff"])){
            $prefix= $_POST["prefix"];
            $full_name= $prefix." ".$_POST["full-name"];
            $email= $_POST["email"];
            $cpr= $_POST["CPR"];
            $password= $_POST["CPR"];
            $hashed_password= password_hash($password, PASSWORD_DEFAULT);
            $mobile_number= $_POST["mobile-number"];
            $college= $_POST["college"];
            $gender= $_POST["gender"];
            $job_title= $_POST["job-title"];


            // echo $email ;
            // echo $job_title ;            
            $insertion_query= "insert into staff (fullName, CPR, email, password, collegeID,
            gender, jobTitle, phoneNumber)
            values('$full_name', '$cpr', '$email', '$hashed_password', '$college',
            '$gender', '$job_title', '$mobile_number')";
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
                        <h2>Add Staff</h2>
                  </div>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>Prefix</label>
                                                <select name="prefix" required>
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
                                                      placeholder="Staff's full name" value="" name="full-name"
                                                      required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>CPR</label>
                                                <input type="text" placeholder="Staff's CPR" name="CPR" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Job Title</label>
                                                <input type="text" placeholder="Staff's Job Title" name="job-title"
                                                      required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Gender</label>
                                                <select name="gender" required>
                                                      <option disabled selected>Gender</option>
                                                      <option>Male</option>
                                                      <option>Female</option>
                                                </select>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="email" style="">
                                                <label>Email</label>
                                                <input type="text" placeholder="Staff's Email" value="" name="email"
                                                      disable readonly>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Mobile Number</label>
                                                <input type="text" placeholder="Staff's Mobile Number"
                                                      name="mobile-number" required>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>College</label>
                                                <select name="college" required>
                                                      <option disabled selected>College</option>
                                                      <?php foreach ($college_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Office Number</label>
                                                <input type="text" placeholder="Office Number" name="office">
                                          </div>
                                    </div>

                              </div>


                              <button type="submit" class="form-btn" name="add-staff">Add Staff</button>
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