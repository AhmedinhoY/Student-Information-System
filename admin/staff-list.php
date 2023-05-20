<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');

try {
      require('../includes/connection.php');
      $sql_query= " select staff.fullName, staff.CPR, staff.gender, staff.email, staff.phoneNumber, 
      staff.jobTitle, staff.officeNumber
      FROM staff";
      $rs= $db->query($sql_query);

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="outer-div">
            <div class="inner-div">
                  <div class="div-header">
                        <h2>Staffs List</h2>

                  </div>
                  <div class="div-body">
                        <div class="inner-inner-div" style="overflow-x:auto;">
                              <table class="table table-hover">
                                    <thead>
                                          <tr>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Staff Name</th>
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
                                                      Job Title
                                                </th>
                                                <th scope="col" style="width:100%; white-space:nowrap; margin:5px;">
                                                      Office Number</th>
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
                                                      <?php echo $row[6]; ?>
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