<?php

  require('includes/header.php');
  require('includes/sidebar.php');
  require('includes/student-sessions.php');

try {
      require('includes/connection.php');
      $sql_query= " select `studentInfo`.`studentID`, `college`.`collegeName`, `major`.`majorName`, `staff`.`fullName`, `studentInfo`.`passedCH`, `studentInfo`.`enrollmentStatus`, `studentInfo`.`academicStatus`, `studentInfo`.`CGPA`, `studentInfo`.`MCGPA`
      ,`studentInfo`.`flat` , `studentInfo`.`building`, `studentInfo`.`road` , `studentInfo`.`block`, `studentInfo`.`phoneNumber`, `studentInfo`.`email`
      FROM `studentInfo` 
      LEFT JOIN `college` ON `studentInfo`.`collegeID` = `college`.`collegeID` 
      LEFT JOIN `major` ON `major`.`collegeID` = `college`.`collegeID` 
      LEFT JOIN `staff` ON `studentInfo`.`advisorID` = `staff`.`staffID`
      WHERE studentID = '$student_id' ";
      $rs= $db->query($sql_query);
      $row= $rs->fetch();
      $message="";

      if (isset($_POST['update'])) {
            if (!isset($_POST['flat'])) {
                  $flat=" ";
            }else{
                  $flat= $_POST['flat'];
            }
            $building= $_POST['building'];
            $road= $_POST['road'];
            $block= $_POST['block'];
            $mobile_number= $_POST['mobile-number'];

            try {
                  require('includes/connection.php');
                  $update_sql_query= " update studentInfo SET 
                  phoneNumber='$mobile_number', flat='$flat', building='$building', road='$road', block='$block'
                  WHERE studentID= '$student_id' ";
                  if ($db->exec($update_sql_query) == TRUE) {
                        $message = "Your information have been updated successfully!";
                  }

      }catch (PDOException $e){
            die("error: " . $e->getMessage());
      }
      }

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}


?>


<!--the Eric Meyer's Reset sheet-->
<!-- <link rel="stylesheet" href="styles/css-reset.css"> -->
<!-- <link rel="stylesheet" href="CSS/style.css"> -->
<!-- <link rel="stylesheet" href="CSS/contactDetails.css"> -->


<!--font Awesome-->
<!-- <script src="https://kit.fontawesome.com/58aa1d359e.js" crossorigin="anonymous"></script>  -->




<div class="container">

      <div class="outer-div">
            <div class="inner-div">
                  <!-- <div class="div-header">
                        <h2>Contact Details</h2>
                  </div> -->
                  <div class="inner-inner-div">
                        <h2 style="text-transform: uppercase;"><?php echo $full_name; ?></h2>
                        <p style="">Student ID: <?php echo $row['studentID']; ?></p>
                        <p style="margin-top:-0.4rem "><?php echo $row['majorName']; ?></p>
                        <div class="dashboard-text-container">

                              <div class="dashboard-text">
                                    <h3>Enrollment Status:</h3> <?php echo $row['enrollmentStatus']; ?>
                              </div>
                              <div class="dashboard-text">
                                    <h3>Academic Status:</h3> <?php echo $row['academicStatus']; ?>
                              </div>
                              <div class="dashboard-text">
                                    <h3>CGPA:</h3> <?php echo $row['CGPA']; ?>
                              </div>
                              <div class="dashboard-text">
                                    <h3>MCGPA:</h3> <?php echo $row['MCGPA']; ?>
                              </div>
                              <div class="dashboard-text">
                                    <h3>Passed CH:</h3> <?php echo $row['passedCH']; ?>
                              </div>
                        </div>
                  </div>
            </div>

            <div class="inner-div">
                  <div class="div-header" style="display:flex; flex-direction:column;">
                        <h2>Student Details</h2>
                        <h4><?php echo $message; ?></h4>
                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div">

                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col" style="width:10%">Flat</th>
                                                <th scope="col" style="width:10%">Buliding</th>
                                                <th scope="col" style="width:10%">Road</th>
                                                <th scope="col" style="width:10%">Block</th>
                                                <th scope="col" style="width:30%">Mobile Number</th>
                                                <th scope="col" style="width:30%">Email</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                                <td> <?php echo $row['flat']; ?></td>
                                                <td> <?php echo $row['building']; ?> </td>
                                                <td> <?php echo $row['road']; ?> </td>
                                                <td> <?php echo $row['block']; ?> </td>
                                                <td><?php echo $row['phoneNumber']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                          </tr>
                                    </tbody>

                              </table>
                        </div>
                  </div>
                  <div class="Edit-btn" style="display:flex;">
                        <button class="form-btn2" onclick="TableDisplay()"
                              style="width:calc(100%/3.1); margin: 5px;">Edit</button>
                        <button class="form-btn2 hide-btn" id="hide-btn" onclick="TableHide()"
                              style="width:calc(100%/3.1); margin: 5px;">Hide</button>
                  </div>

                  <form method="POST">
                        <div class="form-body">
                              <div class="div-body hide-btn" id="update-container">
                                    <div class="inner-inner-div" style="margin: 10px 0">
                                          <table class="table" id="">
                                                <thead>
                                                      <tr>
                                                            <th scope="col" style="width:15%;">Flat</th>
                                                            <th scope="col" style="width:15%;">Buliding</th>
                                                            <th scope="col" style="width:15%;">Road</th>
                                                            <th scope="col" style="width:15%;">Block</th>
                                                            <th scope="col" style="width:40%; white-space:nowrap;">
                                                                  Mobile Number
                                                            </th>
                                                      </tr>

                                                </thead>
                                                <tbody>
                                                      <tr>
                                                            <td><input type="text" name="flat" class="table-input"></td>
                                                            <td><input type="text" name="building" class="table-input">
                                                            </td>
                                                            <td><input type="text" name="road" class="table-input"></td>
                                                            <td><input type="text" name="block" class="table-input">
                                                            </td>
                                                            <td><input type="text" name="mobile-number"
                                                                        class="table-input"></td>

                                                      </tr>
                                                </tbody>
                                          </table>
                                    </div>
                                    <button class="form-btn2 hide-btn" id="update-btn" name="update"
                                          style="width:calc(100%/3.1); margin: 5px;" type="submit">Update</button>
                              </div>


                  </form>
            </div>

      </div>
</div>

</div>
<script>
if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
}
</script>



<!--end of the bottom part in box2-->

<!-- end of contact-info it makes controll what is in the container and separate things away from the container -->

<!-- end of container -->


<!-- <script src="Js/contactDetails.js"> </script> -->

<?php

  require 'includes/footer.php';
?>