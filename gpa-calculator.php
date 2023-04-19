<?php require('includes/header.php');




?>
<div class="form" id="form" style="width: 60%;">
      <div class="form-element" id="gpa-sim-form">

            <div class="form-header">
                  <h2>GPA Calculator</h2>
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
                                          <th scope="col">Course Code (Optional)</th>
                                          <th scope="col">Course Hours</th>
                                          <th scope="col">Grade</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <tr>
                                          <td><input type="text" name="cCode" placeholder="Course 1"></td>
                                          <td><input type="text" name="cHours"></td>
                                          <td>
                                                <select name="grade">
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
                                          <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                    </tr>
                                    <tr>
                                          <td><input type="text" name="cCode" placeholder="Course 2"></td>
                                          <td><input type="text" name="cHours"></td>
                                          <td>
                                                <select name="grade">
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
                                          <td><i class="fa fa-times" aria-hidden="true"></i></td>

                                    </tr>
                                    <tr>
                                          <td><input type="text" name="cCode" placeholder="Course 3"></td>
                                          <td><input type="text" name="cHours"></td>
                                          <td>
                                                <select name="grade">
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
                                          <td><i class="fa fa-times" aria-hidden="true"></i></td>

                                    </tr>
                                    <tr>
                                          <td><input type="text" name="cCode" placeholder="Course 4"></td>
                                          <td><input type="text" name="cHours"></td>
                                          <td>
                                                <select name="grade">
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
                                          <td><i class="fa fa-times" aria-hidden="true"></i></td>

                                    </tr>
                                    <tr>
                                          <td><input type="text" name="cCode" placeholder="Course 5"></td>
                                          <td><input type="text" name="cHours"></td>
                                          <td>
                                                <select name="grade">
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
                                          <td><i class="fa fa-times" aria-hidden="true"></i></td>

                                    </tr>
                                    <tr>
                                          <td><input type="text" name="cCode" placeholder="Course 6"></td>
                                          <td><input type="text" name="cHours"></td>
                                          <td>
                                                <select name="grade">
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
                                          <td><i class="fa fa-times" aria-hidden="true"></i></td>

                                    </tr>
                                    <tr>
                                          <td><input type="text" name="cCode" placeholder="Course 7"></td>
                                          <td><input type="text" name="cHours"></td>
                                          <td>
                                                <select name="grade">
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
                                          <td><i class="fa fa-times" aria-hidden="true"></i></td>

                                    </tr>
                                    <tr>
                                          <td colspan="4"> <label>Enter your current CGPA</label></br>
                                                <input type="text" name="CGPA">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td colspan="4"> <label>How many hours have you passed so far?</label></br>
                                                <input type="text" name="chPassed">
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
                              <button type="submit" name="addCourse" class="form-btn mx-2"
                                    style="width:calc(100%/4);">Add
                                    Course</button>
                        </div>


                  </form>
            </div>
      </div>
</div>

<?php require('includes/footer.php'); ?>