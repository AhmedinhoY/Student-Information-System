<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');

try {
      require('../includes/connection.php');
      $sql_query= " select `courseTiming`.`courseID`, `courseTiming`.`section`, `staff`.`fullName`,
      `classroom`.`room`, `classroom`.`capacity`, `courseTiming`.`lecturesDay`, `courseTiming`.`lecturesTime`, `courseTiming`.`examDate`,
      `courseTiming`.`examTime` 
      FROM `courseTiming` 
      LEFT JOIN `staff` ON `courseTiming`.`instructorID` = `staff`.`staffID` 
      LEFT JOIN `classroom` ON `courseTiming`.`classroomID` = `classroom`.`classroomID`
      WHERE `courseTiming`.`year`=2023 AND `courseTiming`.`semester`=2 
      ORDER BY `courseTiming`.`courseID` ASC";
      $rs= $db->query($sql_query);

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="outer-div">
            <div class="inner-div">
                  <div class="div-header">
                        <h2>Sections List</h2>

                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div" style="overflow-x:auto;">
                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Course ID</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Section</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Instructor</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Room</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Lectures Days
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Lectures Time
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Exam Date</th>
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
                                                      <?php echo $row[3]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[4]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[5]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[6]. " - ". $row[7]; ?>
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