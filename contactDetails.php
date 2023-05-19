<?php

  require 'includes/header.php';
  require  'includes/sidebar.php';

?>


<!--the Eric Meyer's Reset sheet-->
<link rel="stylesheet" href="styles/css-reset.css">
<link rel="stylesheet" href="CSS/style.css"> 
<link rel="stylesheet" href="CSS/contactDetails.css">


<!--font Awesome-->
<script src="https://kit.fontawesome.com/58aa1d359e.js" crossorigin="anonymous"></script> 




<div class="container">

  <div class="contact-info">

      <div class="box1">
          <div class="left-side">

                <div class="top">
                  <h1>Ali Mohamed Hassan Ali</h1>
                </div>
              
                <div class="bottom">

                  <div class="id11">
                    <i class="fa-regular fa-user"></i>
                    <p>  20197180</p>
                  </div>

                  <div class="degree11">
                  <i class="fa-solid fa-briefcase"></i>
                  <p> B.Sc. in Computer Science </p>
                  </div>
            
                </div>

          </div>

        <div class="right-side">
          
          <div class="top">
            <p>CH(Remaining 61 From 132)</p>
            <label for="major-progress">
              53% <?php //using php calculate this?>
            </label>
          </div>

          <div class="bottom">
            <input type="range" id="major-progress" 
            name="major-progress" min="0" max="100" value="53<?php //using php find this?>">
          </div>

        </div>

      </div> <!-- end of box1 -->

      <div class="box2">

        <div class="title">
          <h3>Student Details</h3>
        </div>

        <table>
          <tr> <th>Academic Year</th> <th>Semester</th> <th>Major</th> <th>Enrollment Status</th>
                <th> Passed CH </th> <th> CGPA</th> <TH> MCGPA</TH> <th>Academic Status</th>
          </tr>

          <tr> <td>2022/2023</td> <td>Second</td> <td> B.Sc. in Computer Science </td> <td> Enrolled </td> <td> 71</td>
                <td> 3.00</td> <td>4.00</td> <td> --</td> </tr>
        </table> 


        <div class="bottom-part">
          <!--right side-->
          <div class="right-part">
              <div class="title">
                <h3>Edit details</h3>
              </div>
              <div class="table-container">
                <table id="table">

                  <tr>
                    <th>Block</th>
                    <th>Road</th>
                    <th>Buliding or (Villa | House)</th>   
                    <th>Flat</th>
                    <th>Mobile Phone</th>
                    <th>Email</th>
                    <th>Emergency Mobile #</th>
                  </tr>

                  <tr>
                    <td> 603 </td>
                    <td> 341 </td>
                    <td> 2329 </td>
                    <td> -- </td>
                    <td>33992900</td>
                    <td>alis3348s@gmail.com</td>
                    <td>39338895</td>
                  </tr>

                </table>
              </div>
              <div class="Edit-btn">
                <button onclick="TableDisplay()">Edit</button>
                <button onclick="TableHide()" class='hide'>Hide Table</button>
              </div>
              

              <div class="update-container">
                <div class="bb1"> <p>Block: </p> <input type="text" name='block' id='block'></div>
                <div class="bb1"> <p>Road: </p> <input type="text" name='Road' id='Road'></div>
                <div class="bb1"> <p>Building: </p> <input type="text" name='Building' id='Building'></div>
                <div class="bb1"> <p>Flat: </p> <input type="text" name='Flat' id='Flat'></div>
                <div class="bb1"> <p>Mobile Phone: </p> <input type="text" name='Mobile' id='Mobile'></div>
                <div class="bb1"> <p>Email: </p> <input type="text" name='Email' id='Email'></div>
                <div class="bb1"> <p>Emergency Mobile #: </p> <input type="text" name='Emergency' id='Emergency'></div>


                <div class="Edit-btn">
                  <button onclick="editRow()" class="show">Update</button> 
                </div>

              </div>
             
              
          </div> <!--end of right part-->


     

        

        </div> <!--end of the bottom part in box2-->

        
      </div>


  </div> <!-- end of contact-info it makes controll what is in the container and separate things away from the container -->


</div> <!-- end of container -->


<script src="Js/contactDetails.js" > </script>

<?php

  require 'includes/footer.php';

?>