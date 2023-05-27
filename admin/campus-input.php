<?php
try {
      require('../includes/connection.php');

      //college selection
      if (isset($_POST['selected'])) {
            $selectedValue = $_POST['selected'];
      // Retrieve options from the database based on the selected value
      $college_sql= "select place from college where collegeID = $selectedValue ";
      $college_rs= $db->query($college_sql);
      $row = $college_rs->fetch();
      }


} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>
<label>Campus</label>
<select>
      <option name="campus" disabled selected value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
</select>