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

// ====== function to calculate the gpa =====
function calculateGPA($grades, $creditHours) {
  // Ensure that the arrays have the same length
  if (count($grades) !== count($creditHours)) {
      return null;
  }

  $totalCreditHours = array_sum($creditHours);
  $gradePoints = 0;

  for ($i = 0; $i < count($grades); $i++) {
      $grade = strtoupper($grades[$i]);
      $creditHour = $creditHours[$i];

      // Calculate grade points based on the grade
      switch ($grade) {
          case "A":
              $gradePoints += (4.0 * $creditHour);
              break;
          case "A-":
            $gradePoints += (3.67 * $creditHour);
            break;
          case "B+":
              $gradePoints += (3.33 * $creditHour);
              break;
          case "B":
              $gradePoints += (3.0 * $creditHour);
              break;
          case "B-":
            $gradePoints += (2.67 * $creditHour);
            break;
          case "C+":
              $gradePoints += (2.33 * $creditHour);
              break;
          case "C":
              $gradePoints += (2.0 * $creditHour);
              break;
          case "C-":
            $gradePoints += (1.67 * $creditHour);
            break;
          case "D+":
              $gradePoints += (1.33 * $creditHour);
              break;
          case "D":
              $gradePoints += (1.0 * $creditHour);
              break;
          case "F":
              // No grade points for failing grade
              break;
          default:
              // Invalid grade
              return null;
      }
  }

  // Calculate GPA
  $gpa = $gradePoints / $totalCreditHours;

  // Round GPA to two decimal places
  $gpa = round($gpa, 2);

  return $gpa;
}

// ====== function to calculate the commulative gpa =====
function calculateCGPA($grades, $creditHours, $pastGPA ,$passedHrs) {
  // Ensure that the arrays have the same length
  if (count($grades) !== count($creditHours)) {
      return null;
  }

  $totalCreditHours = array_sum($creditHours);
  $cgradePoints = 0;

  for ($i = 0; $i < count($grades); $i++) {
      $grade = strtoupper($grades[$i]);
      $creditHour = $creditHours[$i];

      // Calculate grade points based on the grade
      switch ($grade) {
          case "A":
              $cgradePoints += (4.0 * $creditHour);
              break;
          case "A-":
            $cgradePoints += (3.67 * $creditHour);
            break;
          case "B+":
              $cgradePoints += (3.33 * $creditHour);
              break;
          case "B":
              $cgradePoints += (3.0 * $creditHour);
              break;
          case "B-":
            $cgradePoints += (2.67 * $creditHour);
            break;
          case "C+":
              $cgradePoints += (2.33 * $creditHour);
              break;
          case "C":
              $cgradePoints += (2.0 * $creditHour);
              break;
          case "C-":
            $cgradePoints += (1.67 * $creditHour);
            break;
          case "D+":
              $cgradePoints += (1.33 * $creditHour);
              break;
          case "D":
              $cgradePoints += (1.0 * $creditHour);
              break;
          case "F":
              // No grade points for failing grade
              break;
          default:
              // Invalid grade
              return null;
      }
  }

  // Calculate GPA
  $gpa = $cgradePoints / $totalCreditHours;
  $cgpa = (($gpa*$totalCreditHours)+($pastGPA*$passedHrs)) / ($totalCreditHours+$passedHrs);

  // Round GPA to two decimal places
  $cgpa = round($cgpa, 2);

  return $cgpa;
}


?>