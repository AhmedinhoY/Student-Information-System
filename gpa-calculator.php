<?php require('includes/student-header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<?php require('includes/student-sessions.php'); ?>
<?php require('includes/functions.php'); ?>
<?php

if (isset($_POST['calc'])) {
      $grades = $_POST["grade"]; //array //done --problem here, leave it empty and you'll see:) 
      $creditHours = $_POST["cHours"]; //array //done
      $pastGPA= test_input($_POST["CGPA"]); //done
      $passedHrs= test_input($_POST["chPassed"]);//BUG!

      if(empty($grades)||empty($creditHours)||empty($pastGPA)||empty( $passedHrs)){
            die('<h1 style="text-align:center;">Error: no input must be left empty!</h1>');
      }

      //credit hours validation
      //enter a number from 1 -9 only
      $pattCredit="/^[1-9]{1}$/";
      for($i=0;$i<count($creditHours);$i++){
            $creditHours[$i] = test_input($creditHours[$i]); 
            if(empty($creditHours[$i])){
                  die('<h1 style="text-align:center;">Error: no input must be left empty!</h1>');
            }
            if(preg_match($pattCredit,$creditHours[$i])!= 1){
                  die('<h1 style="text-align:center;">Error: enter numbers from 1-9 only for Credits </h1>');
                  
            }      
      } // end of the for loop for credit hrs

      //validation for grades
      for($i=0;$i<count($grades);$i++){
            if(empty($grades[$i])){
                  die('<h1 style="text-align:center;">Error: no input must be left empty!</h1>');
            }
      }//end of for loop for grades

      //pastGPA
      //gpa between 1.00 ~ 3.99 or 4.00 will work here, otherwise error.
      $pattGPA = "/^[1-3]{1}([\.]?([0-9]{1,2})?)|(4(\.00)?)$/";
      if(preg_match($pattGPA,$pastGPA)!= 1){
            die('<h1 style="text-align:center;">Error: please enter your past GPA correctly</h1>');

      }

      //BUG HERE: STILL ACCEPTS -1! but no chars!
      //passedHrs
      //gpa between 1.00 ~ 3.99 or 4.00 will work here, otherwise error.
      $pattHrs = "/^[^\-][0-1]([0-9]{1,3})?|[0-9]{1,2}$/";
      if(preg_match($pattHrs,$passedHrs)!= 1){
            die('<h1 style="text-align:center;">Error: please enter your passed hrs  correctly</h1>');

      }













      $gpa = calculateGPA($grades, $creditHours);
      $cgpa= calculateCGPA($grades, $creditHours,$pastGPA ,$passedHrs );
      $totalPassedHrs= array_sum($creditHours) + $_POST["chPassed"];

}

?>


<div class="container">
      <!--conduct the tests here-->
      <div class="form" id="form">
            <!-- ----= Done by: Ahmed Yusuf =---- -->
            <div class="form-element" id="gpa-sim-form">

                  <div class="form-header">
                        <h2>GPA Calculator</h2>
                        <!-- <button class="close-button" onclick="closeForm()">&times;</button> -->
                  </div>
                  <div class="form-body">
                        <form id="gpa-sim" method="POST">
                              <!-- <span style="color:red">
                                    <?php echo $ERRmsg; ?>
                              </span> <br /> -->
                              <table class="table" id="GPA-calculator">
                                    <thead>
                                          <tr>
                                                <td colspan="1" style="border: inherit;"> <label>Enter your current
                                                            CGPA</label></br>
                                                      <input type="text" name="CGPA">
                                                </td>
                                                <td colspan="3" style="border: inherit;"> <label>How many hours have you
                                                            passed so
                                                            far?</label></br>
                                                      <input type="text" name="chPassed">
                                                </td>
                                          </tr>

                                          <tr>
                                                <th scope=" col">Course Code (Optional)</th>
                                                <th scope="col">Credits</th>
                                                <th scope="col">Grade</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                                <td style="width:30%"><input type="text" name="cCode"
                                                            placeholder="Course Name"></td>
                                                <td style="width:30%"><input type="text" name="cHours[]"
                                                            placeholder="Credits" min="1" max="4" required></td>
                                                <td style="width:30%;">
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
                                                <td>
                                                      <button type="button" onclick="deleteRow(this)"
                                                            style="background: inherit;">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                      </button>
                                                </td>
                                          </tr>
                                          <tr>
                                                <td><input type="text" name="cCode" placeholder="Course Name"></td>
                                                <td><input type="text" name="cHours[]" placeholder="Credits" min="1"
                                                            max="4" required></td>
                                                <td style="width:30%">
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
                                                <td>
                                                      <button type="button" onclick="deleteRow(this)"
                                                            style="background: inherit;">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                      </button>
                                                </td>

                                          </tr>
                                          <tr>
                                                <td><input type="text" name="cCode" placeholder="Course Name"></td>
                                                <td><input type="text" name="cHours[]" placeholder="Credits" min="1"
                                                            max="4" required></td>
                                                <td style="width:30%">
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
                                                <td>
                                                      <button type="button" onclick="deleteRow(this)"
                                                            style="background: inherit;">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                      </button>
                                                </td>

                                          </tr>



                                    </tbody>
                              </table>
                              <div class="form-bottons d-flex justify-content-center">
                                    <button type="submit" name="calc" class="form-btn mx-2"
                                          style="width:calc(100%/4);">Calculate
                                          GPA</button>
                                    <button type="submit" name="reset" class="form-btn mx-2"
                                          style="width:calc(100%/4);">Reset</button>
                                    <button type="button" name="addCourse" class="form-btn mx-2"
                                          style="width:calc(100%/4);" onclick="addRow()">Add
                                          Course</button>
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