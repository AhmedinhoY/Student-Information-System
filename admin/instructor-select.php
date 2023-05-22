<?php 
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
try {
      require('../includes/connection.php');

      if (isset($_POST['selected'])) {
            $selectedValue = $_POST['selected'];
      // Retrieve options from the database based on the selected value
            $instructor_sql= "select staffID, fullName from staff where collegeID = $selectedValue ";
            $instructor_rs= $db->query($instructor_sql);
      }
      //course selection
      



} catch (PDOException $e){
die("error: " . $e->getMessage());
}

?>



<option disabled selected>Instructor</option>
<?php foreach ($instructor_rs as $row) { ?>
<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
</option>
<?php } ?>