<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
require('../includes/functions.php');
try {
      require('../includes/connection.php');

      //college selection
      $college_sql= "select collegeID, collegeName from college";
      $college_rs= $db->query($college_sql);
      $err="";

      if (isset($_POST["add-course"])){
            //counter
            $c=0;

            //validation of inputs
            $course= test_input($_POST["c-code"]);
            $course_name= test_input($_POST["c-name"]);

            if(!empty($_POST["college"])){
                  $college= test_input($_POST["college"]); //selection
            }
         
            $course_description= test_input($_POST["c-description"]);
            $pre_requisite= test_input($_POST["pre-requisite"]);

            if(!empty($_POST["credits"])){
                  $credits= test_input($_POST["credits"]);//selection
            }
       

            //empty? 
            if(empty($course)||empty($course_name)||empty($college)||empty($course_description)||
            empty($pre_requisite)||empty($credits)){

                  $err='<h3 style="text-align:center; color: red;">Error: No input must be left empty!</h3>';
                  $c++;


            }

            //regular expressions for: 

                  //course code
                  //examples that work: ITCS333, ITCS 333, MKT121
                  $pattCode = "/^[A-Z]{3,6}\s?\d{3,6}$/";
                  if(preg_match($pattCode,$course)!= 1){

                        $err= '<h3 style="text-align:center; color: red;"> Error: Please enter a correct course code! </h3>';
                        $c++;

                  }

                  $sql11="select * from course";
                  $s=$db->prepare($sql11);
                  $s->execute();
                  $rows = $s->fetchAll(PDO::FETCH_NUM);
                  foreach($rows as $row){
                        if($row[0]==$course){
                              $err="Error:course already exits";
                              $c++;
                        }
                  }

                  //course name 
                  // any course name will work , max limit is 80 characters
                  $pattName = "/^[a-zA-Z\s]{3,80}$/";
                  if(preg_match($pattName,$course_name)!= 1){

                        $err='<h3 style="text-align:center; color:red;"> Error: Please enter a correct Course Name! </h3>';
                        $c++;


                        
                  }

                  //course description 
                  //describe the material of the course, it will work... 
                  $pattDescription = "/^[a-zA-Z\s\.\,\:]+$/";
                  if(preg_match($pattDescription,$course_description)!= 1){

                        $err='<h3 style="text-align:center; color:red;"> Error: Please enter a correct Course description! </h3>';
                        $c++;


                  }

                  //pre-requisite
                  //examples that work: ITCS333, ITCS 333, MKT121
                  $pattPreReq = "/^[A-Z]{3,6}\s?\d{3,6}$/";
                  if(preg_match($pattPreReq,$pre_requisite)!= 1){

                        $err='<h3 style="text-align:center; color: red;"> Error: Please enter a correct pre_requisite! </h3>';
                        $c++;


                  }

                  if($c==0){
                        
                        $insertion_query= "insert into course values('$course', $college , '$course_name' ,'$course_description', $credits ,'$pre_requisite')";
                        $result = $db->exec($insertion_query);
                  }


      }



} catch (PDOException $e){
die("error: " . $e->getMessage());
}
?>

<div class="container">
      <div class="form">
            <div class="form-element">
                  <div class="form-header">
                        <h2>Add Course</h2>

                  </div>
                  <div><?php echo $err;?></div>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div style="width:100%">
                                          <div class="input-field" id="input-field">
                                                <label>Course Code</label>
                                                <input type="text" placeholder="Course Code" name="c-code" required>
                                          </div>
                                          <div class="input-field" id="input-field" style="width:40%">
                                                <label>Course Name</label>
                                                <input type="text" style="width:100%" placeholder="Course Name"
                                                      name="c-name" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>College</label>
                                                <select required id="college-select" name="college"
                                                      onchange="updateMajorSelection(this.value); updateAdvisorSelection(this.value)">
                                                      <option value="" hidden disabled selected>College</option>
                                                      <?php foreach ($college_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>

                                    </div>
                                    <div style="width:100%">
                                          <div class="input-field" style="width:60%" id="input-field">
                                                <label>Course Description</label>
                                                <input type="text" style="width:100%" placeholder="Course Description"
                                                      name="c-description" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Pre-Requisite</label>
                                                <input type="text" name="pre-requisite" placeholder="Pre-Requisite"
                                                      required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Credits</label>
                                                <select name="credits" required>
                                                      <option value="" hidden selected disabled>Credits</option>
                                                      <option>1</option>
                                                      <option>2</option>
                                                      <option>3</option>
                                                      <option>4</option>
                                                </select>
                                          </div>

                                    </div>

                              </div>


                              <button type="submit" class="form-btn" name="add-course">Add Course</button>
                        </form>
                  </div>
            </div>
      </div>
</div>

<!-- <script>
window.addEventListener('DOMContentLoaded', function() {
      var inputFields = document.querySelectorAll('.input-field input[type="text"]');
      inputFields.forEach(function(inputField) {
            inputField.style.width = (inputField.placeholder.length + 3) + 'ch';
      });
});
</script> -->

<?php require('../includes/footer.php'); ?>