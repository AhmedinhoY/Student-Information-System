<?php require('includes/header.php');




?>
<div class="container">
      <div class="form" id="form" style="width: 85%;">
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
                                                <th scope="col">Course Hours</th>
                                                <th scope="col">Grade</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                                <td>ITCS489</td>
                                                <td>Software Engineering II</td>
                                                <td>3</td>
                                                <td>
                                                      <select name="grade">
                                                            <option selected>-</option>
                                                            <option value="A">A</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B">B</option>
                                                            <option value="B-">B-</option>
                                                            <option value="C">C+</option>
                                                            <option value="C">C</option>
                                                            <option value="C-">C-</option>
                                                            <option value="D">D+</option>
                                                            <option value="D">D</option>
                                                            <option value="F">F</option>
                                                      </select>
                                                </td>
                                          </tr>
                                          <tr>
                                                <td>ITCS347</td>
                                                <td>Algorithms Analysis and Design</td>
                                                <td>3</td>
                                                <td>
                                                      <select name="grade">
                                                            <option selected>-</option>
                                                            <option value="A">A</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B">B</option>
                                                            <option value="B-">B-</option>
                                                            <option value="C">C+</option>
                                                            <option value="C">C</option>
                                                            <option value="C-">C-</option>
                                                            <option value="D">D+</option>
                                                            <option value="D">D</option>
                                                            <option value="F">F</option>
                                                      </select>
                                                </td>
                                          </tr>
                                    </tbody>
                              </table>


                        </form>
                  </div>
            </div>
      </div>
</div>

<?php require('includes/footer.php'); ?>