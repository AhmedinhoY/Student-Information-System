<?php require('includes/header.php');
$full_name= $_SESSION['staff_data']['full_name'];
?>

<div class="container">
      <h1><?php echo "hello, ". $full_name; ?></h1>
</div>

<?php require('includes/footer.php'); ?>