<?php 
try {
      require('../includes/connection.php');

      if (isset($_POST['selected'])) {
            $selectedValue = $_POST['selected'];
      // Retrieve options from the database based on the selected value
            $course_sql= "select courseID from course where collegeID = $selectedValue ";
            $course_rs= $db->query($course_sql);
      }
      //course selection
      



} catch (PDOException $e){
die("error: " . $e->getMessage());
}

?>



<option disabled selected>Course Code</option>
<?php foreach ($course_rs as $row) { ?>
<option value="<?php echo $row[0] ?>"><?php echo $row[0] ?>
</option>
<?php } ?>