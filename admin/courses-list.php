<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');

try {
      require('../includes/connection.php');
      $sql_query= " select `course`.`courseID`, `college`.`collegeName`, `course`.`courseName`, `course`.`courseDescription`, `course`.`credits`, `course`.`pre-requisite`
      FROM `course` 
            LEFT JOIN `college` ON `course`.`collegeID` = `college`.`collegeID`  
      ORDER BY `course`.`courseID` ASC";
      $rs= $db->query($sql_query);

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="outer-div">
            <div class="inner-div">
                  <div class="div-header">
                        <h2>Courses List</h2>

                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div" style="overflow-x:auto;">
                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Course ID</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      College
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Course Name</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Course Description</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Credits
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Pre-Requisite
                                                </th>
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

                                          </tr> <?php } ?>

                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>

<?php require('../includes/footer.php'); ?>