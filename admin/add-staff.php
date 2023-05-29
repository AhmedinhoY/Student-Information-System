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

      if (isset($_POST["add-staff"])){
            $prefix= test_input($_POST["prefix"]); //done
            $full_name1= test_input($_POST["full-name"]);//done
            $email= test_input($_POST["email"]);//done
            $cpr= test_input($_POST["CPR"]);//done

            //password
            $password= test_input($_POST["CPR"]);
            if(empty($password)){
                  $err = '<h1 style="text-align:center;">Error: no input must be left empty!</h1>';
                  $c++;


            }
            //regular expression
            //password
            //min pass word is 3 chars, max 15 chars
            $pattPass = "/^[a-zA-Z0-9\@\#]{3,15}$/";
            if(preg_match($pattPass,$password)!= 1){
                  $err ='<h1 style="text-align:center;">Error: please enter your password correctly</h1>';
                  $c++;


            }
            $hashed_password= password_hash($password, PASSWORD_DEFAULT);
            //end password

            $mobile_number= test_input($_POST["mobile-number"]);//done

            if(!empty($_POST["college"])){
                  $college= test_input($_POST["college"]);//no need regular expression
            }
            if(!empty($_POST["gender"])){
                  $gender= test_input($_POST["gender"]);// no need regular expression


            }
            $job_title= test_input($_POST["job-title"]); //done 

            //empty? 
            if(empty($prefix)||empty($full_name1)||empty($email)||empty($cpr)||empty($mobile_number)||empty($college)||
            empty($gender)||empty($job_title)){
                  $err ='<h1 style="text-align:center;">Error: no input must be left empty!</h1>';
                  $c++;


            }

            //full_name
            // capital or small letters will be accepted with spaces , maximum 80 chars
            $pattFull = "/^[a-zA-Z\s]{3,80}$/";
            if(preg_match($pattFull,$full_name1)!= 1){
                  $err ='<h1 style="text-align:center;">Error: please enter your Full name correctly</h1>';
                  $c++;


            }

            $full_name= $prefix." ".$full_name1; //HELLO

            //email
            //any email will work: alis3348s@gmail.com, 20197180@stu.uob.edu.bh
            $pattEmail = "/^[a-zA-Z0-9_-]+@[a-zA-Z0-9.]+$/";
            if(preg_match($pattEmail,$email)!= 1){
                  $err ='<h1 style="text-align:center;">Error: please enter your email correctly</h1>';
                  $c++;


            }

            
            //CPR
            //enter 9 digits, starts only from the 80's, any bahraini cpr will work: 010512345
            $pattCpr = "/^([8-9][0-9]|0{1}[0-9]|1{1}[0-9]|[2][0-3])([0][1-9]|[1][0-2])\d{5}$/";
            if(preg_match($pattCpr,$cpr)!= 1){
                  $err ='<h1 style="text-align:center;">Error: please enter your Cpr correctly</h1>';
                  $c++;


            }

            //mobile number
            //ex: 00973 33992900, 33992900 both accepted, must be 8 numbers to be exact
            $pattMob = "/^((\+[0-9]{3}|00[0-9]{3})?)[0-9]{8}$/";
            if(preg_match($pattMob,$mobile_number)!= 1){
                  $err ='<h1 style="text-align:center;">Error: please enter your mobile number correctly</h1>';
                  $c++;


            }

            //job_title
            $pattJob = "/^[a-zA-Z\s]{3,80}$/";
            if(preg_match($pattJob,$job_title)!= 1){
                  $err ='<h1 style="text-align:center;">Error: Error: please enter your job title correctly </h1>';
                  $c++;


            }

            $sql11="select * from staff";
            $s= $db->prepare($sql11); 
            $s->execute();
            $rows =$s->fetchAll(PDO::FETCH_NUM); 

            foreach($rows as $row){

                  if($row[3]==$email){
                  $err ='<h1 style="text-align:center;">Error: this email exits</h1>';
                  $c++;
                  }

                  if($row[7]==$mobile_number){
                        $err ='<h1 style="text-align:center;">Error: this mobile number exits</h1>';
                        $c++;
                        }


                  if($row[5]==$cpr){
                        $err ='<h1 style="text-align:center;">Error: this CPR exits</h1>';
                        $c++;
                        }//hello

        

          

            }

            //office number ? --no need ? 

            if($c==0){

            
            // echo $email ;
            // echo $job_title ;            
            $insertion_query= "insert into staff (fullName, CPR, email, password, collegeID,
            gender, jobTitle, phoneNumber)
            values('$full_name', '$cpr', '$email', '$hashed_password', '$college',
            '$gender', '$job_title', '$mobile_number')";
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
                        <h2>Add Staff</h2>
                        
                  </div>
                  <h2>  <?php echo $err;?> </h2>
                  <div class="form-body">
                        <form action="" method="POST">
                              <div class="fields">

                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>Prefix</label>
                                                <select name="prefix" required>
                                                      <option disabled selected value="">Prefix</option>
                                                      <option value="Dr.">Dr.</option>
                                                      <option value="Mr.">Mr.</option>
                                                      <option value="Ms.">Ms.</option>
                                                      <option value="Mrs.">Mrs.</option>
                                                      <option value="Emp.">Emp.</option>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Full Name</label>
                                                <input type="text" onkeyup="generateEmail(this.value)"
                                                      placeholder="Staff's full name" value="" name="full-name"
                                                      required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>CPR</label>
                                                <input type="text" placeholder="Staff's CPR" name="CPR" required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Job Title</label>
                                                <input type="text" placeholder="Staff's Job Title" name="job-title"
                                                      required>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Gender</label>
                                                <select name="gender" required>
                                                      <option disabled selected>Gender</option>
                                                      <option>Male</option>
                                                      <option>Female</option>
                                                </select>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="email" style="">
                                                <label>Email</label>
                                                <input type="text" placeholder="Staff's Email" value="" name="email"
                                                      disable readonly>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Mobile Number</label>
                                                <input type="text" placeholder="Staff's Mobile Number"
                                                      name="mobile-number" required>
                                          </div>

                                    </div>
                                    <div>

                                          <div class="input-field" id="input-field">
                                                <label>College</label>
                                                <select name="college" required>
                                                      <option disabled selected>College</option>
                                                      <?php foreach ($college_rs as $row) { ?>
                                                      <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?>
                                                      </option>
                                                      <?php } ?>
                                                </select>
                                          </div>
                                          <div class="input-field" id="input-field">
                                                <label>Office Number</label>
                                                <input type="text" placeholder="Office Number" name="office">
                                          </div>
                                    </div>

                              </div>


                              <button type="submit" class="form-btn" name="add-staff">Add Staff</button>
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
</script>
<?php require('../includes/footer.php'); ?>