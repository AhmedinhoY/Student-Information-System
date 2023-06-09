<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
require('../includes/functions.php');
try {
      require('../includes/connection.php');
      $c=0;
      $err="";
      //college selection
      $college_sql= "select collegeID, collegeName from college";
      $college_rs= $db->query($college_sql);

      //major selection AJAX
      if (isset($_POST['selected'])) {
            $selectedValue = $_POST['selected'];
      // Retrieve options from the database based on the selected value
            $query = "select majorID, majorName FROM major WHERE collegeID = '$selectedValue'";
            $query_rs= $db->query($query);
      
      }

      //studentID id
      $next_id_query="select MAX(studentID) + 1 AS next_id FROM studentInfo;";
      $next_id_rs= $db->query($next_id_query);
      $row= $next_id_rs->fetch();

      if (isset($_POST["add-student"])){

            //validation here
            //test_input function... ------------------------------------------------------------------------------------------------------------------------------------------------
            $student_id= test_input($_POST["student-id"]);
            $full_name= test_input($_POST["full-name"]);
            $cpr= test_input($_POST["CPR"]);
            $email= test_input($_POST["email"]);

            $password= test_input($_POST["CPR"]);

            if(empty($password)){
    
            $err ='<h1 style="text-align:center;">Error: no input must be left empty!</h1>';
            $c++;

            }

            //password
            //min pass word is 3 chars, max 15 chars
            $pattPass = "/^[a-zA-Z0-9\@\#]{3,15}$/";
            if(preg_match($pattPass,$password)!= 1){
                  $err ='<h1 style="text-align:center;">Error: please enter your password correctly</h1>';
                  $c++;


            }

            $hashed_password= password_hash($password, PASSWORD_DEFAULT);


            $mobile_number= test_input($_POST["mobile-number"]);
           
            
      
            

            if(!empty($_POST["college"])){
                  $college= test_input($_POST["college"]);//select 

            }
            if(!empty($_POST["gender"])){
                  $gender= test_input($_POST["gender"]); //select 
                  
            }
            if(!empty($_POST["major"])){

                  $major= test_input($_POST["major"]);//select
            }  
             if(!empty($_POST["advisor"])){

                  $advisor= test_input($_POST["advisor"]);//select

            }
            

            //is empty
            if(empty($student_id)||empty($full_name)||empty($cpr)||empty($email)||empty($mobile_number)||empty($college)||empty($gender)
            ||empty($major)||empty($advisor)){
                  
                  $err ='<h1 style="text-align:center;">Error: no input must be left empty!</h1>';
                   $c++;



            }


            //regular expressions
            
            //student
            //it must start with 20 , followed by 1 or 2 then any num 0-9, then 5 random digits, example: 20197180 , 202003838,etc..
            $pattStu = "/^(20){1}([1-2]{1}[0-9]{1})\d{4,5}$/";
            if(preg_match($pattStu,$student_id)!= 1){

                  $err ='<h1 style="text-align:center;">Error: please check your student id</h1>';
                  $c++;


            }

            //full_name
            //and capital or small letters will be accepted, maximum 80 chars
            $pattFull = "/^[a-zA-Z\s]{3,80}$/";
            if(preg_match($pattFull,$full_name)!= 1){
                  $err ='<h1 style="text-align:center;">Error: please enter your Full name correctly</h1>';
                   $c++;


                  
            }

            //CPR
            //enter 9 digits, starts only from the 80's, any bahraini cpr will work: 010512345
            $pattCpr = "/^([8-9][0-9]|0{1}[0-9]|1{1}[0-9]|[2][0-3])([0][1-9]|[1][0-2])\d{5}$/";
            if(preg_match($pattCpr,$cpr)!= 1){
                  $err ='<h1 style="text-align:center;">Error: please enter your Cpr correctly</h1>';
                  $c++;


            }


            //email
            //any email will work: alis3348s@gmail.com, 20197180@stu.uob.edu.bh
            $pattEmail = "/^[a-zA-Z0-9_-]+@[a-zA-Z0-9.]+$/";
            if(preg_match($pattEmail,$email)!= 1){
                  $err ='<h1 style="text-align:center;">Error: please enter your email correctly</h1>';
                  $c++;

            }




            //mobile number
            //ex: 00973 33992900, 33992900 both accepted, must be 8 numbers to be exact
            $pattMob = "/^((\+[0-9]{3}|00[0-9]{3})?)[0-9]{8}$/";
            if(preg_match($pattMob,$mobile_number)!= 1){

                  $err ='<h1 style="text-align:center;">Error: please enter your mobile number correctly</h1>';
                  $c++;


            }



            $sql11='select * from studentInfo';
            $s =$db->prepare($sql11); 
            $s->execute();
            $rows = $s->fetchAll(PDO::FETCH_NUM);
            foreach($rows as $row){
                  if($row[0]==$student_id){
                  $err ='<h1 style="text-align:center;">Error: this username exits</h1>';
                  $c++;
                  }

                  if($row[3]==$cpr){
                        $err ='<h1 style="text-align:center;">Error: this cpr exits</h1>';
                        $c++;
                        }

                                        
                  if($row[6]==$mobile_number){
                        $err ='<h1 style="text-align:center;">Error: this mobile number exits</h1>';
                        $c++;
                        }

       
                        


            }
            //----------------------------------------VALIDATION END--------------------------------------------------------------

            //do we need to validate these? 

           
            if (empty($_POST['flat'])){
                  $flat= "null";

            } else {
                  $flat= $_POST["flat"];
            }
            if (empty($_POST["building"])){
                  $building= "null";

            } else {
                  $building= $_POST["building"];
            }
            if (empty($_POST["road"])){
                  $road= "null";

            } else {
                  $road= $_POST["road"];
            }
            if (empty($_POST["block"])){
                  $block= "null";

            } else {
                  $block= $_POST["block"];
            }

            $current_year= date('y');

           if($c==0){
            $insertion_query= "insert into studentInfo (studentID, fullName, CPR, email, password, phoneNumber, collegeID,
            gender, majorID, CGPA, MCGPA, passedCH, academicStatus, enrollmentStatus, advisorID, yearOfJoin, flat, building, road, block)
            values('$student_id', '$full_name', '$cpr', '$email', '$hashed_password', '$mobile_number', '$college',
            '$gender', '$major', 0, 0, 0, '--', 'enrolled', '$advisor', '$current_year' , '$flat', '$building', '$road', '$block')";
            $result = $db->exec($insertion_query);
           }
            
   

      } //end of the submit button



} catch (PDOException $e){
die("<h5 style='text-align:center margin-top:200px;margin-left:150px;'>error: ". $e->getMessage()."</h5>");
}
?>

<div class="container">
      <div class="form">
            <div class="form-element">
                  <div class="form-header">
                        <h2>Add Student</h2>
                        <div class="kkk">
                              <h3><?php echo $err?></h3>

                        </div>
                  </div>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div>
                                          <div class="input-field" id="input-field">
                                                <label>Sudent ID</label>
                                                <input type="text" placeholder="<?php echo $row[0] ?>" name="student-id"
                                                      value="<?php echo $row[0] ?>" readonly>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Full Name</label>
                                                <input type="text" placeholder="Student's full name" name="full-name"
                                                      required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>CPR</label>
                                                <input type="text" placeholder="Student's CPR" name="CPR" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Gender</label>
                                                <select required name="gender">
                                                      <option disabled selected>Gender</option>
                                                      <option>Male</option>
                                                      <option>Female</option>
                                                </select>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>Email</label>
                                                <input type="text" placeholder="<?php echo $row[0] ?>@uob.stu.edu.bh"
                                                      name="email" value="<?php echo $row[0] ?>@uob.stu.edu.bh" disable
                                                      readonly>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Mobile Number</label>
                                                <input type="text" placeholder="Student's Mobile Number"
                                                      name="mobile-number" required>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>College</label>
                                                <select required id="college-select" name="college"
                                                      onchange="updateMajorSelection(this.value); updateAdvisorSelection(this.value)">
                                                      <option disabled selected>College</option>
                                                      <?php foreach ($college_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Major</label>
                                                <select required id="major-select" name="major">
                                                      <option disabled selected>Major</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Advisor</label>
                                                <select required id="advisor-select" name="advisor">
                                                      <option disabled selected>Student's Advisor</option>
                                                </select>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>Flat</label>
                                                <input type="text" placeholder="Flat" name="flat">
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Building</label>
                                                <input type="text" placeholder="Building" name="building">
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Road</label>
                                                <input type="text" placeholder="Road" name="road">
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Block</label>
                                                <input type="text" placeholder="Block" name="block">
                                          </div>

                                    </div>
                              </div>


                              <button type="submit" class="form-btn" name="add-student">Add Student</button>
                        </form>
                  </div>
            </div>
      </div>
</div>

<script>
window.addEventListener('DOMContentLoaded', function() {
      var inputFields = document.querySelectorAll('.input-field input[type="text"]');
      inputFields.forEach(function(inputField) {
            inputField.style.width = (inputField.placeholder.length + 3) + 'ch';
      });
});

if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
}
</script>

<?php require('../includes/footer.php'); ?>