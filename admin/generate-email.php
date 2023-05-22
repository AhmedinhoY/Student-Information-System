<?php
require('../includes/functions.php');
$name = generate_email($_REQUEST['q'] );?>

<label>Email</label>
<input type="text" placeholder="<?php echo $name?>" value="<?php echo $name?>" disable readonly>