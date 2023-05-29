<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');

try {
      require('../includes/connection.php');
      $sql_query= "select `college`.`collegeName`, `classroom`.`room`,
      `classroom`.`type`, `classroom`.`capacity`
      FROM `classroom` 
      LEFT JOIN `college` ON `classroom`.`collegeID` = `college`.`collegeID`  
      ORDER BY `college`.`collegeName`, `classroom`.`room` ASC";
      $rs= $db->query($sql_query);

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="outer-div">
            <div class="inner-div">
                  <div class="div-header">
                        <h2>Classrooms List</h2>

                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div" style="overflow-x:auto;">
                              <table class="table table-hover">
                                    <thead>
                                          <tr>

                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      College</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Room</th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Capacity
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Type</th>
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
                                                      <?php echo $row[3]; ?>
                                                </td>
                                                <td style="width:100%; white-space:nowrap;">
                                                      <?php echo $row[2]; ?>
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