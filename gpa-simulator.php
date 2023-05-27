<?php require('includes/student-header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<?php require('includes/functions.php'); ?>

<?php 

require('includes/student-sessions.php');

try {
      require('includes/connection.php');
      $sql_query= " select * from studentInfo where studentID = '$student_id' ";
      $sql_rs= $db->query($sql_query);
      $row= $sql_rs->fetch();

      $student_query= "select `studentClassroom`.`courseID`, `course`.`courseName`, `course`.`credits`, `studentInfo`.`passedCH`, `studentInfo`.`CGPA`
      FROM `studentClassroom` 
            LEFT JOIN `course` ON `studentClassroom`.`courseID` = `course`.`courseID` 
            LEFT JOIN `studentInfo` ON `studentClassroom`.`studentID` = `studentInfo`.`studentID`
      where studentClassroom.studentID = '$student_id' and studentClassroom.year = 2023 and studentClassroom.semester = 2";
      $student_rs= $db->query($student_query);

      $student_slq= "select passedCH, CGPA from studentInfo where studentID = '$student_id'";
      $s_rs= $db->query($student_slq);
      $row= $s_rs->fetch();

      $passedHrs= $row[0];
      $pastGPA= $row[1];
      // $student_row= $student_rs->fetch();

      if (isset($_POST['calc'])) {
            $grades = $_POST["grade"];
            $creditHours = $_POST["cHours"];
            $gpa = calculateGPA($grades, $creditHours);
            $cgpa= calculateCGPA($grades, $creditHours,$pastGPA ,$passedHrs );
            $totalPassedHrs= array_sum($creditHours) + $passedHrs;
      
      }

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}

?>
<div class="container">
      <div class="form" id="form">
            <!-- ----= Done by: Ahmed Yusuf =---- -->

            <div class="form-element" id="gpa-sim-form">

                  <div class="form-header">
                        <h2>GPA Simulator</h2>
                        <!-- <button class="close-button" onclick="closeForm()">&times;</button> -->
                  </div>
                  <div class="form-body">
                        <form action="" method="post" id="gpa-sim">
                              <!-- <span style="color:red">
                                    <?php echo $lgERRmsg; ?>
                              </span> <br /> -->

                              <table class="table">
                                    <thead>
                                          <tr>
                                                <th scope="col">Course Code</th>
                                                <th scope="col">Course Title</th>
                                                <th scope="col" style="width: 10% ;">Credits</th>
                                                <th scope="col">Grade</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php $flag= true;
                                          foreach ($student_rs as $srs){ ?>
                                          <tr>
                                                <td><?php echo $srs[0]; ?></td>
                                                <td><?php echo $srs[1]; ?></td>
                                                <td><input type="text" name="cHours[]" value="<?php echo $srs[2]?>"
                                                            readonly></td>
                                                <td>
                                                      <select name="grade[]" required>
                                                            <option selected>Select a grade</option>
                                                            <option value="A">A (90-100)</option>
                                                            <option value="A-">A- (87-89)</option>
                                                            <option value="B+">B+ (84-86)</option>
                                                            <option value="B">B (80-83)</option>
                                                            <option value="B-">B- (77-79)</option>
                                                            <option value="C">C+ (74-76)</option>
                                                            <option value="C">C (70-73)</option>
                                                            <option value="C-">C- (67-69)</option>
                                                            <option value="D">D+ (64-66)</option>
                                                            <option value="D">D (60-63)</option>
                                                            <option value="F">F (0-60)</option>
                                                      </select>
                                                </td>
                                          </tr>
                                          <?php
                                          }     ?>


                                    </tbody>

                              </table>

                              <div class="form-bottons d-flex justify-content-center">
                                    <button type="submit" name="calc" class="form-btn mx-2"
                                          style="width:calc(100%/4);">Calculate
                                          GPA</button>
                              </div>
                              <div class="dashboard-text-container" style="justify-content: center;">
                                    <?php if (isset($_POST['calc'])) { ?>

                                    <div class="dashboard-text">
                                          <h3>Your GPA:</h3> <?php echo $gpa;; ?>
                                    </div>
                                    <div class="dashboard-text">
                                          <h3>Your CGPA:</h3> <?php echo $cgpa; ?>
                                    </div>
                                    <div class="dashboard-text">
                                          <h3>You've passed:</h3> <?php echo "$totalPassedHrs"; ?>
                                    </div>

                                    <?php } ?>
                              </div>

                        </form>
                  </div>
            </div>
      </div>
</div>

<?php require('includes/footer.php'); ?>
<script>
if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
}
</script>