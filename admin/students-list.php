<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
?>
<?php 
try {
      require('includes/connection.php');
      $sql_query= " select * from studentInfo ";
      $rs= $db->query($sql_query);
      $row= $rs->fetch();

}catch (PDOException $e){
      die("error: " . $e->getMessage());
}
?>

<div class="container">
</div>

<?php require('../includes/footer.php'); ?>