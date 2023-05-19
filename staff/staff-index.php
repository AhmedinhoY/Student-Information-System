<?php
require('../includes/header.php');
require('../includes/staff-sidebar.php');

$active_user= $_SESSION['active_user'];
$student_id= $_SESSION['staff_data']['staff_ID'];
$full_name= $_SESSION['staff_data']['full_name'];
$email= $_SESSION['staff_data']['email'];?>

<div class="container">
</div>

<?php require('../includes/footer.php'); ?>