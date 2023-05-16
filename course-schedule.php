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
      $student_query= "select studentInfo.studentID, course.courseID, course.credits, staff.fullName,  from ";
      $rs= $db->query($sql_query);
      $row= $rs->fetch();

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}

?>

<div class="container">
      <!-- ----= Done by: Ahmed Yusuf =---- -->
      <div class="outer-div">
            <div class="inner-div">
                  <div class="div-header">
                        <h2>Course Schedule</h2>
                  </div>
                  <div class="inner-inner-div">
                        <h2 style="text-transform: uppercase;">Ahmed Yusuf Ahmed Saleh</h2>
                        <p style="">Student ID: 202003838</p>
                        <p style="margin-top:-0.4rem ">B.Sc. in Computer Science</p>
                        <div class="dashboard-text-container">
                              <div class="dashboard-text">
                                    <h3>Academic Status:</h3> Excellence
                              </div>
                              <div class="dashboard-text">
                                    <h3>CGPA:</h3> 4.00
                              </div>
                              <div class="dashboard-text">
                                    <h3>MCGPA:</h3> 4.00
                              </div>
                              <div class="dashboard-text">
                                    <h3>Registered CH:</h3> 15.00
                              </div>
                        </div>
                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div">
                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col">Course Code</th>
                                                <th scope="col">Day</th>
                                                <th scope="col">Campus</th>
                                                <th scope="col">Room</th>
                                                <th scope="col">CH</th>
                                                <th scope="col">Exam Date</th>
                                                <th scope="col">Exam Place</th>
                                                <th scope="col">Status</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                                <td>ITCS489</td>
                                                <td>UTH</td>
                                                <td>Sakheer</td>
                                                <td>S40-2046</td>
                                                <td>3</td>
                                                <td>07-06-2023 <br /> 11:30-13:30</td>
                                                <td>TO BE ANNOUNCED</td>
                                                <td></td>
                                          </tr>
                                          <tr>
                                                <td>ITCS489</td>
                                                <td>UTH</td>
                                                <td>Sakheer</td>
                                                <td>S40-2046</td>
                                                <td>3</td>
                                                <td>07-06-2023 <br /> 11:30-13:30</td>
                                                <td>TO BE ANNOUNCED</td>
                                                <td></td>
                                          </tr>
                                          <tr>
                                                <td>ITCS489</td>
                                                <td>UTH</td>
                                                <td>Sakheer</td>
                                                <td>S40-2046</td>
                                                <td>3</td>
                                                <td>07-06-2023 <br /> 11:30-13:30</td>
                                                <td>TO BE ANNOUNCED</td>
                                                <td></td>
                                          </tr>
                                          <tr>
                                                <td>ITCS489</td>
                                                <td>UTH</td>
                                                <td>Sakheer</td>
                                                <td>S40-2046</td>
                                                <td>3</td>
                                                <td>07-06-2023 <br /> 11:30-13:30</td>
                                                <td>TO BE ANNOUNCED</td>
                                                <td></td>
                                          </tr>
                                          <tr>
                                                <td>ITCS489</td>
                                                <td>UTH</td>
                                                <td>Sakheer</td>
                                                <td>S40-2046</td>
                                                <td>3</td>
                                                <td>07-06-2023 <br /> 11:30-13:30</td>
                                                <td>TO BE ANNOUNCED</td>
                                                <td></td>
                                          </tr>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>

</div>
<?php require('includes/footer.php'); ?>