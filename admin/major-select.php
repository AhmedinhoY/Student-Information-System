<?php 
try {
      require('../includes/connection.php');

      //major selection AJAX
      if (isset($_POST['selected'])) {
            $selectedValue = $_POST['selected'];
      // Retrieve options from the database based on the selected value
            $query = "select majorID, majorName FROM major WHERE collegeID = '$selectedValue'";
            $query_rs= $db->query($query);
      }
      

} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>
<select required id="select2">
      <option disabled selected>Major</option>
      <!-- <option>B.Sc. in Computer Science</option> -->
      <?php
foreach ($query_rs as $option) { ?>
      <option value="<?php echo $option['majorID'] ?>">
            <?php echo $option['majorName'] ?>
      </option>
      <?php } ?>
</select>