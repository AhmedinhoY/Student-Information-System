<?php 

function test_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
} 

// ======= function to generate email address for staff after entering thier fullname =======
function generate_email($name){
      
$name= strtolower($name);
$initials = '';

// Extract initials
$words = explode(' ', $name);
  $lastIndex = count($words) - 1;
  foreach ($words as $index => $word) {
    if ($index === $lastIndex) {
      // Keep the last word as it is
      $initials .= $word;
    } else {
      $initials .= substr($word, 0, 1);
    }
  }

// Generate the email
$domain = 'uob.edu.bh';
$generatedEmail = $initials . '@' . $domain;

return $generatedEmail; // Output the generated email
}

?>