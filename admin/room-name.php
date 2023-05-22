<?php
try {
      require('../includes/connection.php');

      //college selection
      if (isset($_POST['selected'])) {
            $selectedValue = $_POST['selected'];
      // Retrieve options from the database based on the selected value
      $college_sql= "select collegeNumber from college where collegeID = $selectedValue ";
      $college_rs= $db->query($college_sql);
      }


} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>
<label>Campus</label>
<?php foreach($college_rs as $row){ ?>
<input type="name" value="<?php echo $row[0]; ?>-" required> </input>
<?php
} ?>