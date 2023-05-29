<?php 
try {
      require('../includes/connection.php');

      //major selection AJAX
      if (isset($_POST['selected'])) {
            $selectedValue = $_POST['selected'];
      // Retrieve options from the database based on the selected value
            $query = "select staffID, fullName FROM staff WHERE collegeID = '$selectedValue'";
            $query_rs= $db->query($query);
      }
      

} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>
<select required id="select2">
      <option hidden value="" disabled selected>Student's Advisor</option>
      <!-- <option>B.Sc. in Computer Science</option> -->
      <?php
foreach ($query_rs as $option) { ?>
      <option value="<?php echo $option['staffID'] ?>">
            <?php echo $option['fullName'] ?>
      </option>
      <?php } ?>
</select>