<?php require('includes/header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<?php 

$active_user= $_SESSION['active_user'];
$student_id= $_SESSION['student_data']['student_ID'];
$full_name= $_SESSION['student_data']['full_name'];
$email= $_SESSION['student_data']['email'];

try {
      require('includes/connection.php');
      $sql_query= " select * from studentInfo where studentID = '$student_id' ";
      $sql_rs= $db->query($sql_query);
      $row= $sql_rs->fetch();

      $student_query= "select studentClassroom.courseID, course.courseName, course.credits
      from studentClassroom inner join course on studentClassroom.courseID = course.courseID
      where studentClassroom.studentID = '$student_id'";
      $student_rs= $db->query($student_query);
      // $student_row= $student_rs->fetch();

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
                                                <th scope="col">Course Hours</th>
                                                <th scope="col">Grade</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($student_rs as $srs){ ?>
                                          <tr>
                                                <td><?php echo $srs[0]; ?></td>
                                                <td><?php echo $srs[1]; ?></td>
                                                <td><?php echo $srs[2]; ?></td>
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
                                          <?php
                                          }     ?>

                                    </tbody>
                              </table>


                        </form>
                  </div>
            </div>
      </div>
</div>

<?php require('includes/footer.php'); ?>