<?php
try {
      require('../includes/connection.php');

      //college selection
      if (isset($_POST['selected'])) {
            $selectedValue = $_POST['selected'];
      // Retrieve options from the database based on the selected value
      $next_section_query="select COALESCE(MAX(section), 0) + 1 AS next_section
      FROM courseTiming
      WHERE courseID = '$selectedValue'
        AND year = 2023
        AND semester = 2
      ";
      $next_section_rs= $db->query($next_section_query);
      $row= $next_section_rs->fetch();
      }


} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>
<label>Section</label>
<input type="number" name="section" placeholder="<?php echo $row[0];?>" value="<?php echo $row[0];?>" readonly>
</input>