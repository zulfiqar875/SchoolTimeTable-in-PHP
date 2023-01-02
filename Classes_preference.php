<?php
  session_start();
  $admin_id=$_SESSION["faculty_id"];
  $myranked=$_SESSION["ranked"];

  $con=mysqli_connect('localhost','root','','school');
  $query="SELECT * FROM `faculty` WHERE id='$admin_id'";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  $data=mysqli_fetch_assoc($run);

  $teacher = $data['Name'];

  // echo $ranked;
  if(isset($admin_id))
  {

  }
  else{
      header("location:login.php");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Login</title>
</head>
<style>
  body {
    background-image: url('https://img.freepik.com/free-vector/high-school-concept-illustration_114360-8279.jpg?w=2000');
    background-position: center;
    background-repeat: no-repeat;

  }

  .main {
    background-color: rgba(21, 85, 55, 0.571);
  }

  #monday,
  #tuesday,
  #wednesday,
  #thursday,
  #friday {
    visibility: hidden;
  }
</style>

<body>
  <div class="main m-5">
    <div class="header text-center">
      <nav class="navbar navbar-expand-lg" style=" background-color: rgba(21, 85, 55, 0.523);">
        <a class="navbar-brand text-light" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link text-light" href="Course_preference.php">Classes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="teachertimetable.php">Time table</a>
            </li>

          </ul>
          <form class="form-inline my-2 my-lg-0">
              <h5 class="text-light">
              <?php 
                $con=mysqli_connect('localhost','root','','school');
                $query="SELECT * FROM `faculty` WHERE id = $admin_id";
                $run=mysqli_query($con,$query);
                $row=mysqli_num_rows($run);
            
                while($data=mysqli_fetch_assoc($run))
                { 
                  echo $data['Name'];
                } 
              ?>
              </h4>  

            <a href="logout.php" class="btn btn-outline-light my-2 my-sm-0 text-light" type="button">
            Logout</a>
          </form>
        </div>
      </nav>
    </div>
    <hr>
    <div class="login mt-5  pt-5ml-5 mr-5 p-5 text-light">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Class
        Preference</button>

      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add New Class</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post" class="Business_Type">
                <div class="row">
                  <input type="hidden" value="<?php echo $_SESSION["faculty_id"];?>" name="faculty">
                  <input type="hidden" value="<?php echo $_SESSION["ranked"];?>" name="ranked">
                  <div class="col-sm-6 mt-2">
                    <select name="course" required id="" class="form-control">
                      <option value="" selected disabled> -- Select Course --</option>
                      <?php 
                            $con=mysqli_connect('localhost','root','','school');
                            $query="SELECT * FROM `courseoffer` Where facultyid = '$teacher'";
                            $run=mysqli_query($con,$query);
                            $row=mysqli_num_rows($run);
                        
                              while($data=mysqli_fetch_assoc($run))
                              {  
                                ?>
                      <option value="<?php echo $data['coursename'];?>">
                        <?php echo $data['coursename'];?>
                       
                      </option>

                      <?php
                              } ?>

                    </select>
                  </div>

                  <div class="col-sm-6 mt-2">
                    <select name="room" required id="" class="form-control">
                      <option value="" selected disabled> -- Select Room --</option>
                      <?php 
                            $con=mysqli_connect('localhost','root','','school');
                            $query="SELECT * FROM `class`";
                            $run=mysqli_query($con,$query);
                            $row=mysqli_num_rows($run);
                        
                              while($data=mysqli_fetch_assoc($run))
                              {  
                                ?>
                      <option value="<?php echo $data['room'];?>"> Room No.:
                        <?php echo $data['room'];?> - Capacity:
                        <?php echo $data['capacity'];?>
                      </option>

                      <?php
                              } ?>

                    </select>
                  </div>

                  <div class="col-sm-12 mt-2">

                    <!-- --------------- MONDAY ---------------- -->
                    <div class="row mt-3">
                      <div class="col-sm-2">
                        <label for="" class="text-dark">Monday</label>
                      </div>
                      <div class="col-sm-9">
                        <div class="row">
                          <select name="time1" class="form-control"  id="" required>
                          <option value="" selected disabled> -- Select Time --</option>
                          <?php 
                          
                          $con=mysqli_connect('localhost','root','','school');
                          $query="SELECT * FROM `time`";
                          $run=mysqli_query($con,$query);
                          $row=mysqli_num_rows($run);
                          while($data=mysqli_fetch_assoc($run))
                            { 
                              // echo "NEXT";
                              if($data['Dayname'] == 'Monday') 
                              {
                                if($data['Status'] == '0')
                                {
                                  ?>
                                    <option value="<?php echo $data['Tid'];?>"><?php echo $data['Slot'];?></option>
                                  <?php
                                   
                                }
                               
                                else if($data['Status'] == '1')
                                {
                                    if ($myranked > $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" ><?php echo $data['Slot'];?></option>
                                      <?php
                                    }
                                    else if ($myranked <= $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" disabled ><?php echo $data['Slot'];?> - Reserved</option>
                                      <?php
                                    }
                                    
                                        

 
                                }
                              }
                            } ?>
                            <option value="0"> None</option>
                            </select>
                        </div>
                      </div>
                    </div>

                    <!-- --------------- Tuesday ---------------- -->
                    <div class="row mt-3">
                      <div class="col-sm-2">
                        <label for="" class="text-dark">Tuesday</label>
                      </div>
                      <div class="col-sm-9">
                      <div class="row">
                          <select name="time2" class="form-control"  id="" required>
                          <option value="" selected disabled> -- Select Time --</option>
                          <?php 
                          $con=mysqli_connect('localhost','root','','school');
                          $query="SELECT * FROM `time`";
                          $run=mysqli_query($con,$query);
                          $row=mysqli_num_rows($run);
                          while($data=mysqli_fetch_assoc($run))
                            { 
                              if($data['Dayname'] == 'Tuesday') 
                              {
                                if($data['Status'] == '0')
                                {
                                  ?>
                                    <option value="<?php echo $data['Tid'];?>"><?php echo $data['Slot'];?></option>
                                  <?php
                                }
                                else if($data['Status'] == '1')
                                {
                                  if ($myranked >= $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" ><?php echo $data['Slot'];?></option>
                                      <?php
                                    }
                                    else if ($myranked < $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" disabled ><?php echo $data['Slot'];?> - Reserved</option>
                                      <?php
                                    }
                                }
                              }
                              
                            } ?>
                            <option value="0"> None</option>
                            </select>
                        </div>
                      </div>
                    </div>

                    <!-- --------------- Wednesday ---------------- -->
                    <div class="row mt-3">
                      <div class="col-sm-2">
                        <label for="" class="text-dark">Wednesday</label>
                      </div>
                      <div class="col-sm-9">
                      <div class="row">
                          <select name="time3" class="form-control"  id="" required>
                          <option value="" selected disabled> -- Select Time --</option>
                          <?php 
                          $con=mysqli_connect('localhost','root','','school');
                          $query="SELECT * FROM `time`";
                          $run=mysqli_query($con,$query);
                          $row=mysqli_num_rows($run);
                          while($data=mysqli_fetch_assoc($run))
                            { 
                              if($data['Dayname'] == 'Wednesday') 
                              {
                                if($data['Status'] == '0')
                                {
                                  ?>
                                    <option value="<?php echo $data['Tid'];?>"><?php echo $data['Slot'];?></option>
                                  <?php
                                }
                                else if($data['Status'] == '1')
                                {
                                  if ($myranked >= $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" ><?php echo $data['Slot'];?></option>
                                      <?php
                                    }
                                    else if ($myranked < $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" disabled ><?php echo $data['Slot'];?> - Reserved</option>
                                      <?php
                                    }
                                }
                              }
                            } ?>
                            <option value="0"> None</option>
                            </select>
                        </div>
                      </div>
                    </div>

                    <!-- --------------- Thursday ---------------- -->
                    <div class="row mt-3">
                      <div class="col-sm-2">
                        <label for="" class="text-dark">Thursday</label>
                      </div>
                      <div class="col-sm-9">
                      <div class="row">
                          <select name="time4" class="form-control"  id="" required>
                          <option value="" selected disabled> -- Select Time --</option>
                          <?php 
                          $con=mysqli_connect('localhost','root','','school');
                          $query="SELECT * FROM `time`";
                          $run=mysqli_query($con,$query);
                          $row=mysqli_num_rows($run);
                          while($data=mysqli_fetch_assoc($run))
                            { 
                              if($data['Dayname'] == 'Thursday') 
                              {
                                if($data['Status'] == '0')
                                {
                                  ?>
                                    <option value="<?php echo $data['Tid'];?>"><?php echo $data['Slot'];?></option>
                                  <?php
                                }
                                else if($data['Status'] == '1')
                                {
                                    if ($myranked >= $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" ><?php echo $data['Slot'];?></option>
                                      <?php
                                    }
                                    else if ($myranked < $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" disabled ><?php echo $data['Slot'];?> - Reserved</option>
                                      <?php
                                    }
                                }
                              }
                            } ?>
                            <option value="0"> None</option>
                            </select>
                        </div>
                      </div>
                    </div>

                    <!-- --------------- Friday ---------------- -->
                    <div class="row mt-3">
                      <div class="col-sm-2">
                        <label for="" class="text-dark">Friday</label>
                      </div>
                      <div class="col-sm-9">
                      <div class="row">
                          <select name="time5" class="form-control"  id="" required>
                          <option value="" selected disabled> -- Select Time --</option>
                          <?php 
                          $con=mysqli_connect('localhost','root','','school');
                          $query="SELECT * FROM `time`";
                          $run=mysqli_query($con,$query);
                          $row=mysqli_num_rows($run);
                          while($data=mysqli_fetch_assoc($run))
                            { 
                              if($data['Dayname'] == 'Friday') 
                              {
                                if($data['Status'] == '0')
                                {
                                  ?>
                                    <option value="<?php echo $data['Tid'];?>"><?php echo $data['Slot'];?></option>
                                  <?php
                                }
                                else if($data['Status'] == '1')
                                {
                                  if ($myranked >= $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" ><?php echo $data['Slot'];?></option>
                                      <?php
                                    }
                                    else if ($myranked < $data['course'])
                                    {
                                      ?>
                                        <option value="<?php echo $data['Tid'];?>" disabled ><?php echo $data['Slot'];?> - Reserved</option>
                                      <?php
                                    }
                                }
                              }
                            } ?>
                            <option value="0"> None</option>
                            </select>
                        </div>
                    </div>

                  </div>
                  <div class="col-sm-12 mt-2">
                    <input type="submit" value="Add Course" name="course_pref" class="form-control btn btn-primary">
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
          </div>
        </div>
      </div>
    </div>
    <table class="table">
        <thead class="text-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Course</th>
            <th scope="col">Day</th>
            <th scope="col">Time</th>
            <th scope="col">Room</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $con=mysqli_connect('localhost','root','','school');
            $query="SELECT * FROM `schedule` Where Uid = $admin_id";
            $run=mysqli_query($con,$query);
            $row=mysqli_num_rows($run);
            $i=1;
            $sum=0;
          
            while($data=mysqli_fetch_assoc($run))
            {  
              ?>
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $data['Course'];?> </td>
                <td><?php echo $data['Day']; $timeid = $data['Time']?> </td>
                <!--  -->
                <td><?php echo $data['Time'];?> </td>
                <td><?php echo $data['Room'];?> </td>
                </tr>
              <?php
            } ?>
        </tbody>
      </table>
  </div>
</body>

</html>

<script>
  function getresult() 
  {
    var fieldContainer_Business_Type = document.getElementsByClassName('Business_Type')[0];
    var radios_Business_Type = fieldContainer_Business_Type.getElementsByTagName("input");
    var Business_Type;

    

    function businessType() {

        for (var i = 0; i < radios_Business_Type.length; i++) {
            alert(radios_Business_Type)
            if (radios_Business_Type[i].type === 'radio' && radios_Business_Type[i].checked) {
                Business_Type = radios_Business_Type[i].value;
                
                console.log(Business_Type);
            }
        }
    }

    for (var i = 0; i < radios_Business_Type.length; i++) {
        radios_Business_Type[i].addEventListener('click', businessType);
    }
  }
</script>

<?php 
    if(isset($_POST["course_pref"]))
    {
        $con=mysqli_connect('localhost','root','','school');

        $facultyid=$_POST["faculty"];
        $ranked=$_POST["ranked"];
        $coursename=$_POST["course"];
      
        $con=mysqli_connect('localhost','root','','school');
        $query="SELECT * FROM `course` WHERE course='$coursename'";
        $run=mysqli_query($con,$query);
        $row=mysqli_num_rows($run);
        $data=mysqli_fetch_assoc($run);

        $courseid = $data['id'];

       


        $room=$_POST["room"];
        $time1=$_POST["time1"];
        $time2=$_POST["time2"];
        $time3=$_POST["time3"];
        $time4=$_POST["time4"];
        $time5=$_POST["time5"];

        if($time1!="0")
        {
          $run=mysqli_query($con,"UPDATE time SET Uid=$facultyid, Status='1', course = $courseid, room = $room  WHERE Tid=$time1");
          $run=mysqli_query($con,"INSERT INTO schedule (Uid, Course, Day, Time, Room) VALUES ('$facultyid',  '$courseid', 'Monday', $time1, $room)");
        }
        if($time2!="0")
        {
          $run=mysqli_query($con,"UPDATE time SET Uid=$facultyid, Status='1', course=  $courseid, room = $room  WHERE Tid=$time2");
          $run=mysqli_query($con,"INSERT INTO schedule (Uid, Course, Day, Time, Room) VALUES ($facultyid,  '$courseid', 'Tuesday', $time2, $room)");
        }
        if($time3!="0")
        {
          $run=mysqli_query($con,"UPDATE time SET Uid=$facultyid, Status='1', course= $courseid, room = $room  WHERE Tid=$time3");
          $run=mysqli_query($con,"INSERT INTO schedule (Uid, Course, Day, Time, Room) VALUES ($facultyid,  '$courseid', 'Wednesday', $time3, $room)");
        }
        if($time4!="0")
        {
          $run=mysqli_query($con,"UPDATE time SET Uid=$facultyid, Status='1', course= $courseid, room = $room  WHERE Tid=$time4");
          $run=mysqli_query($con,"INSERT INTO schedule (Uid, Course, Day, Time, Room) VALUES ($facultyid,  '$courseid', 'Thursday', $time4, $room)");
        }
        if($time5!="0")
        {
          $run=mysqli_query($con,"UPDATE time SET Uid=$facultyid, Status='1', course= $courseid, room = $room  WHERE Tid=$time5");
          $run=mysqli_query($con,"INSERT INTO schedule (Uid, Course, Day, Time, Room) VALUES ($facultyid,  '$courseid', 'Friday', $time5, $room)");
        }
          // 
          if($run)
          {
            ?>
              <script>
                alert('Course Preferenecs Added Successfully.');
              </script>
            <?php
            // header("location:admin_page.php");
          }
          else
          {
            echo("Error description: " . $con -> error);
          }
        
        
    }
?>