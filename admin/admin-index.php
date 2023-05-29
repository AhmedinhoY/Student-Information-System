<?php
require('../includes/header.php');
require('../includes/admin-sidebar.php');
require('../includes/admin-sessions.php');
?>

<div class="container">
      <div class="outer-div" style="height:100%;">
            <div class="inner-div" style="height:100%;">
                  <div class="inner-inner-div" style="height:50%; margin-bottom: 50px">
                        <div class="div-header">
                              <h2>
                                    Viewing
                              </h2>
                        </div>
                        <div class="div-body">
                              <a class="form-btn" style="text-decoration: none; margin: 5px"
                                    href="students-list.php">Students
                                    List</a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px" href="staff-list.php">Staff
                                    List</a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px"
                                    href="colleges-list.php">Colleges
                                    List</a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px"
                                    href="courses-list.php">Courses
                                    List</a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px"
                                    href="classrooms-list.php">Classrooms
                                    List</a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px"
                                    href="sections-list.php">Sections
                                    List</a>
                        </div>
                  </div>
                  <div class="inner-inner-div" style="height:50%; margin-bottom: 50px">
                        <div class="div-header">
                              <h2>
                                    My E-Services
                              </h2>
                        </div>
                        <div class="div-body">
                              <a class="form-btn" style="text-decoration: none; margin: 5px" href="add-student.php">Add
                                    Student
                              </a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px" href="add-staff.php">Add
                                    Staff
                              </a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px" href="add-college.php">Add
                                    College
                              </a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px" href="add-course.php">Add
                                    Course
                              </a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px"
                                    href="add-classroom.php">Add Classroom
                              </a>
                              <a class="form-btn" style="text-decoration: none; margin: 5px" href="add-section.php">Add
                                    Section
                              </a>
                        </div>
                  </div>

            </div>
            <div class="inner-div">

            </div>



      </div>
</div>

<?php require('../includes/footer.php'); ?>