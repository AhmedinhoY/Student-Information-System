<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
?>
<?php 
try {
      require('../includes/connection.php');
      $sql_query= " select studentInfo.studentID, studentInfo.fullName, studentInfo.CPR, studentInfo.email, studentInfo.phoneNumber, studentInfo.gender, college.collegeName, major.majorName, studentInfo.CGPA, studentInfo.MCGPA, studentInfo.academicStatus, studentInfo.enrollmentStatus, staff.fullName
      FROM studentInfo 
      LEFT JOIN college ON studentInfo.collegeID = college.collegeID 
      LEFT JOIN major ON studentInfo.majorID = major.majorID 
      LEFT JOIN staff ON studentInfo.advisorID = staff.staffID
      ORDER BY `studentInfo`.`studentID` ASC";
      $rs= $db->query($sql_query);

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="outer-div">
            <div class="inner-div">
                  <div class="div-header">
                        <h2>Students List</h2>

                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div" style="overflow-x:auto;">
                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Student ID</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Student Name
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">CPR
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Gender</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Email</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Mobile Number
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      College</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Major</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">CGPA
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      MCGPA</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Academic Status
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Enrollment
                                                      Status</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Advisor</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($rs as $row) { ?>
                                          <tr>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[0]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[1]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[2]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[5]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[3]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[4]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[6]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[7]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[8]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[9]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[10]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[11]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[12]; ?>
                                                </td>


                                          </tr> <?php } ?>

                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>

<?php require('../includes/footer.php'); ?>