<?php require('includes/header.php'); ?>
<?php require('includes/sidebar.php'); ?>
<!--Done by Ali Al-shaikh-->
<!--links-->
    <!--the reset sheet by someone please add his name here-->
    <link rel="stylesheet" href="styles/css-reset.css">
    <link rel="stylesheet" href="CSS/style.css"> 
    <link rel="stylesheet" href="CSS/course-registeration.css">


    <!--font Awesome-->
    <script src="https://kit.fontawesome.com/58aa1d359e.js" crossorigin="anonymous"></script> 

<div class="container">

    <div class="page-title">
      <i class="fa-solid fa-grip-lines-vertical"></i>
      <i class="fa-solid fa-arrow-right"></i>
      <h3>Student Registration Form</h3>
    </div>



    <div class="stu">

      <div class="add-newCourse">

        <div class="offerredCourses">

            <form method="post" action="">

              <div class="box1">
                  <label for="courses">OfferedCourses: </label>
                  <select name ="courses" id="courses" >
                 
                    <option value="ITCS489" >ITCS489</option>
                    <option value="ITCS333" >ITCS333</option>
                    <option value="ITCS321" >ITCS321</option>

                  </select>
                  <br>
               

              
                  <label for="section">section: </label>
                  <select name ="section" id="section">
                    <option value="section 01" >section 01</option>
                    <option value="section 02" >section 02</option>
                    <option value="section 03" >section 03</option>
                  </select>
                  <br>
              </div>


              <div class="section-details">

                <table>
                    <tr>
                      <th>Slot</th>
                      <th>Section</th>
                      <th>Instructor</th>
                      <th>Exam Time</th>
                      <th>Room</th>
                    </tr>

                    <tr>
                      <td>[Days: U,T,H]-- [Time: 9:00 - 9:30 ,14:00 -15:40]</td>
                      <td>1</td>
                      <td>Dr. Taher</td>
                      <td>2023-01-07 11:30 - 13:30</td>
                      <td>S40-1001</td>
                    </tr>


                </table>

              </div>

              

              <div class="box2">
                <button type="submit" name="rs" >Register</button>
                <button type="submit" name="cancel" >cancel</button>
              </div>
    
            </form>
        </div>


      </div><!--add-newCourse-->
    </div><!--end of stu-registeration-->


    <div class="registeredCourses">

            <form method="post" action="">

              <div class="box1">
                <p>20197180</p>
                <p>ALI SHAIKH HUSAIN</p>
                <p>B.Sc. in Computer Science - 2016</p>
                <p>Academic Status: Excellence</p>
                <p>Academic Load: (12.0 CH To 21.0 CH)</p>
                <p>Remain CH: 109.00</p>
                <p>Registered CH: 5.0</p>
              </div>

              <div class="box2">
                <table>
                  <tr>  
                      <th>Course Code</th> <th>Section</th>  <th>Course Title</th>  
                      <th>CH</th>  <th>Slot</th> <th>Rooms</th> <th>Instructor</th>
                      <th>Fees</th> <th>Paid</th> <th> </th> <th> </th>
                  </tr>

                  <tr>
                      <td>ITCS 489</td> <td>01</td> <td>SOFTWARE ENGINEERING 2</td> <td>3.0</td>
                      <td>[Days: U,T,H]-- [Time: 9:00 - 9:30 ,14:00 -15:40]</td> <td> S40 - 1067</td>
                      <td>Dr.Taher</td> <td>24.00</td> <td style="color:red;">No</td> 
                      <td> <button type='submit' name='replace'> <i class="fa-solid fa-arrows-spin"></i> </button> </td>
                      <td> <button type='submit' name='delete'> <i class="fa-solid fa-trash"></i> </button> </td>
                  </tr>
                </table>
              </div>

              <div class="box3">
                <button type='submit' name='pay' > Pay </button>
              </div>
            </form>

    </div>


</div> <!--end of container-->
<?php require('includes/footer.php'); ?>
